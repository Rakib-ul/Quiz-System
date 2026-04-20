<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - Check Your Skills</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50 text-gray-900 font-sans antialiased min-h-screen flex flex-col">

    <x-user-nav-bar></x-user-nav-bar>

    <main class="flex-grow py-10 px-4 sm:px-6 lg:px-8">
        
        <div class="max-w-5xl mx-auto w-full">
            
            <div class="mb-8 text-center sm:text-left">
                <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Check Your Skills</h1>
                <p class="mt-2 text-sm text-gray-500">Search for a category and select a quiz to test your knowledge.</p>
            </div>

            <div class="mb-6 flex flex-col sm:flex-row justify-between items-center gap-4">
                
                <div class="relative w-full max-w-md">
                    <input 
                        type="text"
                        placeholder="Search categories or quizzes..."
                        class="w-full pl-5 pr-12 py-3 text-gray-700 bg-white border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200"
                    >
                    <button 
                        type="button"
                        aria-label="Search"
                        class="absolute right-3 top-1/2 transform -translate-y-1/2 p-2 text-gray-400 hover:text-indigo-600 focus:outline-none focus:text-indigo-600 transition-colors rounded-full"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor">
                            <path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"/>
                        </svg>
                    </button>
                </div>

                </div>

            <div class="bg-white shadow-sm ring-1 ring-gray-200 rounded-2xl overflow-hidden">

                <div class="px-6 py-5 border-b border-gray-100 bg-gray-50 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
                    <h3 class="text-lg font-bold text-gray-900">Available Categories</h3>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-indigo-100 text-indigo-800">
                        Total Categories: {{ $categories->count() }}
                    </span>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full whitespace-nowrap text-left text-sm text-gray-600">
                        
                        <thead class="bg-white border-b border-gray-200 text-gray-500 uppercase text-xs font-semibold tracking-wider">
                            <tr>
                                <th scope="col" class="px-6 py-4 w-24">#</th>
                                <th scope="col" class="px-6 py-4">Category Name</th>
                                <th scope="col" class="px-6 py-4">Total Quizzes</th>
                                <th scope="col" class="px-6 py-4 text-right">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-100 bg-white">
                            @forelse ($categories as $key => $category)
                                <tr class="hover:bg-gray-50/80 transition-colors duration-200 group">

                                    <td class="px-6 py-4 text-gray-500 font-medium">
                                        {{ $key + 1 }}
                                    </td>

                                    <td class="px-6 py-4 text-gray-900 font-bold">
                                        {{ $category->name }}
                                    </td>

                                    <td class="px-6 py-4 text-gray-900 font-bold">
                                        {{ $category->quizzes_count }}
                                    </td>

                                    <td class="px-6 py-4 text-right">
                                        <div class="flex items-center justify-end space-x-2">
                                            <a href="user-quiz-list/{{ $category->id }}/{{ $category->name }}"
                                                class="inline-flex items-center justify-center p-2 text-indigo-600 hover:text-indigo-900 bg-indigo-50 hover:bg-indigo-100 rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                                title="View Quizzes">
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
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                            </svg>
                                        </div>
                                        <p class="text-lg font-semibold text-gray-900">No categories found</p>
                                        <p class="text-sm mt-1 text-gray-500">Check back later for new quizzes.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>
<x-user-footer></x-user-footer>
</body>
</html>