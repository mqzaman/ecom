@extends('layout')

@section('content')
<h1>edit Restaurent:</h1>
<div class="col-sm-6">
<form method="POST" action="/resto/update">
    @csrf
    <input type="hidden" name="id" value="{{$data->id}}">
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" value="{{$data['name']}}">
      <span style="color: red">@error('name'){{$message}}@enderror</span>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" name="email" class="form-control" id="email" placeholder="Enter Email" value="{{$data->email}}">
        <span style="color: red">@error('email'){{$message}}@enderror</span>
      </div>
      <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" name="address" class="form-control" id="address" placeholder="Enter Address" value="{{$data->address}}">
      </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection