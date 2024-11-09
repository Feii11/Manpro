<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminhome()
    {
        return view('admin.adminhome');
    }

    public function viewProducts()
    {
        $products = Produk::all();
        return view('admin.adminproductslist', compact('products'));
    }

    public function editProduct($id)
    {
        $product = Produk::findOrFail($id);
        return view('admin.adminproductsedit', compact('product'));
    }

    public function updateProduct(Request $request, $id)
    {
        // dd($request->all()); // This will show all data being received
        $product = Produk::findOrFail($id);

        $product->nama_produk = $request->input('name');
        $product->harga = $request->input('price');
        $product->merk = $request->input('merk');
        $product->jenis = $request->input('jenis');
        $product->image = $request->input('image_url');

        // Save the updated product
        $product->save();
        // $product->update($request->only(['nama_produk', 'harga']));
        
        return redirect()->route('admin.products')->with('success', 'Product updated successfully');
    }

    public function viewUsers()
    {
        $users = User::where('jenis_akun', "user")->get();
        return view('admin.adminuserslist', compact('users'));
    }

    public function viewAdmins()
    {
        $admins = User::where('is_admin', 1)->get();
        return view('admin.admins.index', compact('admins'));
    }

    public function viewOrders()
    {
        $orders = Order::all();
        return view('admin.adminorderslist', compact('orders'));
        
    }

    public function updateOrderStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status_order = $request->status;
        $order->save();

        return redirect()->route('admin.orders')->with('success', 'Order status updated successfully');
    }
}
