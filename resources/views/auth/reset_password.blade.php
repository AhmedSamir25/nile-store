<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nile store</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-6 rounded shadow-md w-96">
        <h2 class="text-2xl font-bold mb-4">reset password</h2>

        @if (session('success'))
            <div class="mb-4 p-2 bg-green-100 border border-green-400 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="mb-4 p-2 bg-red-100 border border-red-400 text-red-700 rounded">
                {{ session('error') }}
            </div>
        @endif  

        <form action="{{ route('reset.password') }}" method="POST">
            @csrf
            <p class="mb-2 text-gray-700"><strong>email:</strong> {{ session('reset_email') }}</p>

            <input type="text" name="code" placeholder="code" class="w-full p-2 mb-2 border rounded" required>
            <input type="password" name="password" placeholder="new password" class="w-full p-2 mb-2 border rounded" required>
            <input type="password" name="password_confirmation" placeholder="password confirm" class="w-full p-2 mb-2 border rounded" required>

            <button type="submit" class="w-full bg-black text-white p-2 mt-4 rounded">reset password</button>
        </form>
    </div>
</body>
</html>
