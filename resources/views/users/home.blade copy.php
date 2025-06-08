@extends('layouts.app')

@section('content')
    <div class="relative overflow-hidden bg-cover bg-center px-4 sm:px-0"
        style="background-image: linear-gradient(rgba(21, 128, 61, 0.9), rgb(24, 24, 27) 90%), url(/img/bg.webp);">

        <div class="container mx-auto mt-30 md:px-4">
            <div class="container mx-auto">
                <!-- image show -->
                <div>
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide"><img src="/img/Full-Set.png" alt="Image 1"></div>
                            <div class="swiper-slide"><img src="/img/NFA.png" alt="Image 2"></div>
                            <div class="swiper-slide"><img src="/img/Full-Set.png" alt="Image 3"></div>
                            <div class="swiper-slide"><img src="/img/NFA.png" alt="Image 4 "></div>
                        </div>
                    </div>
                </div>
                <!-- image show -->
                <div class="flex justify-between mt-5">
                    <div class="w-full md:max-w-[50%]">
                        <h1 class="text-[96px] font-bold">Maeb Shop</h1>
                        <p class="text-[20px]">รหัส Valorant และ Roblox มีสินค้าให้เลือกมากมาย คุณภาพสูงที่สุด
                            สินค้าที่ซื้อไปรับประกันเข้าได้ 100% ด้วยประสบการณ์ที่ทำมาหลายปี และราคาถูก ปลอดภัย
                            บริการง่ายและไว
                            ช่วยเหลือ 24ชม. - ติดต่อได้ที่ Discord: https://discord.gg/TfX7KH3UK7
                        </p>
                        <button
                            class="border border-white p-2 rounded-lg mt-2 hover:bg-white hover:text-black text-[16px]">สั่งซื้อเลย</button>
                    </div>
                    <div class="hidden sm:block">
                        <img src="{{ asset('img/image-main.png') }}" class="w-[600px] h-[600px]" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- announce -->
    <div style="background-image: linear-gradient( rgb(24, 24, 27) 90%)" class="py-10 sm:px-4 md:px-4 lg:px-4 xl:px-0 px-4">
        <div class="container mx-auto">
            <div class="border border-emerald-500 p-1 mb-10 rounded-xl  bg-emerald-500/20 shadow-lg">
                <div class="flex items-center">
                    <h1
                        class="p-2 rounded-xl bg-emerald-700 text-white font-bold mr-4 flex items-center justify-center gap-2">
                        <i class="fa-solid fa-bullhorn text-2xl"></i>
                        ประกาศ
                    </h1>
                    <marquee behavior="scroll" direction="right" class="text-white font-medium py-2 text-[18px]">
                        ประกาศสำคัญ: นี่คือข้อความประกาศตัวอย่างที่สามารถเลื่อนได้
                    </marquee>
                </div>
            </div>
        </div>

        <!-- Card -->
        <div class="container mx-auto pt-6">
            <div class="flex flex-col justify-center items-center mb-5">
                <h1
                    class="mx-auto text-3xl py-2 font-semibold bg-gradient-to-r from-white to-white/20 w-fit bg-clip-text text-transparent">
                    น่าเชื่อถือแค่ไหน?</h1>
                <p class="text-[16px] text-white/40">สถานะและสถิติล่าสุดของเรา</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-4 gap-6">

                <!-- card1 -->
                <div
                    class="rounded-xl bg-gradient-to-t from-white/0 to-white/10 p-[10px] bg-glass cursor-pointer transform hover:translate-y-[-4px] transition duration-300">
                    <div class="mt-1 ml-2 text-white">
                        <i class="fa-regular fa-user" style="font-size: 70px;"></i>
                    </div>
                    <h5 class="text-fuchsia-500 text-2xl mt-[-75px] ml-[100px] font-semibold"><b>ผู้ใช้ทั้งหมด</b></h5>
                    <h2 class="text-strong text-2xl text-white mt-[10px] ml-[100px] font-semibold"><span
                            class="m-0 h5">54367</span><span class="m-0 h5"> คน</span></h2>
                </div>

                <!-- card2 -->
                <div
                    class="rounded-xl bg-gradient-to-t from-white/0 to-white/10 p-[10px] bg-glass cursor-pointer transform hover:translate-y-[-4px] transition duration-300">
                    <div class="mt-1 ml-2 text-white">
                        <i class="fa-brands fa-product-hunt" style="font-size: 70px;"></i>
                    </div>
                    <h5 class="text-fuchsia-500 text-2xl mt-[-75px] ml-[100px] font-semibold"><b>สินค้าทั้งหมด</b></h5>
                    <h2 class="text-strong text-2xl text-white mt-[10px] ml-[100px] font-semibold"><span
                            class="m-0 h5">365</span><span class="m-0 h5"> ชิ้น</span></h2>
                </div>

                <!-- card3 -->
                <div
                    class="rounded-xl bg-gradient-to-t from-white/0 to-white/10 p-[10px] bg-glass cursor-pointer transform hover:translate-y-[-4px] transition duration-300">
                    <div class="mt-1 ml-2 text-white">
                        <i class="fa-solid fa-boxes-stacked" style="font-size: 70px;"></i>
                    </div>
                    <h5 class="text-fuchsia-500 text-2xl mt-[-75px] ml-[100px] font-semibold"><b>สต็อกทั้งหมด</b></h5>
                    <h2 class="text-strong text-2xl text-white mt-[10px] ml-[100px] font-semibold"><span
                            class="m-0 h5">54367</span><span class="m-0 h5"> ชิ้น</span></h2>
                </div>

                <!-- card4 -->
                <div
                    class="rounded-xl bg-gradient-to-t from-white/0 to-white/10 p-[10px] bg-glass cursor-pointer transform hover:translate-y-[-4px] transition duration-300">
                    <div class="mt-1 ml-2 text-white">
                        <i class="fa-solid fa-check" style="font-size: 70px;"></i>
                    </div>
                    <h5 class="text-fuchsia-500 text-2xl mt-[-75px] ml-[100px] font-semibold"><b>ขายเเล้วทั้งหมด</b></h5>
                    <h2 class="text-strong text-2xl text-white mt-[10px] ml-[100px] font-semibold"><span
                            class="m-0 h5">24377</span><span class="m-0 h5"> ชิ้น</span></h2>
                </div>

            </div>
        </div>

        <div class="flex flex-col justify-center items-center mt-10">
            <h1
                class="mx-auto text-3xl py-2 font-semibold bg-gradient-to-r from-white to-white/20 w-fit bg-clip-text text-transparent">
                เลือกซื้อตอนนี้เลย</h1>
            <p class="text-[16px] text-white/40">และนี่คือสินค้าที่เราแนะนำ</p>
        </div>
        <div class="container mx-auto mt-3">
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
                    class="p-[1px] h-fit bg-gradient-to-t from-white/0 to-white/20 rounded-xl cursor-pointer transform hover:translate-y-[-4px] transition duration-300">
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

    <script>
        const swiper = new Swiper('.swiper', {
            loop: true,
            autoplay: {
                delay: 3000, // 5 วินาที
            },
        });
    </script>
@endsection
