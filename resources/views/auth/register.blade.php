<x-app-layout>
    <div class="flex items-center justify-center min-h-screen bg-gradient-to-br from-pink-200 to-purple-300 px-4">
        <div class="bg-white w-full max-w-sm rounded-xl shadow-lg p-8 text-center">

            <h2 class="text-3xl font-bold text-gray-800 mb-6">Signup</h2>

            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                <input id="name" type="text" name="name" :value="old('name')" required autofocus placeholder="Full Name" class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                <x-input-error :messages="$errors->get('name')" class="text-left text-sm text-red-500" />

                <input id="email" type="email" name="email" :value="old('email')" required placeholder="Email"class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                <x-input-error :messages="$errors->get('email')" class="text-left text-sm text-red-500" />

                <input id="password" type="password" name="password" required placeholder="Password" class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                <x-input-error :messages="$errors->get('password')" class="text-left text-sm text-red-500" />

                <input id="password_confirmation" type="password" name="password_confirmation" required placeholder="Confirm Password" class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"/>
                <x-input-error :messages="$errors->get('password_confirmation')" class="text-left text-sm text-red-500" />

                <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 rounded-full transition">
                    Create Account
                </button>

                <p class="text-sm mt-4">
                    Already registered?
                    <a href="{{ route('login') }}" class="text-blue-600 font-semibold hover:underline">Login</a>
                </p>
            </form>
        </div>
    </div>
</x-app-layout>
