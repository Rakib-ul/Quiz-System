<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Start Quiz</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50 text-gray-900 font-sans antialiased min-h-screen flex flex-col">

    <x-user-nav-bar></x-user-nav-bar>

    <div
        class="flex-1 max-w-7xl mx-auto w-full px-4 sm:px-6 lg:px-8 py-10 flex flex-col justify-items-start items-center">

        <div class="mb-8 text-center space-y-4">
            <h1 class="text-4xl font-bold text-gray-900 tracking-tight">
                {{ $quizName }}
            </h1>   
            <h1 class="text-2xl font-bold text-gray-900 tracking-tight">
                Total Question: {{ session('currentQuiz')['totalMcq'] }}
            </h1>
            <h1 class="text-.5xl font-bold text-gray-900 tracking-tight">
                {{ session('currentQuiz')['currentMcq'] }} of {{ session('currentQuiz')['totalMcq'] }}
            </h1>
        </div>

        <div class="mt-2 p-4 bg-white shadow-2xl rounded-xl w-140">
            <h3 class="text-green-900 font-bold text-xl mb-1">Q {{ session('currentQuiz')['currentMcq'] }}: {{ $mcqData->question }}</h3>
            <form action="/submit-next/{{ $mcqData['id'] }}" method="post">
                @csrf
                <input type="hidden" name = "id" value="{{ $mcqData['id'] }}">
                <label for="option_1" class="flex border p-3 mt-2 rounded-2xl hover:bg-blue-50" >
                    <input name="option" value="a"  id="option_1" class=" text-blue-500" type="radio">
                    <span class="text-green-900 pl-2" >{{ $mcqData->a }}</span>
                </label>
                <label for="option_2" class="flex border p-3 mt-2 rounded-2xl hover:bg-blue-50" >
                    <input name="option" value="b" id="option_2" class=" text-blue-500" type="radio">
                    <span class="text-green-900 pl-2" >{{ $mcqData->b }}</span>
                </label>
                <label for="option_3" class="flex border p-3 mt-2 rounded-2xl hover:bg-blue-50" >
                    <input name="option" value="c"  id="option_3" class=" text-blue-500" type="radio">
                    <span class="text-green-900 pl-2" >{{ $mcqData->c }}</span>
                </label>
                <label for="option_4"  class="flex border p-3 mt-2 rounded-2xl hover:bg-blue-50" >
                    <input name="option" value="d"  id="option_4" class=" text-blue-500" type="radio">
                    <span class="text-green-900 pl-2" >{{ $mcqData->d }}</span>
                </label>

                <button class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-lg shadow-sm text-sm font-bold text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors mt-2">
                    Submit Answer and Next
                </button>
            </form>
        </div>

        

    
    </div>

    <x-user-footer></x-user-footer>
</body>

</html>