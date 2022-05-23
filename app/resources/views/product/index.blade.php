@extends('layouts.index')

@section('title', 'Products')

@section('panel')
    <div id="panel">
        <div class="mb-10">
            <span>Products</span>
            <a class="btn btn-dark" href="{{ url('product/create') }}">Add new</a>
        </div>
        @include('common._sessions')
    </div>
@stop

@section('content')
<div>
    @foreach($products as $product)
        <div class="media">
                <div class="img">
                    <img src="{{ $product->image ? url($product->image) :  url('images/empty.png')  }}" height="100">
                </div>
            <div class="content">
                <p class="name truncate" >
                        {{ $product->name }}
                </p>
                <p class="description truncate" >
                        {{ $product->description }}
                </p>
            </div>
            <div class="actions">
                <a class="btn btn-dark mr-10" href="{{ url("product/edit/{$product->id}") }}">
                    Edit
                </a>
                <form method="POST" action="{{ url("product/delete/{$product->id}") }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-red mr-10">
                        Delete
                    </button>
                </form>
            </div>
        </div><!--media-->
    @endforeach
    {{ $products->links() }}
</div>
@stop

