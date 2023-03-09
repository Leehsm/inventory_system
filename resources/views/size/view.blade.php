@extends('welcome')
@section('content')
@section('title')
Size
@endsection

<div class="benefit">
  <div class="col text-center" id="blog">
      <div class="section_title">
        <h2>Product Size</h2>
        <br>
        <div class="red_button shop_now_button"><a href="{{ route('size.add') }}">Add Size</a></div>
      </div>      
  </div>
  <br>
</div>

<div class="benefit">
    <div class="container">
      <form action="{{ route('size.search') }}" method="post" class="form-inline">
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
              <th scope="col">Product Image</th>
              <th scope="col">Product Name</th>
              <th scope="col">Product Color</th>
              <th scope="col">Size</th>
              <th scope="col">Quantity</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($size as $data)
            <tr>
              <th scope="row">1</th>
              <td><img src="{{ asset($data->image) }}" style="width: 70px; height: 40px;"> </td>
              <td>{{ $data->name }}</td>
              <td>{{ $data->color }}</td>
              <td>{{ $data->size }}</td>
              <td>{{ $data->quantity }}</td>
              <td>
                <a href="{{ route('size.edit', $data->size_id) }}" class="btn btn-info btn-sm" title="Edit Data"><i class="fa fa-pencil"></i> </a>
                <a href="{{ route('size.delete', $data->size_id) }}" class="btn btn-danger btn-sm" title="Delete Data" id="delete"><i class="fa fa-trash"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
</div>

@endsection