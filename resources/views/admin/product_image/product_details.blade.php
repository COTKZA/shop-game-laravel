@extends('layouts.admin')
@section('content')
    <div class="container mx-auto">

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

        <!-- info table -->
        <div class="bg-black w-full p-3 rounded-t-lg mt-10">
            <h1 class="text-xl font-bold">Product Details</h1>
        </div>
        <div class="p-3 shadow-xl rounded-b-lg min-h-screen bg-gray-700">
            <div class="overflow-x-auto">
                <table class="table">
                    <thead>
                        <tr class="text-gray-100">
                            <th>username</th>
                            <th>email</th>
                            <th>password</th>
                            <th>status</th>
                            <th>ดำเนินการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productDetails as $items)
                            <tr class="text-gray-100">
                                <td>{{ $items->username }}</td>
                                <td>{{ $items->email }}</td>
                                <td>{{ $items->password }}</td>
                                <td class="{{ $items->is_sold == 'available' ? 'text-green-500' : 'text-red-500' }}">
                                    {{ $items->is_sold }}</td>
                                <td>
                                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-2">
                                        <button class="btn btn-warning text-white"
                                            onclick="showEditModal({{ $items->id }}, '{{ $items->username }}', '{{ $items->email }}', '{{ $items->password }}', '{{ $items->is_sold }}')"><i
                                                class="fa-solid fa-pen-to-square"></i>เเก้ไข</button>
                                        <button class="btn btn-error text-white"
                                            onclick="showDeleteModal({{ $items->id }}, '{{ $items->email }}')"><i
                                                class="fa-solid fa-trash"></i>ลบ</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $productDetails->withQueryString()->links() }}
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

            <form action="/add_productdetails" method="post">
                @csrf

                <h3 class="text-lg text-gray-800 font-bold text-center">เพิ่มรหัส</h3>

                <input type="hidden" name="product_id" id="add_product_id" value="">

                <div class="mb-2">
                    <label for="" class="text-gray-800 text-sm font-bold">username</label>
                    <input type="text" name="username"
                        class="input input-ghost border border-gray-500 w-full bg-white text-gray-800">
                </div>

                <div class="mb-2">
                    <label for="" class="text-gray-800 text-sm font-bold">email</label>
                    <input type="email" name="email"
                        class="input input-ghost border border-gray-500 w-full bg-white text-gray-800">
                </div>

                <div class="mb-2">
                    <label for="" class="text-gray-800 text-sm font-bold">password</label>
                    <input type="text" name="password"
                        class="input input-ghost border border-gray-500 w-full bg-white text-gray-800">
                </div>

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
            <form id="editForm" action="" method="post">
                @csrf
                <h3 class="text-lg text-gray-800 font-bold text-center">เเก้ไขรหัส</h3>

                <div class="mb-2">
                    <label for="" class="text-gray-800 text-sm font-bold">username</label>
                    <input type="text" name="username" id="usernameMessageText"
                        class="input input-ghost border border-gray-500 w-full bg-white text-gray-800">
                </div>

                <div class="mb-2">
                    <label for="" class="text-gray-800 text-sm font-bold">email</label>
                    <input type="email" name="email" id="emailMessageText"
                        class="input input-ghost border border-gray-500 w-full bg-white text-gray-800">
                </div>

                <div class="mb-2">
                    <label for="" class="text-gray-800 text-sm font-bold">password</label>
                    <input type="text" name="password" id="passwordMessageText"
                        class="input input-ghost border border-gray-500 w-full bg-white text-gray-800">
                </div>

                <div class="mb-2">
                    <label for="" class="text-gray-800 text-sm font-bold">เลือก</label>
                    <select name="is_sold" id="is_soldMessageText" class="border border-gray-500 rounded-lg text-gray-800 w-full">
                        <option value="available">available</option>
                        <option value="sold">sold</option>
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

    <!-- delete function -->
    <dialog id="my_modal_3" class="modal">
        <div class="modal-box bg-white">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 text-gray-800">✕</button>
            </form>
            <form id="deleteForm" method="post">

                @csrf
                <h3 class="text-lg text-gray-800 font-bold text-center">ลบรหัส</h3>

                <div class="mt-3">
                    <p class="text-gray-800 font-semibold text-center leading-relaxed">
                        <span>ต้องการลบรหัส</span>
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
        // fn add
        function openAddModal(productId) {
            document.getElementById('add_product_id').value = productId;
            my_modal_1.showModal();
        }
        // fn edit
        function showEditModal(id ,username ,email, password, is_sold) {

            document.getElementById('usernameMessageText').value = `${username}`;
            document.getElementById('emailMessageText').value = `${email}`;
            document.getElementById('passwordMessageText').value = `${password}`;
            document.getElementById('is_soldMessageText').value = `${is_sold}`;

            document.getElementById('editForm').action = '/edit_productdetails/' + id;
            my_modal_2.showModal();
        }

        // fn delete
        function showDeleteModal(id ,email) {

            document.getElementById('deleteMessageText').textContent = `${email}`;
            document.getElementById('deleteForm').action = '/delete_productdetails/' + id;
            my_modal_3.showModal();
        }
    </script>
@endsection
