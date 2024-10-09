
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SalonEase - Salon Booking System</title>
    <!-- Include Tailwind CSS -->
    @vite('resources/css/app.css')
    <style>
        .background-image {
            background-image: url('/images/salon4.jpg'); /* Ensure the path to the image is correct */
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="background-image flex items-center justify-center h-screen text-white">
    <div class="w-full max-w-screen-lg text-center bg-black bg-opacity-50 p-10 rounded-lg">
        <!-- Heading -->
        <h1 class="text-5xl font-extrabold mb-6">Welcome to <span class="text-blue-400">SalonEase</span></h1>
        
        <!-- Button Section -->
        <div class="space-x-4">
            <!-- Login Button -->
            <a href="{{ route('login') }}" class="bg-blue-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-600 transition duration-300 ease-in-out">Login</a>

            <!-- Register Button -->
            <a href="{{ route('register') }}" class="bg-green-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-600 transition duration-300 ease-in-out">Register</a>
        </div>
    </div>
</body>
</html>
