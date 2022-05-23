<?php

namespace App\Http\Controllers;

use App\Http\Requests\Prices\SelectRequest;
use App\Http\Requests\Prices\UpdateRequest;
use App\Product;
use App\Store;
use Illuminate\View\View;

class PriceController extends Controller
{

    protected $error;


    public function __construct(){
        $this->error  = null;
    }

    public function index():View{
        $stores = Store::all();
        return view('prices.index', compact('stores') );
    }

    public function list(SelectRequest $request): View{
        $stores = Store::all();
        $result = [];
        return view('price_list.index' , compact('stores' , 'result'));
    }

    public function update(UpdateRequest $request){
        $product = Product::where('id' , $request->product_id )->orWhere('code' , $request->product_id )->first();
        if($product === null ){
            $this->error =  "Product not found";
        }else{
            if($request->store_id !== null){
                $has_store = Store::where('id' ,$request->store_id )->first();
                if($has_store === null){
                    $this->error = 'Oops: Store not found. Please refresh page.';
                }
            }
            $product->price()->updateOrCreate(['product_id' => $product->id , 'store_id' => $request->store_id] ,
                ['price' => $request->price , 'starts_at' => $request->starts_at ]);
        }

        if($this->error ){
            return redirect()->back()->withErrors(['msg' => $this->error]);
        }else{
            return redirect()->back()->with('status' , 'Updated.');
        }
    }

}
