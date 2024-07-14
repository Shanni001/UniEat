
@extends('layout')
@extends('layout2')


@section('content')
@section('content2')

<div class="container">
    <table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:50%">Food_Item</th>
                <th style="width:10%">Price</th>
                <th style="width:8%">Quantity</th>
                <th style="width:22%" class="text-center">Subtotal</th>
                <th style="width:10%"></th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0;
             @endphp
            @foreach($cartItems as $item)
                @php $total += $item->menu->price * $item->quantity @endphp
                <tr data-id="{{ $item->id }}">
                    <td data-th="menus">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs">
                                <img src="{{ asset('images') }}/{{ $item->menu->image }}" width="100" height="100" class="img-responsive"/>
                            </div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $item->menu->name }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">KES{{ $item->menu->price }}</td>
                    <td data-th="Quantity">
                        <input type="number" value="{{ $item->quantity }}" class="form-control quantity cart_update" name="quantity" min="1" />
                    </td>
                    <td data-th="Subtotal" class="text-center">KES{{ $item->menu->price * $item->quantity }}</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-danger btn-sm cart_remove"><i class="fa fa-trash-o"></i> Delete</button>
                    </td>
                </tr>

                @php

                $total+= ($item->menu->price * $item->quantity);
                @endphp

            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" class="text-right"><h3><strong>Total KES{{ $total }}</strong></h3></td>
            </tr>
            <tr>
                <td colspan="5" class="text-right">
                    <a href="{{ url('/') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Continue Shopping</a>
                    <a href="{{ route('checkout') }}" class="btn btn-success"><i class="fa fa-money"></i> Checkout</a>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(".cart_update").change(function (e) {
        e.preventDefault();
        var ele = $(this);
        $.ajax({
            url: "{{ route('update_cart') }}",
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
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
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
</script>
@endsection
@endsection

