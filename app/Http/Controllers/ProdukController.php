<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->search;
        $page = $request->page ?? 1;
        $page_size = 10;
        
        if (empty($search)) {
            $allProducts = Produk::all();
            $uniqueProducts = $allProducts->unique('nama_produk');
        } else {
            $uniqueProducts = Produk::where('nama_produk', 'like', '%' . $search . '%')
                            ->get()
                            ->unique('nama_produk');
        }

        $totalPages = ceil(count($uniqueProducts) / $page_size);
        $paginatedProducts = $uniqueProducts->forPage($page, $page_size);

        return view('homepage', ['produk' => $paginatedProducts, 'totalPages' => $totalPages]);
    }
    

    public function shop()
    {
        // Fetch all products from 'produk' table
        $produk = Produk::all();

        // Pass the data to the view
        return view('shop', ['produk'=> $produk]);
    }

    // public function show($id)
    // {
    //     $produk = Produk::findOrFail($id); // Fetch the produk by ID
    //     return view('product', compact('produk')); // Return the view with the produk data
    // }
    public function show($id)
    {
        // Fetch the product by ID
        $produk = Produk::findOrFail($id);

        $produkByMerk = Produk::query()
            ->where('nama_produk', $produk->nama_produk)
            ->get()
            ->map(fn($item) => ['merk' => $item->merk, 'jenis' => $item->jenis])
            ->groupBy(fn($item) => $item['merk']);

        // Pass the product, merk, and jenis to the view
        return view('product', compact('produk', 'produkByMerk'));
    }

    public function getProductByFilters(Request $request)
    {
        // Get the selected merk and jenis from the request
        $merk = $request->merk;
        $jenis = $request->jenis;
    
        // Find the product based on the selected merk and jenis
        $produk = Produk::where('merk', $merk)
                        ->where('jenis', $jenis)
                        ->first(); // Find the first product matching the filters
    
        // If no product is found, return an error
        if (!$produk) {
            return response()->json(['message' => 'Product not found'], 404);
        }
    
        // Return the product details as JSON
        return response()->json([
            'id' => $produk->id_produk,
            'nama_produk' => $produk->nama_produk,
            'harga' => $produk->harga,
            // Include any other product details you need
        ]);
    }
    
    


}
