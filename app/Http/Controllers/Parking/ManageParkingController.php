<?php

namespace App\Http\Controllers\Parking;

use App\Http\Controllers\Controller;
use App\Models\Parking;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

use App\Exports\ParkingExport;

class ManageParkingController extends Controller
{
  function __construct()
  {
    $this->middleware('permission:manage parking');
  }


  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $datas = Parking::with('user')->get();
    return view('manage_parking.V_parking', ['datas' => $datas]);
  }

  public function export_data(Request $request)
  {
    $daterange = explode(' - ', $request->daterange);

    $dateStart = $daterange[0];
    $dateEnd = $daterange[1];

    return Excel::download(new ParkingExport($dateStart, $dateEnd), 'Parking.xlsx');
  }
}
