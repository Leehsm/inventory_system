@extends('welcome')
@section('content')
@section('title')
Inventory
@endsection

<div class="benefit" style="margin-top: 180px">
    <div class="container">
      <div class="row benefit_row" style="overflow-x: auto; display: block;">
        <form method="POST" action="{{ route('inventory.update') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $product->id }}">
            <input type="hidden" name="old_image" value="{{ $product->image }}">

            <div class="form-group">
                <label for="exampleFormControlInput1"><h3> Edit Product <h3></label>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Image</label>
                <input type="file" class="form-control" name="image" id="image" accept="image/*">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Name</label>
                <input type="text" class="form-control" name="name" id="name" required value="{{ $product->name }}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Code</label>
                <input type="text" class="form-control" name="code" id="code" required value="{{ $product->code }}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Color</label>
                <input type="text" class="form-control" name="color" id="color" required value="{{ $product->color }}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Price</label>
                <input type="text" class="form-control" name="price" id="price" value="{{ $product->price }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
</div>

@endsection