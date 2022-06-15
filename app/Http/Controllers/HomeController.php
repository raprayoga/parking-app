<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
  // ====================== PROFILE ======================
  public function profile()
  {
    $dataUser = Auth::user();
    $data['data'] = $dataUser;

    return view('home.V_profile', $data);
  }

  public function edit_profile()
  {
    $dataUser = Auth::user();
    $data['data'] = $dataUser;
    return view('home.V_edit_profile', $data);
  }

  public function edit_profile_process(Request $request)
  {
    $user = Auth::user();

    $request->validate([
      'email' => 'email|required|string',
    ]);

    $data = [
      'email' => $request->email,
    ];

    if ($user->update($data)) {
      $request->session()->forget(['email', 'name']);
      $request->session()->put('email', $request->email);
      $request->session()->put('name', $request->name);
      return redirect('profile')->with('updatesuccess', 'your profile has been updated successfully');
    } else {
      return redirect('profile')->with('error', 'your profile failed to update');
    }
  }

  public function edit_password_process(Request $request)
  {
    $this->validate($request, [
      'password' => 'required|confirmed|min:8|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x]).*$/',
      'password_lama' => 'required',
    ]);
    
    $user = Auth::user();
    $password = $request->password;
    $password_lama = $request->password_lama;

    if (Hash::check($password_lama, $user->password)) {
      $newpass = Hash::make($password);
      if ($user->update(['password' => $newpass])) {
      return redirect('profile')->with('updatesuccess', 'your password has been changed successfully');
      }
      return redirect()->back()->with('updateerror', 'something wrong, please try again');
    } else {
      return redirect()->back()->with('updateerror', 'your old password is wrong');
    }
  }

  public function index()
  {
      return view('home/V_home');
  }

}
