@extends('layouts.index')

@section('title', 'Stories')

@section('panel')
    <div id="panel">
        <div class="mb-10">
            <span>Stories</span>
            <a class="btn btn-dark" href="{{ url('store/create') }}">Add new</a>
        </div>
        @include('common._sessions')
    </div>
@stop

@section('content')
    <div>
        @foreach($stories as $store)
            <div class="media">
                <div class="content">
                    <p class="name truncate" >
                        {{ $store->name }}
                    </p>
                    <p class="description truncate" >
                        {{ $store->description }}
                    </p>
                </div>
                <div class="actions">
                    <a class="btn btn-dark mr-10" href="{{ url("store/edit/{$store->id}") }}">
                        Edit
                    </a>
                    <form method="POST" action="{{ url("store/delete/{$store->id}") }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-red mr-10">
                            Delete
                        </button>
                    </form>
                </div>
            </div><!--media-->
        @endforeach
        {{ $stories->links() }}
    </div>
@stop

