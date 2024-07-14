<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>Registration Form</title>
    <!-- <link href="{{ asset('css1/reg.css') }}" rel="stylesheet"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="{{ asset('css1/table.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="title">My Order History</div>
        <div class="content">

            <table class="table">
                <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Total Bill
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Phone
                        </th>
                        <th>
                            comments
                        </th>
                        <th>
                            order_Type
                        </th>
                        <th>
                            Payment method
                        </th>
                        <th>
                            Collection Time
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Restaurant Name
                        </th>
                        <th>
                            Order Date
                        </th>
                        <th>
                            View Products
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php

                    $i=0;
                    @endphp
                    @foreach($orders as $item)

                    @php

                    $i++;
                    @endphp
                    <tr>
                        <td>
                            {{$i}}
                        </td>
                        <td>
                            {{$item->bill}}
                        </td>
                        <td>
                            {{$item->name}}
                        </td>
                        <td>
                            {{$item->phone}}
                        </td>
                        <td>
                            {{$item->order_type}}
                        </td>
                        <td>
                            {{$item->comments}}
                        </td>
                        <td>
                            {{$item->payment_method}}
                        </td>
                        <td>

                            {{ $item->collection_time->format('Y-m-d H:i') }}
                        </td>
                        <td>
                            {{$item->status}}
                        </td>
                        <td>
                            {{$item->created_at}}
                        </td>
                        <td>
                            {{$item->restaurant_name}}
                        </td>
                        <td>
                            <!-- Button to Open the Modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal {{$i}}" >
                               
                            </button>

                            <!-- The Modal -->
                            <div class="modal" id="myModal{{$i}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">All Product</h4>
                                            <button type="button" class="btn-close" data-dismiss="modal"></button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                        Product
                                                        </th>

                                                        <th>
                                                        Quantity
                                                        </th>

                                                        <th>
                                                        Price
                                                        </th>

                                                        <th>
                                                       Total
                                                        </th>

                                                       
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach  ($items as $product)
                                                    @if($item->id== $product->order_id)
                                                    <tr>
                                                        <td>
                                                            {{$product->menu_id}}
                                                        </td>

                                                        <td>
                                                            {{$product->quantity}}
                                                        </td>

                                                        <td>
                                                            {{$product->price}}
                                                        </td>

                                                        <td>
                                                            {{$product->price * $product->quantity}}
                                                        </td>
                                                    </tr>
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                    
                                        </div>

                                        <!-- Modal footer -->
                                        <!-- <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        </div> -->

                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                
            </table>

        </div>
    </div>
    <div>

</body>

</html>