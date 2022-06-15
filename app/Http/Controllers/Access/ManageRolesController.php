<?php

namespace App\Http\Controllers\Access;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class ManageRolesController extends Controller
{
  private const VALIDATE = [
    'roles' => 'required|string|unique:roles,name',
    'permissions.*' => 'string'
  ];

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
    $datas = Role::with('permissions')->get();
    return view('access.V_manage_roles', ['datas' => $datas]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $datas = Permission::all();
    return view('access.V_add_manage_roles', ['datas' => $datas]);
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
    $role = Role::create(['name' => $request->roles]);

    if ($role->givePermissionTo($request->permissions)) {
      return redirect('/roles')->with('success', 'Berhasil menambahkan roles');
    } else {
      return redirect()->back()->with('error', 'Terjadi kesalahan, silahkan coba lagi');
    }
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
    $data = Role::with('permissions')->find($id)->toArray();
    $data['permissions'] = array_column($data['permissions'], 'name');
    $data['permissions_list'] = Permission::all();
    return view('access.V_edit_manage_roles',  ['data' => $data]);
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
    $validate = self::VALIDATE;
    $validate['roles'] = 'required|string|unique:roles,name,' . $id;
    $request->validate($validate);

    Role::where('id', $id)->update(['name' => $request->roles]);
    $role = Role::find($id);

    if ($role->syncPermissions($request->permissions)) {
      return redirect('/roles')->with('success', 'Berhasil mengubah roles');
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
    $role = Role::find($id);
    $role->syncPermissions([]);

    if (Role::destroy($id)) {
      return redirect('/roles')->with('success', 'Berhasil dihapus');
    } else {
      return redirect('/roles')->with('error', 'Terjadi kesalahan, silahkan coba lagi');
    }
  }
}
