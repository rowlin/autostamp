<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    public $fillable = ['product_id' , 'store_id' , 'price' , 'starts_at' ];

    public $timestamps = false;

    public function product(){
        return $this->hasOne(Product::class , 'id' , 'product_id' );
    }

    public function store_id(){
        return $this->hasOne(Store::class , 'id' , 'store_id' )->withDefault([ 'store_id' => null ]);
    }

    protected $primaryKey = 'id';

    //const CREATED_AT = 'starts_at';

}
