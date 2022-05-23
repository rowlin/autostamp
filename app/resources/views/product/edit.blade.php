@extends('layouts.index')

@section('title', 'Edit product')

@section('panel')
    <div id="panel">
        <div class="mb-10">
            <span>Edit product</span>
        </div>
        @include('common._sessions')
    </div>
@stop

@section('content')
    <form action="{{ url("/product/update/{$product->id}") }}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PATCH">
        @include('product.form._form')
        <button type="submit" class="btn btn-dark mt-10">Save product</button>
    </form>
@endsection
