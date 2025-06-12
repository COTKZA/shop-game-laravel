@extends('layouts.app')

@section('content')
    <div class="relative overflow-hidden bg-cover bg-center px-4 sm:px-0 pb-10"
        style="background-image: linear-gradient(rgba(21, 128, 61, 0.9), rgb(24, 24, 27) 90%), url('https://i.ibb.co/hXhg16t/image.webp');">
        <div class="min-h-screen flex flex-col items-center justify-center">
            <div class="flex flex-col items-center justify-center">
                <h1
                    class="mx-auto text-3xl py-2 font-semibold bg-gradient-to-r from-white to-white/20 w-fit bg-clip-text text-transparent">
                    Reset Password
                </h1>
                <p class="text-white/40">รีเซ็ตรหัสผ่าน</p>
            </div>
            <div class="w-full sm:w-[400px] pt-5">
                <div
                    class="p-6 rounded-xl bg-gradient-to-t from-zinc-900 to-zinc-800 border border-zinc-800 shadow-lg w-full">
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mt-1">
                            <p class="text-sm text-white/40 mb-1">อีเมล</p>
                            <input type="email" id="email" name="email"
                                class="bg-zinc-800 rounded-xl w-full px-4 py-3" value="{{ old('email') }}" required
                                autocomplete="email" autofocus>
                        </div>

                        <div class="mt-5">
                            <button type="submit"
                                class="w-full bg-gradient-to-tr from-green-500 to-emerald-500 py-3 rounded-xl transition ease-in hover:-translate-y-1 hover:shadow-lg hover:shadow-green-500/40 active:scale-95 text-white font-semibold">
                                ส่งลิงก์รีเซ็ตรหัสผ่าน
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- SweetAlert2 for Success and Error -->
    @if (session('status'))
        <script>
            Swal.fire({
                title: "สำเร็จ!",
                text: "{{ session('status') }}",
                icon: "success",
                confirmButtonColor: "#10B981",
                confirmButtonText: "ตกลง"
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
            Swal.fire({
                title: "เกิดข้อผิดพลาด!",
                text: "อีเมลไม่ถูกต้อง",
                icon: "error",
                confirmButtonColor: "#EF4444",
                confirmButtonText: "ตกลง"
            });
        </script>
    @endif
@endsection
