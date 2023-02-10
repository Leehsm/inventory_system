@extends('welcome')
@section('content')
@section('title')
Skincare DB
@endsection

<div class="benefit" style="margin-top: 180px">
    <div class="container">
      <div class="row benefit_row" style="overflow-x: auto; display: block;">
        <form method="POST" action="{{ route('skincare.update') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $skincare->code }}">

            <div class="form-group">
                <label for="exampleFormControlInput1"><h3> Edit Skincare's Customer <h3></label>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $skincare->name }}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Address</label>
                <input type="text" class="form-control" name="address" id="address" value="{{ $skincare->address }}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Phone</label>
                <input type="text" class="form-control" name="phone" id="phone" value="{{ $skincare->phone }}">
            </div><div class="form-group">
                <label for="exampleFormControlInput1">Date Of Birth</label>
                <input type="date" class="form-control" name="dob" id="dob" value="{{ $skincare->dob }}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Admin</label>
                <select class="form-control" name="admin" id="admin">
                    <option value="dina">Dina</option>
                    <option value="nurin">Nurin</option>
                    <option value="erni">Erni</option>
                    <option value="shahzlin">Shahzlin</option>
                    <option value="ain">Ain</option>
                    <option value="isnaini">Isnaini</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
</div>

@endsection