<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AuthModel;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
  /**
   * Handle the incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function __invoke(Request $request)
  {
    //
  }

  public function login_process(Request $request)
  {
    $request->validate([
      'email' => 'email|required|string',
      'password' => 'required|string',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
      $data = Auth::user();
      $request->session()->put('email', $data->email);
      $request->session()->put('name', $data->name);

      return redirect('home');
    } else {
      return redirect()->back()->with('emailpass', 'your email or password was wrong, ' . $request->email);
    }
  }

  public function logout(Request $request)
  {
    Auth::logout();
    $request->session()->forget('email', 'name');
    return redirect('login');
  }
}
