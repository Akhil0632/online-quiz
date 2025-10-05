<x-app-layout>
    <div class="flex flex-col items-center justify-center min-h-screen bg-gradient-to-br from-pink-200 to-purple-300 px-4 py-8">
        <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">Online Quiz – Questions</h2>
        
        <div class="w-full max-w-3xl text-center space-y-8">

            <div class="flex justify-between items-center">
                <div class="text-3xl font-bold text-orange-600 bg-white w-12 h-12 rounded-full flex items-center justify-center shadow-md">
                    {{ $questionNumber }}
                </div>
                <div id="timer" class="bg-white px-4 py-2 rounded text-xl font-mono shadow-md">1:00</div>
            </div>

            <div class="bg-blue-700 text-white text-2xl font-semibold py-6 px-8 rounded-3xl shadow-md">
                {{ $question['question'] }}
            </div>

            <form method="POST" action="{{ route('quiz.answer') }}" id="quizForm">
                @csrf
                <input type="hidden" name="question_number" value="{{ $questionNumber }}">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($answers as $answer)
                        <label class="block bg-blue-700 text-white text-lg font-semibold py-4 rounded-full cursor-pointer hover:bg-blue-800 transition shadow-md">
                            <input type="radio" name="selected_answer" value="{{ $answer }}" class="hidden" onchange="document.getElementById('quizForm').submit();">
                            {{ $answer }}
                        </label>
                    @endforeach
                </div>

                <div class="mt-8 flex justify-center">
                    <a href="{{ route('dashboard') }}" class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-full font-bold shadow-md">Reset</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        let seconds = 90;
        const timerEl = document.getElementById('timer');
        timerEl.textContent = "1:30";

        const interval = setInterval(() => {
            seconds--;
            let min = Math.floor(seconds / 60);
            let sec = seconds % 60;
            timerEl.textContent = `${min}:${sec < 10 ? '0' + sec : sec}`;
            
            if (seconds <= 0) {
                clearInterval(interval);
                alert('Time up!');
                document.querySelector('form').submit();
            }
        }, 1000);
    </script>
</x-app-layout>