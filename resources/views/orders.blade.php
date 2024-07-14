@extends('layout')

@section('content')
<div class="container">
    <h1>Orders</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Comments</th>
                <th>Collection Time</th>
                <th>Payment Method</th>
                <th>Items</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="orders-table-body">
            @foreach($orders as $order)
            <tr data-order-id="{{ $order->id }}">
                <td>{{ $order->name }}</td>
                <td>{{ $order->phone }}</td>
                <td>{{ $order->comments }}</td>
                <td>{{ $order->collection_time->format('Y-m-d H:i') }}</td>
                <td>{{ $order->payment_method }}</td>
                <td>
                    <ul>
                        @foreach($order->items as $item)
                        <li>{{ $item['menu_name'] }} - {{ $item['quantity'] }}</li>
                        @endforeach
                    </ul>
                </td>
                <td>{{ $order->status }}</td>
                <td>
                    <select class="form-control status-update" data-order-id="{{ $order->id }}">
                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="ready" {{ $order->status == 'ready' ? 'selected' : '' }}>Ready</option>
                    </select>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('scripts')
<script src="//js.pusher.com/7.0/pusher.min.js"></script>
<script>
    document.querySelectorAll('.status-update').forEach(function (select) {
        select.addEventListener('change', function () {
            const orderId = this.dataset.orderId;
            const status = this.value;

            fetch(`/order/${orderId}/status`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ status })
            }).then(response => response.json()).then(data => {
                if (data.success) {
                    alert('Order status updated successfully');
                }
            });
        });
    });

    window.Echo.channel('orders')
        .listen('OrderPlaced', (e) => {
            const order = e.order;
            const orderRow = `
                <tr data-order-id="${order.id}">
                    <td>${order.name}</td>
                    <td>${order.phone}</td>
                    <td>${order.comments}</td>
                    <td>${order.collection_time}</td>
                    <td>${order.payment_method}</td>
                    <td><ul>${order.items.map(item => `<li>${item.menu_name} - ${item.quantity}</li>`).join('')}</ul></td>
                    <td>${order.status}</td>
                    <td>
                        <select class="form-control status-update" data-order-id="${order.id}">
                            <option value="pending">Pending</option>
                            <option value="ready">Ready</option>
                        </select>
                    </td>
                </tr>
            `;
            document.getElementById('orders-table-body').insertAdjacentHTML('beforeend', orderRow);
        })
        .listen('OrderStatusUpdated', (e) => {
            const order = e.order;
            const orderRow = document.querySelector(`tr[data-order-id="${order.id}"]`);
            if (orderRow) {
                orderRow.querySelector('td:nth-child(7)').innerText = order.status;
            }
        });
</script>
@endsection
