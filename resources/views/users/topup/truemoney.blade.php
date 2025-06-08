@extends('layouts.app')

@section('content')
    <div class="relative overflow-hidden bg-cover bg-center px-4 sm:px-0 pb-10"
        style="background-image: linear-gradient(rgba(21, 128, 61, 0.9), rgb(24, 24, 27) 90%), url(/img/bg.webp);">
        <div class="container mx-auto min-h-screen mt-30">
            <div class="text-center my-8 pt-8">
                <h1
                    class="mx-auto text-3xl py-2 font-semibold bg-gradient-to-r from-white to-white/20 w-fit bg-clip-text text-transparent">
                    TrueMoney อังเปา
                </h1>
                <p class="text-white/40">TrueMoney Voucher</p>
            </div>
            <div class="flex justify-center">
                <div class="flex flex-col lg:flex-row gap-4 sm:gap-6 mx-4 py-8">
                    <div class="h-fit w-full p-6 bg-white/5 border border-white/10 rounded-2xl">
                        <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">
                            <img class="w-full h-full rounded-xl" src="/img/TureMoney_Step.png"
                                alt="truemoney_voucher_image">
                            <div class="w-full">
                                <h1 class="text-2xl font-semibold">วิธีการเติมเงิน</h1>
                                <p class="text-white/40 mb-4">How to topup</p>
                                <div class="w-full h-[1px] bg-white/10 mb-8"></div>
                                <div class="space-y-4">
                                    <p>1) เข้า TrueMoney</p>
                                    <p>2) กดโอนเงิน</p>
                                    <p>3) กดตรงทรูมันนี่ วอลเล็ท</p>
                                    <p>4) กดส่งซองของขวัญ</p>
                                    <p>5) ใส่จำนวนเงินที่ต้องการเติม</p>
                                    <p>6) กรอกจำนวนคนที่รับซอง แค่ 1 คนเท่านั้น (สำคัญ!)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-[1px] h-fit bg-gradient-to-t from-white/0 to-white/20 sm:min-w-[450px] rounded-2xl">
                        <form action="" class="p-6 rounded-2xl bg-zinc-900"
                            style="background-image: linear-gradient(60deg, rgba(0, 0, 0, 0) 40%, rgba(255, 255, 255, 0.06), rgba(0, 0, 0, 0));">
                            <div class="mb-4">
                                <p class="text-sm mb-1 text-white/40">จำนวนเงิน</p>
                                <input type="number" name="amount" class="bg-white/5 w-full px-4 py-2.5 rounded-xl">
                            </div>
                            <div class="mb-8">
                                <p class="text-sm mb-1 text-white/40">ลิงค์อังเปา</p>
                                <input type="text" name="url_truemoney" class="bg-white/5 w-full px-4 py-2.5 rounded-xl"
                                    placeholder="https://gift.truemoney.com/campaign/?v=XXXXXXXXXXXXXXXXXX" required>
                            </div>
                            <button type="submit"
                                class="w-full font-semibold bg-gradient-to-tr from-green-500 to-emerald-500 py-3 rounded-xl transition ease-in hover:-translate-y-1 hover:shadow-lg hover:shadow-green-500/40 active:scale-95 text-white">เติมเงิน</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
