@extends('layouts.app')

@section('content')
    <div class="relative overflow-hidden bg-cover bg-center px-4 sm:px-0 pb-10"
        style="background-image: linear-gradient(rgba(21, 128, 61, 0.9), rgb(24, 24, 27) 90%), url(/img/bg.webp);">
        <div class="container mx-auto min-h-screen mt-30">
            <div class="text-center my-8 pt-8">
                <h1
                    class="mx-auto text-3xl py-2 font-semibold bg-gradient-to-r from-white to-white/20 w-fit bg-clip-text text-transparent">
                    ยืนยันสลิปธนาคาร
                </h1>
                <p class="text-white/40">Verify Slip</p>
            </div>
            <div class="flex justify-center">

                <div class="flex flex-col lg:flex-row gap-4 sm:gap-6 mx-4 py-8">
                    <div class="h-fit w-full p-6 bg-white/5 border border-white/10 rounded-2xl">
                        <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">
                            <img class="w-full h-full rounded-xl" src="/img/payment.jpg" alt="truemoney_scan_image">
                            <div class="w-full">
                                <h1 class="text-2xl font-semibold">วิธีการเติมเงิน</h1>
                                <p class="text-white/40 mb-4">How to topup</p>
                                <div class="w-full h-[1px] bg-white/10 mb-8"></div>
                                <div class="space-y-4">
                                    <p>1) คัดลอกเลขบัญชี "XXX-X-XXXXX-X"</p>
                                    <p>2) เข้าแอพธนาคาร</p>
                                    <p>3) กดโอนเงินจากนั้นกรอกจำนวนเงินที่ท่านต้องการเติม</p>
                                    <p>4) ตรวจสอบข้อมูลให้ถูกต้องก่อนกดโอน เช่น ชื่อ ธนาคาร และ เลขบัญชี</p>
                                    <p>5) กดโอนเงินและบันทึกสลิปโอนเงินไว้</p>
                                    <p>6) นำสลิปมาอัพโหลด</p>
                                    <p>7) ธนาคารต้องมี QR ให้สแกน ถึงจะสามารถเติมได้ (สำคัญ!)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-[1px] h-fit bg-gradient-to-t from-white/0 to-white/20 sm:min-w-[450px] rounded-2xl">
                        <form action="/add_payment" id="topup-form" method="POST" enctype="multipart/form-data"
                            class="p-6 rounded-2xl bg-zinc-900"
                            style="background-image: linear-gradient(60deg, rgba(0, 0, 0, 0) 40%, rgba(255, 255, 255, 0.06), rgba(0, 0, 0, 0));">
                            @csrf
                            <div class="mb-8">
                                <p class="text-sm mb-1 text-white/40">ช่องทางการโอนเงิน</p>
                                <h1 class="text-lg text-white">ชื่อธนาคาร<span
                                        class="ml-[70px] text-white text-2xl font-bold">กสิกรไทย</span></h1>
                                <div class="w-full h-[1px] bg-white/10 mb-8 mt-4"></div>
                                <h1 class="text-lg text-white">เลขบัญชี<span
                                        class="ml-[80px] text-white text-2xl font-bold">XXX-X-XXXXX-X</span></h1>
                                <div class="w-full h-[1px] bg-white/10 mb-8 mt-4"></div>
                                <h1 class="text-lg text-white">ชื่อเจ้าของบัญชี<span
                                        class="ml-8 text-white text-2xl font-bold">XXXXX XXXXX</span></h1>
                                <div class="w-full h-[1px] bg-white/10 mb-8 mt-4"></div>

                                <div class="mb-4">
                                    <p class="text-sm mb-1 text-white/40">จำนวนเงิน</p>
                                    <input type="number" name="amount" class="bg-white/5 w-full px-4 py-2.5 rounded-xl">
                                </div>

                                <p class="text-sm mb-1 text-white/40">ไฟล์สลิปการโอน</p>
                                <input type="file" name="payment_slip" class="file-input file-input-neutral w-full">
                            </div>

                            @if (Auth::check())
                                <button id="submit-btn" type="submit"
                                    class="w-full font-semibold bg-gradient-to-tr from-green-500 to-emerald-500 py-3 rounded-xl transition ease-in hover:-translate-y-1 hover:shadow-lg hover:shadow-green-500/40 active:scale-95 text-white">
                                    เติมเงิน
                                </button>
                                <div id="loading-spinner" class="hidden flex justify-center mt-4">
                                    <span class="loading loading-spinner text-green-500 text-3xl"></span>
                                </div>
                            @else
                                <button type="button" onclick="window.location.href='/login';"
                                    class="w-full font-semibold bg-gradient-to-tr from-green-500 to-emerald-500 py-3 rounded-xl transition ease-in hover:-translate-y-1 hover:shadow-lg hover:shadow-green-500/40 active:scale-95 text-white">เติมเงิน
                                </button>
                            @endif
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'สำเร็จ',
                text: '{{ session('success') }}',
                confirmButtonText: 'ตกลง'
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'เกิดข้อผิดพลาด',
                text: '{{ session('error') }}',
                confirmButtonText: 'ตกลง'
            });
        </script>
    @endif

    <script>
        document.getElementById('topup-form').addEventListener('submit', function() {

            document.getElementById('submit-btn').classList.add('hidden');

            document.getElementById('loading-spinner').classList.remove('hidden');
        });
    </script>
@endsection
