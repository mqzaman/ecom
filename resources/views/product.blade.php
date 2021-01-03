@extends('master');

@section('content')
    <div class="container custom-product">
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carouselExampleDark" data-bs-slide-to="1"></li>
                <li data-bs-target="#carouselExampleDark" data-bs-slide-to="2"></li>
                <li data-bs-target="#carouselExampleDark" data-bs-slide-to="3"></li>
                <li data-bs-target="#carouselExampleDark" data-bs-slide-to="4"></li>
            </ol>
            <div class="carousel-inner">
                @foreach ($products as $item)
                    <div class="carousel-item {{ $item->id == 1 ? 'active' : '' }}" data-bs-interval="10000">
                        <a href="/resto/detail/{{ $item->id }}">
                            <img src="{{ $item->gallery }}" class="d-block w-50" alt="{{ $item->name }}">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>{{ $item->name }}</h5>
                                <p>{{ $item->description }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleDark" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleDark" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
    </div>
    <br><br>
    <div class="trending-wrapper">
        <h3>Trending Products</h3>
        @foreach ($products as $item)
            <div class="trending-item">
                <a href="/resto/detail/{{ $item->id }}">
                    <img src="{{ $item->gallery }}" class="trending-image">
                    <div class="trending-name">
                        <h3>{{ $item->name }}</h3>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

@endsection
