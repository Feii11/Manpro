@extends('template.layoutadmin')

@section('section')
<div class="container mx-auto">
    <h1 class="text-3xl font-bold mb-6">Manage Orders</h1>

    <table class="min-w-full bg-white border">
        <thead>
            <tr>
                <th class="py-2">Order ID</th>
                <th class="py-2">Customer</th>
                <th class="py-2">Status</th>
                <th class="py-2">Products</th>
                <th class="py-2">Payment Proof</th>
                <th class="py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td class="py-2">{{ $order->id_order }}</td>
                <td class="py-2">{{ $order->id_user }}</td>
                <td class="py-2">{{ $order->status_order }}</td>
                
                <!-- Display Products Ordered -->
                <td class="py-2">
                    <ul>
                        @foreach($order->orderProduk as $product)
                            <li>
                                <strong>{{ $product->produk->nama_produk }}</strong><br>
                                Merk: {{ $product->produk->merk }}<br>
                                Jenis: {{ $product->produk->jenis }}<br>
                                Jumlah: {{ $product->jumlah }}<br>
                                Harga: Rp. {{ number_format($product->produk->harga, 0, ',', '.') }}<br>
                                Subtotal: Rp. {{ number_format($product->jumlah * $product->produk->harga, 0, ',', '.') }}<br>
                            </li>
                            <hr class="my-2">
                        @endforeach
                    </ul>
                </td>

                <!-- Display Payment Proof if Submitted -->
                <td class="py-2">
                    @if($order->payment_proof)
                        <a href="{{ asset('storage/' . $order->payment_proof) }}" target="_blank" class="text-blue-500">View Payment Proof</a>
                    @else
                        <span class="text-gray-500">No proof submitted</span>
                    @endif
                </td>

                <!-- Update Order Status -->
                <td class="py-2">
                    <form action="{{ route('admin.order.status', $order->id_order) }}" method="POST">
                        @csrf
                        <select name="status" class="border p-2 rounded">
                        <option value="pending" @if($order->status_order == 'pending') selected @endif>Pending</option>
                        <option value="completed" @if($order->status_order == 'completed') selected @endif>Completed</option>
                        <option value="waiting_for_payment" @if($order->status_order == 'waiting_for_payment') selected @endif>Waiting for Payment</option>
                        <option value="payment_submitted" @if($order->status_order == 'payment_submitted, waiting_for_confirmation') selected @endif>Payment Submitted, Waiting for Confirmation</option>
                        <option value="packing" @if($order->status_order == 'packing') selected @endif>Packing</option>
                        <option value="sent" @if($order->status_order == 'sent') selected @endif>Sent</option>
                        </select>
                        <button type="submit" class="bg-green-500 text-white px-2 py-1 rounded">Update</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
