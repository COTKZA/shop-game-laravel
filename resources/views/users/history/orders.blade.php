@extends('layouts.app')

@section('content')
    <div class="relative overflow-hidden bg-cover bg-center px-4 sm:px-0 pb-10"
        style="background-image: linear-gradient(rgba(21, 128, 61, 0.9), rgb(24, 24, 27) 90%), url(/img/bg.webp);">
        <div class="container mx-auto min-h-screen">
            <div class="text-center my-8 pt-8 mt-30">
                <h1
                    class="mx-auto text-3xl py-2 font-semibold bg-gradient-to-r from-white to-white/20 w-fit bg-clip-text text-transparent">
                    ประวัติการสั่งซื้อ
                </h1>
                <p class="text-white/40">Orders Histories</p>
            </div>
            {{-- <div class="flex justify-center">
                <input type="search"
                    class="w-[300px] py-2.5 px-4 rounded-full bg-white/10 border-[1px] border-white/10 hover:bg-white/20"
                    placeholder="ค้นหาประวัติข้อมูล">
            </div> --}}

            <div class="w-full p-8">
                <div class="overflow-hidden mb-4 mt-8">
                    <div class="relative overflow-x-auto">
                        <table class="w-full  text-left">
                            <thead>
                                <tr class="border-b-2 border-white/20 text-white">
                                    <th class="px-4 py-2.5 select-none whitespace-nowrap hover:cursor-pointer">
                                        เวลาที่ซื้อสินค้า
                                    </th>
                                    <th class="px-4 py-2.5 select-none whitespace-nowrap hover:cursor-pointer">
                                        ชื่อสินค้า
                                    </th>
                                    <th class="px-4 py-2.5 select-none whitespace-nowrap hover:cursor-pointer">
                                        ราคา
                                    </th>
                                    <th class="px-4 py-2.5 select-none whitespace-nowrap hover:cursor-pointer">
                                        ข้อมูล
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($purchases_user as $items)
                                    <tr class="border-b border-white/10 text-white">
                                        <td class="p-4">{{ $items->purchased_at }}</td>
                                        <td class="p-4">{{ $items->product_details->product->name }}</td>
                                        <td class="p-4">{{ $items->price }}</td>
                                        <td class="p-4">
                                        <div>
                                            <p>username: {{ $items->product_details->username ?? '-' }}</p>
                                            <p>email: {{ $items->product_details->email ?? '-'}}</p>
                                            <p>password: {{ $items->product_details->password ?? '-'}}</p>
                                        </div></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $purchases_user->withQueryString()->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
