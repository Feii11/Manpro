@extends('template.layout')
@section('section')

<div class="container mx-auto p-6">
    <!-- Title -->
    <h1 class="text-4xl font-bold text-center">Product Comparison</h1>
    <p class="text-gray-500 mt-2 text-center">Home > Comparison</p>

    <!-- Product Row -->
    <div class="flex justify-between items-start mt-8">
        <!-- Product Navigation -->
        <div class="w-1/4">
            <p class="text-lg font-bold">Go to Product page for more Products</p>
            <a href="#" class="text-yellow-600 mt-2 block">View More</a>
        </div>

        <!-- Product Images & Reviews -->
        <div class="w-3/4 flex justify-evenly items-start space-x-6">
            <!-- Product 1 -->
            <div class="text-center w-1/3">
                <img src="https://via.placeholder.com/100" alt="Hanger Baju" class="mx-auto mb-2">
                <p class="font-bold">Hanger Baju</p>
                <p>Rp. 18,000.00</p>
                <p class="text-yellow-500 flex justify-center items-center">
                    4.7 <i class="fas fa-star ml-1"></i> 
                    <span class="text-gray-500 ml-2">| 1 Review</span>
                </p>
            </div>

            <!-- Product 2 -->
            <div class="text-center w-1/3">
                <img src="https://via.placeholder.com/100" alt="Hanger Jas" class="mx-auto mb-2">
                <p class="font-bold">Hanger Jas</p>
                <p>Rp. 20,000.00</p>
                <p class="text-yellow-500 flex justify-center items-center">
                    4.2 <i class="fas fa-star ml-1"></i> 
                    <span class="text-gray-500 ml-2">| 145 Reviews</span>
                </p>
            </div>

            <!-- Add A Product Dropdown -->
            <div class="text-center w-1/3">
                <p class="font-bold">Add A Product</p>
                <div class="relative">
                    <button id="menu-button" class="bg-yellow-500 text-white py-2 px-4 rounded-full flex items-center justify-center w-full">
                        Choose a Product <i class="fas fa-chevron-down ml-2"></i>
                    </button>
                    <div id="dropdown-menu" class="absolute right-0 mt-2 w-full bg-white border border-gray-300 rounded-md shadow-lg hidden">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Product 1</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Product 2</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Product 3</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Comparison Table -->
    <div class="mt-10 bg-white shadow p-6">
        <table class="table-auto w-full">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-4 text-left">General</th>
                    <th class="p-4 text-left">Hanger Baju</th>
                    <th class="p-4 text-left">Hanger Jas</th>
                </tr>
            </thead>
            <tbody>
                <!-- General Info -->
                <tr class="border-b">
                    <td class="p-4 font-bold">Sales Package</td>
                    <td class="p-4">5 pieces of hangers</td>
                    <td class="p-4">1 Three Seater, 2 Single Seater</td>
                </tr>
                <tr class="border-b">
                    <td class="p-4 font-bold">Model Number</td>
                    <td class="p-4">TFCBUIGRBLS6RHS</td>
                    <td class="p-4">DTUBLIGRBL568</td>
                </tr>
                <tr class="border-b">
                    <td class="p-4 font-bold">Secondary Material</td>
                    <td class="p-4">Solidified Plastic</td>
                    <td class="p-4">Solid Wood</td>
                </tr>
                <tr class="border-b">
                    <td class="p-4 font-bold">Upholstery Material</td>
                    <td class="p-4">-</td>
                    <td class="p-4">Fabric + Cotton</td>
                </tr>

                <!-- Product Info -->
                <tr class="bg-gray-100">
                    <th class="p-4 text-left">Product</th>
                    <th class="p-4"></th>
                    <th class="p-4"></th>
                </tr>
                <tr class="border-b">
                    <td class="p-4 font-bold">Filling Material</td>
                    <td class="p-4">Plastic</td>
                    <td class="p-4">Matte</td>
                </tr>
                <tr class="border-b">
                    <td class="p-4 font-bold">Maximum Load Capacity</td>
                    <td class="p-4">100 KG</td>
                    <td class="p-4">90 KG</td>
                </tr>
                <tr class="border-b">
                    <td class="p-4 font-bold">Origin of Manufacture</td>
                    <td class="p-4">China</td>
                    <td class="p-4">India</td>
                </tr>

                <!-- Dimensions -->
                <tr class="bg-gray-100">
                    <th class="p-4 text-left">Dimensions</th>
                    <th class="p-4"></th>
                    <th class="p-4"></th>
                </tr>
                <tr class="border-b">
                    <td class="p-4 font-bold">Width</td>
                    <td class="p-4">30 cm</td>
                    <td class="p-4">32 cm</td>
                </tr>
                <tr class="border-b">
                    <td class="p-4 font-bold">Height</td>
                    <td class="p-4">17 cm</td>
                    <td class="p-4">19 cm</td>
                </tr>

                <!-- Warranty -->
                <tr class="bg-gray-100">
                    <th class="p-4 text-left">Warranty</th>
                    <th class="p-4"></th>
                    <th class="p-4"></th>
                </tr>
                <tr class="border-b">
                    <td class="p-4 font-bold">Not Covered in Warranty</td>
                    <td class="p-4">Damages Due To Usage Beyond Its Intended Use</td>
                    <td class="p-4">Damages Due To Usage Beyond Its Intended Use</td>
                </tr>
                <tr class="border-b">
                    <td class="p-4 font-bold">Domestic Warranty</td>
                    <td class="p-4">1 Day</td>
                    <td class="p-4">2 Days</td>
                </tr>

                <!-- Add to Cart Button -->
                <tr>
                    <td></td>
                    <td class="p-4">
                        <button class="bg-yellow-500 text-white py-2 px-4 rounded w-full">Add To Cart</button>
                    </td>
                    <td class="p-4">
                        <button class="bg-yellow-500 text-white py-2 px-4 rounded w-full">Add To Cart</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Font Awesome Script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>

<!-- Dropdown Toggle Script -->
<script>
    document.getElementById('menu-button').addEventListener('click', function () {
        const dropdown = document.getElementById('dropdown-menu');
        dropdown.classList.toggle('hidden');
    });
</script>
@endsection
