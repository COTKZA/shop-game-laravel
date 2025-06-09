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
            {{-- <div class="flex justify-center">
                <input type="search"
                    class="w-[300px] py-2.5 px-4 rounded-full bg-white/10 border-[1px] border-white/10 hover:bg-white/20"
                    placeholder="ค้นหาประวัติข้อมูล">
            </div> --}}

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
                                @foreach ($wallet_transaction_user as $items)
                                    <tr class="border-b border-white/10 text-white">
                                        <td class="p-4">{{ $items->created_at }}</td>
                                        <td class="p-4">{{ $items->transaction_type }}</td>
                                        @php
                                            switch ($items->payment_state) {
                                                case 'pending':
                                                    $text = 'รอดำเนินการ';
                                                    $color = 'text-yellow-500';
                                                    break;
                                                case 'success':
                                                    $text = 'สำเร็จ';
                                                    $color = 'text-green-500';
                                                    break;
                                                case 'expired':
                                                    $text = 'จำนวนเงินไม่ถูกต้อง';
                                                    $color = 'text-red-500';
                                                    break;
                                                default:
                                                    $text = $items->payment_state;
                                                    $color = 'text-white';
                                            }
                                        @endphp

                                        <td class="p-4 whitespace-nowrap {{ $color }}">
                                            {{ $text }}</td>
                                        <td class="p-4">{{ $items->amount }}</td>
                                        <td class="p-4">{{ $items->ref_code }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $wallet_transaction_user->withQueryString()->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
