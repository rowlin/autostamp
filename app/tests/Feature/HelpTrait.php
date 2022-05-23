<?php


namespace Tests\Feature;


use App\Product;
use App\Store;

trait HelpTrait
{

    protected function getFirstProduct(){
        $product =  Product::first();
        if($product == null){
           $product = factory(Product::class)->create();
        }
        return $product;
    }

    protected function getFirstStore(){
        $store = Store::first();
        if($store == null){
            $store = factory(Store::class)->create();
        }
        return $store;
    }

}
