@extends('layout2')

@section('content2')
<div id="card-area">
    <div class="wrapper">
        <div class="box-area">
            @foreach($universities as $university)
                <div class="box">
                    <!-- <img src="{{ asset($university->uni_image) }}" alt="{{ $university->uni_name}}"> -->
                    <img src="{{ asset('images/' . $university->uni_image) }}" alt="{{ $university->uni_name }}">

                    <div class="overlay">
                        <h3>{{ $university->uni_name }}</h3>
                        <p>{{ $university->uni_address }}</p>
                        <a href="{{ url('/restaurants/' . $university->id) }}" class="btn">Visit</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
