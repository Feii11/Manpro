@extends('template.layout')

@section('section')

<div class="container mx-auto py-8">
    
    <!-- Breadcrumb -->
    <nav class="text-gray-600 text-sm mb-6">
        <a href="/home" class="text-gray-500 hover:text-gray-900">Home</a> >
        <a href="/shop" class="text-gray-500 hover:text-gray-900">Shop</a> >
        <span class="text-gray-900">{{ $produk->nama_produk }}</span>
    </nav>

    <!-- Product Section -->
    <div class="flex flex-col lg:flex-row lg:space-x-12">
        <!-- Product Images -->
        <div class="lg:w-1/2">
            <img src="{{ $produk->image }}" alt="{{ $produk->nama_produk }}" class="w-full rounded-lg shadow-lg mb-4">
        </div>

        <!-- Product Details -->
        <div class="lg:w-1/2">
            <h1 class="text-3xl font-bold mb-2" id="product-name">{{ $produk->nama_produk }}</h1>
            <p id="product-price" class="text-lg text-gray-600 mb-4">Rp. {{ number_format($produk->harga, 0, ',', '.') }}</p>
            
            <!-- Star Ratings -->
            <div class="flex items-center mb-4">
                <div class="text-yellow-500 space-x-1">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <p class="ml-2 text-sm text-gray-500">(5 customer reviews)</p>
            </div>

            <!-- Merk and Jenis -->
            <div class="flex items-center space-x-4 mb-4">
                <div>
                    <label for="merk" class="block text-sm font-medium">Merk:</label>
                    <select id="merk" name="merk" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none">
                        @foreach($merks as $merk)
                            <option value="{{ $merk }}" {{ $produk->merk == $merk ? 'selected' : '' }}>
                                {{ $merk }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="jenis" class="block text-sm font-medium">Jenis:</label>
                    <select id="jenis" name="jenis" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none">
                        @foreach($jenises as $jenis)
                            <option value="{{ $jenis }}" {{ $produk->jenis == $jenis ? 'selected' : '' }}>
                                {{ $jenis }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Add to Cart Button -->
            <form id="addToCartForm" action="{{ route('cart.add', ['id' => $produk->id_produk]) }}" method="POST">
                @csrf
                <!-- Hidden input to pass the product ID and quantity -->
                <input type="hidden" name="product_id" value="{{ $produk->id_produk }}">
                <input type="hidden" id="productQuantity" name="quantity" value="1">
                
                <!-- Quantity Input -->
                <div class="flex items-center mb-6">
                    <input type="number" id="quantity" name="quantity" value="1" min="1" class="w-16 border text-center">
                </div>
                
                <!-- Submit Button -->
                <button type="submit" class="mt-4 py-2 px-6 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Add to Cart</button>
            </form>

            <!-- Product Description -->
            <h2 class="text-xl font-semibold mb-2">Product Description</h2>
            <p class="text-gray-600 mb-6">
                - This is a sample product description that provides information about the product's features and specifications.
            </p>
        </div>
    </div>

    <!-- Additional Information -->
    <div class="mt-12">
        <h2 class="text-2xl font-bold mb-4">Additional Information</h2>
        <table class="table-auto w-full text-left text-gray-600">
            <tbody>
                <tr>
                    <th class="py-2">Material</th>
                    <td class="py-2">Cotton</td> <!-- Placeholder material -->
                </tr>
                <tr>
                    <th class="py-2">Weight</th>
                    <td class="py-2">200g</td> <!-- Placeholder weight -->
                </tr>
                <tr>
                    <th class="py-2">Dimensions</th>
                    <td class="py-2">10 x 10 x 10 cm</td> <!-- Placeholder dimensions -->
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    
    $(document).ready(function() {
        // Update the form's quantity value when the user changes the quantity input field
        $('#quantity').on('input', function() {
            var quantity = $(this).val();
            $('#productQuantity').val(quantity);
        });

        // Update the URL with the selected merk and jenis before submitting the form
        $('#merk, #jenis').on('change', function() {
            // Get the selected merk and jenis values
            var merk = $('#merk').val();
            var jenis = $('#jenis').val();

            // Send the selected values to the server via AJAX to get the updated product ID
            $.ajax({
                url: '{{ route('product.getProductByFilters') }}', // URL to the controller method
                method: 'GET',
                data: {
                    merk: merk,
                    jenis: jenis
                },
                success: function(response) {
                    // Update the product details on success
                    $('#product-name').text(response.nama_produk);
                    $('#product-price').text('Rp. ' + response.harga.toLocaleString()); // Update the price
                    
                    // Update the URL with the selected filters and the new product ID
                    var newUrl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?merk=' + merk + '&jenis=' + jenis + '&id=' + response.id;

                    // Update the browser's address bar without reloading the page
                    history.pushState({ path: newUrl }, '', newUrl);

                    // Optionally, update the form action URL with the new product ID
                    $('#addToCartForm').attr('action', '{{ route('cart.add', ['id' => '__ID__']) }}'.replace('__ID__', response.id));
                },
                error: function(xhr) {
                    // Handle errors (e.g., product not found)
                    alert('An error occurred: ' + xhr.responseJSON.message);
                }
            });
        });

        // Handle form submission
        $('#addToCartForm').on('submit', function(event) {
            event.preventDefault(); // Prevent the form from submitting immediately

            // Get the current URL parameters
            const urlParams = new URLSearchParams(window.location.search);
            const merk = urlParams.get('merk');
            const jenis = urlParams.get('jenis');
            const productId = urlParams.get('id'); // Get the product id from the URL

            // Update the form action with the current URL parameters
            const updatedActionUrl = `{{ route('cart.add', ['id' => '__ID__']) }}`.replace('__ID__', productId);
            this.action = updatedActionUrl;

            // Submit the form
            this.submit();
        });
    });
</script>
