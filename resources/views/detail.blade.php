@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img class="detail-img" src="{{ $product['gallery'] }}" alt="">
            </div>
            <div class="col-sm-6">
                <a href="/resto/">Go Back</a>
                <h2>{{ $product['name'] }}</h2>
                <h3>Price: {{ $product['price'] }}</h3>
                <h4>Description: {{ $product['description'] }}</h4>
                <h5>Category: {{ $product['category'] }}</h5>
                <br><br>
                <form action="/resto/add_to_cart" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{$product['id']}}">
                    <button class="btn btn-primary">Add to Cart</button>
                </form>
                <br><br>
                <button class="btn btn-success">Buy Now</button>
            </div>
        </div>
    </div>
@endsection
