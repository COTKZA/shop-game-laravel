@extends('layouts.admin')
@section('content')
    <div class="container mx-auto">
        @if (Auth::user()->role == 'admin')
            <div class="bg-black w-full p-3 rounded-t-lg">
                <h1 class="text-xl font-bold">Filtter</h1>
            </div>
            <div class="bg-gray-700   p-3 shadow-xl rounded-b-lg">
                <div class="grid grid-cols-1 sm:grid-cols-ๅ gap-2">

                    <button class="w-full text-white text-lg bg-green-500 p-2 rounded-lg font-bold"
                        onclick="openAddModal({{ $product->id }})">
                        เพิ่ม
                    </button>

                </div>
            </div>
        @endif

        <!-- info table -->
        <div class="bg-black w-full p-3 rounded-t-lg mt-10">
            <h1 class="text-xl font-bold">Product Image</h1>
        </div>
        <div class="p-3 shadow-xl rounded-b-lg min-h-screen bg-gray-700">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach ($product->productimage as $items)
                    <div
                        class="bg-gray-800 rounded-lg border border-gray-500 shadow-lg overflow-hidden hover:shadow-2xl transition duration-300">
                        <div class="w-full h-48  flex items-center justify-center">
                            @if ($items->image)
                                <img src="data:image/*;base64,{{ $items->image }}" alt="Product Image"
                                    class="w-full h-full object-center">
                            @else
                                <p class="text-gray-400 col-span-full">ไม่มีรูปสำหรับสินค้านี้</p>
                            @endif
                        </div>

                        {{-- ปุ่มแก้ไขและลบ --}}
                        @if (Auth::user()->role == 'admin')
                            <div class="grid grid-cols-2 gap-2 mt-2  p-4">
                                <button
                                    class="btn bg-yellow-600 hover:bg-yellow-700 text-white py-1 px-2 rounded-md text-sm flex items-center justify-center"
                                    onclick="showEditModal({{ $items->id }})">
                                    <i class="fa-solid fa-pen-to-square mr-1"></i>แก้ไข
                                </button>
                                <button
                                    class="btn bg-red-600 hover:bg-red-700 text-white py-1 px-2 rounded-md text-sm flex items-center justify-center"
                                    onclick="showDeleteModal({{ $items->id }})">
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

            <form action="/add_productimg" method="post" enctype="multipart/form-data">
                @csrf

                <h3 class="text-lg text-gray-800 font-bold text-center">เพิ่มรูปภาพ</h3>

                <input type="hidden" name="product_id" id="add_product_id" value="">

                <fieldset class="fieldset">
                    <legend class="fieldset-legend text-gray-800">เลือกไฟล์</legend>
                    <input type="file" name="images"
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
                <h3 class="text-lg text-gray-800 font-bold text-center">เเก้ไขรูปภาพ</h3>

                <fieldset class="fieldset">
                    <legend class="fieldset-legend text-gray-800">เลือกไฟล์</legend>
                    <input type="file" name="images"
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
                <h3 class="text-lg text-gray-800 font-bold text-center">ลบรูปภาพ</h3>

                <div class="mt-3">
                    <p class="text-gray-800 font-semibold text-center leading-relaxed">
                        <span>ต้องการลบรูปภาพ</span>
                        <span>นี้หรือไม่?</span>
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
        // fn add
        function openAddModal(productId) {
            document.getElementById('add_product_id').value = productId;
            my_modal_1.showModal();
        }
        // fn edit
        function showEditModal(id) {

            document.getElementById('editForm').action = '/edit_productimg/' + id;
            my_modal_2.showModal();
        }

        // fn delete
        function showDeleteModal(id) {
            document.getElementById('deleteForm').action = '/delete_productimg/' + id;
            my_modal_3.showModal();
        }
    </script>
@endsection
