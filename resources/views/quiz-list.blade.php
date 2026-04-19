<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Quiz List</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50 text-gray-900 font-sans antialiased min-h-screen flex flex-col">

    <x-navbar name="{{$name}}"></x-navbar>

    <div class="max-w-7xl mx-auto w-full px-4 sm:px-6 lg:px-8 py-10 flex-grow">

        <div class="sm:flex sm:items-center sm:justify-between mb-8">
            <div>
                <h3 class="text-2xl font-bold text-gray-900 tracking-tight">Quiz List</h3>
                <p class="mt-1 text-sm text-gray-500">A comprehensive list of all quizzes associated with this category.</p>
            </div>
            <div class="mt-4 sm:mt-0 flex space-x-3">
                <a href="/admin-categories"
                    class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg font-medium text-sm text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all duration-200">
                    <svg class="w-5 h-5 mr-2 -ml-1 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Categories
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
                            <th scope="col" class="px-6 py-4 font-semibold text-gray-500 uppercase tracking-wider text-xs text-right">
                                Actions
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100 bg-white">
                        @forelse ($quizData as $item)
                            <tr class="hover:bg-gray-50/80 transition-colors duration-200 group">
                                
                                <td class="px-6 py-4 whitespace-nowrap text-gray-500 font-medium">
                                    #{{ $item->id }}
                                </td>
                                
                                <td class="px-6 py-4 text-gray-900 font-medium">
                                    {{ $item->name }}
                                </td>
                                
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex items-center justify-end">
                                        <a href="/show-quiz/{{ $item->id }}/{{ $item->name }}" 
                                           class="inline-flex items-center justify-center p-2 text-indigo-600 bg-indigo-50 hover:bg-indigo-100 hover:text-indigo-900 rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                           title="View Questions">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                        </a>
                                    </div>
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