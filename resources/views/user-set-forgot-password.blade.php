<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create an Account | QuizSystem</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 font-sans antialiased min-h-screen flex flex-col">

    <x-user-nav-bar></x-user-nav-bar>

    <main class="flex-grow flex items-center justify-center p-4 sm:p-6">
        
        <div class="bg-white shadow-xl ring-1 ring-gray-200 rounded-2xl p-8 w-full max-w-md">
            
            <div class="text-center mb-8">
                <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">
                    User Set Password
                </h2>
                
            </div>

            <form action="/verify-set-forgot-password" method="post" class="space-y-5">
                @csrf

                @error('user')
                    <div class="p-3 bg-red-50 border border-red-200 rounded-lg flex items-center mb-4">
                        <svg class="w-5 h-5 text-red-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                        <p class="text-sm font-medium text-red-800">{{ $message }}</p>
                    </div>
                @enderror

                

                <div>
                    
                    <input 
                        type="hidden" 
                        id="email"
                        name="email"
                        value="{{ $email }}"
                        class="w-full px-4 py-2.5 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-colors sm:text-sm @error('email') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
                        
                    >
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input 
                        type="password" 
                        id="password"
                        name="password"
                        placeholder=""
                        class="w-full px-4 py-2.5 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-colors sm:text-sm @error('password') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
                        
                    >
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                    <input 
                        type="password" 
                        id="password"
                        name="password_confirmation"
                        placeholder=""
                        class="w-full px-4 py-2.5 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-colors sm:text-sm @error('password') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
                        
                    >
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <button 
                    type="submit"
                    class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-lg shadow-sm text-sm font-bold text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors mt-2"
                >
                    Reset Password
                </button>

            </form>

            

        </div>
    </main>

</body>
</html>