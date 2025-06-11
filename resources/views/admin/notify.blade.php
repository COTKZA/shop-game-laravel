@extends('layouts.admin')
@section('content')
    <div class="container mx-auto">
        {{-- filtter --}}
        <div class="bg-gradient-to-br from-gray-700 to-gray-800 w-full p-3 rounded-t-lg">
            <h1 class="text-xl font-bold">Filtter</h1>
        </div>
        <div class="bg-gray-700  p-3 shadow-xl rounded-b-lg">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                <button class="w-full text-white text-lg bg-green-500 p-2 rounded-lg font-bold"
                    onclick="my_modal_1.showModal()">
                    เพิ่ม
                </button>

                <form action="/admin/notify" method="get" class="flex gap-1">
                    <input type="search" name="search" placeholder="ค้นหา" value="{{ request('search') }}"
                        class="input-md input-neutral w-full bg-slate-400 border border-neutral-500 rounded-xl text-black font-bold p-2">
                    <button type="submit" class="btn btn-primary text-white p-3">ค้นหา</button>
                </form>

            </div>
        </div>

        <!-- info table -->
        <div class="bg-gradient-to-br from-gray-700 to-gray-800 w-full p-3 rounded-t-lg mt-10">
            <h1 class="text-xl font-bold">Notify Info</h1>
        </div>
        <div class="p-3 shadow-xl rounded-b-lg bg-gray-700 ">
            <div class="overflow-x-auto">
                <table class="table">
                    <thead>
                        <tr class="text-gray-100">
                            <th>ลำดับ</th>
                            <th>ข้อความ</th>
                            <th>ดำเนินการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($show_message as $items)
                            <tr class="text-gray-100">
                                <th>{{ $items->id }}</th>
                                <td>{{ $items->message }}</td>
                                <td>
                                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-2">
                                        <button class="btn btn-warning text-white"
                                            onclick="showEditModal({{ $items->id }}, '{{ $items->message }}')"><i
                                                class="fa-solid fa-pen-to-square"></i>เเก้ไข</button>
                                        <button class="btn btn-error text-white"
                                            onclick="showDeleteModal({{ $items->id }}, '{{ $items->message }}')"><i
                                                class="fa-solid fa-trash"></i>ลบ</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $show_message->withQueryString()->links() }}
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
                <h3 class="text-lg text-gray-800 font-bold text-center">เเก้ไขข้อความ</h3>

                <div class="flex flex-col">
                    <label for="" class="text-gray-800 font-bold">ข้อความ</label>
                    <textarea name="message" id="editMessageText" class="textarea textarea-ghost border border-black w-full text-gray-800"
                        placeholder="เขียนข้อความ"></textarea>
                </div>

                <div class="flex justify-end mt-5 gap-2">
                    <button type="submit" class="btn btn-success text-white">บันทึก</button>
                    <button class="btn btn-soft text-white" type="button"
                        onclick="document.getElementById('my_modal_2').close()">ยกเลิก</button>
                </div>

            </form>

        </div>
    </dialog>

    <!-- delete function -->
    <dialog id="my_modal_3" class="modal">
        <div class="modal-box bg-white">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 text-gray-800">✕</button>
            </form>
            <form id="deleteForm" method="post">

                @csrf
                <h3 class="text-lg text-gray-800 font-bold text-center">ลบข้อความ</h3>

                <div class="mt-3">
                    <p class="text-gray-800 font-semibold text-center leading-relaxed">
                        <span>ต้องการลบข้อความนี้</span>
                        <span><span id="deleteMessageText"></span> นี้หรือไม่?</span>
                    </p>
                </div>

                <div class="flex justify-end mt-5 gap-2">
                    <button type="submit" class="btn btn-error text-white">ลบ</button>
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
        function showEditModal(id, message) {

            document.getElementById('editMessageText').value = message;
            document.getElementById('editForm').action = '/edit_notify/' + id;
            my_modal_2.showModal();
        }

        // fn delete
        function showDeleteModal(id, message) {

            document.getElementById('deleteMessageText').textContent = `${message}`;
            document.getElementById('deleteForm').action = '/delete_notify/' + id;
            my_modal_3.showModal();
        }
    </script>
@endsection
