<h1>List Order</h1>

<table>
    <thead>
        <th>No</th>
        <th>Nama Product</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
        <th>Action</th>
    </thead>
    <tbody>
        @foreach ($orders as $order)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $order->products->nama_product }}</td>
            <td>{{ $order->price }}</td>
            <td>{{ $order->quantity }}</td>
            <td>kosong nih</td>
        </tr>
        @endforeach
    </tbody>
</table>