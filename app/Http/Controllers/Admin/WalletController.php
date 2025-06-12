<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wallets;

class WalletController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Wallets::with('user');

        if ($search) {
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%");
            });
        }

        $user_wallet = $query->paginate(10);

        return view('admin.wallet', compact(['user_wallet']));
    }
}
