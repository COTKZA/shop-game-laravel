<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bans;

class AccountsController extends Controller
{
    public function index(Request $request){
        $search = $request->input('search');
        $query = User::query();

        if ($search){
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%");
            });
        }

        $users = $query->paginate(10);

        return view('admin.accounts', compact(['users']));
    }

    public function ban_accounts(Request $request, $id){
        $request->validate([
            'reason' => 'required',
        ]);

        $users = User::findOrFail($id);

        Bans::create([
            'user_id' => $users->id,
            'reason' => $request->reason,
        ]);

        return back()->with('success', 'เเบนผู้ใช้นี้เรียบร้อยเเล้ว');
    }

    public function edit_accounts(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
        ]);

        $users = User::findOrFail($id);

        $users->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

       return back()->with('success', 'เเก้ไขผู้ใช้นี้เรียบร้อยเเล้ว');
    }
}
