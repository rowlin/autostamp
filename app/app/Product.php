<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $fillable = ['code' , 'name', 'description', 'image'];

    protected $perPage = 5;

    public function price(){
        return $this->hasMany('App\Price' , 'product_id');
    }


}
