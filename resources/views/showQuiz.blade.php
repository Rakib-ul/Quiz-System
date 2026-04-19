<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - MCQs List</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50 text-gray-900 font-sans antialiased min-h-screen flex flex-col">

    <x-navbar name="{{$name}}"></x-navbar>

    <div class="max-w-7xl mx-auto w-full px-4 sm:px-6 lg:px-8 py-8 mt-4">
        
        <div class="sm:flex sm:items-center sm:justify-between mb-6">
            <div>
                <h3 class="text-2xl font-bold text-gray-900 tracking-tight">MCQs List</h3>
                <p class="mt-1 text-sm text-gray-500">A comprehensive list of all multiple-choice questions associated with this quiz.</p>
            </div>
            <div class="mt-4 sm:mt-0">
                <a href="/add-quiz" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg font-medium text-sm text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all duration-200">
                    <svg class="w-5 h-5 mr-2 -ml-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Quizzes
                </a>
            </div>
        </div>

        <div class="bg-white shadow-sm ring-1 ring-black ring-opacity-5 rounded-2xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 text-left text-sm text-gray-600">
                    <thead class="bg-gray-50/75">
                        <tr>
                            <th scope="col" class="px-6 py-4 font-semibold text-gray-500 uppercase tracking-wider text-xs">ID</th>
                            <th scope="col" class="px-6 py-4 font-semibold text-gray-500 uppercase tracking-wider text-xs w-1/3">Question</th>
                            <th scope="col" class="px-6 py-4 font-semibold text-gray-500 uppercase tracking-wider text-xs">Option A</th>
                            <th scope="col" class="px-6 py-4 font-semibold text-gray-500 uppercase tracking-wider text-xs">Option B</th>
                            <th scope="col" class="px-6 py-4 font-semibold text-gray-500 uppercase tracking-wider text-xs">Option C</th>
                            <th scope="col" class="px-6 py-4 font-semibold text-gray-500 uppercase tracking-wider text-xs">Option D</th>
                            <th scope="col" class="px-6 py-4 font-semibold text-gray-500 uppercase tracking-wider text-xs">Correct Ans</th>
                        </tr>
                    </thead>
                    
                    <tbody class="divide-y divide-gray-100 bg-white">
                        @forelse ($mcqs as $mcq)
                            <tr class="hover:bg-gray-50/80 transition-colors duration-200 group">
                                <td class="px-6 py-4 whitespace-nowrap text-gray-500 font-medium">
                                    #{{ $mcq->id }}
                                </td>
                                <td class="px-6 py-4 text-gray-900 font-medium">
                                    {{ $mcq->question }}
                                </td>
                                <td class="px-6 py-4 text-gray-600">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-blue-50 text-blue-700 border border-blue-100 w-full">
                                         {{ $mcq->a }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-gray-600">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-blue-50 text-blue-700 border border-blue-100 w-full">
                                         {{ $mcq->b }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-gray-600">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-blue-50 text-blue-700 border border-blue-100 w-full">
                                         {{ $mcq->c }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-gray-600">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-blue-50 text-blue-700 border border-blue-100 w-full">
                                         {{ $mcq->d }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-green-600">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-green-50 text-green-700 border border-green-100 w-full">
                                         {{ $mcq->correct_ans }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-16 text-center text-gray-500">
                                    <svg class="mx-auto h-12 w-12 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    <p class="text-lg font-semibold text-gray-900">No MCQs found</p>
                                    <p class="text-sm mt-1">Get started by adding new questions to this quiz.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>