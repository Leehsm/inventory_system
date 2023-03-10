@extends('welcome')
@section('content')
@section('title')
Inventory
@endsection

<div class="benefit">
  <div class="col text-center" id="blog">
      <div class="section_title">
        <h2>Inventory Database</h2>
        <br>
        <div class="red_button shop_now_button"><a href="{{ route('product') }}">View Product</a></div>
        <div class="red_button shop_now_button"><a href="{{ route('inventory.add') }}">Add Product</a></div>
        <div class="red_button shop_now_button"><a href="{{ route('size') }}">Add Size</a></div>
      </div>      
  </div>
  <br>
</div>

<div class="benefit">
    <div class="container">
      <form action="{{ route('inventory.search') }}" method="post" class="form-inline">
        @csrf
        <div class="form-group mx-sm-3 mb-2">
          <input type="text" class="form-control" id="search" name="search" placeholder="Name / Code">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Search</button>
      </form>
      <div class="row benefit_row" style="overflow-x: auto; display: block;">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Image</th>
              <th scope="col">Code</th>
              <th scope="col">Name</th>
              <th scope="col">Color</th>
              <th scope="col">Size</th>
              <th scope="col">Quantity</th>
              <th scope="col">Price</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @php $counter = 1 @endphp
            @foreach ($products as $data)
            <tr>
              <th scope="row">{{ $counter }}</th>
              <td><img src="{{ asset($data->image) }}" style="width: 70px; height: 40px;"> </td>
              <td>{{ $data->code }}</td>
              <td>{{ $data->name }}</td>
              <td>{{ $data->color }}</td>
              <td>{{ $data->size }}</td>
              <td>{{ $data->quantity }}</td>
              <td>{{ $data->price }}</td>
              <td>
                <a href="{{ route('inventory.edit', $data->id) }}" class="btn btn-info btn-sm" title="Edit Data"><i class="fa fa-pencil">Product</i> </a>
                <a href="{{ route('size.edit', $data->size_id) }}" class="btn btn-info btn-sm" title="Edit Data"><i class="fa fa-pencil">Size</i> </a>
                <a href="{{ route('inventory.delete', $data->id) }}" class="btn btn-danger btn-sm" title="Delete Data" id="delete"><i class="fa fa-trash">Product</i></a>
                <a href="{{ route('size.delete', $data->size_id) }}" class="btn btn-danger btn-sm" title="Delete Data" id="delete"><i class="fa fa-trash">Size</i></a>
              </td>
            </tr>
            @php $counter++ @endphp
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
</div>

@endsection