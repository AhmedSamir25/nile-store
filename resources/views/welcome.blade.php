<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الرئيسية</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex flex-col items-center justify-center h-screen">
    <h1 class="text-3xl font-bold">Welcome</h1>

    @auth
        <p class="mt-4 text-lg">Hello, {{ Auth::user()->name }}</p>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="mt-4 bg-red-500 text-white p-2 rounded">logout</button>
        </form>
    @else
        <a href="{{ route('login') }}" class="mt-4 bg-blue-500 text-white p-2 rounded">login</a>
    @endauth
</body>
</html>
