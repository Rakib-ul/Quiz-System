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

            <h3 class="text-xl font-medium text-gray-500 tracking-tight">
                This Quiz contains {{ $quizCount }} questions and has no limit to attempts.
            </h3>
               
            <h2 class="font-bold text-3xl text-green-700 mt-6">
                Good Luck!
            </h2>
        </div>

        @if (session('user'))
            <a  href="/mcq/{{ session('firstMCQ')->id .'/'. $quizName }}"
                class="bg-blue-600 hover:bg-blue-700 transition duration-150 ease-in-out rounded-md px-6 py-3 text-white font-semibold shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Start Quiz
            </a>
        @else
            <a  href="/user-login-quiz"
                class="bg-blue-600 mb-10 hover:bg-blue-700 transition duration-150 ease-in-out rounded-md px-6 py-3 text-white font-semibold shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Login to Start Quiz
            </a>
            <a  href="/user-signup-quiz"
                class="bg-blue-600 hover:bg-blue-700 transition duration-150 ease-in-out rounded-md px-6 py-3 text-white font-semibold shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Signup to Start Quiz
            </a>
        @endif


    </div>
</body>

</html>