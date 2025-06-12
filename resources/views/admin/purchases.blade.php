@extends('layouts.admin')
@section('content')
    <div class="container mx-auto">
        {{-- filtter --}}
        @if (Auth::user()->role == 'admin')
            <div class="bg-gradient-to-br from-gray-700 to-gray-800 w-full p-3 rounded-t-lg">
                <h1 class="text-xl font-bold">Filtter</h1>
            </div>
            <div class="bg-gray-700 p-3 shadow-xl rounded-b-lg">
                <div class="grid grid-cols-1 sm:grid-cols-1 gap-2">

                    <form action="/admin/purchases" method="get" class="flex gap-1">
                        <input type="search" name="search" placeholder="ค้นหา" value="{{ request('search') }}"
                            class="input-md input-neutral w-full bg-slate-400 border border-neutral-500 rounded-xl text-black font-bold p-2">
                        <button type="submit" class="btn btn-primary text-white p-3">ค้นหา</button>
                    </form>

                </div>
            </div>
        @endif

        <!-- info table -->
        <div class="bg-gradient-to-br from-gray-700 to-gray-800 w-full p-3 rounded-t-lg mt-10">
            <h1 class="text-xl font-bold">Purchases Info</h1>
        </div>
        <div class="p-3 shadow-xl rounded-b-lg bg-gray-700">
            <div class="overflow-x-auto">
                <table class="table">
                    <thead>
                        <tr class="text-gray-100">
                            <th>ID</th>
                            <th>อีเมล</th>
                            <th>ชื่อสินค้า</th>
                            <th>ราคา</th>
                            <th>วันที่/เวลา</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($purchases as $items)
                            <tr class="text-gray-100">
                                <td>{{ $items->id }}</td>
                                <td>{{ $items->user->email }}</td>
                                <td>{{ $items->product_details->product->name }}</td>
                                <td>{{ $items->price }} บาท</td>
                                <td>{{ $items->purchased_at }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $purchases->withQueryString()->links() }}
                </div>
            </div>
        </div>

    </div>
@endsection
