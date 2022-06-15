<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    protected $table = 'parking';
    protected $hidden = ['updated_at'];
    protected $fillable = ['user_id', 'nopol', 'code', 'intime', 'outtime', 'status'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
