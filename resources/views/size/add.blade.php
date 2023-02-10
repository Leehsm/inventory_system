@extends('welcome')
@section('content')
@section('title')
Size
@endsection

<div class="benefit" style="margin-top: 180px">
    <div class="container">
      <div class="row benefit_row" style="overflow-x: auto; display: block;">
        <form method="POST" action="{{ route('size.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1"><h3> Add Product Size <h3></label>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Product Code</label>
                <select class="form-control" name="product_code" id="product_code">
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }} / {{ $product->color }}/ {{ $product->code }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Size</label>
                <input type="text" class="form-control" name="size" id="size" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Quantity</label>
                <input type="text" class="form-control" name="qty" id="qty" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
</div>

@endsection