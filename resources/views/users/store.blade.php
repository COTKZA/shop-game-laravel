@extends('layouts.app')

@section('content')
    <div class="relative overflow-hidden bg-cover bg-center px-4 sm:px-0 pb-10"
        style="background-image: linear-gradient(rgba(21, 128, 61, 0.9), rgb(24, 24, 27) 90%), url(/img/bg.webp);">

        <div class="container mx-auto mt-30 min-h-screen">
            <div class="text-center">
                <h1
                    class="mx-auto text-3xl py-2 font-semibold bg-gradient-to-r from-white to-white/20 w-fit bg-clip-text text-transparent">
                    ร้านค้า</h1>
                <p class="text-[16px] text-white/40">Store</p>
            </div>
            <div class="mt-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-8 sm:px-4">
                @foreach ($category as $items)
                    <a href="/store/card/{{ $items->id }}"
                        class="cursor-pointer relative w-fit inline-block transform hover:translate-y-[-4px] transition duration-300">
                        <img src="data:image/*;base64,{{ $items->image }}" class="w-full h-[200px] rounded-xl object-cover"
                            alt="">
                        <div class="absolute bg-black/40 top-0 left-0 w-full h-full flex-col justify-center rounded-xl">
                        </div>
                        <div
                            class="absolute top-0 left-0 w-full h-full flex flex-col justify-center items-center text-white px-4">
                            <h1 class="text-2xl font-semibold">{{ $items->name }}</h1>
                            <p class="text-sm text-white/60">(ID CRACK - ไม่สามารถเปลี่ยนข้อมูลได้)</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
