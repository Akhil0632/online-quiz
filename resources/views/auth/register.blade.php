<x-app-layout>
     <div class="flex flex-col items-center justify-center min-h-screen bg-gradient-to-r from-blue-500 to-purple-500 px-4">
        <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">Online Quiz – Signup</h2>
        <div class="bg-white w-full max-w-sm rounded-xl shadow-lg p-8 text-center">
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Create an account</h2>

            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                <div>
                    <input id="name" type="text" name="name" :value="old('name')" placeholder="Full Name" class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 input-field" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="text-left text-sm text-red-500 mt-1" />
                </div>

                <div>
                    <input id="email" type="email" name="email" :value="old('email')" placeholder="Email" class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 input-field" required />
                    <x-input-error :messages="$errors->get('email')" class="text-left text-sm text-red-500 mt-1" />
                </div>

                <div>
                    <input id="password" type="password" name="password" placeholder="Password" class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 input-field" required />
                    <x-input-error :messages="$errors->get('password')" class="text-left text-sm text-red-500 mt-1" />
                </div>

                <div>
                    <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm Password" class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 input-field" required />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="text-left text-sm text-red-500 mt-1" />
                </div>

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

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
        }
        
        .input-field {
            transition: all 0.3s ease;
        }
        
        .input-field:focus {
            box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.2), 0 2px 4px -1px rgba(59, 130, 246, 0.1);
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            if (form) {
                form.addEventListener('submit', function(e) {
                    const password = document.getElementById('password')?.value;
                    const passwordConfirmation = document.getElementById('password_confirmation')?.value;
                    
                    if (password !== passwordConfirmation) {
                        e.preventDefault();
                        alert('Passwords do not match');
                    }
                });
            }
        });
    </script>
</x-app-layout>