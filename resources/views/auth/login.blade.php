<x-guest-layout>
    <div class="">
    <div class="bg-white shadow-lg rounded-2xl flex w-full max-w-5xl overflow-hidden">
            
            <!-- Left Side: Branding or Image -->
            <div class="hidden md:flex w-1/2 items-center justify-center bg-gray-900">
                <div>
                    <img src="/car-banner.png" alt="Car Rental" class="w-full">
                </div>
            </div>


            <!-- Right Side: Login Form -->
            <div class="w-full md:w-1/2 p-10">
                <div class="text-center mb-6">
                    <h1 class="text-3xl font-bold text-gray-800">Welcome Back</h1>
                    <p class="text-sm text-gray-500">Access your rentals and manage bookings</p>
                </div>

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input
                        id="email"
                        class="block mt-1 w-full focus:ring-gray-600 focus:border-gray-600"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autofocus
                        autocomplete="username"
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input
                        id="password"
                        class="block mt-1 w-full focus:ring-gray-600 focus:border-gray-600"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                    />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>


                    <!-- Remember Me + Forgot -->
                    <div class="flex items-center justify-between mt-4">
                        <label for="remember_me" class="flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="text-sm text-indigo-600 hover:underline" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </div>

                    <!-- Login Button -->
                    <div class="mt-6">
                        <x-primary-button class="w-full justify-center py-2 text-lg bg-gray-600 hover:bg-gray-700 transition duration-300">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>
                </form>

                <!-- Register Button -->
                <div class="mt-4 text-center">
                    <p class="text-sm text-gray-600">Don't have an account? <a href="{{ route('register') }}" class="text-gray-600 font-semibold hover:underline">Sign up</a></p>
                </div>

            </div>
        </div>
    </div>
</x-guest-layout>
