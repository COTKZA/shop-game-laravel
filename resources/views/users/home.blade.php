@extends('layouts.app')

@section('content')
    <div class="relative h-screen overflow-hidden bg-cover bg-center px-4 sm:px-0"
        style="background-image: linear-gradient(rgba(21, 128, 61, 0.9), rgb(24, 24, 27) 90%), url(&quot;https://i.ibb.co/hXhg16t/image.webp&quot;);">
        <div class="container mx-auto mt-50 md:px-4">
            <div class="container mx-auto">
                <div class="flex justify-between">
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
    <div style="background-image: linear-gradient( rgb(24, 24, 27) 90%)" class="py-20 md:px-4 sm:px-4 lg:px-0 xl:px-0 px-4">
        <div class="container mx-auto">
            <div class="border border-emerald-500 p-1 mb-10 rounded-xl  bg-emerald-500/20 shadow-lg">
                <div class="flex items-center">
                    <h1 class="p-2 rounded-xl bg-emerald-700 text-white font-bold mr-4 flex items-center justify-center gap-2">
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
        <div class="container mx-auto">
            <div class="flex flex-col justify-center items-center">
                <h1 class="text-[30px] font-bold">น่าเชื่อถือแค่ไหน?</h1>
                <p class="text-[16px]">สถานะและสถิติล่าสุดของเรา</p>
            </div>
            <div class="flex justify-center items-cetner">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-5 mt-3">
                    <div class="border border-zinc-800 px-30 py-10 text-center rounded-xl skeleton">
                        <h1 class="text-[35px] font-bold">17,488</h1>
                        <p class="text-white/40 text-[16px]">ผู้ใช้งาน</p>
                    </div>
                    <div class="border border-zinc-800 px-30 py-10 text-center rounded-xl skeleton">
                        <h1 class="text-[35px] font-bold">30,715</h1>
                        <p class="text-white/40 text-[16px]">การสั่งซื้อ</p>
                    </div>
                    <div class="border border-zinc-800 px-30 py-10 text-center rounded-xl skeleton">
                        <h1 class="text-[35px] font-bold">28</h1>
                        <p class="text-white/40 text-[16px]">พร้อมจำหน่าย</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
