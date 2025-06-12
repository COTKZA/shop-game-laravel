@extends('layouts.admin')
@section('content')
    <div class="container mx-auto ">
        {{-- filtter --}}
        @if (Auth::user()->role == 'admin')
            <div class="bg-gradient-to-br from-gray-700 to-gray-800 w-full p-3 rounded-t-lg">
                <h1 class="text-xl font-bold">Filtter</h1>
            </div>
            <div class="bg-gray-700 p-3 shadow-xl rounded-b-lg">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">

                    <button class="w-full text-white text-lg bg-green-500 p-2 rounded-lg font-bold"
                        onclick="my_modal_1.showModal()">
                        เพิ่ม
                    </button>


                    <form action="/admin/product" method="get" class="flex gap-1">
                        <input type="search" name="search" placeholder="ค้นหา" value="{{ request('search') }}"
                            class="input-md input-neutral w-full bg-slate-400 border border-neutral-500 rounded-xl text-black font-bold p-2">
                        <button type="submit" class="btn btn-primary text-white p-3">ค้นหา</button>
                    </form>

                </div>
            </div>
        @endif
        <!-- info table -->
        <div class="bg-gradient-to-br from-gray-700 to-gray-800 w-full p-3 rounded-t-lg mt-10">
            <h1 class="text-xl font-bold">Product Info</h1>
        </div>
        <div class="p-3 shadow-xl rounded-b-lg min-h-screen bg-gray-700">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach ($product as $items)
                    <div
                        class="bg-gray-800 rounded-lg border border-gray-500 shadow-lg overflow-hidden hover:shadow-2xl transition duration-300">
                        <div class="w-full h-48  flex items-center justify-center">
                            @if ($items->productimage->first())
                                <img src="data:image/*;base64,{{ $items->productimage->first()->image }}"
                                    class="w-full h-full object-center" alt="Product Image">
                            @else
                                <span class="text-gray-400 text-sm">ไม่มีรูป</span>
                            @endif
                        </div>

                        <div class="p-4 text-white space-y-2">
                            {{-- หมวดหมู่ --}}
                            @if ($items->category)
                                <div class="text-sm bg-gray-700 text-green-300 px-2 py-1 rounded-md inline-block">
                                    หมวดหมู่: <span class="text-white font-semibold">{{ $items->category->name }}</span>
                                </div>
                            @else
                                <div class="text-sm bg-gray-600 text-white px-2 py-1 rounded-md inline-block">
                                    ไม่ระบุหมวดหมู่
                                </div>
                            @endif

                            {{-- ชื่อสินค้า --}}
                            <div class="text-lg font-bold text-green-400">ชื่อ:
                                <span class="text-white">{{ $items->name }}</span>
                            </div>

                            {{-- รายละเอียด --}}
                            <div class="text-sm text-gray-300">รายละเอียด: {{ $items->description }}</div>

                            {{-- ราคา --}}
                            <div class="text-md text-green-400 font-semibold">ราคา: {{ $items->price }} บาท</div>
                        </div>

                        {{-- ปุ่ม --}}
                        @if (Auth::user()->role == 'admin')
                            <div class="grid grid-cols-2 gap-2 p-4">
                                <a href="/admin/product/img/{{ $items->id }}"
                                    class="btn bg-blue-600 hover:bg-blue-700 text-white py-1 px-2 rounded-md text-sm flex items-center justify-center">
                                    <i class="fa-solid fa-eye mr-1"></i>รูป
                                </a>
                                <a href="/admin/product/product_details/{{ $items->id }}"
                                    class="btn bg-green-600 hover:bg--green-700 text-white py-1 px-2 rounded-md text-sm flex items-center justify-center">
                                    <i class="fa-solid fa-plus mr-1"></i>เพิ่มรหัส
                                </a>
                                <button
                                    class="btn bg-yellow-600 hover:bg-yellow-700 text-white py-1 px-2 rounded-md text-sm flex items-center justify-center"
                                    onclick="showEditModal({{ $items->id }}, '{{ $items->name }}', '{{ $items->description }}', '{{ $items->price }}', '{{ $items->category_id }}')">
                                    <i class="fa-solid fa-pen-to-square mr-1"></i>แก้ไข
                                </button>
                                <button
                                    class="btn bg-red-600 hover:bg-red-700 text-white py-1 px-2 rounded-md text-sm flex items-center justify-center"
                                    onclick="showDeleteModal({{ $items->id }}, '{{ $items->name }}')">
                                    <i class="fa-solid fa-trash mr-1"></i>ลบ
                                </button>
                            </div>
                        @endif
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

            <form action="/add_product" method="post" enctype="multipart/form-data">

                @csrf
                <h3 class="text-lg text-gray-800 font-bold text-center">เพิ่มสินค้า</h3>

                <div class="flex flex-col mb-2">
                    <label for="" class="text-gray-800 font-bold mt-1">ชื่อ</label>
                    <input type="text" name="name"
                        class="input input-ghost border border-gray-500 w-full bg-white text-gray-800" required>
                </div>

                <div class="flex flex-col mb-2">
                    <label for="" class="text-gray-800 font-bold  mb-1">รายละเอียด</label>
                    <textarea name="description" class="textarea textarea-ghost border border-black w-full text-gray-800"
                        placeholder="เขียนข้อความ" required></textarea>
                </div>

                <div class="flex flex-col mb-2">
                    <label class="text-gray-800 font-bold mb-1">ราคา</label>
                    <input type="text" name="price"
                        class="input input-ghost border border-gray-500 w-full bg-white text-gray-800" required>
                </div>

                <div class="mb-2">
                    <fieldset class="fieldset">
                        <legend class="text-gray-800 font-bold mb-1">เลือกไฟล์</legend>
                        <input type="file" name="images[]"
                            class="file-input bg-white w-full border border-gray-500 text-gray-800" required />
                    </fieldset>
                </div>

                <div class="flex flex-col mb-2">
                    <label class="text-gray-800 font-bold mb-1">หมวดหมู่</label>
                    <select name="category" class="select select-neutral w-full bg-white text-gray-800 font-medium">
                        <option disabled selected>เลือกหมวดหมู่</option>
                        @foreach ($category as $items)
                            <option value="{{ $items->id }}">
                                {{ $items->name }}
                            </option>
                        @endforeach
                    </select>
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
                <h3 class="text-lg text-gray-800 font-bold text-center">แก้ไขสินค้า</h3>

                <div class="flex flex-col mb-2">
                    <label class="text-gray-800 font-bold mt-1">ชื่อ</label>
                    <input type="text" name="name" id="name"
                        class="input input-ghost border border-gray-500 w-full bg-white text-gray-800" required>
                </div>

                <div class="flex flex-col mb-2">
                    <label class="text-gray-800 font-bold mb-1">รายละเอียด</label>
                    <textarea name="description" id="description"
                        class="textarea textarea-ghost border border-black w-full text-gray-800" placeholder="เขียนข้อความ" required></textarea>
                </div>

                <div class="flex flex-col mb-2">
                    <label class="text-gray-800 font-bold mb-1">ราคา</label>
                    <input type="text" name="price" id="price"
                        class="input input-ghost border border-gray-500 w-full bg-white text-gray-800" required>
                </div>

                <div class="flex flex-col mb-2">
                    <label class="text-gray-800 font-bold mb-1">หมวดหมู่</label>
                    <select name="category" id="category"
                        class="select select-neutral w-full bg-white text-gray-800 font-medium" required>
                        <option disabled selected>เลือกหมวดหมู่</option>
                        @foreach ($category as $items)
                            <option value="{{ $items->id }}">
                                {{ $items->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex justify-end mt-5 gap-2 ">
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
                        <span>ต้องการลบสินค้า</span>
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

    <!-- add id user function -->
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
        function showEditModal(id, name, description, price, categoryId) {

            document.getElementById('name').value = name;
            document.getElementById('description').value = description;
            document.getElementById('price').value = price;
            document.getElementById('category').value = categoryId;

            document.getElementById('editForm').action = '/edit_product/' + id;
            my_modal_2.showModal();
        }

        // fn delete
        function showDeleteModal(id, name) {

            document.getElementById('deleteMessageText').textContent = `${name}`;
            document.getElementById('deleteForm').action = '/delete_productdetails/' + id;
            my_modal_3.showModal();
        }
    </script>
@endsection
