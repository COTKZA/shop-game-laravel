<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MaebShop') }}</title>

    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/png">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

    <!-- swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- alpinejs -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

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
                <a href="/"
                    class="flex items-center gap-2 cursor-pointer transform hover:translate-y-[-4px] transition duration-300">
                    <img src="{{ asset('img/logo.png') }}" class="w-[35px] h-[35px]" alt="">
                    <h1 class="text-white text-[24px] font-bold">MaebShop</h1>
                </a>

                <!-- Navbar Bar -->
                <div class="hidden sm:block">
                    <div class="bg-white/10 flex items-center p-1  h-[50px] rounded-full border border-white/10">
                        <div class="">
                            <a href="/"
                                class="px-6 py-3 sm:py-2 rounded-full transition ease-out hover:bg-white/10 active:scale-95">Home</a>
                            <a href="/store"
                                class="px-6 py-3 sm:py-2 rounded-full transition ease-out hover:bg-white/10 active:scale-95">Store</a>
                            <a href="/topup"
                                class="px-6 py-3 sm:py-2 rounded-full transition ease-out hover:bg-white/10 active:scale-95">Topup</a>
                            <a href="" class="text-black font-semibold bg-white px-6 p-2 rounded-full">
                                Join Discord</a>
                        </div>
                    </div>
                </div>

                <!-- Login -->
                @guest
                    @if (Route::has('login'))
                        <div class="hidden sm:block">
                            <div class="flex items-center justify-end cursor-pointer">
                                <a class="border border-white/10 px-8 py-2 rounded-full bg-white/10 font-semibold hover:bg-white/20"
                                    href="/login">Login</a>
                            </div>
                        </div>
                    @endif
                @else
                    <div class="hidden sm:block" x-data="{ open: false }">
                        <div class="flex items-center justify-end cursor-pointer relative">
                            <div class="flex items-center justify-center">
                                <button @click="open = !open"
                                    class="border border-white/10 px-8 py-2 md:px-3 rounded-full bg-white/10 font-semibold hover:bg-white/20 cursor-pointer"><i
                                        class="fa-solid fa-user mr-2"></i>{{ Auth::user()->name }}
                                </button>

                                <!-- Dropdown -->
                                <div x-show="open" @click.outside="open = false"
                                    class="absolute left-2 transform -translate-x-1/2 mt-[320px] w-[200px] bg-gradient-to-b from-green-500 to-gray-900 text-white rounded-xl shadow-lg p-4 z-50 transition-all duration-500">
                                    <div class="text-4xl font-bold">{{ Auth::user()->wallet->balance ?? '0.00' }}</div>
                                    <div class="text-sm mb-4">ยอดเงินคงเหลือ</div>

                                    <div class="space-y-2">
                                        <a href="/history/topup" class="flex items-center space-x-2 hover:text-green-300">
                                            <i class="fa-solid fa-clock-rotate-left"></i>
                                            <span>ประวัติการเติมเงิน</span>
                                        </a>

                                        <a href="/history/order" class="flex items-center space-x-2 hover:text-green-300">
                                            <i class="fa-solid fa-clock-rotate-left"></i>
                                            <span>ประวัติการสั่งซื้อ</span>
                                        </a>

                                        @if (Auth::check() && Auth::user()->role == 'admin')
                                            <a href="/admin/dashboard" class="flex items-center space-x-2 hover:text-green-300">
                                                <i class="fa-solid fa-user-tie"></i>
                                                <span>ระบบจัดการหลังบ้าน</span>
                                            </a>
                                        @endif

                                    </div>

                                    <div class="mt-4">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit"
                                                class="w-full bg-white/10 hover:bg-white/20 px-4 py-2 rounded-md text-center">
                                                ออกจากระบบ
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                @endguest

                <!-- ปุ่มเมนูมือถือ + Popup -->
                <div x-data="{ open: false }" class="relative z-50 block sm:hidden">
                    <!-- ปุ่มเปิดเมนู -->
                    <button @click="open = true" class="border border-white/10 px-4 py-3 backdrop-blur-sm rounded-lg">
                        <i class="fa-solid fa-bars"></i>
                    </button>

                    <!-- Popup เมนูกลางจอ -->
                    <div x-show="open" x-transition.opacity
                        class="fixed inset-0 bg-white/10 flex items-center justify-center mt-[250px] z-999"
                        @click.outside="open = false">
                        <div class="relative backdrop-blur-sm bg-white/10 p-8 shadow-lg text-center space-y-4 w-full">

                            <!-- เมนู -->
                            <a href="/"
                                class="block text-white text-xl px-2 py-2 font-semibold text-green-400">Home</a>
                            <a href="/store"
                                class="block text-white text-xl px-2 py-2 font-semibold hover:text-green-400">Store</a>
                            <a href="/topup"
                                class="block text-white text-xl px-2 py-2 font-semibold hover:text-green-400">Topup</a>
                            <a href="#"
                                class="block text-black text-xl px-2 py-2 font-semibold bg-white hover:text-green-400 rounded-full">Join
                                Discord</a>

                            <!-- ปุ่ม User + Dropdown -->
                            <div x-data="{ userOpen: false }" class="relative w-full">

                                @guest
                                    @if (Route::has('login'))
                                        <div class="mt-4 flex justify-center">
                                            <a href="/login"
                                                class="w-full text-center border border-white/10 py-2 rounded-full bg-white/10 font-semibold hover:bg-white/20">
                                                Login
                                            </a>
                                        </div>
                                    @endif
                                @else
                                    <!-- ปุ่มแสดงชื่อผู้ใช้ -->
                                    <button @click="userOpen = !userOpen"
                                        class="border border-white/10 w-full py-2 rounded-full bg-white/10 font-semibold hover:bg-white/20 cursor-pointer">
                                        <i class="fa-solid fa-user mr-2"></i>{{ Auth::user()->name }}
                                    </button>

                                    <!-- Dropdown ข้อมูลผู้ใช้ -->
                                    <div x-show="userOpen" x-transition @click.outside="userOpen = false"
                                        class="absolute left-1/2 transform -translate-x-1/2 mt-2 w-[220px] bg-gradient-to-b from-green-500 to-gray-900 text-white rounded-xl shadow-lg p-4 z-50 transition-all duration-300">

                                        <div class="text-4xl font-bold">{{ Auth::user()->wallet->balance ?? '0.00' }}</div>
                                        <div class="text-sm mb-4">ยอดเงินคงเหลือ</div>

                                        <div class="space-y-2">
                                            <a href="/history/topup"
                                                class="flex items-center space-x-2 hover:text-green-300">
                                                <i class="fa-solid fa-clock-rotate-left"></i>
                                                <span>ประวัติการเติมเงิน</span>
                                            </a>

                                            <a href="/history/order"
                                                class="flex items-center space-x-2 hover:text-green-300">
                                                <i class="fa-solid fa-clock-rotate-left"></i>
                                                <span>ประวัติการสั่งซื้อ</span>
                                            </a>

                                            @if (Auth::check() && Auth::user()->role == 'admin')
                                                <a href="/admin/dashboard"
                                                    class="flex items-center space-x-2 hover:text-green-300">
                                                    <i class="fa-solid fa-user-tie"></i>
                                                    <span>ระบบจัดการหลังบ้าน</span>
                                                </a>
                                            @endif
                                        </div>

                                        <div class="mt-4">
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <button type="submit"
                                                    class="w-full bg-white/10 hover:bg-white/20 px-4 py-2 rounded-md text-center">
                                                    ออกจากระบบ
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </nav>


        <main>
            @yield('content')
        </main>

        <footer class="footer sm:footer-horizontal footer-center text-base-content p-10"
            style="background-image: linear-gradient(rgba(21, 128, 61, 0.9), rgb(24, 24, 27) 90%), url(&quot;https://i.ibb.co/hXhg16t/image.webp&quot;);">
            <aside>
                <p>Copyright © 2025 - All right reserved by Jirasak Suktakua</p>
            </aside>
        </footer>
    </div>

</body>

</html>
