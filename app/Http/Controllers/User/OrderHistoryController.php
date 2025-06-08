<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Purchases;


class OrderHistoryController extends Controller
{
    public function index(){
        $user = Auth::user();

        $purchases = Purchases::where('user_id', $user->id);

        $purchases_user = $purchases->paginate(10);

        return view('users.history.orders', compact(['purchases_user']));
    }
}
