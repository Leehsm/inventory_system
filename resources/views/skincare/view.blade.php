@extends('welcome')
@section('content')
@section('title')
Skincare DB
@endsection

<div class="benefit">
  <div class="col text-center" id="blog">
      <div class="section_title">
        <h2>Skincare Cutomer DB</h2>
        <br>
        <div class="red_button shop_now_button"><a href="{{ route('skincare.add') }}">Add New</a></div>
      </div>      
  </div>
  <br>
</div>

<div class="benefit">
    <div class="container">
      <form action="{{ route('skincare.search') }}" method="post" class="form-inline">
        @csrf
        <div class="form-group mx-sm-3 mb-2">
          <input type="text" class="form-control" id="search" name="search" placeholder="Name / Phone">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Search</button>
      </form>
      <div class="row benefit_row" style="overflow-x: auto; display: block;">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Phone</th>
              <th scope="col">Address</th>
              <th scope="col">Date of Birth</th>
              <th scope="col">Admin</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @php $counter = 1 @endphp
            @foreach ($skincare as $data)
            <tr>
              <th scope="row">{{ $counter }}</th>
              <td>{{ $data->name }}</td>
              <td>{{ $data->phone }}</td>
              <td>{{ $data->address }}</td>
              <td>{{ $data->dob }}</td>
              <td>{{ $data->admin }}</td>
              <td>
                <a href="{{ route('skincare.edit', $data->id) }}" class="btn btn-info btn-sm" title="Edit Data"><i class="fa fa-pencil"></i> </a>
                <a href="{{ route('skincare.delete', $data->id) }}" class="btn btn-danger btn-sm" title="Delete Data" id="delete"><i class="fa fa-trash"></i></a>
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