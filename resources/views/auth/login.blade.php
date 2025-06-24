<x-app-layout>
    <div class="flex items-center justify-center min-h-screen bg-gradient-to-br from-pink-200 to-purple-300 px-4">
        <div class="bg-white w-full max-w-sm rounded-xl shadow-lg p-8 text-center">

            
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Login</h2>

            <x-auth-session-status class="mb-4 text-sm text-green-600" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <input id="email" type="email" name="email" :value="old('email')"required autofocus placeholder="Username" class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                <x-input-error :messages="$errors->get('email')" class="text-left text-sm text-red-500" />

                <input id="password" type="password" name="password" required placeholder="Password" class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
    
                <x-input-error :messages="$errors->get('password')" class="text-left text-sm text-red-500" />
                @if (Route::has('password.request'))
                    <div class="text-right text-sm">
                        <a href="{{ route('password.request') }}" class="text-blue-500 hover:underline">Forgot Password?</a>
                    </div>
                @endif

                <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 rounded-full transition">
                    Login
                </button>
   
                <p class="text-sm mt-4">
                    Not a member?
                    <a href="{{ route('register') }}" class="text-blue-600 font-semibold hover:underline">Signup</a>
                </p>
            </form>
        </div>
    </div>
</x-app-layout>
