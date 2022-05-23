@extends('layouts.index')

@section('title', 'Prices')

@section('panel')
    <div id="panel">
        <div class="mb-10">
            <span>Prices</span>
        </div>
        @include('common._sessions')
    </div>
@stop

@section('content')
    <form action="{{ url('/price/update') }}" method="post" >

        {{ csrf_field() }}

        <div class="form-group">
            <label for="product_id">Product ID or Code</label>
            <input name="product_id" type="text" id="product_id" class="form-control @if($errors->has('product_id')) is-invalid @else is-valid @endif"
                   value="{{ old('product_id') ?? ''  }}" required>
        </div>


        @if(isset($stores))
            <div class="form-group">
                <label for="store_id">Store</label>
                <select name="store_id" id="store_id" class="form-control">
                    <option value="null">- Set for all stores -</option>
                @foreach($stores as $store)
                        <option value="{{ $store->id }}">{{ $store->name }}</option>
                @endforeach
                </select>
            </div>
        @endif


        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" min="0"  name="price" id="price" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="starts_at">Start date and time</label>
            <input type="datetime-local" name="starts_at" id="starts_at" class="form-control">
        </div>

        <button type="submit" class="btn btn-dark mt-10">Add product price</button>
    </form>
@endsection
