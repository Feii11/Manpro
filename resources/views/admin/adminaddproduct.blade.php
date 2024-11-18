@extends('template.layoutadmin')

@section('section')
<div class="container mx-auto">
    <h1 class="text-3xl font-bold mb-6">Add Product</h1>

    <form action="{{ route('admin.product.store') }}" method="POST">
        @csrf
        
        <div class="mb-4">
            <label for="name" class="block">Product Name</label>
            <input type="text" name="name" value="" class="w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label for="price" class="block">Price</label>
            <input type="number" name="price" value="" class="w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label for="merk" class="block">Merk</label>
            <input type="text" name="merk" value="" class="w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label for="jenis" class="block">Jenis</label>
            <input type="text" name="jenis" value="" class="w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label for="image_url" class="block">Image URL</label>
            <input type="text" name="image_url" value="" class="w-full border p-2 rounded">
        </div>

        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Add Product</button>
    </form>
</div>

@endsection