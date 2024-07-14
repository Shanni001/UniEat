

@extends('layout')
@extends('layout2')


@section('content')
@section('content2')



<div class="wrapper">
    <div class="container">
        <h1>Checkout</h1>
        <form action="{{ URL::to('/checkout') }}" method="POST" >
           
            @csrf
           
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="bill">Bill:</label>
                <input type="hidden" class="form-control" value="{{ $total }}" name="bill" required>
            </div>
            <div class="form-group">
                <label for="comments">Additional Comments:</label>
                <textarea class="form-control" id="comments" name="comments"></textarea>
            </div>
            <div class="form-group">
                <label for="order_type">Order Type:</label>
                <div class="btn-group btn-group-toggle d-flex" data-toggle="buttons">
                    <label class="btn btn-outline-primary flex-fill">
                        <input type="radio" name="order_type" id="order_takeaway" value="takeaway" autocomplete="off" required> Takeaway
                    </label>
                    <label class="btn btn-outline-primary flex-fill">
                        <input type="radio" name="order_type" id="order_dining" value="indining" autocomplete="off" required> In-Dining
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="collection_time">Collection Time:</label>
                <select class="form-control" id="collection_time_select" name="collection_time" required>
                    <option value="asap">As soon as possible</option>
                    <option value="10min">In the next 10 minutes</option>
                    <option value="25min">In the next 25 minutes</option>
                    <option value="1hour">In the next 1 hour</option>
                    <option value="custom">Custom Time</option>
                </select>
            </div>
            <div class="form-group mt-3" id="custom_collection_time_group" style="display: none;">
                <label for="collection_time">Custom Collection Time:</label>
                <input type="datetime-local" class="form-control" id="collection_time_custom" name="collection_time">
            </div>
            <div class="form-group">
                <label for="payment_method">Payment Method:</label>
                <div class="btn-group btn-group-toggle d-flex payment-method-group" data-toggle="buttons">
                    <label class="btn btn-outline-primary flex-fill">
                        <input type="radio" name="payment_method" id="payment_mpesa" value="mpesa" autocomplete="off" required> Mpesa
                    </label>
                    <label class="btn btn-outline-primary flex-fill">
                        <input type="radio" name="payment_method" id="payment_cash" value="cash" autocomplete="off" required> Cash
                    </label>
                </div>
            </div>
            <div class="form-group mt-3" id="mpesa_number_group" style="display: none;">
                <label for="mpesa_number">Mpesa Number:</label>
                <input type="text" class="form-control" id="mpesa_number" name="mpesa_number">
            </div>
            <button type="submit" name="checkout"  class="btn btn-primary">Submit</button>
          
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const mpesaRadio = document.getElementById('payment_mpesa');
    const cashRadio = document.getElementById('payment_cash');
    const mpesaNumberGroup = document.getElementById('mpesa_number_group');
    const collectionTimeSelect = document.getElementById('collection_time_select');
    const customCollectionTimeGroup = document.getElementById('custom_collection_time_group');
    const customCollectionTimeInput = document.getElementById('collection_time_custom');

    mpesaRadio.addEventListener('change', function () {
        if (mpesaRadio.checked) {
            mpesaNumberGroup.style.display = 'block';
            document.getElementById('mpesa_number').required = true;
        }
    });

    cashRadio.addEventListener('change', function () {
        if (cashRadio.checked) {
            mpesaNumberGroup.style.display = 'none';
            document.getElementById('mpesa_number').required = false;
        }
    });

    collectionTimeSelect.addEventListener('change', function () {
        if (collectionTimeSelect.value === 'custom') {
            customCollectionTimeGroup.style.display = 'block';
            customCollectionTimeInput.required = true;
        } else {
            customCollectionTimeGroup.style.display = 'none';
            customCollectionTimeInput.required = false;
        }
    });
});
</script>
@endsection