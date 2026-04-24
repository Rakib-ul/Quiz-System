<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details Page</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50 text-gray-900 font-sans antialiased min-h-screen flex flex-col">

    <x-user-nav-bar></x-user-nav-bar>

    <main class="flex-grow py-10 px-4 sm:px-6 lg:px-8">
        
        <div class="max-w-5xl mx-auto w-full">
            
            <div class="mb-8 text-center sm:text-left">
                <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Attemped Quiz</h1>
               
            </div>
            <div class="bg-white shadow-sm ring-1 ring-gray-200 rounded-2xl overflow-hidden">

                

                <div class="overflow-x-auto">
                    <table class="min-w-full whitespace-nowrap text-left text-sm text-gray-600">
                        
                        <thead class="bg-white border-b border-gray-200 text-gray-500 uppercase text-xs font-semibold tracking-wider">
                            <tr>
                                <th scope="col" class="px-6 py-4 w-24">#</th>
                                <th scope="col" class="px-6 py-4">Quiz Name</th>
                                <th scope="col" class="px-6 py-4">Status</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-100 bg-white">
                            @forelse ($quizRecord as $key =>$record)
                                <tr class="hover:bg-gray-50/80 transition-colors duration-200 group">

                                    <td class="px-6 py-4 text-gray-500 font-medium">
                                        {{ $key + 1 }}
                                    </td>

                                    <td class="px-6 py-4 text-gray-900 font-bold">
                                        {{ $record->name }}
                                    </td>

                                    <td class="px-6 py-4 text-gray-900 font-bold">
                                        @if ($record->status == 2)
                                        <span class="text-green-500">Completed</span>
                                        @else
                                        <span class="text-red-500">Not Completed</span>
                                        @endif
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
                                        <p class="text-lg font-semibold text-gray-900">No Quiz Found</p>
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