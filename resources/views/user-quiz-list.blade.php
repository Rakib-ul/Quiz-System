<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Quiz List</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50 text-gray-900 font-sans antialiased min-h-screen flex flex-col">

    <x-user-nav-bar></x-user-nav-bar>

    <div class="max-w-7xl mx-auto w-full px-4 sm:px-6 lg:px-8 py-10 flex-grow">

        <div class="sm:flex sm:items-center sm:justify-between mb-8">
            <div>
                <h3 class="text-2xl text-center font-bold text-gray-900 tracking-tight">Category Name: {{ $category }}</h3>
                
            </div>
            <div class="mt-4 sm:mt-0 flex space-x-3">
                <a href="/"
                    class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg font-medium text-sm text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all duration-200">
                    <svg class="w-5 h-5 mr-2 -ml-1 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back 
                </a>
            </div>
        </div>

        <div class="bg-white shadow-sm ring-1 ring-gray-200 rounded-2xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 text-left text-sm text-gray-600">
                    <thead class="bg-gray-50/75 border-b border-gray-200">
                        <tr>
                            <th scope="col" class="px-6 py-4 font-semibold text-gray-500 uppercase tracking-wider text-xs">
                                Quiz ID
                            </th>
                            <th scope="col" class="px-6 py-4 font-semibold text-gray-500 uppercase tracking-wider text-xs w-2/3">
                                Quiz Name
                            </th>
                            <th scope="col" class="px-6 py-4 font-semibold text-gray-500 uppercase tracking-wider text-xs w-2/3">
                                MCQ Count 
                            </th>
                            <th scope="col" class="px-6 py-4 font-semibold text-gray-500 uppercase tracking-wider text-xs text-right">
                                Actions
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100 bg-white">
                        @forelse ($quizData as $item)
                            <tr class="hover:bg-gray-50/80 transition-colors duration-200 group">
                                
                                <td class="px-6 py-4 whitespace-nowrap text-gray-500 font-medium">
                                    {{ $item->id }}
                                </td>
                                
                                <td class="px-6 py-4 text-gray-900 font-medium">
                                    {{ $item->name }}
                                </td>
                                <td class="px-6 py-4 text-gray-900 font-medium">
                                    {{ $item->mcq_count }}
                                </td>
                                <td class="px-6 py-4 text-gray-900 font-medium">
                                    <a href="/start-quiz/{{$item->id}}/{{$item->name}}" class="text-green-700 font-bold" >Attempt Quiz</a>
                                
                                </td>
                                
                                
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-16 text-center text-gray-500">
                                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 mb-4">
                                        <svg class="h-8 w-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                    </div>
                                    <p class="text-lg font-semibold text-gray-900">No quizzes found</p>
                                    <p class="text-sm mt-1 text-gray-500">There are currently no quizzes associated with this category.</p>
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