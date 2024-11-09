@extends('template.layoutadmin')

@section('section')
<div class="container mx-auto">
    <h1 class="text-3xl font-bold mb-6">Manage Products</h1>

    <table class="min-w-full bg-white border">
        <thead>
            <tr>
                <th class="py-2">Product Name</th>
                <th class="py-2">Price</th>
                <th class="py-2">Merk</th>
                <th class="py-2">Jenis</th>
                <th class="py-2">Image URL</th>
                <th class="py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td class="py-2">{{ $product->nama_produk }}</td>
                <td class="py-2">Rp. {{ number_format($product->harga, 0, ',', '.') }}</td>
                <td class="py-2">{{ $product->merk }}</td>
                <td class="py-2">{{ $product->jenis }}</td>
                <td class="py-2"><a href="{{ $product->image }}" class="text-blue-500 hover:underline" target="_blank">View Image</a></td>
                <td class="py-2">
                    <a href="{{ route('admin.product.edit', $product->id_produk) }}" class="text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
