<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\CreateRequest;
use App\Http\Requests\Store\UpdateRequest;
use App\Store;

class StoreController extends Controller
{

    public function index(){
        $stores =  Store::orderBy('updated_at' , 'DESC')->paginate(5);
        return view('store.index' , compact('stores'));
    }

    public function create(){
        return view('store.create' );
    }

    public function edit(Store $store){
        return view('store.edit' , compact('store'));
    }

    public function save(CreateRequest $request){
        Store::create($request->validated());
        return redirect('stores')->with('success' ,'Store was created');
    }

    public function update(Store $store, UpdateRequest  $request){
        $store->fill($request->validated());
        $store->save();
        return redirect()->back()->with('success' ,'Store was updated');
    }

    public function delete(Store $store){
        if($store->delete()){
            return redirect()->back()->with('success' ,'Product was deleted');
        }else
            return redirect()->back()->with('success' ,'Oops: Something was wrong');
    }
}
