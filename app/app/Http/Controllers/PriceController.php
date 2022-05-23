<?php

namespace App\Http\Controllers;

use App\Http\Requests\Prices\SelectRequest;
use App\Http\Requests\Prices\UpdateRequest;
use App\Price;
use App\Product;
use App\Store;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
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

        $result = Price::when($request->store_id , function (Builder $q) use ($request) {
            return $q->where('store_id', $request->store_id );
        })->when($request->starts_at, function(Builder  $q) use ($request){
            return $q->where('starts_at' ,'>=', Carbon::parse($request->starts_at) );
        })->orderBy('starts_at' , "DESC")->get();

        return view('price_list.index' , compact('stores' , 'result'));
    }

    public function update(UpdateRequest $request){
        $product = Product::where('id' , trim($request->product_id) )->orWhere('code' , trim($request->code) )->first();
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
            return redirect()->back()->withErrors( $this->error);
        }else{
            return redirect()->back()->with('status' , 'Updated.');
        }
    }

}
