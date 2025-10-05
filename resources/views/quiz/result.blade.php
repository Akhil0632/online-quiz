<x-app-layout>
    <div class="flex flex-col items-center justify-center min-h-screen bg-gradient-to-br from-pink-200 to-purple-300 px-4 py-8">
        <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">Online Quiz – Results</h2>
        
        <div class="w-full max-w-4xl text-center space-y-10">

            <div class="swiper w-full max-w-3xl mx-auto">
                <div class="swiper-wrapper">
                    @foreach(collect($questions)->chunk(4) as $chunk)
                        <div class="swiper-slide px-6 py-4 mb-8">
                            <div class="space-y-6"> 
                                @foreach($chunk as $index => $question)
                                    @php
                                        $correctAnswer = $question['correctAnswer'];
                                    @endphp

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
                                        <div class="bg-blue-700 text-white px-6 py-4 rounded-full shadow-md text-left font-medium">
                                            {{ $question['question'] }}
                                        </div>

                                        <div class="bg-blue-600 text-white px-6 py-4 rounded-full shadow-md font-semibold text-center">
                                            {{ $correctAnswer }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination mt-4"></div>
            </div>

            <div class="mt-6">
                <div class="inline-block bg-blue-700 text-white text-xl font-bold px-10 py-4 rounded-full shadow-lg">
                    {{ $status }}
                </div>
            </div>

            <div class="mt-8">
                <a href="{{ route('dashboard') }}"
                   class="bg-blue-700 hover:bg-blue-800 text-white px-6 py-3 rounded-full font-semibold transition shadow-md">
                    Back to Categories
                </a>
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