<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mekarsari</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gradient-to-r from-yellow-100 via-yellow-400 to-yellow-600 min-h-screen flex items-center justify-center">

    <div class="text-center text-black space-y-6">
        <!-- Title with some styling -->
        <img src="{{ asset('Mekarsari.png') }}" alt="Mekar Sari" width="500">


        <!-- Buttons with styling -->
        <div class="space-x-4">
            <a href="{{ route('register') }}" class="px-6 py-3 bg-white text-black-600 font-semibold rounded-lg shadow-md hover:bg-blue-100 transition duration-200">Register</a>
            <a href="{{ route('login') }}" class="px-6 py-3 bg-white text-black-600 font-semibold rounded-lg shadow-md hover:bg-blue-100 transition duration-200">Login</a>
        </div>
    </div>

</body>
</html>
