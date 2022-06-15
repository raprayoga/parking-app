<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AuthModel extends Model
{
  protected $table = 'admins';
  protected $softdelete;
  protected $hidden = ['updated_at', 'delete_at'];

  public function log()
  {
    return $this->hasMany('App\Model\Admin\ActvityLog');
  }

  public function get_data($email)
  {
    $data = AuthModel::where('email', $email)->first();

    return $data;
  }

  public function update_profile($data, $email)
  {
    $data = DB::table('admins')
      ->where('email', $email)
      ->update($data);

    return $data;
  }

  public function update_pass($password, $id)
  {
    $data = DB::table('admins')
      ->where('id', $id)
      ->update(['password' => $password]);

    return $data;
  }
}
