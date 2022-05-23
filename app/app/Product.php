<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $fillable = ['code' , 'name', 'description', 'image'];

    protected $perPage = 5;

    protected $primaryKey = 'id';

    protected $keyType = 'id';

    public function getRouteKeyName()
    {
        return 'id';
    }

}
