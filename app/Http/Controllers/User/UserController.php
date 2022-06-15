<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
  private const VALIDATE = [
    'name' => 'required|string',
    'email' => 'required|email',
    'password' => 'required'
  ];

  function __construct()
  {
    $this->middleware('permission:manage user action')->except('index');
    $this->middleware('permission:manage user')->only('index');
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $datas = User::get();
    return view('manage_user.V_user', ['datas' => $datas]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('manage_user.V_add_user');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate(self::VALIDATE);
    unset($request['_token']);
    $request['password'] = Hash::make($request->password);
    if (User::create(request()->all())) {
      return redirect('/manage-user')->with('success', 'Berhasil menambahkan');
    } else {
      return redirect()->back()->with('error', 'Terjadi kesalahan, silahkan coba lagi');
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\User  $user
   * @return \Illuminate\Http\Response
   */
  public function show(User $user)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\User  $user
   * @return \Illuminate\Http\Response
   */
  public function edit(User $manage_user)
  {
    return view('manage_user.V_edit_user', ['data' => $manage_user]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\User  $user
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, User $manage_user)
  {
    $validate = self::VALIDATE;
    $request->validate($validate);

    if ($request->password == 'JANGAN DISIMPAN') unset($request['password']);
    else $request['password'] = Hash::make($request->password);

    unset($request['_token']);
    unset($request['_method']);
    if ($manage_user->update(array_filter($request->all()))) {
      return redirect('/manage-user')->with('success', 'Berhasil memperaharui');
    } else {
      return redirect()->back()->with('error', 'Terjadi kesalahan, silahkan coba lagi');
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\User  $user
   * @return \Illuminate\Http\Response
   */
  public function destroy(User $manage_user)
  {
    if ($manage_user->delete()) {
      return redirect('/manage-user')->with('success', 'Berhasil dihapus');
    } else {
      return redirect('/manage-user')->with('error', 'Terjadi kesalahan, silahkan coba lagi');
    }
  }
}
