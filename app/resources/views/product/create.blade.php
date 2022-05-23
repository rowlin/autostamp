@extends('layouts.index')

@section('title', 'Products')

@section('panel')
    <div id="panel">
        <div class="mb-10">
            <span>New product</span>
        </div>
        @include('common._sessions')
    </div>
@stop

@section('content')
    <form action="{{ url('/product/create') }}" method="post" enctype="multipart/form-data">
        @include('product.form._form')
        <button type="submit" class="btn btn-dark mt-10">Create</button>
    </form>
@endsection
