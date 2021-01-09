@extends('master')

@section('content')

    <div class="container custom-login">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
                <form action="/resto/register" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">User Name</label>
                        <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="User Name"  value="{{ old('name') }}">
                        <span style="color: red">@error('name'){{$message}}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email Address">
                        <span style="color: red">@error('email'){{$message}}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                        <span style="color: red">@error('password'){{$message}}@enderror</span>
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>
@endsection
