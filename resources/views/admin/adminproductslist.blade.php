@extends('template.layoutadmin')

@section('section')
<div class="container px-4 py-8 mx-auto">
    <div class="mx-auto max-w-7xl">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Manage Products</h1>
            <a href="{{ route('admin.product.add') }}" class="px-4 py-2 text-sm text-white bg-yellow-500 rounded-md hover:bg-yellow-600">
                Add Product
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-lg">
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 border-b">Product Name</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 border-b">Price</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 border-b">Merk</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 border-b">Jenis</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 border-b">Image URL</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 border-b">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($products as $product)
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $product->nama_produk }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">Rp. {{ number_format($product->harga, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $product->merk }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $product->jenis }}</td>
                            <td class="px-6 py-4 text-sm">
                                <a href="{{ $product->image }}" class="text-blue-500 hover:underline" target="_blank">View Image</a>
                            </td>
                            <td class="px-6 py-4 text-sm">
                                <a href="{{ route('admin.product.edit', $product->id_produk) }}" class="px-2 py-1 text-sm text-white bg-blue-500 rounded-md hover:bg-blue-600">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
