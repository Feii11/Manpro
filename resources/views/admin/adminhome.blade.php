@extends('template.layoutadmin')

@section('section')
<div class="container mx-auto">
    <h1 class="text-3xl font-bold mb-6">Admin Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <a href="{{ route('admin.products') }}" class="block p-4 bg-blue-500 text-white rounded-md">Manage Products</a>
        <a href="{{ route('admin.users.index') }}" class="block p-4 bg-green-500 text-white rounded-md">View Users</a>
        <a href="{{ route('admin.admins.index') }}" class="block p-4 bg-purple-500 text-white rounded-md">View Admins</a>
        <a href="{{ route('admin.orders') }}" class="block p-4 bg-yellow-500 text-white rounded-md">Manage Orders</a>
    </div>
</div>
@endsection
