@extends('layout2')

@section('content2')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css1/card1.css') }}">
    <title>Restaurants near {{ $university->name }}</title>
</head>
<body>
    <div class="container">
        <h1>Restaurants near {{ $university->uni_name }}</h1>
        <div class="card-container">
            @foreach($restaurants as $restaurant)
                <div class="card">
                 
                    <img src="{{ asset('images/'.$restaurant->image_url) }}" alt="{{ $restaurant->rest_name }}">
                        <h3>{{ $restaurant->rest_name }}</h3>
                        <p>{{ $restaurant->rest_address }}</p>
                        <a href="{{ route('menu', $restaurant->id) }}" class="btn">Visit</a>
                    </div>
                    @endforeach
                </div>
        </div>
    
</body>
@endsection