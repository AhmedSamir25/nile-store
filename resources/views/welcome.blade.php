<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الرئيسية</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Stencil:opsz,wght@10..72,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body >
    <div class="navbar bg-base-70 shadow-sm  flex justify-between items-center px-4">
        <div class="flex-1 space-x-4">
            <a class="btn btn-ghost text-xl">Nile Store</a>
            <a class="link link-hover">Shop</a>
            <a class="link link-hover">On Sale</a>
            <a class="link link-hover">New Arrivals</a>
            <a class="link link-hover">Brands</a>
        </div>
        <label class="input">
            <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none" stroke="currentColor"><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.3-4.3"></path></g></svg>
            <input type="search" required placeholder="Search"/>
          </label>
        <div class="flex items-center space-x-4">
            <div class="p-6">
                @auth
                    <div class="dropdown dropdown-end">
                        <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                            <div class="indicator">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <span class="badge badge-sm indicator-item">7</span>
                            </div>
                        </div>
                        <div tabindex="0" class="dropdown-content card card-compact bg-base-100 mt-3 w-52 shadow">
                            <div class="card-body">
                                <span class="text-lg font-bold">7 Items</span>
                                <span class="text-info">Subtotal: $999</span>
                                <div class="card-actions">
                                    <button class="btn btn-primary btn-block">View cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown dropdown-end">
                        <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                            <div class="w-10 rounded-full">
                                <img alt="User Avatar"
                                    src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" />
                            </div>
                        </div>
                        <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box mt-3 w-52 p-2 shadow">
                            <li>
                                <a class="justify-between">
                                    Profile
                                    <span class="badge">New</span>
                                </a>
                            </li>
                            <li><a>Settings</a></li>
                            <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="mt-3 ml-2 bg-red-500 text-white p-1 rounded">Logout</button>
                    </form>
                        </ul>
                    </div>
                    
                @else
                    <a href="{{ route('login') }}" class="mt-4 bg-blue-500 text-white p-2 rounded">Login</a>
                @endauth
            </div>
        </div>
    </div>
    <div class="bg-sky-800 max-h-full flex justify-center items-center p-9">
        <div class="w-2/6 text-center space-y-4">
            <h1 class="text-6xl" style="font-family: 'Roboto'">FIND CLOTHES THAT MATCHES YOUR STYLE</h1>
            <p class="text-[18px]" style="font-family: Kanit">FIND CLOTHES THAT MATCHES YOUR STYLE</p>
            <button class="btn bg-white text-black">Default</button>
            <div class="">
                <a>200</a>
                <a>200</a>
                <a>200</a>
                <a>200</a>
            </div>
        </div>
        <img src="https://www.pngall.com/wp-content/uploads/2016/04/Girl-PNG-HD.png" class="w-1/4 max-w-xs ml-40">
    </div>
    
</body>
</html>
