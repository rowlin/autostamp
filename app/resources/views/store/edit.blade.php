@extends('layouts.index')

@section('title', 'Edit store')

@section('panel')
    <div id="panel">
        <div class="mb-10">
            <span>Edit store</span>
        </div>
        @include('common._sessions')
    </div>
@stop

@section('content')
    <form action="{{ url("/store/update/{$store->id}") }}" method="post" >
        <input type="hidden" name="_method" value="PATCH">
        @include('store.form._form')
        <button type="submit" class="btn btn-dark mt-10">Save store</button>
    </form>
@endsection
