<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    public $fillable = ['name'];

    public $timestamps = false;

    public function users(){
        return $this->belongsTo(User::class , 'roles_id');
    }

}
