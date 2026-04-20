<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Navbar</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 text-gray-900 font-sans antialiased min-h-screen">

    <nav class="bg-white border-b border-gray-200 sticky top-0 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                
                <div class="flex items-center gap-8">
                    <a href="/" class="flex items-center gap-2 group focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 rounded-md">
                        <div class="bg-indigo-600 text-white p-1.5 rounded-lg group-hover:bg-indigo-700 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <span class="text-xl font-extrabold text-gray-900 tracking-tight">QuizSystem</span>
                    </a>

                    <div class="hidden md:flex items-center space-x-1">
                        <a href="/" class="px-3 py-2 rounded-md text-sm font-medium text-indigo-700 bg-indigo-50 hover:bg-indigo-100 transition-colors">Home</a>
                        <a href="/" class="px-3 py-2 rounded-md text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50 transition-colors">Categories</a>
                        <a href="/" class="px-3 py-2 rounded-md text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50 transition-colors">Blog</a>
                    </div>
                </div>

                <div class="hidden md:flex items-center space-x-4">
                    <span class="text-sm font-medium text-gray-500">Welcome back</span>
                    <a href="" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg text-white bg-indigo-600 hover:bg-indigo-700 shadow-sm transition-all focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 active:scale-95">
                        Login
                    </a>
                </div>

                <div class="flex md:hidden">
                    <button type="button" id="mobile-menu-button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="block h-6 w-6 menu-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg class="hidden h-6 w-6 close-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div class="md:hidden hidden border-t border-gray-200 bg-white" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="/dashboard" class="block px-3 py-2 rounded-md text-base font-medium text-indigo-700 bg-indigo-50">Home</a>
                <a href="/admin-categories" class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50">Categories</a>
                <a href="/add-quiz" class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50">Blog</a>
            </div>
            <div class="pt-4 pb-3 border-t border-gray-200">
                <div class="px-4 flex items-center justify-between">
                    <div class="text-base font-medium text-gray-800">Welcome back</div>
                    <a href="/admin-logout" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg text-white bg-indigo-600 hover:bg-indigo-700 shadow-sm transition-all focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Login
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const btn = document.getElementById('mobile-menu-button');
            const menu = document.getElementById('mobile-menu');
            const menuIcon = btn.querySelector('.menu-icon');
            const closeIcon = btn.querySelector('.close-icon');

            btn.addEventListener('click', () => {
                const isExpanded = btn.getAttribute('aria-expanded') === 'true';
                btn.setAttribute('aria-expanded', !isExpanded);
                menu.classList.toggle('hidden');
                menuIcon.classList.toggle('hidden');
                closeIcon.classList.toggle('hidden');
            });
        });
    </script>
</body>
</html>