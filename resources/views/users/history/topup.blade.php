@extends('layouts.app')

@section('content')
    <div class="relative overflow-hidden bg-cover bg-center px-4 sm:px-0 pb-10"
        style="background-image: linear-gradient(rgba(21, 128, 61, 0.9), rgb(24, 24, 27) 90%), url(/img/bg.webp);">
        <div class="container mx-auto h-screen">
            <div class="text-center my-8 pt-8 mt-30">
                <h1
                    class="mx-auto text-3xl py-2 font-semibold bg-gradient-to-r from-white to-white/20 w-fit bg-clip-text text-transparent">
                    ประวัติการเติมเงิน
                </h1>
                <p class="text-white/40">Topup Histories</p>
            </div>
            <div class="flex justify-center">
                <input type="search"
                    class="w-[300px] py-2.5 px-4 rounded-full bg-white/10 border-[1px] border-white/10 hover:bg-white/20"
                    placeholder="ค้นหาประวัติข้อมูล">
            </div>

            <div class="w-full p-8">
                <div class="overflow-hidden mb-4 mt-8">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-left">
                            <thead>
                                <tr class="border-b-2 border-white/20 text-white">
                                    <th class="px-4 py-2.5 select-none whitespace-nowrap hover:cursor-pointer">
                                        เวลาที่เติมเงิน
                                    </th>
                                    <th class="px-4 py-2.5 select-none whitespace-nowrap hover:cursor-pointer">
                                        ประเภทการเติมเงิน
                                    </th>
                                    <th class="px-4 py-2.5 select-none whitespace-nowrap hover:cursor-pointer">
                                        สถานะ
                                    </th>
                                    <th class="px-4 py-2.5 select-none whitespace-nowrap hover:cursor-pointer">
                                        จำนวนเงิน
                                    </th>
                                    <th class="px-4 py-2.5 select-none whitespace-nowrap">
                                        รหัสอ้างอิง
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b border-white/10 text-white">
                                    <td class="p-4">8/08/2025, 16:55:34 AM</td>
                                    <td class="p-4">ทรูมันนี่ อังเปา</td>
                                    <td class="p-4 text-success whitespace-nowrap">เสร็จสิ้น</td>
                                    <td class="p-4">10</td>
                                    <td class="p-4">1kosunnsdpdkm923mdsma</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        <h1 class="text-white">หน้าที่ 1</h1>
                        <p class="text-white/50">จากทั้งหมด 1 หน้า</p>
                    </div>
                    <div class="flex justify-between mt-4">
                        <button class="w-[80px] sm:w-[80px] border-2 border-white/10 bg-white/5"><i class="fa-solid fa-angle-left"></i></button>
                        <button class="w-[80px] sm:w-[80px] border-2 border-white/10 bg-white/5"><i class="fa-solid fa-angle-right"></i></button>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
