@extends('layouts.app')

@section('content')
    <div class="relative overflow-hidden bg-cover bg-center px-4 sm:px-0 pb-10"
        style="background-image: linear-gradient(rgba(21, 128, 61, 0.9), rgb(24, 24, 27) 90%), url(/img/bg.webp);">

        <div class="container mx-auto mt-30 md:px-4 min-h-screen">
            <div class="text-center">
                <h1
                    class="mx-auto text-3xl py-2 font-semibold bg-gradient-to-r from-white to-white/20 w-fit bg-clip-text text-transparent">
                    สินค้า</h1>
                <p class="text-[16px] text-white/40">Product</p>
            </div>

            <div class="mt-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-5">
                <div class="w-full h-full">
                    {{-- รูปภาพใหญ่ที่จะแสดง --}}
                    <img id="mainImage" src="data:image/*;base64,{{ $product->productimage->first()?->image }}"
                        class="w-full h-[430px] object-center rounded-xl mb-2" alt="">

                    {{-- Thumbnail Scroll --}}
                    <div class="bg-white/10 rounded-xl h-40 overflow-x-auto whitespace-nowrap p-2 flex gap-2 mt-2">
                        @foreach ($product->productimage as $index => $items)
                            <img src="data:image/*;base64,{{ $items->image }}"
                                data-image="data:image/*;base64,{{ $items->image }}"
                                class="h-36 w-auto inline-block rounded-lg object-cover border border-gray-500 cursor-pointer thumbnail"
                                alt="Thumbnail {{ $index }}">
                        @endforeach
                    </div>
                </div>

                <div
                    class="bg-white/10  backdrop-blur-lg border border-white/30 rounded-xl h-[430px] p-6 flex flex-col justify-between">
                    <div>
                        <div class="flex  items-center justify-between gap-2">
                            <h1
                                class="text-white text-[18px] sm:text-[18px]  md:text-[18px] lg:text-[36px] xl:text-[36px] font-bold">
                                {{ $product->name }}</h1>
                            <p
                                class="text-white text-[12px] border border-white/30 bg-white/20 px-5 py-1 rounded-xl font-semibold text-nowrap">
                                เหลือ
                                {{ $product->productDetails->filter(fn($item) => $item->is_sold === 'available')->count() }}
                                ชิ้น</p>
                        </div>
                        <p
                            class="font-bold text-[24px] bg-gradient-to-tr from-green-500 to-emerald-500 w-fit bg-clip-text text-transparent">
                            ราคา {{ $product->price }} บาท</p>
                        <p class="text-white/90 text-sm mt-2">{{ $product->description }}</p>
                    </div>
                    <div>
                        @if (Auth::check())
                            <button type="button"
                                onclick="confirmOrder({{ $product->id }}, '{{ addslashes($product->name) }}', '/buy/product/{{ $product->id }}')"
                                class="w-full p-2 sm:p-3 md:p-3 lg:p-2 xl:p-3 bg-white text-gray-800 text-[18px] font-bold rounded-xl transform hover:translate-y-[-4px] transition duration-300 sm:mt-2 md:mt-2 xl:mt-2">
                                สั่งซื้อ (1 ชิ้น)
                            </button>
                        @else
                            <button type="button" onclick="window.location.href='/login';"
                                class="w-full p-2 sm:p-3 md:p-3 lg:p-2 xl:p-3 bg-white text-gray-800 text-[18px] font-bold rounded-xl transform hover:translate-y-[-4px] transition duration-300 sm:mt-2 md:mt-2 xl:mt-2">
                                สั่งซื้อ (1 ชิ้น)
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const thumbnails = document.querySelectorAll('.thumbnail');
            const mainImage = document.getElementById('mainImage');

            thumbnails.forEach(thumbnail => {
                thumbnail.addEventListener('click', function() {
                    const newSrc = this.getAttribute('data-image');
                    mainImage.setAttribute('src', newSrc);
                });
            });
        });

        // buy product
        function confirmOrder(productId, productName, path) {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            Swal.fire({
                title: 'ยืนยันการสั่งซื้อ?',
                text: `คุณต้องการสั่งซื้อสินค้า: ${productName} ใช่หรือไม่?`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'ใช่, สั่งซื้อ',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(path, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrfToken
                            },
                            body: JSON.stringify({
                                product_id: productId
                            })
                        })
                        .then(res => {
                            if (!res.ok) throw new Error('HTTP error ' + res.status);
                            return res.json();
                        })
                        .then(data => {
                            if (data.success) {
                                Swal.fire('สั่งซื้อสำเร็จ!', data.message || '', 'success');
                            } else {
                                Swal.fire('ผิดพลาด', data.message || 'ไม่สามารถสั่งซื้อได้', 'error');
                            }
                        })
                        .catch(() => {
                            Swal.fire('ผิดพลาด', 'เกิดข้อผิดพลาดขณะส่งข้อมูล', 'error');
                        });
                }
            });
        }
    </script>
@endsection
