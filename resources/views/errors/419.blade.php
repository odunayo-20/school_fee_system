<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>419 - Page Expired</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="flex items-center justify-center min-h-screen">
        <div class="text-center">
            <h1 class="font-bold text-gray-800 text-9xl">419</h1>
            <p class="mt-4 text-2xl font-semibold text-gray-600">Page Expired</p>
            <p class="mt-4 text-gray-500">Your session has expired. Please refresh and try again.</p>
            <a href="{{ url('/') }}" class="inline-block px-6 py-3 mt-8 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                Return Home
            </a>
        </div>
    </div>
</body>
</html>
