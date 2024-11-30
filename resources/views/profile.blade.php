@extends('template.layout')

@section('title', 'Profile - Mekarsari Fabric Store')
@section('meta-description', 'View and update your profile details at Mekarsari Fabric Store.')

@section('section')

<div class="container mx-auto py-12">
    <!-- Breadcrumbs -->
    <nav class="text-gray-600 text-sm my-6" aria-label="Breadcrumb">
        <a href="/home" class="text-gray-500 hover:text-gray-900">Home</a> >
        <span class="text-gray-900">Profile</span>
    </nav>
    
    <!-- Hero Section -->
    <div class="relative bg-cover bg-center h-96" style="background-image: url('https://www.hawthornintl.com/wp-content/uploads/2018/11/Denim-Fabric.jpg');">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative z-10 flex justify-center items-center h-full">
            <h1 class="text-white text-5xl font-bold">Your Profile</h1>
        </div>
    </div>

    <!-- User Information Section -->
    <section class="my-12 text-center">
        <h2 class="text-4xl font-bold mb-4 text-gray-800">Hello, {{ $user->name }}</h2>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto mb-6">
            Manage your personal information, account settings, and preferences. Update your profile as needed.
        </p>
        <div class="space-y-4">
            <div class="text-lg font-medium text-gray-700">
                <strong>Email:</strong> {{ $user->email }}
            </div>
            <div class="text-lg font-medium text-gray-700">
                <strong>Phone:</strong> {{ $user->phone ?? 'Not provided' }}
            </div>
            <div class="text-lg font-medium text-gray-700">
                <strong>Address:</strong> {{ $user->address ?? 'Not provided' }}
            </div>
        </div>
    </section>

    <!-- Edit Profile and Settings Section -->
    <section class="my-12 flex justify-center space-x-6">
        <!-- <a href="{{ route('profile.edit') }}" class="px-6 py-3 bg-yellow-500 text-white rounded-md text-lg hover:bg-yellow-600">
            Edit Profile
        </a>
        <a href="{{ route('profile.settings') }}" class="px-6 py-3 bg-blue-500 text-white rounded-md text-lg hover:bg-blue-600">
            Account Settings
        </a> -->
    </section>

    <!-- Account Actions Section -->
    <section class="py-12 bg-gray-100 text-center">
        <h2 class="text-3xl font-semibold mb-4">Account Management</h2>
        <p class="text-gray-600 leading-relaxed max-w-2xl mx-auto">
            Update your profile details, change your password, or manage your privacy settings.
        </p>
    </section>

    <!-- Conclusion -->
    <section class="text-center my-12">
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">
            We are here to ensure you have the best experience. Contact us anytime for help or questions.
        </p>
        <p class="text-gray-800 font-bold mt-4">Thank you for being part of Mekarsari!</p>
    </section>
</div>

@endsection
