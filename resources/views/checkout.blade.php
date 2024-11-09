@extends('template.layout')
@section('section')

<body class="bg-gray-100">

<div class="container mx-auto p-6">
    <!-- Breadcrumb -->
    <nav class="text-gray-600 text-sm mb-4">
        <a href="/home" class="text-gray-500 hover:text-gray-900">Home</a> >
        <span class="text-gray-900">Checkout</span>
    </nav>

    <h1 class="text-3xl font-bold mb-6">Checkout</h1>

    <form action="{{ route('checkout.placeOrder') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div>
                <h2 class="text-xl font-semibold mb-4">Billing details</h2>
                <div class="space-y-4">
                    <!-- Billing Details Fields -->
                    <div class="flex gap-4">
                        <input type="text" name="first_name" placeholder="First Name" class="w-full p-3 border border-gray-300 rounded-md" required>
                        <input type="text" name="last_name" placeholder="Last Name" class="w-full p-3 border border-gray-300 rounded-md" required>
                    </div>
                    <select name="country" class="w-full p-3 border border-gray-300 rounded-md" required>
                        <option value="Indonesia">Indonesia</option>
                        <option value="Europe">Europe</option>
                    </select>
                    <input type="text" name="street_address" placeholder="Street address" class="w-full p-3 border border-gray-300 rounded-md" required>
                    <input type="text" name="city" placeholder="Town / City" class="w-full p-3 border border-gray-300 rounded-md" required>
                    <select name="province" class="w-full p-3 border border-gray-300 rounded-md" required>
                        <option value="Western Province">Western Province</option>
                        <option value="Eastern Province">Eastern Province</option>
                    </select>
                    <input type="text" name="zip_code" placeholder="ZIP code" class="w-full p-3 border border-gray-300 rounded-md" required>
                    <input type="text" name="phone" placeholder="Phone" class="w-full p-3 border border-gray-300 rounded-md" required>
                    <input type="email" name="email" placeholder="Email address" class="w-full p-3 border border-gray-300 rounded-md" required>
                    <textarea name="additional_info" placeholder="Additional information" class="w-full p-3 border border-gray-300 rounded-md"></textarea>
                </div>
            </div>

            <div>
                <h2 class="text-xl font-semibold mb-4">Product</h2>
                <div class="border border-gray-300 p-4 rounded-md">

                    <!-- Loop through the cart items -->
                    @foreach ($cartItems as $item)
                    <div class="flex justify-between mb-2">
                        <span>{{ $item->produk->nama_produk }} x {{ $item->quantity }}</span>
                        <span>Rp. {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</span>
                    </div>
                    @endforeach

                    <!-- Subtotal -->
                    <div class="flex justify-between font-semibold mb-2">
                        <span>Subtotal</span>
                        <span>Rp. {{ number_format($total, 0, ',', '.') }}</span>
                    </div>

                    <!-- Total -->
                    <div class="flex justify-between font-bold text-xl mb-4">
                        <span>Total</span>
                        <span>Rp. {{ number_format($total, 0, ',', '.') }}</span>
                    </div>

                    <!-- Payment Methods -->
                    <div class="space-y-2">
                        <div>
                            <input type="radio" name="payment_method" id="bank_transfer" value="bank_transfer" class="mr-2" required checked>
                            <label for="bank_transfer">Direct Bank Transfer</label>
                            <p class="text-sm text-gray-500">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</p>
                        </div>
                        <div>
                            <input type="radio" name="payment_method" id="cash_delivery" value="cash_delivery" class="mr-2">
                            <label for="cash_delivery">Cash on Delivery</label>
                        </div>
                    </div>

                    <!-- Place Order Button -->
                    <button type="submit" class="w-full bg-blue-500 text-white py-3 rounded-md mt-6 hover:bg-blue-600">
                        Place order
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
