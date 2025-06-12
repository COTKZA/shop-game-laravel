@extends('layouts.admin')
@section('content')
    <div class="container mx-auto min-h-screen">
        <div class="bg-gray-800 p-3 sm:p-4 md:p-6 rounded-xl shadow-lg">
            <!-- Date Filter Section -->
            @if (Auth::user()->role == 'admin')
                <div class="bg-gray-700 p-3 sm:p-4 mb-4 sm:mb-6 rounded-xl shadow-inner">
                    <form class="flex flex-col sm:flex-row items-start sm:items-center gap-3" method="GET"
                        action="/admin/dashboard">
                        <label class="text-gray-300 font-medium text-sm sm:text-base">เลือกวันที่:</label>
                        <div class="flex flex-1 w-full sm:w-auto items-center gap-3">
                            <input type="date" name="start_date" value="{{ request('start_date') }}"
                                class="flex-1 border border-gray-600 bg-gray-800 text-white p-2 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-sm sm:text-base">
                            <input type="date" name="end_date" value="{{ request('end_date') }}"
                                class="flex-1 border border-gray-600 bg-gray-800 text-white p-2 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-sm sm:text-base">
                            <button
                                class="bg-indigo-600 hover:bg-indigo-700 text-white px-3 py-2 sm:px-4 sm:py-2 rounded-lg transition-colors duration-200 text-sm sm:text-base whitespace-nowrap">
                                <i class="fas fa-filter mr-1 sm:mr-2"></i>กรอง
                            </button>
                        </div>
                    </form>
                </div>
            @endif

            <!-- Stats Cards Grid -->
            <div class="grid grid-cols-1 xs:grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                <!-- User Card -->
                <div
                    class="border border-gray-700 rounded-xl bg-gradient-to-br from-gray-700 to-gray-800 overflow-hidden hover:border-amber-400/50 hover:shadow-lg hover:shadow-amber-500/10 transition-all duration-300 group">
                    <div class="p-3 sm:p-4 md:p-5 flex items-center justify-between">
                        <div class="flex items-center gap-2 sm:gap-3 md:gap-4">
                            <div
                                class="bg-gray-600 p-2 sm:p-3 rounded-xl group-hover:bg-amber-500/20 transition-colors duration-300">
                                <i class="fa-solid fa-user text-xl sm:text-2xl md:text-3xl text-amber-400"></i>
                            </div>
                            <div>
                                <p class="text-gray-400 text-xs sm:text-sm">บัญชีผู้ใช้</p>
                                <p class="text-white font-semibold text-base sm:text-lg md:text-xl">{{ $user }}
                                    <span class="text-gray-400 text-xs sm:text-sm font-normal">บัญชี</span>
                                </p>
                            </div>
                        </div>
                        <i
                            class="fa-solid fa-chevron-right text-gray-500 group-hover:text-amber-400 transition-colors duration-300 text-sm"></i>
                    </div>
                </div>

                <!-- Ban User Card -->
                <div
                    class="border border-gray-700 rounded-xl bg-gradient-to-br from-gray-700 to-gray-800 overflow-hidden hover:border-orange-400/50 hover:shadow-lg hover:shadow-orange-500/10 transition-all duration-300 group">
                    <div class="p-3 sm:p-4 md:p-5 flex items-center justify-between">
                        <div class="flex items-center gap-2 sm:gap-3 md:gap-4">
                            <div
                                class="bg-gray-600 p-2 sm:p-3 rounded-xl group-hover:bg-orange-500/20 transition-colors duration-300">
                                <i class="fa-solid fa-user-slash text-xl sm:text-2xl md:text-3xl text-orange-400"></i>
                            </div>
                            <div>
                                <p class="text-gray-400 text-xs sm:text-sm">บัญชีผู้ใช้ที่ถูกแบน</p>
                                <p class="text-white font-semibold text-base sm:text-lg md:text-xl">{{ $use_ban }}
                                    <span class="text-gray-400 text-xs sm:text-sm font-normal">บัญชี</span>
                                </p>
                            </div>
                        </div>
                        <i
                            class="fa-solid fa-chevron-right text-gray-500 group-hover:text-orange-400 transition-colors duration-300 text-sm"></i>
                    </div>
                </div>

                <!-- User Wallet Card -->
                <div
                    class="border border-gray-700 rounded-xl bg-gradient-to-br from-gray-700 to-gray-800 overflow-hidden hover:border-yellow-400/50 hover:shadow-lg hover:shadow-yellow-500/10 transition-all duration-300 group">
                    <div class="p-3 sm:p-4 md:p-5 flex items-center justify-between">
                        <div class="flex items-center gap-2 sm:gap-3 md:gap-4">
                            <div
                                class="bg-gray-600 p-2 sm:p-3 rounded-xl group-hover:bg-yellow-500/20 transition-colors duration-300">
                                <i class="fa-solid fa-coins text-xl sm:text-2xl md:text-3xl text-yellow-400"></i>
                            </div>
                            <div>
                                <p class="text-gray-400 text-xs sm:text-sm">ยอดเงินในบัญชีผู้ใช้</p>
                                <p class="text-white font-semibold text-base sm:text-lg md:text-xl">{{ $user_wallet }}
                                    <span class="text-gray-400 text-xs sm:text-sm font-normal">บาท</span>
                                </p>
                            </div>
                        </div>
                        <i
                            class="fa-solid fa-chevron-right text-gray-500 group-hover:text-yellow-400 transition-colors duration-300 text-sm"></i>
                    </div>
                </div>

                <!-- Topup Amount Card -->
                <div
                    class="border border-gray-700 rounded-xl bg-gradient-to-br from-gray-700 to-gray-800 overflow-hidden hover:border-indigo-400/50 hover:shadow-lg hover:shadow-purple-500/10 transition-all duration-300 group">
                    <div class="p-3 sm:p-4 md:p-5 flex items-center justify-between">
                        <div class="flex items-center gap-2 sm:gap-3 md:gap-4">
                            <div
                                class="bg-gray-600 p-2 sm:p-3 rounded-xl group-hover:bg-indigo-500/20 transition-colors duration-300">
                                <i class="fas fa-dollar-sign text-xl sm:text-2xl md:text-3xl text-indigo-400"></i>
                            </div>
                            <div>
                                <p class="text-gray-400 text-xs sm:text-sm">ยอดเติมเงิน</p>
                                <p class="text-white font-semibold text-base sm:text-lg md:text-xl">{{ $topup_amount }}
                                    <span class="text-gray-400 text-xs sm:text-sm font-normal">บาท</span>
                                </p>
                            </div>
                        </div>
                        <i
                            class="fa-solid fa-chevron-right text-gray-500 group-hover:text-indigo-400 transition-colors duration-300 text-sm"></i>
                    </div>
                </div>

                <!-- Money Card -->
                <div
                    class="border border-gray-700 rounded-xl bg-gradient-to-br from-gray-700 to-gray-800 overflow-hidden hover:border-blue-400/50 hover:shadow-lg hover:shadow-blue-500/10 transition-all duration-300 group">
                    <div class="p-3 sm:p-4 md:p-5 flex items-center justify-between">
                        <div class="flex items-center gap-2 sm:gap-3 md:gap-4">
                            <div
                                class="bg-gray-600 p-2 sm:p-3 rounded-xl group-hover:bg-blue-500/20 transition-colors duration-300">
                                <i
                                    class="fa-solid fa-money-bill-trend-up text-xl sm:text-2xl md:text-3xl text-blue-400"></i>
                            </div>
                            <div>
                                <p class="text-gray-400 text-xs sm:text-sm">รายได้</p>
                                <p class="text-white font-semibold text-base sm:text-lg md:text-xl">{{ $income }}
                                    <span class="text-gray-400 text-xs sm:text-sm font-normal">บาท</span>
                                </p>
                            </div>
                        </div>
                        <i
                            class="fa-solid fa-chevron-right text-gray-500 group-hover:text-blue-400 transition-colors duration-300 text-sm"></i>
                    </div>
                </div>



                <!-- Categories Card -->
                <div
                    class="border border-gray-700 rounded-xl bg-gradient-to-br from-gray-700 to-gray-800 overflow-hidden hover:border-red-400/50 hover:shadow-lg hover:shadow-red-500/10 transition-all duration-300 group">
                    <div class="p-3 sm:p-4 md:p-5 flex items-center justify-between">
                        <div class="flex items-center gap-2 sm:gap-3 md:gap-4">
                            <div
                                class="bg-gray-600 p-2 sm:p-3 rounded-xl group-hover:bg-red-500/20 transition-colors duration-300">
                                <i class="fa-solid fa-list text-xl sm:text-2xl md:text-3xl text-red-400"></i>
                            </div>
                            <div>
                                <p class="text-gray-400 text-xs sm:text-sm">หมวดหมู่</p>
                                <p class="text-white font-semibold text-base sm:text-lg md:text-xl">{{ $category }}
                                    <span class="text-gray-400 text-xs sm:text-sm font-normal">หมวดหมู่</span>
                                </p>
                            </div>
                        </div>
                        <i
                            class="fa-solid fa-chevron-right text-gray-500 group-hover:text-red-400 transition-colors duration-300 text-sm"></i>
                    </div>
                </div>

                <!-- Products Card -->
                <div
                    class="border border-gray-700 rounded-xl bg-gradient-to-br from-gray-700 to-gray-800 overflow-hidden hover:border-green-400/50 hover:shadow-lg hover:shadow-green-500/10 transition-all duration-300 group">
                    <div class="p-3 sm:p-4 md:p-5 flex items-center justify-between">
                        <div class="flex items-center gap-2 sm:gap-3 md:gap-4">
                            <div
                                class="bg-gray-600 p-2 sm:p-3 rounded-xl group-hover:bg-green-500/20 transition-colors duration-300">
                                <i class="fa-solid fa-store text-xl sm:text-2xl md:text-3xl text-green-400"></i>
                            </div>
                            <div>
                                <p class="text-gray-400 text-xs sm:text-sm">สินค้า</p>
                                <p class="text-white font-semibold text-base sm:text-lg md:text-xl">{{ $product }}
                                    <span class="text-gray-400 text-xs sm:text-sm font-normal">สินค้า</span>
                                </p>
                            </div>
                        </div>
                        <i
                            class="fa-solid fa-chevron-right text-gray-500 group-hover:text-green-400 transition-colors duration-300 text-sm"></i>
                    </div>
                </div>

                <!-- Stock Product Card -->
                <div
                    class="border border-gray-700 rounded-xl bg-gradient-to-br from-gray-700 to-gray-800 overflow-hidden hover:border-pink-400/50 hover:shadow-lg hover:shadow-pink-500/10 transition-all duration-300 group">
                    <div class="p-3 sm:p-4 md:p-5 flex items-center justify-between">
                        <div class="flex items-center gap-2 sm:gap-3 md:gap-4">
                            <div
                                class="bg-gray-600 p-2 sm:p-3 rounded-xl group-hover:bg-pink-500/20 transition-colors duration-300">
                                <i class="fa-solid fa-boxes-stacked  text-xl sm:text-2xl md:text-3xl text-pink-400"></i>
                            </div>
                            <div>
                                <p class="text-gray-400 text-xs sm:text-sm">สินค้าในสต็อก</p>
                                <p class="text-white font-semibold text-base sm:text-lg md:text-xl">
                                    {{ $product_available }} <span
                                        class="text-gray-400 text-xs sm:text-sm font-normal">ชิ้น</span></p>
                            </div>
                        </div>
                        <i
                            class="fa-solid fa-chevron-right text-gray-500 group-hover:text-pink-400 transition-colors duration-300 text-sm"></i>
                    </div>
                </div>

                <!-- Sold Stock Product Card -->
                <div
                    class="border border-gray-700 rounded-xl bg-gradient-to-br from-gray-700 to-gray-800 overflow-hidden hover:border-purple-400/50 hover:shadow-lg hover:shadow-purple-500/10 transition-all duration-300 group">
                    <div class="p-3 sm:p-4 md:p-5 flex items-center justify-between">
                        <div class="flex items-center gap-2 sm:gap-3 md:gap-4">
                            <div
                                class="bg-gray-600 p-2 sm:p-3 rounded-xl group-hover:bg-purple-500/20 transition-colors duration-300">
                                <i class="fas fa-check  text-xl sm:text-2xl md:text-3xl text-purple-400"></i>
                            </div>
                            <div>
                                <p class="text-gray-400 text-xs sm:text-sm">สินค้าที่ขาย</p>
                                <p class="text-white font-semibold text-base sm:text-lg md:text-xl">{{ $product_sold }}
                                    <span class="text-gray-400 text-xs sm:text-sm font-normal">ชิ้น</span>
                                </p>
                            </div>
                        </div>
                        <i
                            class="fa-solid fa-chevron-right text-gray-500 group-hover:text-purple-400 transition-colors duration-300 text-sm"></i>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
