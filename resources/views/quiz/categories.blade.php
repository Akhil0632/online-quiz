<x-app-layout>
    <div class="flex flex-col items-center justify-center min-h-screen bg-gradient-to-br from-pink-200 to-purple-300 px-4 py-8">
        <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">Online Quiz – Categories</h2>
        
        <div class="w-full max-w-3xl text-center space-y-8">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-semibold text-gray-700 mt-2">Select Quiz Type</h2>
            </div>

            <div class="swiper w-full max-w-3xl mx-auto">
                <div class="swiper-wrapper">
                    @foreach(collect($categories)->chunk(4) as $chunk)
                        <div class="swiper-slide px-6 py-4 mb-8">
                            <div class="grid grid-cols-2 gap-4">
                                @foreach($chunk as $mainCategory => $subCategories)
                                    <form method="POST" action="{{ route('start.quiz') }}">
                                        @csrf
                                        <input type="hidden" name="category" value="{{ $mainCategory }}">
                                        <button type="submit" class="w-full px-6 py-4 bg-blue-700 text-white rounded-full text-lg font-semibold hover:bg-blue-800 transition">
                                            {{ $mainCategory }}
                                        </button>
                                    </form>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

                 <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new Swiper('.swiper', {
                slidesPerView: 1,
                spaceBetween: 20,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
            });
        });
    </script>
</x-app-layout>