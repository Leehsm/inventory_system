@extends('welcome')
@section('content')
@section('title')
Sahira 
@endsection

<div class="benefit">
    <div class="col text-center" id="blog">
        <div class="section_title">
        <h2>Order</h2>
        </div>
    </div>
    <br>
</div>

<div class="container">
    <form action="{{ route('inventory.search') }}" method="GET" class="form-inline">
        <div class="form-group mx-sm-3 mb-2">
          <input type="text" class="form-control" id="search" placeholder="Name / Code">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Search</button>
    </form>
    <div class="row">
    @foreach ($product as $data)
      <div class="col-sm-6 col-lg-4 mb-3">
        <div class="card h-100">
          <img src="{{ asset($data->image) }}" class="card-img-top" style="width: 250px; height: 250px;">
          <div class="card-body">
            <input type="hidden" name="name" value="{{ $data->name }}">
            <input type="hidden" name="code" value="{{ $data->code }}">
            <input type="hidden" name="color" value="{{ $data->color }}">
            <input type="hidden" name="price" value="{{ $data->price }}">
            <h5 class="card-title">{{ $data->name }}</h5>
            <p class="card-text">{{ $data->code }}</p>
            <p class="card-text">{{ $data->color }}</p>
            <p class="card-text">{{ $data->price }}</p>
            <a href="#" class="btn btn-primary">ADD</a>
          </div>
        </div>
    </div>
    @endforeach
  </div>
</div>



@endsection