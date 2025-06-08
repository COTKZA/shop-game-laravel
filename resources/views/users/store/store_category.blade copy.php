@extends('layouts.app')

@section('content')
    <div class="relative overflow-hidden bg-cover bg-center px-4 sm:px-0 pb-10"
        style="background-image: linear-gradient(rgba(21, 128, 61, 0.9), rgb(24, 24, 27) 90%), url(/img/bg.webp);">

        <div class="container mx-auto mt-30">
            <div class="text-center">
                <h1 class="mx-auto text-3xl py-2 font-semibold bg-gradient-to-r from-white to-white/20 w-fit bg-clip-text text-transparent">หมวดหมู่สินค้า</h1>
                <p class="text-[16px] text-white/40">Category</p>
            </div>
            <div class="border border-gray-600 rounded-xl p-4 mt-10 bg-zinc-900">
                <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-2 gap-4">
                    <div class="w-full h-full">
                        <img src="{{ asset('img/val section.png') }}" class="w-full h-[100px] sm:h-[200px] md:h-[300px] lg:h-[300px]  xl:h-[300px] rounded-xl object-center" alt="">
                    </div>
                    <div class="w-full">
                        <h1 class="text-white text-2xl md:text-3xl font-semibold mb-2">สุ่มไอดี VALORANT</h1>
                        <p class="text-white/60 text-sm">(ID CRACK - ไม่สามารถเปลี่ยนข้อมูลได้)</p>
                    </div>
                </div>
            </div>
            <div class="container mx-auto mt-10">
                <div class="border border-emerald-500 bg-emerald-700/50 p-1 rounded-xl w-30 text-center shadow-xl">
                    <h1 class="text-white text-[18px]">หมวดหมู่ย่อย</h1>
                </div>
                <div class="mt-2 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-8 ">
                    <a
                        class="cursor-pointer relative w-fit inline-block transform hover:translate-y-[-4px] transition duration-300">
                        <img src="{{ asset('img/val section.png') }}" class="w-full h-[200px] rounded-xl object-cover" alt="">
                        <div class="absolute bg-black/40 top-0 left-0 w-full h-full flex-col justify-center rounded-xl"></div>
                        <div
                            class="absolute top-0 left-0 w-full h-full flex flex-col justify-center items-center text-white px-4">
                            <h1 class="text-2xl font-semibold">สุ่มไอดี VALORANT</h1>
                            <p class="text-sm text-white/60">(ID CRACK - ไม่สามารถเปลี่ยนข้อมูลได้)</p>
                        </div>
                    </a>
                    <a
                        class="cursor-pointer relative w-fit inline-block transform hover:translate-y-[-4px] transition duration-300">
                        <img src="{{ asset('img/rbx section.png') }}" class="w-full h-[200px] rounded-xl object-cover" alt="">
                        <div class="absolute bg-black/40 top-0 left-0 w-full h-full flex-col justify-center rounded-xl"></div>
                        <div
                            class="absolute top-0 left-0 w-full h-full flex flex-col justify-center items-center text-white px-4">
                            <h1 class="text-2xl font-semibold">สุ่มไอดี VALORANT</h1>
                            <p class="text-sm text-white/60">(ID CRACK - ไม่สามารถเปลี่ยนข้อมูลได้)</p>
                        </div>
                    </a>
                    <a
                        class="cursor-pointer relative w-fit inline-block transform hover:translate-y-[-4px] transition duration-300">
                        <img src="{{ asset('img/val section.png') }}" class="w-full h-[200px] rounded-xl object-cover" alt="">
                        <div class="absolute bg-black/40 top-0 left-0 w-full h-full flex-col justify-center rounded-xl"></div>
                        <div
                            class="absolute top-0 left-0 w-full h-full flex flex-col justify-center items-center text-white px-4">
                            <h1 class="text-2xl font-semibold">สุ่มไอดี VALORANT</h1>
                            <p class="text-sm text-white/60">(ID CRACK - ไม่สามารถเปลี่ยนข้อมูลได้)</p>
                        </div>
                    </a>
                    <a
                        class="cursor-pointer relative w-fit inline-block transform hover:translate-y-[-4px] transition duration-300">
                        <img src="{{ asset('img/rbx section.png') }}" class="w-full h-[200px] rounded-xl object-cover" alt="">
                        <div class="absolute bg-black/40 top-0 left-0 w-full h-full flex-col justify-center rounded-xl"></div>
                        <div
                            class="absolute top-0 left-0 w-full h-full flex flex-col justify-center items-center text-white px-4">
                            <h1 class="text-2xl font-semibold">สุ่มไอดี VALORANT</h1>
                            <p class="text-sm text-white/60">(ID CRACK - ไม่สามารถเปลี่ยนข้อมูลได้)</p>
                        </div>
                    </a>
                    <a
                        class="cursor-pointer relative w-fit inline-block transform hover:translate-y-[-4px] transition duration-300">
                        <img src="{{ asset('img/val section.png') }}" class="w-full h-[200px] rounded-xl object-cover" alt="">
                        <div class="absolute bg-black/40 top-0 left-0 w-full h-full flex-col justify-center rounded-xl"></div>
                        <div
                            class="absolute top-0 left-0 w-full h-full flex flex-col justify-center items-center text-white px-4">
                            <h1 class="text-2xl font-semibold">สุ่มไอดี VALORANT</h1>
                            <p class="text-sm text-white/60">(ID CRACK - ไม่สามารถเปลี่ยนข้อมูลได้)</p>
                        </div>
                    </a>
                    <a
                        class="cursor-pointer relative w-fit inline-block transform hover:translate-y-[-4px] transition duration-300">
                        <img src="{{ asset('img/rbx section.png') }}" class="w-full h-[200px] rounded-xl object-cover" alt="">
                        <div class="absolute bg-black/40 top-0 left-0 w-full h-full flex-col justify-center rounded-xl"></div>
                        <div
                            class="absolute top-0 left-0 w-full h-full flex flex-col justify-center items-center text-white px-4">
                            <h1 class="text-2xl font-semibold">สุ่มไอดี VALORANT</h1>
                            <p class="text-sm text-white/60">(ID CRACK - ไม่สามารถเปลี่ยนข้อมูลได้)</p>
                        </div>
                    </a>
                    <a
                        class="cursor-pointer relative w-fit inline-block transform hover:translate-y-[-4px] transition duration-300">
                        <img src="{{ asset('img/val section.png') }}" class="w-full h-[200px] rounded-xl object-cover" alt="">
                        <div class="absolute bg-black/40 top-0 left-0 w-full h-full flex-col justify-center rounded-xl"></div>
                        <div
                            class="absolute top-0 left-0 w-full h-full flex flex-col justify-center items-center text-white px-4">
                            <h1 class="text-2xl font-semibold">สุ่มไอดี VALORANT</h1>
                            <p class="text-sm text-white/60">(ID CRACK - ไม่สามารถเปลี่ยนข้อมูลได้)</p>
                        </div>
                    </a>
                    <a
                        class="cursor-pointer relative w-fit inline-block transform hover:translate-y-[-4px] transition duration-300">
                        <img src="{{ asset('img/rbx section.png') }}" class="w-full h-[200px] rounded-xl object-cover" alt="">
                        <div class="absolute bg-black/40 top-0 left-0 w-full h-full flex-col justify-center rounded-xl"></div>
                        <div
                            class="absolute top-0 left-0 w-full h-full flex flex-col justify-center items-center text-white px-4">
                            <h1 class="text-2xl font-semibold">สุ่มไอดี VALORANT</h1>
                            <p class="text-sm text-white/60">(ID CRACK - ไม่สามารถเปลี่ยนข้อมูลได้)</p>
                        </div>
                    </a>
                    <a
                        class="cursor-pointer relative w-fit inline-block transform hover:translate-y-[-4px] transition duration-300">
                        <img src="{{ asset('img/val section.png') }}" class="w-full h-[200px] rounded-xl object-cover" alt="">
                        <div class="absolute bg-black/40 top-0 left-0 w-full h-full flex-col justify-center rounded-xl"></div>
                        <div
                            class="absolute top-0 left-0 w-full h-full flex flex-col justify-center items-center text-white px-4">
                            <h1 class="text-2xl font-semibold">สุ่มไอดี VALORANT</h1>
                            <p class="text-sm text-white/60">(ID CRACK - ไม่สามารถเปลี่ยนข้อมูลได้)</p>
                        </div>
                    </a>
                    <a
                        class="cursor-pointer relative w-fit inline-block transform hover:translate-y-[-4px] transition duration-300">
                        <img src="{{ asset('img/rbx section.png') }}" class="w-full h-[200px] rounded-xl object-cover" alt="">
                        <div class="absolute bg-black/40 top-0 left-0 w-full h-full flex-col justify-center rounded-xl"></div>
                        <div
                            class="absolute top-0 left-0 w-full h-full flex flex-col justify-center items-center text-white px-4">
                            <h1 class="text-2xl font-semibold">สุ่มไอดี VALORANT</h1>
                            <p class="text-sm text-white/60">(ID CRACK - ไม่สามารถเปลี่ยนข้อมูลได้)</p>
                        </div>
                    </a>
                    <a
                        class="cursor-pointer relative w-fit inline-block transform hover:translate-y-[-4px] transition duration-300">
                        <img src="{{ asset('img/val section.png') }}" class="w-full h-[200px] rounded-xl object-cover" alt="">
                        <div class="absolute bg-black/40 top-0 left-0 w-full h-full flex-col justify-center rounded-xl"></div>
                        <div
                            class="absolute top-0 left-0 w-full h-full flex flex-col justify-center items-center text-white px-4">
                            <h1 class="text-2xl font-semibold">สุ่มไอดี VALORANT</h1>
                            <p class="text-sm text-white/60">(ID CRACK - ไม่สามารถเปลี่ยนข้อมูลได้)</p>
                        </div>
                    </a>
                    <a
                        class="cursor-pointer relative w-fit inline-block transform hover:translate-y-[-4px] transition duration-300">
                        <img src="{{ asset('img/rbx section.png') }}" class="w-full h-[200px] rounded-xl object-cover" alt="">
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
    </div>
@endsection
