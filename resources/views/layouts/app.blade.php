<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MaebShop') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav
            class="fixed z-50 h-[80px] w-full flex items-center bg-white/10 border border-white/10 sm:bg-transparent sm:border-none backdrop-blur-sm sm:backdrop-blur-0">
            <div
                class="container mx-auto max-w-1xl px-4 sm:px-0 md:px-4 lg-px-0 xl:px-4 flex items-center justify-between">
                <!-- Logo -->
                <a
                    class="flex items-center gap-2 cursor-pointer transform hover:translate-y-[-4px] transition duration-300">
                    <img src="{{ asset('img/logo.png') }}" class="w-[35px] h-[35px]" alt="">
                    <h1 class="text-white text-[24px] font-bold">MaebShop</h1>
                </a>

                <!-- Navbar Bar -->
                <div class="hidden sm:block">
                    <div class="bg-white/10 flex items-center p-1  h-[50px] rounded-full border border-white/10">
                        <div class="">
                            <a href=""
                                class="px-6 py-3 sm:py-2 rounded-full transition ease-out hover:bg-white/10 active:scale-95 bg-white/10">Home</a>
                            <a href=""
                                class="px-6 py-3 sm:py-2 rounded-full transition ease-out hover:bg-white/10 active:scale-95 ">Store</a>
                            <a href=""
                                class="px-6 py-3 sm:py-2 rounded-full transition ease-out hover:bg-white/10 active:scale-95 ">Topup</a>
                            <a href="" class="text-black font-semibold bg-white px-6 p-2 rounded-full">Join
                                Discord</a>
                        </div>
                    </div>
                </div>

                <!-- Login -->
                <div class="hidden sm:block">
                    <div class="flex items-center justify-end cursor-pointer">
                        <a class="border border-white/10 px-8 py-2 rounded-full bg-white/10 font-semibold">Login</a>
                    </div>
                </div>

                <div
                    class="block sm:hidden border border-white/10 px-4 py-3 sm:bg-transparent sm:border-none backdrop-blur-sm sm:backdrop-blur-0">
                    <button><i class="fa-solid fa-bars"></i></button>
                </div>

            </div>
        </nav>

        <main>
            @yield('content')
        </main>

        <footer class="footer sm:footer-horizontal footer-center text-base-content p-10" style="background-image: linear-gradient(rgba(21, 128, 61, 0.9), rgb(24, 24, 27) 90%), url(&quot;https://i.ibb.co/hXhg16t/image.webp&quot;);">
            <aside>
              <p>Copyright © 2025 - All right reserved by Jirasak Suktakua</p>
            </aside>
        </footer>
    </div>

</body>

</html>
