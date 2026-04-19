<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Create Quiz</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50 text-gray-900 font-sans antialiased min-h-screen flex flex-col">

    <x-navbar name="{{$name}}"></x-navbar>

    <main class="flex-grow flex items-center justify-center p-4">
        
        @if (!session('quizDetails'))
        <div class="w-full max-w-md bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-100">
            <div class="px-8 py-8">

                <div class="text-center mb-8">
                    <h2 class="text-2xl font-extrabold text-gray-900">
                        Create New Quiz
                    </h2>
                    <p class="text-sm text-gray-500 mt-2">
                        Set up the basic details for your quiz.
                    </p>
                </div>

                <form action="add-quiz" method="get" class="space-y-5">
                    @csrf
                    
                    <div>
                        <label for="quiz_name" class="block text-sm font-semibold text-gray-700 mb-1">
                            Quiz Name
                        </label>
                        <input type="text" id="quiz_name" name="quiz" placeholder="e.g., Python Basics"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-gray-900 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors shadow-sm outline-none" required>

                        @error('quiz')
                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                <svg class="w-4 h-4 mr-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label for="category_id" class="block text-sm font-semibold text-gray-700 mb-1">
                            Category
                        </label>
                        <select id="category_id" name="category_id"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-gray-900 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors shadow-sm outline-none bg-white" required>
                            <option value="" disabled selected>Select a category...</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit"
                        class="w-full mt-4 flex justify-center items-center bg-indigo-600 text-white py-2.5 px-4 rounded-lg hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-200 transition duration-300 font-bold shadow-md">
                        Continue to Questions
                        <svg class="w-5 h-5 ml-2 -mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </button>
                </form>

            </div>
        </div>

        @else
        <div class="w-full max-w-2xl bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-100 p-8">
            
            <div class="flex flex-col items-center mb-8">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-bold bg-green-100 text-green-800 border border-green-200 mb-4">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Active Quiz: {{ session('quizDetails')['name'] }}
                </span>
                <h2 class="text-2xl font-extrabold text-gray-900">
                    Add Multiple Choice Question
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Fill out the question, options, and select the correct answer.
                </p>
            </div>

            <form action="add-mcq" method="post" class="space-y-5">
                @csrf
                
                <div>
                    <label for="question" class="block text-sm font-semibold text-gray-700 mb-1">Question</label>
                    <textarea id="question" name="question" rows="3" placeholder="Enter your question here..."
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg text-gray-900 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors shadow-sm outline-none resize-none" required></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="option_a" class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-1">Option A</label>
                        <input type="text" id="option_a" name="a" placeholder="First option"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-900 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors shadow-sm outline-none" required>
                    </div>
                    <div>
                        <label for="option_b" class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-1">Option B</label>
                        <input type="text" id="option_b" name="b" placeholder="Second option"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-900 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors shadow-sm outline-none" required>
                    </div>
                    <div>
                        <label for="option_c" class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-1">Option C</label>
                        <input type="text" id="option_c" name="c" placeholder="Third option"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-900 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors shadow-sm outline-none" required>
                    </div>
                    <div>
                        <label for="option_d" class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-1">Option D</label>
                        <input type="text" id="option_d" name="d" placeholder="Fourth option"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-900 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors shadow-sm outline-none" required>
                    </div>
                </div>

                <div class="pt-2">
                    <label for="correct_ans" class="block text-sm font-semibold text-gray-700 mb-1">Correct Answer</label>
                    <select id="correct_ans" name="correct_ans"
                        class="w-full md:w-1/2 px-4 py-2.5 border border-gray-300 rounded-lg text-gray-900 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors shadow-sm outline-none bg-white font-medium" required>
                        <option value="" disabled selected>Choose correct option...</option>
                        <option value="a">Option A</option>
                        <option value="b">Option B</option>
                        <option value="c">Option C</option>
                        <option value="d">Option D</option>
                    </select>
                </div>

                <div class="flex flex-col sm:flex-row gap-3 pt-6 mt-4 border-t border-gray-100">
                    
                    <button type="submit" name="submit" value="add_more"
                        class="flex-1 flex justify-center items-center bg-white border-2 border-indigo-600 text-indigo-600 py-2.5 px-4 rounded-lg hover:bg-indigo-50 focus:ring-4 focus:ring-indigo-100 transition duration-300 font-bold shadow-sm">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Save & Add Another
                    </button>
                    
                    <button type="submit" name="submit" value="finish"
                        class="flex-1 flex justify-center items-center bg-green-600 text-white py-2.5 px-4 rounded-lg hover:bg-green-700 focus:ring-4 focus:ring-green-200 transition duration-300 font-bold shadow-md">
                        Finish & Submit
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </button>
                    
                </div>
            </form>
        </div>
        @endif

    </main>
</body>

</html>