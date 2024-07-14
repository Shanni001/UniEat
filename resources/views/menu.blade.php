
@extends('star1')

@extends('layout')



@section('content')
@section('content2')




<div class="wrapper">
    @foreach ($menus as $Menu)
    <div class="single-card">
        <div class="img-area">
            <img src="{{ asset('images') }}/{{ $Menu->image }}" alt="{{ $Menu->menu_name }}">
            <div class="overlay">
                <a href="{{ route('addToCart', $Menu->id) }}" class="add-to-cart">Add to Cart</a>
                <a  class="view-details">{{ $Menu->method }}</a>
                <a  class="view-details">{{ $Menu->send }}</a>
            </div>
        </div>
        <div class="info">
            <h3>{{ $Menu->menu_name }}</h3>
            <p class="price">KES <br> {{ $Menu->price }}</p>
            <p>{{ $Menu->description }}</p>
            <p>{{ $Menu->availability }}</p>
        </div>
    </div>
    @endforeach
</div>

@endsection

