@extends('layouts.index')

@section('title', 'Users')

@section('panel')
    <div id="panel">
        <div class="mb-10">
            <span>Users</span>
            <a class="btn btn-dark" href="{{ url('user/create') }}">Add new</a>
        </div>
        @include('common._sessions')
    </div>
@stop

@section('content')
    <div>
        @foreach($users as $user)
            <div class="media">
                <div class="content">
                    <p class="name truncate" >
                        {{ $user->name }}
                    </p>
                    <p class="description truncate" >
                        {{ $user->description }}
                    </p>
                </div>
                <div class="actions">
                    <a class="btn btn-dark mr-10" href="{{ url("user/edit/{$user->id}") }}">
                        Edit
                    </a>
                    <form method="POST" action="{{ url("user/delete/{$user->id}") }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-red mr-10">
                            Delete
                        </button>
                    </form>
                </div>
            </div><!--media-->
        @endforeach
        {{ $users->links() }}
    </div>
@stop
