@extends('layouts.app')

@section('content')
    <div class="relative overflow-hidden bg-cover bg-center px-4 sm:px-0 pb-10"
        style="background-image: linear-gradient(rgba(21, 128, 61, 0.9), rgb(24, 24, 27) 90%), url(/img/bg.webp);">

        <div class="container mx-auto min-h-screen mt-30">
            <div class="text-center">
                <h1
                    class="mx-auto text-3xl py-2 font-semibold bg-gradient-to-r from-white to-white/20 w-fit bg-clip-text text-transparent">
                    หมวดหมู่สินค้า</h1>
                <p class="text-[16px] text-white/40">Category</p>
            </div>
            <div class="border border-gray-600 rounded-xl p-4 mt-10 bg-zinc-900">
                <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-2 gap-4">
                    <div class="w-full h-full">
                        <img src="{{ asset('img/val section.png') }}"
                            class="w-full h-[100px] sm:h-[200px] md:h-[300px] lg:h-[300px]  xl:h-[300px] rounded-xl object-center"
                            alt="">
                    </div>
                    <div class="w-full">
                        <h1 class="text-white text-2xl md:text-3xl font-semibold mb-2">สุ่มไอดี VALORANT</h1>
                        <p class="text-white/60 text-sm">(ID CRACK - ไม่สามารถเปลี่ยนข้อมูลได้)</p>
                    </div>
                </div>
            </div>
            <div class="container mx-auto mt-10">
                <div class="mt-2 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-6 xl:grid-cols-6    gap-2">

                    <!-- card 1 -->
                    <div
                        class="p-[1px] h-fit bg-gradient-to-t from-white/0 to-white/20 rounded-xl  cursor-pointer transform hover:translate-y-[-4px] transition duration-300">
                        <div class="p-2.5 sm:p-4 rounded-xl bg-zinc-900"
                            style="background-image: linear-gradient(60deg, rgba(0, 0, 0, 0) 40%, rgba(255, 255, 255, 0.06), rgba(0, 0, 0, 0));">
                            <img src="https://pics.rdcw.xyz/storage/6b23474b94430b7b1d20e79ff9cdf31ce6d637e6.png"
                                alt="product_image" class="rounded-lg mb-4">
                            <p class="text-white/40 text-[10px]">เหลือ 0 ชิ้น</p>
                            <h1 class="text-xl sm:text-2xl font-semibold leading-6 break-all">1-1000 SKIN</h1>
                            <h1
                                class="text-lg sm:text-xl bg-gradient-to-tr from-green-500 to-emerald-500 w-fit bg-clip-text text-transparent font-semibold">
                                10 บาท</h1>
                            <a href=""
                                class="px-6 py-2 text-center bg-white/10 rounded-lg border border-white/10 whitespace-nowrap transition ease-in hover:bg-white/20 active:scale-95 block mt-4 text-sm sm:text-base"
                                style="background-image: linear-gradient(60deg, rgba(0, 0, 0, 0) 40%, rgba(255, 255, 255, 0.1), rgba(0, 0, 0, 0));">สั่งซื้อ</a>
                        </div>
                    </div>

                    <!-- card 2 -->
                    <div
                        class="p-[1px] h-fit bg-gradient-to-t from-white/0 to-white/20 rounded-xl  cursor-pointer transform hover:translate-y-[-4px] transition duration-300">
                        <div class="p-2.5 sm:p-4 rounded-xl bg-zinc-900"
                            style="background-image: linear-gradient(60deg, rgba(0, 0, 0, 0) 40%, rgba(255, 255, 255, 0.06), rgba(0, 0, 0, 0));">
                            <img src="https://pics.rdcw.xyz/storage/6b23474b94430b7b1d20e79ff9cdf31ce6d637e6.png"
                                alt="product_image" class="rounded-lg mb-4">
                            <p class="text-white/40 text-[10px]">เหลือ 0 ชิ้น</p>
                            <h1 class="text-xl sm:text-2xl font-semibold leading-6 break-all">1-1000 SKIN</h1>
                            <h1
                                class="text-lg sm:text-xl bg-gradient-to-tr from-green-500 to-emerald-500 w-fit bg-clip-text text-transparent font-semibold">
                                10 บาท</h1>
                            <a href=""
                                class="px-6 py-2 text-center bg-white/10 rounded-lg border border-white/10 whitespace-nowrap transition ease-in hover:bg-white/20 active:scale-95 block mt-4 text-sm sm:text-base"
                                style="background-image: linear-gradient(60deg, rgba(0, 0, 0, 0) 40%, rgba(255, 255, 255, 0.1), rgba(0, 0, 0, 0));">สั่งซื้อ</a>
                        </div>
                    </div>

                    <!-- card 3 -->
                    <div
                        class="p-[1px] h-fit bg-gradient-to-t from-white/0 to-white/20 rounded-xl  cursor-pointer transform hover:translate-y-[-4px] transition duration-300">
                        <div class="p-2.5 sm:p-4 rounded-xl bg-zinc-900"
                            style="background-image: linear-gradient(60deg, rgba(0, 0, 0, 0) 40%, rgba(255, 255, 255, 0.06), rgba(0, 0, 0, 0));">
                            <img src="https://pics.rdcw.xyz/storage/6b23474b94430b7b1d20e79ff9cdf31ce6d637e6.png"
                                alt="product_image" class="rounded-lg mb-4">
                            <p class="text-white/40 text-[10px]">เหลือ 0 ชิ้น</p>
                            <h1 class="text-xl sm:text-2xl font-semibold leading-6 break-all">1-1000 SKIN</h1>
                            <h1
                                class="text-lg sm:text-xl bg-gradient-to-tr from-green-500 to-emerald-500 w-fit bg-clip-text text-transparent font-semibold">
                                10 บาท</h1>
                            <a href=""
                                class="px-6 py-2 text-center bg-white/10 rounded-lg border border-white/10 whitespace-nowrap transition ease-in hover:bg-white/20 active:scale-95 block mt-4 text-sm sm:text-base"
                                style="background-image: linear-gradient(60deg, rgba(0, 0, 0, 0) 40%, rgba(255, 255, 255, 0.1), rgba(0, 0, 0, 0));">สั่งซื้อ</a>
                        </div>
                    </div>

                    <!-- card 4 -->
                    <div
                        class="p-[1px] h-fit bg-gradient-to-t from-white/0 to-white/20 rounded-xl  cursor-pointer transform hover:translate-y-[-4px] transition duration-300">
                        <div class="p-2.5 sm:p-4 rounded-xl bg-zinc-900"
                            style="background-image: linear-gradient(60deg, rgba(0, 0, 0, 0) 40%, rgba(255, 255, 255, 0.06), rgba(0, 0, 0, 0));">
                            <img src="https://pics.rdcw.xyz/storage/6b23474b94430b7b1d20e79ff9cdf31ce6d637e6.png"
                                alt="product_image" class="rounded-lg mb-4">
                            <p class="text-white/40 text-[10px]">เหลือ 0 ชิ้น</p>
                            <h1 class="text-xl sm:text-2xl font-semibold leading-6 break-all">1-1000 SKIN</h1>
                            <h1
                                class="text-lg sm:text-xl bg-gradient-to-tr from-green-500 to-emerald-500 w-fit bg-clip-text text-transparent font-semibold">
                                10 บาท</h1>
                            <a href=""
                                class="px-6 py-2 text-center bg-white/10 rounded-lg border border-white/10 whitespace-nowrap transition ease-in hover:bg-white/20 active:scale-95 block mt-4 text-sm sm:text-base"
                                style="background-image: linear-gradient(60deg, rgba(0, 0, 0, 0) 40%, rgba(255, 255, 255, 0.1), rgba(0, 0, 0, 0));">สั่งซื้อ</a>
                        </div>
                    </div>

                    <!-- card 5 -->
                    <div
                        class="p-[1px] h-fit bg-gradient-to-t from-white/0 to-white/20 rounded-xl  cursor-pointer transform hover:translate-y-[-4px] transition duration-300">
                        <div class="p-2.5 sm:p-4 rounded-xl bg-zinc-900"
                            style="background-image: linear-gradient(60deg, rgba(0, 0, 0, 0) 40%, rgba(255, 255, 255, 0.06), rgba(0, 0, 0, 0));">
                            <img src="https://pics.rdcw.xyz/storage/6b23474b94430b7b1d20e79ff9cdf31ce6d637e6.png"
                                alt="product_image" class="rounded-lg mb-4">
                            <p class="text-white/40 text-[10px]">เหลือ 0 ชิ้น</p>
                            <h1 class="text-xl sm:text-2xl font-semibold leading-6 break-all">1-1000 SKIN</h1>
                            <h1
                                class="text-lg sm:text-xl bg-gradient-to-tr from-green-500 to-emerald-500 w-fit bg-clip-text text-transparent font-semibold">
                                10 บาท</h1>
                            <a href=""
                                class="px-6 py-2 text-center bg-white/10 rounded-lg border border-white/10 whitespace-nowrap transition ease-in hover:bg-white/20 active:scale-95 block mt-4 text-sm sm:text-base"
                                style="background-image: linear-gradient(60deg, rgba(0, 0, 0, 0) 40%, rgba(255, 255, 255, 0.1), rgba(0, 0, 0, 0));">สั่งซื้อ</a>
                        </div>
                    </div>

                    <!-- card 6 -->
                    <div
                        class="p-[1px] h-fit bg-gradient-to-t from-white/0 to-white/20 rounded-xl  cursor-pointer transform hover:translate-y-[-4px] transition duration-300">
                        <div class="p-2.5 sm:p-4 rounded-xl bg-zinc-900"
                            style="background-image: linear-gradient(60deg, rgba(0, 0, 0, 0) 40%, rgba(255, 255, 255, 0.06), rgba(0, 0, 0, 0));">
                            <img src="https://pics.rdcw.xyz/storage/6b23474b94430b7b1d20e79ff9cdf31ce6d637e6.png "
                                alt="product_image" class="rounded-lg mb-4">
                            <p class="text-white/40 text-[10px]">เหลือ 0 ชิ้น</p>
                            <h1 class="text-xl sm:text-2xl font-semibold leading-6 break-all">1-1000 SKIN</h1>
                            <h1
                                class="text-lg sm:text-xl bg-gradient-to-tr from-green-500 to-emerald-500 w-fit bg-clip-text text-transparent font-semibold">
                                10 บาท</h1>
                            <a href=""
                                class="px-6 py-2 text-center bg-white/10 rounded-lg border border-white/10 whitespace-nowrap transition ease-in hover:bg-white/20 active:scale-95 block mt-4 text-sm sm:text-base"
                                style="background-image: linear-gradient(60deg, rgba(0, 0, 0, 0) 40%, rgba(255, 255, 255, 0.1), rgba(0, 0, 0, 0));">สั่งซื้อ</a>
                        </div>
                    </div>

                    <!-- card 7 -->
                    <div
                        class="p-[1px] h-fit bg-gradient-to-t from-white/0 to-white/20 rounded-xl  cursor-pointer transform hover:translate-y-[-4px] transition duration-300">
                        <div class="p-2.5 sm:p-4 rounded-xl bg-zinc-900"
                            style="background-image: linear-gradient(60deg, rgba(0, 0, 0, 0) 40%, rgba(255, 255, 255, 0.06), rgba(0, 0, 0, 0));">
                            <img src="https://pics.rdcw.xyz/storage/6b23474b94430b7b1d20e79ff9cdf31ce6d637e6.png"
                                alt="product_image" class="rounded-lg mb-4">
                            <p class="text-white/40 text-[10px]">เหลือ 0 ชิ้น</p>
                            <h1 class="text-xl sm:text-2xl font-semibold leading-6 break-all">1-1000 SKIN</h1>
                            <h1
                                class="text-lg sm:text-xl bg-gradient-to-tr from-green-500 to-emerald-500 w-fit bg-clip-text text-transparent font-semibold">
                                10 บาท</h1>
                            <a href=""
                                class="px-6 py-2 text-center bg-white/10 rounded-lg border border-white/10 whitespace-nowrap transition ease-in hover:bg-white/20 active:scale-95 block mt-4 text-sm sm:text-base"
                                style="background-image: linear-gradient(60deg, rgba(0, 0, 0, 0) 40%, rgba(255, 255, 255, 0.1), rgba(0, 0, 0, 0));">สั่งซื้อ</a>
                        </div>
                    </div>

                    <!-- card 8 -->
                    <div
                        class="p-[1px] h-fit bg-gradient-to-t from-white/0 to-white/20 rounded-xl  cursor-pointer transform hover:translate-y-[-4px] transition duration-300">
                        <div class="p-2.5 sm:p-4 rounded-xl bg-zinc-900"
                            style="background-image: linear-gradient(60deg, rgba(0, 0, 0, 0) 40%, rgba(255, 255, 255, 0.06), rgba(0, 0, 0, 0));">
                            <img src="https://pics.rdcw.xyz/storage/6b23474b94430b7b1d20e79ff9cdf31ce6d637e6.png"
                                alt="product_image" class="rounded-lg mb-4">
                            <p class="text-white/40 text-[10px]">เหลือ 0 ชิ้น</p>
                            <h1 class="text-xl sm:text-2xl font-semibold leading-6 break-all">1-1000 SKIN</h1>
                            <h1
                                class="text-lg sm:text-xl bg-gradient-to-tr from-green-500 to-emerald-500 w-fit bg-clip-text text-transparent font-semibold">
                                10 บาท</h1>
                            <a href=""
                                class="px-6 py-2 text-center bg-white/10 rounded-lg border border-white/10 whitespace-nowrap transition ease-in hover:bg-white/20 active:scale-95 block mt-4 text-sm sm:text-base"
                                style="background-image: linear-gradient(60deg, rgba(0, 0, 0, 0) 40%, rgba(255, 255, 255, 0.1), rgba(0, 0, 0, 0));">สั่งซื้อ</a>
                        </div>
                    </div>

                    <!-- card 9 -->
                    <div
                        class="p-[1px] h-fit bg-gradient-to-t from-white/0 to-white/20 rounded-xl  cursor-pointer transform hover:translate-y-[-4px] transition duration-300">
                        <div class="p-2.5 sm:p-4 rounded-xl bg-zinc-900"
                            style="background-image: linear-gradient(60deg, rgba(0, 0, 0, 0) 40%, rgba(255, 255, 255, 0.06), rgba(0, 0, 0, 0));">
                            <img src="https://pics.rdcw.xyz/storage/6b23474b94430b7b1d20e79ff9cdf31ce6d637e6.png"
                                alt="product_image" class="rounded-lg mb-4">
                            <p class="text-white/40 text-[10px]">เหลือ 0 ชิ้น</p>
                            <h1 class="text-xl sm:text-2xl font-semibold leading-6 break-all">1-1000 SKIN</h1>
                            <h1
                                class="text-lg sm:text-xl bg-gradient-to-tr from-green-500 to-emerald-500 w-fit bg-clip-text text-transparent font-semibold">
                                10 บาท</h1>
                            <a href=""
                                class="px-6 py-2 text-center bg-white/10 rounded-lg border border-white/10 whitespace-nowrap transition ease-in hover:bg-white/20 active:scale-95 block mt-4 text-sm sm:text-base"
                                style="background-image: linear-gradient(60deg, rgba(0, 0, 0, 0) 40%, rgba(255, 255, 255, 0.1), rgba(0, 0, 0, 0));">สั่งซื้อ</a>
                        </div>
                    </div>

                    <!-- card 10 -->
                    <div
                        class="p-[1px] h-fit bg-gradient-to-t from-white/0 to-white/20 rounded-xl  cursor-pointer transform hover:translate-y-[-4px] transition duration-300">
                        <div class="p-2.5 sm:p-4 rounded-xl bg-zinc-900"
                            style="background-image: linear-gradient(60deg, rgba(0, 0, 0, 0) 40%, rgba(255, 255, 255, 0.06), rgba(0, 0, 0, 0));">
                            <img src="https://pics.rdcw.xyz/storage/6b23474b94430b7b1d20e79ff9cdf31ce6d637e6.png"
                                alt="product_image" class="rounded-lg mb-4">
                            <p class="text-white/40 text-[10px]">เหลือ 0 ชิ้น</p>
                            <h1 class="text-xl sm:text-2xl font-semibold leading-6 break-all">1-1000 SKIN</h1>
                            <h1
                                class="text-lg sm:text-xl bg-gradient-to-tr from-green-500 to-emerald-500 w-fit bg-clip-text text-transparent font-semibold">
                                10 บาท</h1>
                            <a href=""
                                class="px-6 py-2 text-center bg-white/10 rounded-lg border border-white/10 whitespace-nowrap transition ease-in hover:bg-white/20 active:scale-95 block mt-4 text-sm sm:text-base"
                                style="background-image: linear-gradient(60deg, rgba(0, 0, 0, 0) 40%, rgba(255, 255, 255, 0.1), rgba(0, 0, 0, 0));">สั่งซื้อ</a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
