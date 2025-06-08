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

<body class="">
    <div id="app" >

        <div class="flex bg-slate-800" >
            <!-- Mobile menu button -->
            <button id="sidebarToggle" class="md:hidden fixed top-4 left-4 z-50 p-2 rounded-md bg-white shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <!-- Backdrop (mobile only) -->
            <div id="backdrop"
                class="backdrop fixed inset-0 bg-black bg-opacity-50 z-40 opacity-0 pointer-events-none md:hidden">
            </div>

            <!-- Sidebar -->
            <div id="sidebar"
                class="sidebar-mobile sidebar-transition fixed md:relative z-50  w-[20rem] bg-slate-900 shadow-xl md:shadow-none hidden lg:block">
                <div class="relative flex h-full w-full flex-col rounded-xl bg-slate-900 bg-clip-border p-4 text-gray-100">
                    <div class="p-4 mb-2">
                        <h5
                            class="block font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900 text-center">
                            Admin System
                        </h5>
                    </div>
                    <nav
                        class="flex bordershadow-xl flex-col gap-1 p-2 font-sans text-base font-normal text-blue-gray-700 h-screen">

                        <!-- Account Setting -->
                        <div class="relative block w-full font-sans">
                            <button type="button"
                                class="account-toggle flex items-center justify-between w-full p-3 text-xl font-semibold text-left text-blue-gray-700 rounded-lg transition-all hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900"
                                aria-expanded="false" data-initial-state="closed">
                                <div class="flex items-center">
                                    <div class="grid mr-4 place-items-center">
                                        <i class="fa-solid fa-users-gear"></i>
                                    </div>
                                    <p class="block text-base font-normal text-blue-gray-900">
                                        Account Setting
                                    </p>
                                </div>
                                <span class="account-arrow ml-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2.5" stroke="currentColor" aria-hidden="true"
                                        class="w-4 h-4 mx-auto transition-transform">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 8.25l-7.5 7.5-7.5-7.5"></path>
                                    </svg>
                                </span>
                            </button>
                            <div class="account-menu overflow-hidden max-h-0 transition-all duration-300 ease-in-out">
                                <div class="block w-full py-1 text-sm font-light text-gray-700">
                                    <nav
                                        class="flex min-w-[240px] flex-col gap-1 p-0 text-base font-normal text-gray-100">
                                        <div role="button"
                                            class="flex items-center w-full p-3 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                            <div class="grid mr-4 place-items-center text-gary-100">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="3" stroke="currentColor"
                                                    aria-hidden="true" class="w-5 h-3">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                                </svg>
                                            </div>
                                            <div class="flex items-center gap-2 text-gary-100">
                                                <a href="/admin/accounts">
                                                    Account
                                                </a>
                                            </div>
                                            </div>
                                            <div role="button"
                                                class="flex items-center w-full p-3 leading-tight transition-all  rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                            <div class="grid mr-4 place-items-center text-gary-100">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="3" stroke="currentColor"
                                                    aria-hidden="true" class="w-5 h-3">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                                </svg>
                                            </div>
                                            <div class="flex items-center gap-2 text-gary-100">
                                                <a href="/admin/wallets">
                                                    Wallet</a>
                                            </div>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>

                        <!-- E-Commerce Section -->
                        <div class="relative block w-full font-sans">
                            <button type="button"
                                class="ecommerce-toggle flex items-center justify-between w-full p-3 text-xl font-semibold text-left text-blue-gray-700 rounded-lg transition-all hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900"
                                aria-expanded="false" data-initial-state="closed">
                                <div class="flex items-center">
                                    <div class="grid mr-4 place-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            aria-hidden="true" class="w-5 h-5">
                                            <path fill-rule="evenodd"
                                                d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 004.25 22.5h15.5a1.875 1.875 0 001.865-2.071l-1.263-12a1.875 1.875 0 00-1.865-1.679H16.5V6a4.5 4.5 0 10-9 0zM12 3a3 3 0 00-3 3v.75h6V6a3 3 0 00-3-3zm-3 8.25a3 3 0 106 0v-.75a.75.75 0 011.5 0v.75a4.5 4.5 0 11-9 0v-.75a.75.75 0 011.5 0v.75z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <p class="block text-base font-normal text-blue-gray-900">
                                        E-Commerce
                                    </p>
                                </div>
                                <span class="ecommerce-arrow ml-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2.5" stroke="currentColor" aria-hidden="true"
                                        class="w-4 h-4 mx-auto transition-transform">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 8.25l-7.5 7.5-7.5-7.5"></path>
                                    </svg>
                                </span>
                            </button>
                            <div
                                class="ecommerce-menu overflow-hidden max-h-0 transition-all duration-300 ease-in-out">
                                <div class="block w-full py-1 text-sm font-light text-gray-700">
                                    <nav
                                        class="flex min-w-[240px] flex-col gap-1 p-0 text-base font-normal text-gray-100">
                                        <div role="button"
                                            class="flex items-center w-full p-3 leading-tight transition-all rounded-lg outline-none text-gary-100 text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                            <div class="grid mr-4 place-items-center text-gary-100">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="3" stroke="currentColor"
                                                    aria-hidden="true" class="w-5 h-3">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                                </svg>
                                            </div>
                                            <a href="/admin/categories">Categories</a>
                                        </div>
                                        <div role="button"
                                            class="flex items-center w-full p-3 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                            <div class="grid mr-4 place-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="3" stroke="currentColor"
                                                    aria-hidden="true" class="w-5 h-3">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                                </svg>
                                            </div>
                                            <a href="/admin/product">Products</a>

                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>

                        <div class="relative block w-full font-sans">
                            <button type="button"
                                class="setting-toggle flex items-center justify-between w-full p-3 text-xl font-semibold text-left text-blue-gray-700 rounded-lg transition-all hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900"
                                aria-expanded="false" data-initial-state="closed">
                                <div class="flex items-center">
                                    <div class="grid mr-4 place-items-center">
                                        <i class="fa-solid fa-gear"></i>
                                    </div>
                                    <p class="block text-base font-normal text-blue-gray-900">
                                        Setting-Web
                                    </p>
                                </div>
                                <span class="setting-arrow ml-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2.5" stroke="currentColor" aria-hidden="true"
                                        class="w-4 h-4 mx-auto transition-transform">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 8.25l-7.5 7.5-7.5-7.5"></path>
                                    </svg>
                                </span>
                            </button>
                            <div class="setting-menu overflow-hidden max-h-0 transition-all duration-300 ease-in-out">
                                <div class="block w-full py-1 text-sm font-light text-gray-700">
                                    <nav
                                        class="flex min-w-[240px] flex-col gap-1 p-0 text-base font-normal text-gray-100">
                                        <div role="button"
                                            class="flex items-center w-full p-3 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                            <div class="grid mr-4 place-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="3" stroke="currentColor"
                                                    aria-hidden="true" class="w-5 h-3">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                                </svg>
                                            </div>
                                            <a href="/admin/notify" >Notify</a>
                                        </div>
                                        <div role="button"
                                            class="flex items-center w-full p-3 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                            <div class="grid mr-4 place-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="3" stroke="currentColor"
                                                    aria-hidden="true" class="w-5 h-3">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                                </svg>
                                            </div>
                                            <a href="">Products</a>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>

                        <hr class="my-2 border-blue-gray-50" />

                        <!-- Other Menu Items -->
                        <div role="button"
                            class="flex items-center w-full p-3 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                            <div class="grid mr-4 place-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    aria-hidden="true" class="w-5 h-5">
                                    <path fill-rule="evenodd"
                                        d="M6.912 3a3 3 0 00-2.868 2.118l-2.411 7.838a3 3 0 00-.133.882V18a3 3 0 003 3h15a3 3 0 003-3v-4.162c0-.299-.045-.596-.133-.882l-2.412-7.838A3 3 0 0017.088 3H6.912zm13.823 9.75l-2.213-7.191A1.5 1.5 0 0017.088 4.5H6.912a1.5 1.5 0 00-1.434 1.059L3.265 12.75H6.11a3 3 0 012.684 1.658l.256.513a1.5 1.5 0 001.342.829h3.218a1.5 1.5 0 001.342-.83l.256-.512a3 3 0 012.684-1.658h2.844z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            Inbox
                            <div class="grid ml-auto place-items-center justify-self-end">
                                <div
                                    class="relative grid items-center px-2 py-1 font-sans text-xs font-bold uppercase rounded-full select-none whitespace-nowrap bg-blue-gray-500/20 text-blue-gray-900">
                                    <span class="">14</span>
                                </div>
                            </div>
                        </div>
                        <div role="button"
                            class="flex items-center w-full p-3 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                            <div class="grid mr-4 place-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    aria-hidden="true" class="w-5 h-5">
                                    <path fill-rule="evenodd"
                                        d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            Profile
                        </div>
                        <div role="button"
                            class="flex items-center w-full p-3 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                            <div class="grid mr-4 place-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    aria-hidden="true" class="w-5 h-5">
                                    <path fill-rule="evenodd"
                                        d="M11.078 2.25c-.917 0-1.699.663-1.85 1.567L9.05 4.889c-.02.12-.115.26-.297.348a7.493 7.493 0 00-.986.57c-.166.115-.334.126-.45.083L6.3 5.508a1.875 1.875 0 00-2.282.819l-.922 1.597a1.875 1.875 0 00.432 2.385l.84.692c.095.078.17.229.154.43a7.598 7.598 0 000 1.139c.015.2-.059.352-.153.43l-.841.692a1.875 1.875 0 00-.432 2.385l.922 1.597a1.875 1.875 0 002.282.818l1.019-.382c.115-.043.283-.031.45.082.312.214.641.405.985.57.182.088.277.228.297.35l.178 1.071c.151.904.933 1.567 1.85 1.567h1.844c.916 0 1.699-.663 1.85-1.567l.178-1.072c.02-.12.114-.26.297-.349.344-.165.673-.356.985-.57.167-.114.335-.125.45-.082l1.02.382a1.875 1.875 0 002.28-.819l.923-1.597a1.875 1.875 0 00-.432-2.385l-.84-.692c-.095-.078-.17-.229-.154-.43a7.614 7.614 0 000-1.139c-.016-.2.059-.352.153-.43l.84-.692c.708-.582.891-1.59.433-2.385l-.922-1.597a1.875 1.875 0 00-2.282-.818l-1.02.382c-.114.043-.282.031-.449-.083a7.49 7.49 0 00-.985-.57c-.183-.087-.277-.227-.297-.348l-.179-1.072a1.875 1.875 0 00-1.85-1.567h-1.843zM12 15.75a3.75 3.75 0 100-7.5 3.75 3.75 0 000 7.5z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            Settings
                        </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="flex items-center w-full p-3 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900">
                                <div class="grid mr-4 place-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        aria-hidden="true" class="w-5 h-5">
                                        <path fill-rule="evenodd"
                                            d="M12 2.25a.75.75 0 01.75.75v9a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM6.166 5.106a.75.75 0 010 1.06 8.25 8.25 0 1011.668 0 .75.75 0 111.06-1.06c3.808 3.807 3.808 9.98 0 13.788-3.807 3.808-9.98 3.808-13.788 0-3.808-3.807-3.808-9.98 0-13.788a.75.75 0 011.06 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                Log Out
                            </button>
                        </form>
                    </nav>
                </div>
            </div>

            <!-- Main Content -->

            <main class="p-1 bg-slate-800 md:p-8 w-full">
                @yield('content')
            </main>

        </div>

        <script>
            // Menu toggle function
            function setupToggleMenu(menuClass) {
                const toggle = document.querySelector(`.${menuClass}-toggle`);
                const menu = document.querySelector(`.${menuClass}-menu`);
                const arrow = document.querySelector(`.${menuClass}-arrow svg`);

                // Check if elements exist
                if (!toggle || !menu || !arrow) {
                    console.warn(
                        `Warning: Missing elements for ${menuClass} menu. Toggle: ${!!toggle}, Menu: ${!!menu}, Arrow: ${!!arrow}`
                    );
                    return;
                }

                // Set initial state from data attribute or default to closed
                const isInitiallyOpen = toggle.dataset.initialState === 'open';
                menu.classList.toggle('max-h-0', !isInitiallyOpen);
                arrow.classList.toggle('rotate-180', isInitiallyOpen);

                // Add event listener for toggle
                toggle.addEventListener('click', () => {
                    const isOpen = menu.classList.contains('max-h-0');
                    menu.classList.toggle('max-h-0', !isOpen);
                    arrow.classList.toggle('rotate-180', isOpen);

                    toggle.setAttribute('aria-expanded', isOpen);
                });

                toggle.setAttribute('aria-expanded', isInitiallyOpen);
            }

            // Initialize on DOM load
            document.addEventListener('DOMContentLoaded', () => {
                setupToggleMenu('ecommerce');
                setupToggleMenu('setting');
                setupToggleMenu('account');
            });

            document.addEventListener('DOMContentLoaded', function() {
                const sidebar = document.getElementById('sidebar');
                const sidebarToggle = document.getElementById('sidebarToggle');
                const backdrop = document.getElementById('backdrop');

                // Mobile sidebar toggle
                sidebarToggle.addEventListener('click', function() {
                    sidebar.classList.toggle('open');
                    backdrop.classList.toggle('opacity-0');
                    backdrop.classList.toggle('pointer-events-none');
                });

                // Backdrop click (close sidebar)
                backdrop.addEventListener('click', function() {
                    sidebar.classList.remove('open');
                    backdrop.classList.add('opacity-0');
                    backdrop.classList.add('pointer-events-none');
                });

                // Close sidebar when a menu item is clicked (mobile only)
                const menuItems = document.querySelectorAll('nav > div:not(.relative)');
                menuItems.forEach(item => {
                    item.addEventListener('click', function() {
                        if (window.innerWidth < 768) {
                            sidebar.classList.remove('open');
                            backdrop.classList.add('opacity-0');
                            backdrop.classList.add('pointer-events-none');
                        }
                    });
                });
            });
        </script>

    </div>

</body>

</html>
