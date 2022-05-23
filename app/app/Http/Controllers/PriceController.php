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
use phpDocumentor\Reflection\Types\Null_;

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

        //datetime:Y-m-d\TH:i:s
        //Bad way
        try {
            $date = Carbon::parse($request->get('starts_at'));
        }catch(\Exception $e){
            $date = false;
        }

        $stores = Store::all();
        $r1 = Price::where('store_id' , null);
        $result = Price::when(($request->has('store_id') & $request->get('store_id') !== null) , function (Builder $q) use ($request) {
            return $q->where('store_id',$request->get('store_id')  );
        })->when($date , function(Builder $q) use ($date){
            return $q->where('starts_at', '>=' ,$date  );
        })->union($r1)->orderBy('starts_at' , "DESC")->get();

        return view('price_list.index' , compact('stores' , 'result'));
    }

    public function update(UpdateRequest $request){
        $product = Product::where('id' ,$request->product_id )->orWhere('code' , $request->product_id )->first();
        if($product === null ){
            $this->error =  "Product not found";
        }else{
                $has_store = Store::where('id' ,$request->store_id )->first();
                if($has_store === null){
                    $product->price()->delete();
                    $product->price()->create(['store_id' => null, 'price' => $request->price , 'starts_at' => $request->starts_at ]);
                }else {
                    $has_price = $product->price()->where('store_id', $request->store_id)->first();
                    if ($has_price){
                        $has_price->update(['price' => $request->price , 'starts_at' => $request->starts_at]);
                    }else{
                        Price::create([ 'product_id' => $product->id,
                            'store_id' => $request->store_id, 'price' => $request->price , 'starts_at' => $request->starts_at ]);
                    }
                }
        }

        if($this->error ){
            return redirect()->back()->withErrors( $this->error);
        }else{
            return redirect()->back()->with('success' , 'Updated.');
        }
    }

}
