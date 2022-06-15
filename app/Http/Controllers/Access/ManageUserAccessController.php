<?php

namespace App\Http\Controllers\Access;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class ManageUserAccessController extends Controller
{
  function __construct()
  {
    $this->middleware('permission:manage access');
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $datas = User::with(['permissions', 'roles'])->get();
    return view('access.V_manage_useraccess', ['datas' => $datas]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $data = User::with(['permissions', 'roles'])->find($id)->toArray();
    $data['roles'] = array_column($data['roles'], 'name');
    $data['permissions'] = array_column($data['permissions'], 'name');
    $data['roles_list'] = Role::all();
    $data['permissions_list'] = Permission::all();

    return view('access.V_edit_manage_useraccess', ['data' => $data]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $request->validate([
      'roles' => 'string',
      'permissions.*' => 'string'
    ]);
    $user = User::find($id);

    if ($user->syncPermissions($request->permissions)) {
      if ($request->roles == 'Select Role') return redirect('/user-access')->with('success', 'Berhasil mengubah permission');
      if ($user->syncRoles($request->roles)) {
        return redirect('/user-access')->with('success', 'Berhasil mengubah roles dan permissions');
      } else {
        return redirect()->back()->with('error', 'Gagal update roles, silahkan coba lagi');
      }
    } else {
      return redirect()->back()->with('error', 'Terjadi kesalahan, silahkan coba lagi');
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
