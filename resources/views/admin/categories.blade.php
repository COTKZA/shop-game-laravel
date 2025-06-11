@extends('layouts.admin')
@section('content')
    <div class="container mx-auto">
        {{-- filtter --}}
        <div class="bg-gradient-to-br from-gray-700 to-gray-800 w-full p-3 rounded-t-lg">
            <h1 class="text-xl font-bold">Filtter</h1>
        </div>
        <div class="bg-gray-700   p-3 shadow-xl rounded-b-lg">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">

                <button class="w-full text-white text-lg bg-green-500 p-2 rounded-lg font-bold"
                    onclick="my_modal_1.showModal()">
                    เพิ่ม
                </button>

                <form action="/admin/categories" method="get" class="flex gap-1">
                    <input type="search" name="search" placeholder="ค้นหา" value="{{ request('search') }}"
                        class="input-md input-neutral w-full bg-slate-400  border border-neutral-500 rounded-xl text-black font-bold p-2">
                    <button type="submit" class="btn btn-primary text-white p-3">ค้นหา</button>
                </form>

            </div>
        </div>

        <!-- info table -->
        <div class="bg-gradient-to-br from-gray-700 to-gray-800 w-full p-3 rounded-t-lg mt-10">
            <h1 class="text-xl font-bold">Categories Info</h1>
        </div>
        <div class="p-3 shadow-xl rounded-b-lg min-h-screen bg-gray-700 \">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-4">
                @foreach ($category as $items)
                    <div class="bg-gray-800 rounded-xl border border-gray-500 overflow-hidden shadow-md hover:shadow-xl transition duration-300">
                        {{-- รูปภาพหมวดหมู่ --}}
                        <div class="w-full h-40 bg-gray-700 flex items-center justify-center">
                            @if ($items->image)
                                <img src="data:image/*;base64,{{ $items->image }}" class="w-full h-full object-center"
                                    alt="Category Image">
                            @else
                                <span class="text-gray-400 text-sm">ไม่มีรูป</span>
                            @endif
                        </div>

                        {{-- ชื่อหมวดหมู่ --}}
                        <div class="p-4 text-center">
                            <h1 class="text-lg font-semibold text-white">{{ $items->name }}</h1>
                        </div>

                        {{-- ปุ่ม --}}
                        <div class="grid grid-cols-2 gap-2 p-4 bg-gray-900">
                            <button
                                class="bg-yellow-600 hover:bg-yellow-700 text-white text-sm py-1 px-2 rounded flex items-center justify-center"
                                onclick="showEditModal({{ $items->id }}, '{{ $items->name }}')">
                                <i class="fa-solid fa-pen-to-square mr-1"></i> แก้ไข
                            </button>
                            <button
                                class="bg-red-600 hover:bg-red-700 text-white text-sm py-1 px-2 rounded flex items-center justify-center"
                                onclick="showDeleteModal({{ $items->id }}, '{{ $items->name }}')">
                                <i class="fa-solid fa-trash mr-1"></i> ลบ
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>


    <!-- add function -->
    <dialog id="my_modal_1" class="modal">
        <div class="modal-box bg-white">

            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 text-gray-800">✕</button>
            </form>

            <form action="/add_categories" method="post" enctype="multipart/form-data">

                @csrf
                <h3 class="text-lg text-gray-800 font-bold text-center">เพิ่มหมวดหมู่</h3>

                <div class="flex flex-col">
                    <label for="" class="text-gray-800 font-bold">ชื่อ</label>
                    <input type="text" name="name"
                        class="input input-ghost w-full border border-gray-500 text-gray-800">
                </div>

                <fieldset class="fieldset">
                    <legend class="fieldset-legend text-gray-800">เลือกไฟล์</legend>
                    <input type="file" name="image"
                        class="file-input bg-white w-full border border-gray-500 text-gray-800" />
                </fieldset>

                <div class="flex justify-end mt-3 gap-2">
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
            <form id="editForm" action="" method="post" enctype="multipart/form-data">

                @csrf
                <h3 class="text-lg text-gray-800 font-bold text-center">เเก้ไขหมวดหมู่</h3>

                <div class="flex flex-col">
                    <label for="" class="text-gray-800 font-bold">ชื่อ</label>
                    <input type="text" name="name" id="editMessageText"
                        class="input input-ghost w-full border border-gray-500 text-gray-800">
                </div>

                <fieldset class="fieldset">
                    <legend class="fieldset-legend text-gray-800">เลือกไฟล์</legend>
                    <input type="file" name="image"
                        class="file-input bg-white w-full border border-gray-500 text-gray-800" />
                </fieldset>

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
                <h3 class="text-lg text-gray-800 font-bold text-center">ลบหมวดหมู่</h3>

                <div class="mt-3">
                    <p class="text-gray-800 font-semibold text-center leading-relaxed">
                        <span>ต้องการลบหมวดหมู่นี้</span>
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
        function showEditModal(id, name) {

            document.getElementById('editMessageText').value = name;
            document.getElementById('editForm').action = '/edit_categories/' + id;
            my_modal_2.showModal();
        }

        // fn delete
        function showDeleteModal(id, name) {

            document.getElementById('deleteMessageText').textContent = `${name}`;
            document.getElementById('deleteForm').action = '/delete_categories/' + id;
            my_modal_3.showModal();
        }
    </script>
@endsection
