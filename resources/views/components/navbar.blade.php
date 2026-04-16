<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>navbar</title>
    @vite('resources/css/app.css')
</head>
<body>
    <!-- 🔷 Navbar -->
    <nav class="bg-indigo-600 text-white px-6 py-4 flex justify-between items-center shadow-md">
        <div class="text-2xl font-bold">Quiz System</div>
        <div class="space-x-6">
            <a href="/dashboard" class="hover:text-gray-200">Dashboard</a>
            <a href="/admin-categories" class="hover:text-gray-200">Categories</a>
            <a href="#" class="hover:text-gray-200">Quiz</a>
            <span class="font-semibold">Welcome, {{$name}}</span>
            <a href="/admin-logout" class="bg-red-500 px-3 py-1 rounded hover:bg-red-600">Logout</a>
        </div>
    </nav>
</body>
</html>