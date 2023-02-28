@extends('welcome')
@section('content')
@section('title')
Customer Order
@endsection

<div class="benefit">
    <div class="col text-center" id="blog">
        <div class="section_title">
          <h2>Order</h2>        
          <br>
          <div class="red_button shop_now_button"><a href="{{ route('saved-order') }}">Saved Order</a></div>
          <div class="red_button shop_now_button"><a href="#">Paid</a></div>
        </div>
    </div>
    <br>
</div>

<div class="benefit">
    <div class="container">
      <div class="row benefit_row" style="overflow-x: auto; display: block;">
        @if ($message = Session::get('success'))
            <div class="p-4 mb-3 bg-green-400 rounded">
                <p class="text-green-800">{{ $message }}</p>
            </div>
        @endif
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Image</th>
              <th scope="col">Name, Size, Color</th>
              <th scope="col">Quantity</th>
              <th scope="col">Price</th>
              <th scope="col">Remove</th>
            </tr>
          </thead>
          <tbody>
            @php $counter = 1 @endphp
            @foreach ($orderItems as $item)
            <tr>
              <th scope="row">{{ $counter }}</th>
              <td><img src="{{ $item->attributes->image }}" style="width: 90px; height: 120px;"> </td>
              <td>{{ $item->name }}</td>
              <td>
                <form action="{{ route('order.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $item->id}}" >
                    <input type="number" name="quantity" value="{{ $item->quantity }}" class="w-6 text-center bg-gray-300" />
                    <button type="submit" class="btn btn-primary mb-2">update</button>
                </form>
              </td>
              {{-- <td>{{ $item->color }}</td> --}}
              <td>RM {{ $item->price }}</td>
              <td>
                <form action="{{ route('order.remove') }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{ $item->id }}" name="id">
                    <button class="btn btn-danger mb-2">x</button>
                </form>
              </td>
            </tr>
            @php $counter++ @endphp
            @endforeach
          </tbody>
        </table>
        <div>
            Total: RM {{ Cart::getTotal() }}
           </div>
           <div>
              <form action="{{ route('order.clear') }}" method="POST">
                @csrf
                <button class="btn btn-primary mb-2">Clear All</button>
              </form>
              {{-- <form action="{{ route('order.save') }}" method="POST">
                @csrf
                <button class="btn btn-primary mb-2">Save</button>
              </form> --}}
              <form action="{{ route('order.save') }}" method="POST">
                 @csrf
                 <input type="text" name="customer_name" required>
                 <button class="btn btn-primary mb-2">Pay Now</button>
              </form>
           </div>
      </div>
    </div>
</div>

@endsection