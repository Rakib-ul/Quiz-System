<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Add Category</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50 text-gray-900 font-sans antialiased min-h-screen flex flex-col">
    
    <x-navbar name="{{$name}}"></x-navbar>

    <main class="flex-grow flex items-center justify-center p-4">
        <div class="w-full max-w-md">

            @if (session('category'))
            <div class="mb-6 p-4 rounded-lg bg-green-50 border border-green-200 flex items-center shadow-sm">
                <svg class="w-5 h-5 text-green-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                <p class="text-sm font-medium text-green-800">{{ session('category') }}</p>
            </div>
            @endif

            <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-100">
                <div class="px-8 py-8">
                    
                    <div class="text-center mb-8">
                        <h2 class="text-2xl font-extrabold text-gray-900">
                            Add New Category
                        </h2>
                        <p class="text-sm text-gray-500 mt-2">
                            Create a new category for your system.
                        </p>
                    </div>

                    <form action="add-category" method="post" class="space-y-6">
                        @csrf
                        
                        <div>
                            <label for="category" class="block text-sm font-semibold text-gray-700 mb-2">
                                Category Name
                            </label>
                            <input type="text" 
                                id="category" 
                                name="category" 
                                placeholder="e.g., C++, Java, Python"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-gray-900 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors shadow-sm outline-none"
                                required>
                            
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
                            class="w-full flex justify-center items-center bg-indigo-600 text-white py-2.5 px-4 rounded-lg hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-200 transition duration-300 font-bold shadow-md">
                            <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Add Category
                        </button>

                    </form>

                </div>
            </div>

        </div>
    </main>

</body>

</html>