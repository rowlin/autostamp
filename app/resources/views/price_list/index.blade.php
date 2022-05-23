@extends('layouts.index')

@section('title', 'Price Lists')

@section('panel')
<div id="panel">
    <div class="mb-10">
        <span>Price Lists</span>
    </div>
    @include('common._sessions')
</div>
@stop

@section('content')
<form action="{{ url('/price_lists') }}" method="get" >

    @if(isset($stores))
    <div class="form-group">
        <label for="store_id">Store</label>
        <select name="store_id" id="store_id" class="form-control">
            <option value="null">- Set for all stores -</option>
            @foreach($stores as $store)
            <option value="{{ $store->id }}" @if(request()->has('store_id') & request()->get('store_id') == $store->id ) selected @endif >{{ $store->name }}</option>
            @endforeach
        </select>
    </div>
    @endif

    <div class="form-group">
        <label for="starts_at">Start date and time</label>
        <input type="datetime-local" name="starts_at" id="starts_at"
               value="@if(request()->has('starts_at')){{ request()->get('starts_at') }}@endif"
               class="form-control">
    </div>

    <button type="submit" class="btn btn-dark mt-10">Show price List</button>
</form>

<div>
    <table class="table">
        <thead >
        <tr>
            <td>#</td>
            <td>Product code</td>
            <td>Product name</td>
            <td>Price</td>
        </tr>
        </thead>
        <tbody>
        @foreach($result as $num => $r)
            <tr>
                <td>{{ ++$num }}</td>
                <td>{{ $r->product->code ?? "--" }}</td>
                <td>{{ $r->product->name ?? "--" }}</td>
                <td>{{ $r->price }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection
