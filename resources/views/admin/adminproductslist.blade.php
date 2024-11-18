@extends('template.layoutadmin')

@section('section')
<div class="container mx-auto mb-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Manage Products</h1>
        <a href="{{route('admin.product.add')}}">
            <button class="w-40 bg-yellow-500 text-white py-2 rounded 'opacity-50 cursor-not-allowed' : '' }}">Add Product</button>
        </a>
    </div>
    

    <div class="mb-10">
        <table class="min-w-full bg-white border">
            <thead>
                <tr>
                    <th class="py-2 px-2 border">Product Name</th>
                    <th class="py-2 px-2 border">Price</th>
                    <th class="py-2 px-2 border">Merk</th>
                    <th class="py-2 px-2 border">Jenis</th>
                    <th class="py-2 px-2 border">Image URL</th>
                    <th class="py-2 px-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td class="py-2 px-2 border">{{ $product->nama_produk }}</td>
                    <td class="py-2 px-2 border">Rp. {{ number_format($product->harga, 0, ',', '.') }}</td>
                    <td class="py-2 px-2 border">{{ $product->merk }}</td>
                    <td class="py-2 px-2 border">{{ $product->jenis }}</td>
                    <td class="py-2 px-2 border"><a href="{{ $product->image }}" class="text-blue-500 hover:underline" target="_blank">View Image</a></td>
                    <td class="py-2 px-2 border">
                        <a href="{{ route('admin.product.edit', $product->id_produk) }}" class="text-blue-500 hover:underline">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</div>
    
<div>

</div>

@endsection
