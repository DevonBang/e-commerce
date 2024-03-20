<h1>ini halaman {{ $title}} {{ auth()->user()->name }} </h1>
<table>
    <thead>
        <th>No</th>
        <th>Subtotal</th>
        <th>Diskon</th>
        <th>Total</th>
        <th>Delivered Date</th>
        <th>Canceled Date</th>
        <th>Status Order</th>
        <th>Action</th>
    </thead>
    <tbody>
        @foreach ($order as $order)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $order['subtotal'] }}</td>
            <td>{{ $order['discount'] }}%</td>
            <td>{{ $order['total'] }}</td>
            <td>{{ $order['delivered_date'] }}</td>
            <td>{{ $order['canceled_date'] }}</td>
            <td>{{ $order['status_order'] }}</td>
            <td>
                <a href="{{ route('user.history-detail', $order['id']) }}">detail</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
