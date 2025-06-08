@extends('layouts.app')

@section('content')
    <div class="relative overflow-hidden bg-cover bg-center px-4 sm:px-0 pb-10"
        style="background-image: linear-gradient(rgba(21, 128, 61, 0.9), rgb(24, 24, 27) 90%), url(/img/bg.webp);">

        <div class="container mx-auto mt-30 md:px-4 min-h-screen">
            <div class="text-center">
                <h1 class="mx-auto text-3xl py-2 font-semibold bg-gradient-to-r from-white to-white/20 w-fit bg-clip-text text-transparent">สินค้า</h1>
                <p class="text-[16px] text-white/40">Product</p>
            </div>

            <div class="mt-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-5">
                <div>
                    <img src={{ asset('img/product.png') }} class="w-[768px] h-full object-center rounded-xl" alt="">
                </div>
                <div class="bg-white/10  backdrop-blur-lg border border-white/30 rounded-xl h-[430px] p-6 flex flex-col justify-between">
                    <div>
                        <div class="flex  items-center justify-between gap-2">
                            <h1 class="text-white text-[18px] sm:text-[18px]  md:text-[18px] lg:text-[36px] xl:text-[36px] font-bold">100-200 SKIN++ สกินแน่นๆ 💰</h1>
                            <p class="text-white text-[12px] border border-white/30 bg-white/20 px-5 py-1 rounded-xl font-semibold text-nowrap">เหลือ 0 ชิ้น</p>
                        </div>
                        <p class="font-bold text-[24px] bg-gradient-to-tr from-green-500 to-emerald-500 w-fit bg-clip-text text-transparent">ราคา 99 บาท</p>
                    </div>
                    <div class="mt-5">
                        <p class="text-white/90 text-sm">‼️อ่านก่อนจะซื้อสินค้า‼️</p>
                        <div class="mt-2 sm:mb-1 md:mb-1 xl:mb-5">
                            <p class="text-white/90 text-sm">✅ - การันตี Skin Valorant</p>
                            <p class="text-white/90 text-sm">🔒 - รหัสเปลี่ยนข้อมูลไม่ได้</p>
                            <p class="text-white/90 text-sm">🍀 - รหัสอาจมีคนเข้าซ้อนแต่ถ้าโชคดีก็ได้เล่นยาวๆ</p>
                            <p class="text-white/90 text-sm">❗ - ไม่สามารถเข้าหน้าเว็บได้ ต้อง Login ผ่านตัวเกมอย่างเดียว
                            </p>
                            <p class="text-white/90 text-sm">📞 - หากรหัสมีปัญหา เข้าไม่ได้ โดนแบน โดนล็อค
                                ติดต่อเคลมได้ในดิสคอร์ดร้าน</p>
                            <p class="text-white/90 text-sm">🧧 - เคลมได้ 1 ครั้งต่อรหัส (ไม่นับตอนซื้อมาแล้วเข้าไม่ได้)</p>
                        </div>
                        <button class="w-full p-2 sm:p-3 md:p-3 lg:p-2 xl:p-3 bg-white text-gray-800 text-[18px] font-bold rounded-xl transform hover:translate-y-[-4px] transition duration-300 sm:mt-2 md:mt-2 xl:mt-2">สั่งซื้อ (1 ชิ้น)</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
