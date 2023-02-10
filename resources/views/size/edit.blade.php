@extends('welcome')
@section('content')
@section('title')
Size
@endsection

<div class="benefit" style="margin-top: 180px">
    <div class="container">
      <div class="row benefit_row" style="overflow-x: auto; display: block;">
        <form method="POST" action="{{ route('size.update') }}">
            @csrf
            <input type="hidden" name="id" value="{{ $size->id }}">

            <div class="form-group">
                <label for="exampleFormControlInput1"><h3> Edit Size <h3></label>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Size</label>
                <input type="text" class="form-control" name="size" id="size" required value="{{ $size->size_type }}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Quantity</label>
                <input type="text" class="form-control" name="qty" id="qty" required value="{{ $size->quantity }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
</div>

@endsection