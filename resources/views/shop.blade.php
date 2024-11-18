@extends('template.layout')

@section('section')

<!doctype html>

<section>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body>

<!-- Hero Section -->
<section class="relative bg-white text-black flex items-center justify-center h-[25rem]">
    <div class="text-center px-4"> 
        <h1 class="text-4xl font-bold">Shop</h1>
        <h3 class="text-lg">Home > Shop</h3> 
    </div>
</section>

<!-- Filter Section -->
<section class="bg-orange-100 text-black p-6"> <!-- Increased padding -->
    <div class="container mx-auto flex justify-between items-center">
        <div class="flex items-center space-x-2"> 
            <i class="fa-solid fa-sliders text-2xl"></i>
            <p class="text-2xl">Filter</p>
        </div>
        
        <div class="flex items-center space-x-8"> <!-- Moved this inside the main flex container -->
            <div class="flex items-center space-x-2">
                <label for="show" class="text-sm font-medium">Show</label>
                <select id="show" class="mt-1 block py-2 px-3 w-20 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none">
                    <option>All</option>
                    <!-- Add more options as needed -->
                </select>
            </div>

            <div class="flex items-center space-x-2">
                <label for="sort" class="text-sm font-medium">Sort by</label>
                <select id="sort" class="mt-1 block py-2 px-3 w-40 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none">
                    <option>Select option</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
        </div>
    </div>
</section>

<!-- Product Section -->
<section class="bg-white">
    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
        <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
            @php
                $seenNames = []; // To store the unique product names
            @endphp

            @foreach($produk as $produk)
                @if(!in_array($produk->nama_produk, $seenNames))
                    @php
                        $seenNames[] = $produk->nama_produk; // Add the product name to the seen list
                    @endphp

                    <div class="group relative">
                        <a href="{{ route('produk.show', $produk->id_produk) }}">
                            <div class="group relative">
                                <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                                    <img src="{{ $produk->image }}" alt="{{ $produk->nama_produk }}" class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                                </div>
                                <div class="mt-4 flex justify-between">
                                    <div>
                                        <h3 class="text-sm text-gray-700">
                                            <span aria-hidden="true" class="absolute inset-0"></span>
                                            {{ $produk->nama_produk }}
                                        </h3>
                                        <p class="mt-1 text-sm text-gray-500">{{ $produk->ukuran }}</p>
                                    </div>
                                    <p class="text-sm font-medium text-gray-900">Rp. {{ number_format($produk->harga, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>

</body>

</html>
</section>

@endsection
