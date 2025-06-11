@extends('layouts.admin')
@section('content')
    <div class="container mx-auto">
        {{-- filtter --}}
        <div class="bg-gradient-to-br from-gray-700 to-gray-800 w-full p-3 rounded-t-lg">
            <h1 class="text-xl font-bold">Filtter</h1>
        </div>
        <div class="bg-gray-700   p-3 shadow-xl rounded-b-lg">
            <div class="grid grid-cols-1 sm:grid-cols-1 gap-2">

                <form action="/admin/accounts" method="get" class="flex gap-1">
                    <input type="search" name="search" placeholder="ค้นหา" value="{{ request('search') }}"
                        class="input-md input-neutral w-full bg-slate-400  border border-neutral-500 rounded-xl text-black font-bold p-2">
                    <button type="submit" class="btn btn-primary text-white p-3">ค้นหา</button>
                </form>

            </div>
        </div>

        <!-- info table -->
        <div class="bg-gradient-to-br from-gray-700 to-gray-800 w-full p-3 rounded-t-lg mt-10">
            <h1 class="text-xl font-bold">Account Info</h1>
        </div>
        <div class="p-3 shadow-xl rounded-b-lg bg-gray-700">
            <div class="overflow-x-auto">
                <table class="table">
                    <thead>
                        <tr class="text-gray-100">
                            <th>ลำดับ</th>
                            <th>ชื่อ</th>
                            <th>อีเมล</th>
                            <th>สถานะบัญชี</th>
                            <th>ตำแหน่ง</th>
                            <th>ดำเนินการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $items)
                            <tr class="text-gray-100">
                                <th>{{ $items->id }}</th>
                                <td>{{ $items->name }}</td>
                                <td>{{ $items->email }}</td>
                                @php
                                    if ($items->user_ban) {
                                        switch ($items->user_ban->user_status) {
                                            case 'active':
                                                $text = 'ปกติ';
                                                $color = 'badge badge-success';
                                                break;

                                            case 'banned':
                                                $text = 'ถูกระงับ';
                                                $color = 'badge badge-error';
                                                break;

                                            default:
                                                $text = $items->user_ban->user_status;
                                                $color = 'text-white';
                                                break;
                                        }
                                    } else {
                                        $text = 'ปกติ';
                                        $color = 'badge badge-success';
                                    }
                                @endphp
                                <td>
                                    <div class="{{ $color }} text-white font-bold">
                                        {{ $text }}
                                    </div>
                                </td>
                                <td>{{ $items->role }}</td>
                                <td>
                                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-2">
                                        <button class="btn btn-warning text-white"
                                            onclick="showEditModal({{ $items->id }}, '{{ $items->email }}', '{{ $items->name }}', '{{ $items->role }}')"><i
                                                class="fa-solid fa-pen-to-square"></i>เเก้ไข</button>
                                        <button class="btn btn-error text-white"
                                            onclick="showBanModal({{ $items->id }}, '{{ $items->email }}')"><i
                                                class="fa-solid fa-ban"></i>เเบน</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $users->withQueryString()->links() }}
                </div>
            </div>
        </div>

    </div>

    <!-- add function -->
    <dialog id="my_modal_1" class="modal">
        <div class="modal-box bg-white">

            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 text-gray-800">✕</button>
            </form>

            <form action="/add_notify" method="post">

                @csrf
                <h3 class="text-lg text-gray-800 font-bold text-center">เพิ่มข้อความ</h3>

                <div class="flex flex-col">
                    <label for="" class="text-gray-800 font-bold">ข้อความ</label>
                    <textarea name="message" class="textarea textarea-ghost border border-black w-full text-gray-800"
                        placeholder="เขียนข้อความ" required></textarea>
                </div>

                <div class="flex justify-end mt-5 gap-2">
                    <button type="submit" class="btn btn-success text-white">บันทึก</button>
                    <button type="button" onclick="document.getElementById('my_modal_1').close()"
                        class="btn btn-soft text-white">ยกเลิก</button>
                </div>

            </form>

        </div>
    </dialog>

    <!-- edit function -->
    <dialog id="my_modal_2" class="modal">
        <div class="modal-box bg-white">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 text-gray-800">✕</button>
            </form>
            <form id="editForm" action="" method="post">

                @csrf
                <h3 class="text-lg text-gray-800 font-bold text-center">เเก้ไขผู้ใข้</h3>

                <div class="flex flex-col mt-2">
                    <label for="" class="text-gray-800 text-sm font-bold">ชื่อ</label>
                    <input type="text" name="name" id="nameMessageText"
                        class="input input-md w-full bg-white text-gray-800 text-sm border border-gray-500">
                </div>

                <div class="flex flex-col mt-2">
                    <label for="" class="text-gray-800 text-sm font-bold">อีเมล</label>
                    <input type="text" name="email" id="emailMessageText"
                        class="input input-md w-full bg-white text-gray-800 text-sm border border-gray-500">
                </div>

                <div class="flex flex-col mt-2">
                    <label for="" class="text-gray-800 text-sm font-bold">ตำเเหน่ง</label>
                    <select name="role" id="roleMessageText"
                        class="select w-full bg-white border border-gray-500  text-gray-800 text-sm">
                        <option disabled selected>เลือกจำเเหน่ง</option>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>

                <div class="flex justify-end mt-5 gap-2">
                    <button type="submit" class="btn btn-success text-white">บันทึก</button>
                    <button class="btn btn-soft text-white" type="button"
                        onclick="document.getElementById('my_modal_2').close()">ยกเลิก</button>
                </div>

            </form>

        </div>
    </dialog>

    <!-- ban function -->
    <dialog id="my_modal_3" class="modal">
        <div class="modal-box bg-white">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 text-gray-800">✕</button>
            </form>
            <form id="banForm" method="post" action="">
                @csrf
                <h3 class="text-lg text-gray-800 font-bold text-center">แบนผู้ใช้</h3>

                <div class="mt-3">
                    <p class="text-gray-800 font-semibold leading-relaxed">
                        <span>ต้องการเเบน</span>
                        <span><span id="banMessageText"></span> นี้หรือไม่?</span>
                    </p>
                    <textarea name="reason" class="textarea textarea-ghost border border-black w-full text-gray-800"
                        placeholder="เขียนข้อความ" required></textarea>
                </div>

                <div class="flex justify-end mt-5 gap-2">
                    <button type="submit" class="btn btn-error text-white">เเบน</button>
                    <button onclick="document.getElementById('my_modal_3').close()" type="button"
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
        // fn edit
        function showEditModal(id, email, name, role) {

            document.getElementById('emailMessageText').value = email;
            document.getElementById('nameMessageText').value = name;
            document.getElementById('roleMessageText').value = role;
            document.getElementById('editForm').action = '/edit_accounts/' + id;
            my_modal_2.showModal();
        }

        // fn ban
        function showBanModal(id, email) {

            document.getElementById('banMessageText').textContent = `${email}`;
            document.getElementById('banForm').action = '/ban_accounts/' + id;
            my_modal_3.showModal();
        }
    </script>
@endsection
