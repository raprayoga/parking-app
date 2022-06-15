<?php

namespace App\Http\Controllers\Access;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class ManagePermissionsController extends Controller
{
  private const VALIDATE = [
    'permissions' => 'required|string|unique:permissions,name',
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
    $datas = Permission::all();
    return view('access.V_manage_permissions', ['datas' => $datas]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('access.V_add_manage_permissions');
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

    if ($new_permission = Permission::create(['name' => $request->permissions])) {
      return redirect('/permissions')->with('success', 'Berhasil menambahkan permissions');
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
    $data = Permission::find($id);
    return view('access.V_edit_manage_permissions',  ['data' => $data]);
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
    $request->validate(self::VALIDATE);

    if (Permission::where('id', $id)->update(['name' => $request->permissions])) {
      return redirect('/permissions')->with('success', 'Berhasil mengubah permissions');
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
    if (Permission::destroy($id)) {
      return redirect('/permissions')->with('success', 'Berhasil dihapus');
    } else {
      return redirect('/permissions')->with('error', 'Terjadi kesalahan, silahkan coba lagi');
    }
  }
}
