<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tyrell Test</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <!-- Page Content -->
    <div class="container mx-auto mt-6 p-4">
        @yield('content')
    </div>

    <!-- Include any JavaScript or script tags here -->
</body>

</html>
