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

                    <form action="/admin/wallet_transaction" method="get" class="flex gap-1">
                        <input type="search" name="search" placeholder="ค้นหา" value="{{ request('search') }}"
                            class="input-md input-neutral w-full bg-slate-400 border border-neutral-500 rounded-xl text-black font-bold p-2">
                        <button type="submit" class="btn btn-primary text-white p-3">ค้นหา</button>
                    </form>

                </div>
            </div>
        @endif

        <!-- info table -->
        <div class="bg-gradient-to-br from-gray-700 to-gray-800 w-full p-3 rounded-t-lg mt-10">
            <h1 class="text-xl font-bold">Wallet Transaction Info</h1>
        </div>
        <div class="p-3 shadow-xl rounded-b-lg bg-gray-700">
            <div class="overflow-x-auto">
                <table class="table">
                    <thead>
                        <tr class="text-gray-100">
                            <th>ID</th>
                            <th>อีเมล</th>
                            <th>ยอดเงินเติม</th>
                            <th>รูปการโอนเงิน</th>
                            <th>ซองอังเปา</th>
                            <th>เลขอ้างอิง</th>
                            <th>สถานะการชำระเงิน</th>
                            <th>ประเภทธุรกรรม</th>
                            <th>การดำเนินการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($wallet_transaction as $items)
                            <tr class="text-gray-100">
                                <td>{{ $items->id }}</td>
                                <td>{{ $items->wallet->user->email }}</td>
                                <td>{{ $items->amount }} บาท</td>
                                <td>
                                    <div class="w-20 h-20 rounded-lg">
                                        <img src="data:image/*;base64,{{ $items->payment_slip }}"
                                            class="w-20 h-20 object-center rounded-lg" alt="">
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        {{ $items->truemoney_gifts ?? 'ไม่มีข้อมูล' }}
                                    </div>
                                </td>
                                <td>
                                    {{ $items->ref_code }}
                                </td>
                                @php
                                    switch ($items->payment_state) {
                                        case 'pending':
                                            $text = 'รอดำเนินการ';
                                            $color = 'badge badge-warning';
                                            break;
                                        case 'success':
                                            $text = 'สำเร็จ';
                                            $color = 'badge badge-success';
                                            break;
                                        case 'expired':
                                            $text = 'จำนวนเงินไม่ตรง';
                                            $color = 'badge badge-error';
                                            break;
                                        default:
                                            $text = $items->payment_state;
                                            $color = 'text-white';
                                    }
                                @endphp
                                <td>
                                    <div class="{{ $color }} text-gray-100 font-bold  text-[12px]">
                                        {{ $text }}
                                    </div>
                                </td>
                                @php
                                    switch ($items->transaction_type) {
                                        case 'payment':
                                            $text = 'payment';
                                            $color = 'badge badge-secondary';
                                            break;
                                        case 'truemoney':
                                            $text = 'truemoney';
                                            $color = 'badge badge-primary';
                                            break;

                                        default:
                                            $text = $items->transaction_type;
                                            $color = 'text-white';
                                    }
                                @endphp
                                <td>
                                    <div class="{{ $color }} text-gray-100 font-bold">
                                        {{ $text }}
                                    </div>
                                </td>
                                <td>
                                    @if (Auth::user()->role == 'admin')
                                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-2">
                                            <button class="btn btn-success text-white"
                                                onclick="approveModal({{ $items->id }}, '{{ $items->wallet->user->email }}')">อนุมัติ</button>
                                            <button class="btn btn-error text-white"
                                                onclick="rejectModal({{ $items->id }}, '{{ $items->wallet->user->email }}')">ไม่อนุมัติ</button>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $wallet_transaction->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>

    <dialog id="my_modal_1" class="modal">
        <div class="modal-box bg-white">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 text-gray-800">✕</button>
            </form>
            <form id="approveForm" method="post">

                @csrf
                <h3 class="text-lg text-gray-800 font-bold text-center">เติมเงินเข้าบัญชีผู้ใช้</h3>

                <div class="mt-3">
                    <p class="text-gray-800 font-semibold text-center leading-relaxed">
                        <span>เติมเงินเข้าบัญชีผู้ใช้</span>
                        <span><span id="approveMessageText"></span> นี้หรือไม่?</span>
                    </p>
                </div>

                <div class="flex justify-end mt-5 gap-2">
                    <button type="submit" class="btn btn-success text-white">ตกลง</button>
                    <button onclick="document.getElementById('my_modal_1').close()" type="button"
                        class="btn btn-soft text-white">ยกเลิก</button>
                </div>

            </form>
        </div>
    </dialog>

    <dialog id="my_modal_2" class="modal">
        <div class="modal-box bg-white">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 text-gray-800">✕</button>
            </form>
            <form id="rejectForm" method="post">

                @csrf
                <h3 class="text-lg text-gray-800 font-bold text-center">ไม่เติมเงินให้บัญชีผู้ใช้</h3>

                <div class="mt-3">
                    <p class="text-gray-800 font-semibold text-center leading-relaxed">
                        <span>ไม่เติมเงินให้บัญชีผู้ใช้</span>
                        <span><span id="rejectMessageText"></span> นี้</span>
                    </p>
                </div>

                <div class="flex justify-end mt-5 gap-2">
                    <button type="submit" class="btn btn-success text-white">ตกลง</button>
                    <button onclick="document.getElementById('my_modal_2').close()" type="button"
                        class="btn btn-soft text-white">ยกเลิก</button>
                </div>

            </form>
        </div>
    </dialog>

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
        // fn approve
        function approveModal(id, email) {

            document.getElementById('approveMessageText').textContent = `${email}`;
            document.getElementById('approveForm').action = '/approve_wallet/' + id;
            my_modal_1.showModal();
        }

        // fn reject
        function rejectModal(id, email) {

            document.getElementById('rejectMessageText').textContent = `${email}`;
            document.getElementById('rejectForm').action = '/reject_wallet/' + id;
            my_modal_2.showModal();
        }
    </script>
@endsection
