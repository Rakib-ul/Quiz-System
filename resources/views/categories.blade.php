<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Categories</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50 text-gray-900 font-sans antialiased min-h-screen flex flex-col">

    <x-navbar name="{{$name}}"></x-navbar>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 w-full flex-grow">
        
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 tracking-tight">Manage Categories</h1>
            <p class="mt-2 text-sm text-gray-600">Create new categories and manage existing ones for your system.</p>
        </div>

        @if (session('category'))
            <div class="mb-6 p-4 rounded-lg bg-green-50 border border-green-200 flex items-center shadow-sm w-full animate-fade-in-down">
                <svg class="w-5 h-5 text-green-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                <p class="text-sm font-medium text-green-800">{{ session('category') }}</p>
            </div>
        @endif

        <div class="lg:grid lg:grid-cols-12 lg:gap-8 items-start">
            
            <div class="lg:col-span-4 mb-8 lg:mb-0">
                <div class="bg-white shadow-sm ring-1 ring-gray-200 rounded-2xl overflow-hidden sticky top-6">
                    <div class="px-6 py-6 sm:p-8">
                        
                        <div class="mb-6">
                            <h2 class="text-xl font-bold text-gray-900">Add New Category</h2>
                            <p class="text-sm text-gray-500 mt-1">Fill in the details below.</p>
                        </div>

                        <form action="add-category" method="POST" class="space-y-5">
                            @csrf

                            <div>
                                <label for="category" class="block text-sm font-semibold text-gray-700 mb-1.5">
                                    Category Name <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="category" name="category" placeholder="e.g., Web Development"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-gray-900 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors shadow-sm outline-none sm:text-sm"
                                    value="{{ old('category') }}">

                                @error('category')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <button type="submit"
                                class="w-full flex justify-center items-center bg-indigo-600 text-white py-2.5 px-4 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200 font-semibold shadow-sm text-sm">
                                <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Add Category
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-8">
                <div class="bg-white shadow-sm ring-1 ring-gray-200 rounded-2xl overflow-hidden">
                    
                    <div class="px-6 py-5 border-b border-gray-100 bg-gray-50 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
                        <h3 class="text-lg font-bold text-gray-900">Category List</h3>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-indigo-100 text-indigo-800">
                            Total Categories: {{ $categories->count() }}
                        </span>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full whitespace-nowrap text-left text-sm text-gray-600">
                            <thead class="bg-white border-b border-gray-200 text-gray-500 uppercase text-xs font-semibold tracking-wider">
                                <tr>
                                    <th scope="col" class="px-6 py-4">ID</th>
                                    <th scope="col" class="px-6 py-4">Category Name</th>
                                    <th scope="col" class="px-6 py-4">Created By</th>
                                    <th scope="col" class="px-6 py-4 text-right">Actions</th>
                                </tr>
                            </thead>
                            
                            <tbody class="divide-y divide-gray-100 bg-white">
                                @forelse ($categories as $category)
                                    <tr class="hover:bg-gray-50/80 transition-colors duration-200 group">
                                        
                                        <td class="px-6 py-4 text-gray-500 font-medium">
                                            #{{ $category->id }}
                                        </td>
                                        
                                        <td class="px-6 py-4 text-gray-900 font-bold">
                                            {{ $category->name }}
                                        </td>
                                        
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                <div class="h-8 w-8 rounded-full bg-indigo-50 text-indigo-600 border border-indigo-100 flex items-center justify-center font-bold mr-3 shadow-sm">
                                                    {{ strtoupper(substr($category->creator, 0, 1)) }}
                                                </div>
                                                <span class="font-medium text-gray-700">{{ $category->creator }}</span>
                                            </div>
                                        </td>
                                        
                                        <td class="px-6 py-4 text-right">
                                            <div class="flex items-center justify-end space-x-2">
                                                <a href="quiz-list/{{ $category->id }}/{{ $category->name }}" 
                                                   class="p-2 text-indigo-600 hover:text-indigo-900 bg-indigo-50 hover:bg-indigo-100 rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                                   title="View Quizzes">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                    </svg>
                                                </a>

                                                <form action="category/delete/{{ $category->id }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category? This action cannot be undone.');" class="inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="p-2 text-red-600 hover:text-red-900 bg-red-50 hover:bg-red-100 rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-red-500"
                                                            title="Delete Category">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-16 text-center text-gray-500">
                                            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 mb-4">
                                                <svg class="h-8 w-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                                </svg>
                                            </div>
                                            <p class="text-lg font-semibold text-gray-900">No categories found</p>
                                            <p class="text-sm mt-1 text-gray-500">Get started by creating a new category using the form.</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </main>

</body>
</html>