<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    <x-navbar name={{$name}}> </x-navbar>

    <!-- 🔶 Dashboard Content -->
    <div class="p-6">

        <!-- Page Title -->
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Admin Dashboard</h1>

        <!-- 🔹 Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- Categories Card -->
            <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
                <h2 class="text-xl font-semibold text-gray-700 mb-2">Categories</h2>
                <p class="text-gray-500 mb-4">Manage quiz categories</p>
                <a href="/admin-categories" class="text-indigo-600 font-medium hover:underline">View Categories →</a>
            </div>

            <!-- Quiz Card -->
            <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
                <h2 class="text-xl font-semibold text-gray-700 mb-2">Quiz</h2>
                <p class="text-gray-500 mb-4">Create and manage quizzes</p>
                <a href="#" class="text-indigo-600 font-medium hover:underline">Manage Quiz →</a>
            </div>

            <!-- Users/Admin Card -->
            <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
                <h2 class="text-xl font-semibold text-gray-700 mb-2">Admins</h2>
                <p class="text-gray-500 mb-4">View and control admin users</p>
                <a href="#" class="text-indigo-600 font-medium hover:underline">Manage Admins →</a>
            </div>

        </div>

        <!-- 🔹 Extra Section -->
        <div class="mt-10 bg-white p-6 rounded-2xl shadow">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Quick Actions</h2>
            <div class="flex flex-wrap gap-4">
                <button class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">+ Add Category</button>
                <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">+ Create Quiz</button>
                <button class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">View Reports</button>
            </div>
        </div>

    </div>

</body>
</html>