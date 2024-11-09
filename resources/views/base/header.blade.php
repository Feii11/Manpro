<header class="bg-white shadow p-4">
    <div class="container mx-auto flex justify-between items-center">
        <div class="text-2xl font-bold">
            MekarSari
        </div>

        <nav class="space-x-8 text-lg">
            <a href="{{ route('home') }}" class="hover:text-gray-700">Home</a>
            <a href="{{ route('shop') }}" class="hover:text-gray-700">Shop</a>
            <a href="{{ route('about') }}" class="hover:text-gray-700">About</a>
            <a href="{{ route('contact') }}" class="hover:text-gray-700">Contact</a>
        </nav>

        <div class="flex items-center space-x-8">

            <!-- User Icon and Dropdown -->
            <div class="relative group">
                <!-- User Icon with the Name -->
                <a href="#" class="text-2xl hover:text-gray-700 flex items-center space-x-2">
                    <i class="fas fa-user"></i>
                    @auth
                        <span class="ml-2">{{ auth()->user()->name }}</span> <!-- Display logged-in user's name -->
                    @endauth
                </a>

                <!-- Dropdown Menu -->
                @auth
                    <div class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-md hidden group-hover:block z-10">
                        <div class="py-1">
                            <!-- Profile Link -->
                            <x-responsive-nav-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-responsive-nav-link>

                            <!-- Logout Form -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-responsive-nav-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-responsive-nav-link>
                            </form>
                        </div>
                    </div>
                @endauth
            </div>

            <a href="{{ route('orders.view') }}" class="text-2xl hover:text-gray-700">
                <i class="fa-solid fa-clipboard"></i>
            </a>

            <a href="#" class="text-2xl hover:text-gray-700">
                <i class="fas fa-heart"></i>
            </a>

            <a href="{{ route('cart.index') }}" class="text-2xl hover:text-gray-700">
                <i class="fas fa-shopping-cart"></i>
            </a>
        </div>
    </div>
</header>
