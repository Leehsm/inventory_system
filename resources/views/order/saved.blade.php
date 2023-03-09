@extends('welcome')
@section('content')
@section('title')
Customer Order
@endsection

<div class="benefit">
    <div class="col text-center" id="blog">
        <div class="section_title">
          <h2>Order</h2>
        </div>
    </div>
    <br>
</div>

<div class="benefit">
    <div class="container">
      <div class="row benefit_row" style="overflow-x: auto; display: block;">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Invoice No</th>
              <th scope="col">Customer Name</th>
              <th scope="col">Total Price</th>
              <th scope="col">Date</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @php $counter = 1 @endphp
            @foreach ($saved as $item)
            <tr>
              <th scope="row">{{ $counter }}</th>
              <td>{{ $item->invNo }}</td>
              <td>{{ $item->cust_name }}</td>
              <td>RM {{ $item->total }}</td>
              <td>{{ $item->created_at }}</td>
              <td>
                <a href="{{ route('order-detail',$item->id) }}" class="btn btn-info" title="Detail"><i class="fa fa-eye"></i> </a>
                <a  target="_blank" href="{{ route('invoice-download',$item->id) }}" class="btn btn-danger" title="Invoice"><i class="fa fa-download"></i></a>
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