<x-app-layout>
    <div class="flex flex-col items-center justify-center min-h-screen bg-gradient-to-r from-blue-500 to-purple-500 px-4">
        <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">Online Quiz – Login</h2>
        <div class="bg-white w-full max-w-sm rounded-xl shadow-xl p-8">
            <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">Login</h2>

            <x-auth-session-status class="mb-4 text-sm text-green-600" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <div>
                    <input id="email" type="email" name="email" :value="old('email')" placeholder="Username" class="w-full px-4 py-3 border-b border-gray-400 focus:outline-none focus:border-blue-500 input-field" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="text-left text-sm text-red-500 mt-1" />
                </div>

                <div>
                    <input id="password" type="password" name="password" placeholder="Password" class="w-full px-4 py-3 border-b border-gray-400 focus:outline-none focus:border-blue-500 input-field" required />
                    <x-input-error :messages="$errors->get('password')" class="text-left text-sm text-red-500 mt-1" />
                </div>

                <div class="flex items-center justify-between">
                    <label for="remember_me" class="flex items-center">
                        <input id="remember_me" type="checkbox" name="remember" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500">
                        <span class="ml-2 text-sm text-gray-600">Remember me</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-blue-500 hover:underline">Forgot Password?</a>
                    @endif
                </div>

                <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 rounded-full shadow-md transition transform hover:-translate-y-0.5">Login</button>

                <p class="text-sm mt-4 text-center">
                    Not a member?
                    <a href="{{ route('register') }}" class="text-blue-600 font-semibold hover:underline">Signup</a>
                </p>
            </form>
        </div>
    </div>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
        body { font-family: 'Poppins', sans-serif; }
        .input-field { transition: all 0.3s ease; }
        .input-field:focus { box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.2), 0 2px 4px -1px rgba(59, 130, 246, 0.1); }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            if (form) {
                form.addEventListener('submit', function(e) {
                    const email = document.getElementById('email')?.value;
                    const password = document.getElementById('password')?.value;
                    if (!email || !password) {
                        e.preventDefault();
                        alert('Please fill in all fields');
                    }
                });
                
                const inputs = document.querySelectorAll('input[type="email"], input[type="password"]');
                inputs.forEach(input => {
                    input.addEventListener('focus', function() {
                        this.parentElement.classList.add('ring-2', 'ring-blue-200', 'rounded-md');
                        this.parentElement.classList.remove('border-b');
                    });
                    
                    input.addEventListener('blur', function() {
                        this.parentElement.classList.remove('ring-2', 'ring-blue-200', 'rounded-md');
                        this.parentElement.classList.add('border-b');
                    });
                });
            }
        });
    </script>
</x-app-layout>