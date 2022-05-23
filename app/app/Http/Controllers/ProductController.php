<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\CreateRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Product;
use Illuminate\View\View;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    protected function store_image($image) : string{
        $fileName = time() . '.' . $image->getClientOriginalExtension();
        $path = '/images/products/' . $fileName;
        $image->move(public_path('/images/products'), $fileName);
        return $path;
    }

    protected function delete_image($path) : bool{
        if (file_exists(public_path($path))) {
            return File::delete(public_path($path));
        }else return false;
    }

    public function index() : View{
        $products =  Product::orderBy('updated_at' , 'DESC')->paginate(5);
        return view('product.index' , compact('products'));
    }

    public function create(): View{
        return view('product.create');
    }

    public function edit(Product $product) : View{
        return view('product.edit' , compact('product'));
    }


    public function save(CreateRequest $request) {
       if($request->validated()) {
           $data = $request->validated();
           if($request->image) {
               $path = $this->store_image($request->image);
               $data['image'] = $path;
           }
            Product::create($data);
       }

        return redirect('products')->with('success' ,'Product was created');
    }

    public function update(Product $product, UpdateRequest  $request){
        if($request->has_delete === 'on') {
            $this->delete_image($product->image);
            $product->image = null;
        }
        $product->fill($request->validated());

        if($product->isDirty('image') && $request->has_delete !== 'on' ){
            $this->delete_image($product->image);
            $path =  $this->store_image($request->image);
            $product->image = $path;
        }
        $product->save();
        return redirect()->back()->with('success' ,'Product was updated');
    }


    public function delete(Product $product){
        if($product->delete()){
            return redirect()->back()->with('success' ,'Product was deleted');
        }else
            return redirect()->back()->with('success' ,'Oops: Something was wrong');
    }
}
