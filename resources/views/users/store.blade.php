@extends('layouts.app')

@section('content')
    <div class="relative h-screen overflow-hidden bg-cover bg-center px-4 sm:px-0"
        style="background-image: linear-gradient(rgba(21, 128, 61, 0.9), rgb(24, 24, 27) 90%), url(&quot;https://i.ibb.co/hXhg16t/image.webp&quot;);">

        <div class="container mx-auto mt-40">
            <div class="text-center">
                <h1 class="text-white text-[30px] font-bold">ร้านค้า</h1>
                <p class="text-[16px] text-white/40">Store</p>
            </div>
            <div class="mt-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-8">
                <a
                    class="cursor-pointer relative w-fit inline-block transform hover:translate-y-[-4px] transition duration-300">
                    <img src="{{ asset('img/val section.png') }}" class="w-full h-[200px] rounded-xl object-center" alt="">
                    <div class="absolute bg-black/40 top-0 left-0 w-full h-full flex-col justify-center rounded-xl"></div>
                    <div
                        class="absolute top-0 left-0 w-full h-full flex flex-col justify-center items-center text-white px-4">
                        <h1 class="text-2xl font-semibold">สุ่มไอดี VALORANT</h1>
                        <p class="text-sm text-white/60">(ID CRACK - ไม่สามารถเปลี่ยนข้อมูลได้)</p>
                    </div>
                </a>
                <a
                    class="cursor-pointer relative w-fit inline-block transform hover:translate-y-[-4px] transition duration-300">
                    <img src="{{ asset('img/rbx section.png') }}" class="w-full h-[200px] rounded-xl  object-center" alt="">
                    <div class="absolute bg-black/40 top-0 left-0 w-full h-full flex-col justify-center rounded-xl"></div>
                    <div
                        class="absolute top-0 left-0 w-full h-full flex flex-col justify-center items-center text-white px-4">
                        <h1 class="text-2xl font-semibold">สุ่มไอดี VALORANT</h1>
                        <p class="text-sm text-white/60">(ID CRACK - ไม่สามารถเปลี่ยนข้อมูลได้)</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
