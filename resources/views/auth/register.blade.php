@extends('layouts.app')

@section('content')
    <div class="relative overflow-hidden bg-cover bg-center px-4 sm:px-0 pb-10"
        style="background-image: linear-gradient(rgba(21, 128, 61, 0.9), rgb(24, 24, 27) 90%), url(&quot;https://i.ibb.co/hXhg16t/image.webp&quot;);">
        <div class="min-h-screen flex flex-col items-center justify-center">
            <div class="flex flex-col items-center justify-center">
                <h1
                    class="mx-auto text-3xl py-2 font-semibold bg-gradient-to-r from-white to-white/20 w-fit bg-clip-text text-transparent">
                    Register new user</h1>
                <p class="text-white/40">สร้างบัญชีผู้ใช้ใหม่</p>

            </div>
            <div class="w-full sm:w-[400px] pt-5">
                <div
                    class="p-6 rounded-xl bg-gradient-to-t from-zinc-900 to-zinc-800 border border-zinc-800 shadow-lg w-full">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mt-1">
                            <p class="text-sm text-white/40 mb-1">ชื่อผู้ใช้</p>
                            <input type="text" id="name" name="name" class="bg-zinc-800 rounded-xl w-full px-4 py-3">
                        </div>
                        <div class="mt-1">
                            <p class="text-sm text-white/40 mb-1">อีเมล</p>
                            <input type="email" id="email" name="email"  class="bg-zinc-800 rounded-xl w-full px-4 py-3">
                        </div>
                        <div class="mt-2">
                            <p class="text-sm text-white/40 mb-1">รหัสผ่าน</p>
                            <input id="password" name="password" name="password" class="bg-zinc-800 rounded-xl w-full px-4 py-3">
                        </div>
                        <div class="mt-2">
                            <p class="text-sm text-white/40 mb-1">ยืนยันรหัสผ่าน</p>
                            <input type="password" id="password-confirm" name="password_confirmation" class="bg-zinc-800 rounded-xl w-full px-4 py-3">
                        </div>

                        <div class="mt-5">
                            <button type="submit"
                                class="w-full bg-gradient-to-tr from-green-500 to-emerald-500 py-3 rounded-xl transition ease-in hover:-translate-y-1 hover:shadow-lg hover:shadow-green-500/40 active:scale-95 text-white font-semibold">
                                สร้างบัญชีผู้ใช้ใหม่
                            </button>
                        </div>
                    </form>
                    <div class="pt-4 flex items-center justify-center">
                        <div class="flex items-center">
                            <p class="text-[12px] text-white/40">หรือมีบัญชีอยู่แล้ว?</p>
                            <a href="/login" class="text-[12px] text-green-500 ml-1 hover:underline">เข้าสู่ระบบ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
