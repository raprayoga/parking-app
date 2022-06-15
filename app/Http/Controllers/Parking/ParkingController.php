<?php

namespace App\Http\Controllers\Parking;

use App\Http\Controllers\Controller;
use App\Models\Parking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Str;

class ParkingController extends Controller
{
  function __construct()
  {
    $this->middleware('permission:parking');
  }

  public function gatein(Request $request)
  {
    $request->validate([
      'nopol' => 'required|string',
    ]);

    $check_parking = Parking::where('nopol', $request->nopol)->orderBy('id')->first();
    if ($check_parking && $check_parking->status == 'IN') {
      return redirect()->back()->with('error', 'Nopol polisi tersebut sudah masuk');
    }

    $kode = Str::random(10);;

    Parking::create([
      'user_id' => Auth::user()->id,
      'nopol' => $request->nopol,
      'code' => $kode,
      'intime' => now(),
      'status' => 'IN'
    ]);

    return redirect('parking-gatein')->with('submitsuccess', 'Berhasil, berikut kode kartun Anda: ' . strtoupper($kode));
  }

  public function gateout(Request $request)
  {
    $request->validate([
      'kode' => 'required|string',
    ]);

    $check_parking = Parking::where('code', $request->kode)->orderBy('id')->first();
    if (!$check_parking) {
      return redirect()->back()->with('error', 'Kode tidak terdaftar');
    } else if ($check_parking->status == 'OUT') {
      return redirect()->back()->with('error', 'Kode tersebut sudah keluar');
    }

    $check_parking->update([
      'outtime' => now(),
      'status' => 'OUT'
    ]);

    return redirect('parking-gateout')->with('success', 'Berhasil');
  }
}
