@extends('welcome')
@section('content')
@section('title')
Order Detail
@endsection

<div class="benefit">
    <div class="col text-center" id="blog">
        <div class="section_title">
          <h2>Order Details</h2>
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
            </tr>
          </thead>
          <tbody>
            @php $counter = 1 @endphp
            <tr>
              <th scope="row">{{ $counter }}</th>
              <td>{{ $order->invNo }}</td>
              <td>{{ $order->cust_name }}</td>
              <td>RM {{ $order->total }}</td>
              <td>{{ $order->created_at }}</td>
            </tr>
            @php $counter++ @endphp 
          </tbody>
        </table>
      </div>
    </div>
</div>


<div class="benefit">
    <div class="col text-center" id="blog">
        <div class="section_title">
          <h2>Item Details</h2>
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
                <th scope="col">Image</th>
                <th scope="col">Name, Size, Color</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
            </tr>
            </thead>
            <tbody>
                @php $counter = 1 @endphp
                @foreach ($orderItem as $item)
                <tr>
                <th scope="row">{{ $counter }}</th>
                <td><img src="{{ $item->image }}" style="width: 90px; height: 120px;"> </td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>RM {{ $item->price }}</td>
                </tr>
                @php $counter++ @endphp
                @endforeach
            </tbody>
        </table>
    </div>
  </div>
</div>



@endsection