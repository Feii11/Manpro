@extends('template.layout')

@section('section')

<!-- Title and Meta Description -->
@section('title', 'Jual Produk Jahit Terbaik - Toko Mekar Sari')
@section('meta-description', 'Temukan peralatan jahit dan barang-barang berkualitas di Toko Mekar Sari. Beli sekarang untuk produk terbaik dan harga terjangkau!')

<!-- Hero Section -->
<section class="relative bg-white-800 text-white flex justify-end items-center h-screen">
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('backgroundhome.png');"></div>
    <div class="relative z-10 bg-orange-100 bg-opacity-75 p-8 text-center w-1/2 h-1.5/4 mr-20 flex flex-col items-start rounded-xl">
        <h1 class="text-5xl mb-3 text-left font-bold w-2/3" style="color: #B88E2F;">Mencari barang-barang terkait peralatan jahit?</h1>
        <a href="{{ route('shop') }}" class="text-white px-6 py-4 text-center mt-10 mb-10 rounded-none" style="background-color: #B88E2F;">Buy Now</a>
    </div>
</section>

<!-- Products Section -->
<section class="py-12">
    <div class="container mx-auto px-4">
        <p class="text-center text-lg mb-4">Toko kami memiliki banyak barang terkait pakaian dengan kualitas terbaik.</p>
        <h2 class="text-center text-2xl font-bold mb-8">Ada apa saja?</h2>
        <div class="grid grid-cols-2 gap-6">
            @foreach ($produk as $product)
                <div class="text-center">
                    <img src="{{ $product['image'] }}" alt="{{ $product['nama_produk'] }} - Peralatan Jahit Berkualitas" class="mx-auto w-full h-64 object-cover">
                    <h3 class="mt-4 text-lg font-semibold">{{ $product['nama_produk'] }}</h3>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Banner Section -->
<section class="relative bg-orange-100 h-[53rem]">
    <div class="container mx-auto text-center relative z-10 pt-16">
        <h2 class="text-xl mb-3">Carilah keperluanmu dengan</h2>
        <h3 class="text-3xl mb-1 font-bold">#TokoMekarSari</h3>
    </div>
    <div class="absolute w-full h-[48rem] bg-contain bg-no-repeat bg-center z-0" style="background-image: url('backgroundhome2.PNG'); top: 5rem;"></div>
</section>

@endsection
