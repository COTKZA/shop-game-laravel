<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bans;

class AccountBanController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Bans::with('user');

        if ($search) {
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%");
            });
        }

        $account_ban = $query->paginate(10);

        return view('admin.user_ban', compact(['account_ban']));
    }

    public function account_ban($id){
        $account = Bans::findOrFail($id);

        if ($account->user_status == 'banned'){
            return back()->with('error', 'บัญชีนี้ถูกเเบนไปเเล้ว');
        }

        $account->update([
            'user_status' => 'banned',
        ]);

        return back()->with('success', 'บัญชีถูกเเบนเรียบร้อยเเล้ว');
    }

    public function account_unban($id){
        $account = Bans::findOrFail($id);

        if ($account->user_status == 'active'){
            return back()->with('error', 'บัญชีนี้ปลดเเบนไปเเล้ว');
        }

        $account->update([
            'user_status' => 'active',
        ]);

        return back()->with('success', 'บัญชีปลดเเบนเรียบร้อยเเล้ว');
    }
}
