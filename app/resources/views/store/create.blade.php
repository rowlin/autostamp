@extends('layouts.index')

@section('title', 'New Store')

@section('panel')
    <div id="panel">
        <div class="mb-10">
            <span>New store</span>
        </div>
        @include('common._sessions')
    </div>
@stop

@section('content')
    <form action="{{ url('/store/create') }}" method="post" >
        @include('store.form._form')
        <button type="submit" class="btn btn-dark mt-10">Create</button>
    </form>
@endsection
