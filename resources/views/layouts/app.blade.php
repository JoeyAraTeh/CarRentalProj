<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel App</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Add Google Font for Bold and Sophisticated Look -->
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@600&display=swap" rel="stylesheet">

<!-- Flatpickr CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<!-- Flatpickr JS -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


</head>
<body>

<!-- Navigation Bar (Hidden on admin routes) -->
@if (!Route::is('admin.*'))
<nav class="fixed top-0 left-0 w-full bg-[#70717554] py-4 shadow-lg z-50">
    <div class="container mx-auto flex items-center justify-between px-6">
        <!-- Left Section (Logo + Name) -->
        <div class="flex items-center space-x-3">
            <img src="{{ asset('/logo.png') }}" alt="Logo" class="h-12"> 
            <span class="text-white text-2xl font-bold tracking-wide" style="font-family: 'Oswald', sans-serif;">
                FLEXIDRIVE
            </span>
        </div>

        <!-- Right Section (Navigation Links) -->
        <ul class="flex space-x-8 text-white text-md font-semibold">
            <li><a href="{{ url('/homepage') }}" class="hover:text-[#333333] transition duration-300">Home</a></li>
            <li><a href="{{ url('/services') }}" class="hover:text-[#333333] transition duration-300">Services</a></li>
            <li><a href="{{ url('/contacts') }}" class="hover:text-[#333333] transition duration-300">Contact</a></li>
    
            @auth
<li class="relative group">
    <button class="bg-white text-[#333333] p-2 rounded-full hover:bg-[#555555] hover:text-white transition duration-500">
        <i class="fas fa-user text-lg"></i>
    </button>
    <ul class="absolute right-0 mt-2 w-40 bg-white rounded-md shadow-lg hidden group-hover:block z-50">
        <li>
            <a href="{{ route('bookings') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
                Bookings
            </a>
        </li>
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2 text-gray-800 hover:bg-gray-100">
                    Logout
                </button>
            </form>
        </li>
    </ul>
</li>
@endauth


            @guest
                <li>
                    <a href="{{ route('login') }}" class="bg-white text-[#333333] px-4 py-2 rounded-lg hover:bg-[#555555] hover:text-white transition duration-300">
                        Login
                    </a>
                </li>
            @endguest
        </ul>
    </div>
</nav>
@endif


    <div class="container">
        @yield('content')
    </div>

    <!-- <footer>
        <p>&copy; 2024 My Laravel App</p>
    </footer> -->
    
</body>
</html>
