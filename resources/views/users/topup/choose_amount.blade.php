@extends('layouts.app')
@section('content')
    <div class="relative overflow-hidden bg-cover bg-center px-4 sm:px-0 pb-10"
        style="background-image: linear-gradient(rgba(21, 128, 61, 0.9), rgb(24, 24, 27) 90%), url(/img/bg.webp);">
        <div class="container mx-auto min-h-screen mt-30">
            <div class="text-center my-8 pt-8">
                <h1
                    class="mx-auto text-3xl py-2 font-semibold bg-gradient-to-r from-white to-white/20 w-fit bg-clip-text text-transparent">
                    เลือกจำนวนเงิน
                </h1>
                <p class="text-white/40">
                    Choose the amount</p>
            </div>

            <div class="bg-white/20 p-6 w-62 rounded-xl shadow-xl mx-auto">
                <div class="flex items-center justify-center">
                    <div class="flex items-center justify-center gap-3">
                        <div class="bg-white w-14 h-14 rounded-full flex items-center justify-center">
                            <i class="fa-solid fa-wallet text-zinc-800 text-2xl"></i>
                        </div>
                        <div class="">
                            <h1 class="text-lg font-semibold text-white">ยอดเงินในบัญชี</h1>
                            <p class="text-xl font-bold text-white">฿45,280.50</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white/20 p-6 w-full sm:w-[600px] md:w-[700px] mx-auto mt-5 rounded-xl">
                <h1 class="font-bold text-lg text-center">เลือกจำนวนเงิน</h1>
                <div id="amountOptions" class="grid grid-cols-3 gap-3 mt-5">
                    <div class="amount-box border border-gray-400 bg-white/10 text-center rounded-xl p-3 cursor-pointer">
                        <p>฿10</p>
                    </div>
                    <div class="amount-box border border-gray-400 bg-white/10 text-center rounded-xl p-3 cursor-pointer">
                        <p>฿50</p>
                    </div>
                    <div class="amount-box border border-gray-400 bg-white/10 text-center rounded-xl p-3 cursor-pointer">
                        <p>฿100</p>
                    </div>
                    <div class="amount-box border border-gray-400 bg-white/10 text-center rounded-xl p-3 cursor-pointer">
                        <p>฿300</p>
                    </div>
                    <div class="amount-box border border-gray-400 bg-white/10 text-center rounded-xl p-3 cursor-pointer">
                        <p>฿500</p>
                    </div>
                    <div class="amount-box border border-gray-400 bg-white/10 text-center rounded-xl p-3 cursor-pointer">
                        <p>฿1000</p>
                    </div>
                </div>
                <div class="flex items-center justify-center mt-4">
                    <button
                        class="w-full font-semibold bg-gradient-to-tr from-green-500 to-emerald-500 py-3 rounded-xl transition ease-in hover:-translate-y-1 hover:shadow-lg hover:shadow-green-500/40 active:scale-95 text-white  cursor-pointer">สร้าง
                        QR CODE</button>
                </div>
            </div>

        </div>
    </div>

    <script>
        const boxes = document.querySelectorAll('.amount-box');
        boxes.forEach(box => {
            box.addEventListener('click', () => {
                boxes.forEach(b => b.classList.remove('border-2', 'border-green-500', 'bg-white/30'));
                box.classList.add('border-2', 'border-green-500', 'bg-white/30');
            });
        });
    </script>
@endsection
