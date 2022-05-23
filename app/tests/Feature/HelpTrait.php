<?php


namespace Tests\Feature;


use App\Product;
use App\Store;

trait HelpTrait
{

    protected function getFirstProduct(){
        return Product::first();
    }

    protected function getFirstStore(){
        return Store::first();
    }

}
