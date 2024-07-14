@extends('layout')

@section('content')
<div class="card">
    <div class="row">
        <div class="col-md-8 cart">
            <div class="title">
                <div class="row">
                    <div class="col"><h4><b>Shopping Cart</b></h4></div>
                    <div class="col align-self-center text-right text-muted">{{ $cartItems->count() }} items</div>
                </div>
            </div>
            @foreach($cartItems as $details)
            <div class="row border-top border-bottom">
                <div class="row main align-items-center">
                    <div class="col-2"><img class="img-fluid" src="{{ asset('images/' . $details->menu->image) }}"></div>
                    <div class="col">
                        <div class="row text-muted">{{ $details->menu->category }}</div>
                        <div class="row">{{ $details->menu->name }}</div>
                    </div>
                    <div class="col">
                        <a href="#" class="cart_update" data-id="{{ $details->id }}" data-action="decrease">-</a>
                        <a href="#" class="border">{{ $details->quantity }}</a>
                        <a href="#" class="cart_update" data-id="{{ $details->id }}" data-action="increase">+</a>
                    </div>
                    <div class="col">&euro; {{ $details->menu->price }} <span class="close cart_remove" data-id="{{ $details->id }}">&times;</span></div>
                </div>
            </div>
            @endforeach
            <div class="back-to-shop"><a href="#">&leftarrow;</a><span class="text-muted">Back to shop</span></div>
        </div>
        <div class="col-md-4 summary">
            <div><h5><b>Summary</b></h5></div>
            <hr>
            <div class="row">
                <div class="col" style="padding-left:0;">ITEMS {{ $cartItems->count() }}</div>
                <div class="col text-right">&euro; {{ $total }}</div>
            </div>
            <form>
                <p>SHIPPING</p>
                <select><option class="text-muted">Standard-Delivery- &euro;5.00</option></select>
                <p>GIVE CODE</p>
                <input id="code" placeholder="Enter your code">
            </form>
            <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                <div class="col">TOTAL PRICE</div>
                <div class="col text-right">&euro; {{ $total + 5 }}</div>
            </div>
            <button class="btn">CHECKOUT</button>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(".cart_update").click(function (e) {
        e.preventDefault();
        var ele = $(this);
        $.ajax({
            url: "{{ route('update_cart') }}",
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.data("id"), 
                action: ele.data("action")
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });

    $(".cart_remove").click(function (e) {
        e.preventDefault();
        var ele = $(this);
        if(confirm("Do you really want to remove?")) {
            $.ajax({
                url: "{{ route('remove_cart') }}",
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.data("id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
</script>
@endsection
