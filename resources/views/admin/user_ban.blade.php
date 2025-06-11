@extends('layouts.admin')
@section('content')
    <div class="container mx-auto">
        {{-- filtter --}}
        <div class="bg-gradient-to-br from-gray-700 to-gray-800 w-full p-3 rounded-t-lg">
            <h1 class="text-xl font-bold">Filtter</h1>
        </div>
        <div class="bg-gray-700 p-3 shadow-xl rounded-b-lg">
            <div class="grid grid-cols-1 sm:grid-cols-1 gap-2">

                <form action="/admin/account_ban" method="get" class="flex gap-1">
                    <input type="search" name="search" placeholder="ค้นหา" value="{{ request('search') }}"
                        class="input-md input-neutral w-full bg-slate-400 border border-neutral-500 rounded-xl text-black font-bold p-2">
                    <button type="submit" class="btn btn-primary text-white p-3">ค้นหา</button>
                </form>

            </div>
        </div>

        <!-- info table -->
        <div class="bg-gradient-to-br from-gray-700 to-gray-800 w-full p-3 rounded-t-lg mt-10">
            <h1 class="text-xl font-bold">Account Ban Info</h1>
        </div>
        <div class="p-3 shadow-xl rounded-b-lg bg-gray-700">
            <div class="overflow-x-auto">
                <table class="table">
                    <thead>
                        <tr class="text-gray-100">
                            <th>ชื่อ</th>
                            <th>อีเมล</th>
                            <th>เหตุผล</th>
                            <th>สถานะ</th>
                            <th>การดำเนินการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($account_ban as $items)
                            <tr class="text-gray-100">
                                <td>{{ $items->user->name }}</td>
                                <td>{{ $items->user->email }}</td>
                                <td>{{ $items->reason }}</td>
                                @php
                                    switch ($items->user_status) {
                                        case 'active':
                                            $text = 'ปกติ';
                                            $color = 'badge badge-success';
                                            break;

                                        case 'banned':
                                            $text = 'ถูกระงับ';
                                            $color = 'badge badge-error';
                                            break;

                                        default:
                                            $text = $items->user_status;
                                            $color = 'text-white';
                                            break;
                                    }
                                @endphp
                                <td>
                                    <div class="{{ $color }} text-white font-bold">
                                        {{ $text }}
                                    </div>
                                </td>
                                <td>
                                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-2">
                                        <button class="btn btn-error text-white"
                                            onclick="BanModal({{ $items->id }}, '{{ $items->user->email }}' )"><i
                                                class="fa-solid fa-ban"></i>เเบน</button>
                                        <button class="btn btn-success text-white"
                                            onclick="UnBanModal({{ $items->id }}, '{{ $items->user->email }}')"><i
                                                class="fa-solid fa-unlock"></i>ปลดเเบน</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $account_ban->withQueryString()->links() }}
                </div>
            </div>
        </div>

    </div>

    <!-- ban function -->
    <dialog id="my_modal_1" class="modal">
        <div class="modal-box bg-white">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 text-gray-800">✕</button>
            </form>
            <form id="banForm" method="post" action="">
                @csrf
                <h3 class="text-lg text-gray-800 font-bold text-center">แบนผู้ใช้</h3>

                <div class="mt-3 text-center">
                    <p class="text-gray-800 font-semibold leading-relaxed">
                        <span>ต้องการเเบน</span>
                        <span><span id="banMessageText"></span> นี้หรือไม่?</span>
                    </p>
                </div>

                <div class="flex justify-end mt-5 gap-2">
                    <button type="submit" class="btn btn-error text-white">เเบน</button>
                    <button onclick="document.getElementById('my_modal_1').close()" type="button"
                        class="btn btn-soft text-white">ยกเลิก</button>
                </div>

            </form>
        </div>
    </dialog>

    <!-- unban function -->
    <dialog id="my_modal_2" class="modal">
        <div class="modal-box bg-white">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 text-gray-800">✕</button>
            </form>
            <form id="unbanForm" method="post" action="">
                @csrf
                <h3 class="text-lg text-gray-800 font-bold text-center">ปลดแบนผู้ใช้</h3>

                <div class="mt-3 text-center">
                    <p class="text-gray-800 font-semibold leading-relaxed">
                        <span>ต้องการปลดเเบน</span>
                        <span><span id="unbanMessageText"></span> นี้หรือไม่?</span>
                    </p>
                </div>

                <div class="flex justify-end mt-5 gap-2">
                    <button type="submit" class="btn btn-success text-white">ปลดเเบน</button>
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
        // fn ban
        function BanModal(id, email) {

            document.getElementById('banMessageText').textContent = `${email}`;
            document.getElementById('banForm').action = '/account_ban/' + id;
            my_modal_1.showModal();
        }

        function UnBanModal(id, email) {

            document.getElementById('unbanMessageText').textContent = `${email}`;
            document.getElementById('unbanForm').action = '/account_unban/' + id;
            my_modal_2.showModal();
        }
    </script>
@endsection
