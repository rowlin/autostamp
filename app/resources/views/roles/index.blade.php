@extends('layouts.index')

@section('title', 'Roles')

@section('panel')
    <div id="panel">
        <div class="mb-10">
            <span>Roles</span>
            <a class="btn btn-dark" href="{{ url('role/create') }}">Add new</a>
        </div>
        @include('common._sessions')
    </div>
@stop

@section('content')
    <div>
        @foreach($roles as $role)
            <div class="media">
                <div class="content">
                    <p class="name truncate" >
                        {{ $role->name }}
                    </p>
                    <p class="description truncate" >
                        {{ $role->description }}
                    </p>
                </div>
                <div class="actions">
                    <a class="btn btn-dark mr-10" href="{{ url("role/edit/{$role->id}") }}">
                        Edit
                    </a>
                    <form method="POST" action="{{ url("role/delete/{$role->id}") }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-red mr-10">
                            Delete
                        </button>
                    </form>
                </div>
            </div><!--media-->
        @endforeach
        {{ $roles->links() }}
    </div>
@stop
