@extends('layouts.app')

@section('content')
    <div class="relative overflow-hidden bg-cover bg-center px-4 sm:px-0 pb-10"
        style="background-image: linear-gradient(rgba(21, 128, 61, 0.9), rgb(24, 24, 27) 90%), url(/img/bg.webp);">
        <div class="container mx-auto min-h-screen mt-30">
            <div class="text-center my-8 pt-8">
                <h1
                    class="mx-auto text-3xl py-2 font-semibold bg-gradient-to-r from-white to-white/20 w-fit bg-clip-text text-transparent">
                    เติมเงิน
                </h1>
                <p class="text-white/40">Topup</p>
            </div>
            <div class="flex justify-center">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6 mx-4">

                    <!-- Product Card -->
                    <div class="relative  cursor-pointer transform hover:translate-y-[-4px] transition duration-300 shadow-xl">
                        <a href="/topup/truemoney">
                            <img src="/img/TureMoney.png" alt=""
                                class="h-[200px] w-[700px]  bg-cover rounded-xl opacity-60">
                            <div class="absolute inset-0 flex flex-col justify-center items-center text-center p-6">
                                <h1 class="text-2xl font-semibold text-white">TureMoney อังเปา</h1>
                                <p class="text-sm text-white/80">เติมเงินด้วยระบบชำระอังเปาผ่านเเอพ TureMoney</p>
                            </div>
                        </a>
                    </div>
                    <div class="relative  cursor-pointer transform hover:translate-y-[-4px] transition duration-300 shadow-xl">
                        <a href="/topup/slip-verify">
                            <img src="/img/Scan.png" alt=""
                                class="h-[200px] w-[700px]  bg-cover rounded-xl opacity-60">
                            <div class="absolute inset-0 flex flex-col justify-center items-center text-center p-6">
                                <h1 class="text-2xl font-semibold text-white">ยืนยันสลิปธนคาร</h1>
                                <p class="text-sm text-white/80">เติมเงินด้วยการตรวจสอบสลิปธนคาร</p>
                            </div>
                        </a>
                    </div>
                    <!-- End Product Card -->

                </div>
            </div>
        </div>
    </div>
@endsection
