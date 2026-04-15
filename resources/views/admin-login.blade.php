<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-r from-blue-500 to-indigo-600 flex items-center justify-center min-h-screen">

    <div class="bg-white shadow-2xl rounded-2xl p-8 w-full max-w-md">
        
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">
            Admin Login
        </h2>

        
        <form action="admin-login" method="post" class="space-y-5">
        @csrf
        <div>
            @error('user')
                <div class=" text-red-600">{{$message}}</div>
            @enderror
        </div>
            <div>
                <label class=" text-gray-700 mb-1">Admin Name</label>
                <input 
                    type="text" 
                    name="name"
                    placeholder="Enter Admin Name"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none"
                    required
                >
                @error('name')
                <div class=" text-red-600">{{$message}}</div>
                @enderror
            </div>

            <div>
                <label class=" text-gray-700 mb-1">Email</label>
                <input 
                    type="email" 
                    name="email"
                    placeholder="Enter Admin Email"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none"
                    
                >
                @error('email')
                <div class=" text-red-600">{{$message}}</div>
                @enderror
            </div>

            <div>
                <label class=" text-gray-700 mb-1">Password</label>
                <input 
                    type="password" 
                    name="password"
                    placeholder="Enter Admin Password"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none"
                    
                >
                @error('password')
                <div class=" text-red-600">{{$message}}</div>
                @enderror
            </div>

            <button 
                type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-300 font-semibold"
            >
                Login
            </button>

        </form>

    </div>

</body>
</html>