<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notify;
use App\Models\Products;
use App\Models\ProductDetails;
use App\Models\Purchases;

class HomeController extends Controller
{
    public function index()
    {
        $member_count = User::count();
        $notify_message = Notify::get();
        $product_count = Products::count();
        $product_details_count = ProductDetails::where('is_sold', '!=', 'sold')->count();
        $purchases_count = ProductDetails::where('is_sold', '=', 'sold')->count();

        $product = Products::orderBy('created_at', 'desc')->get();

        return view('users.home',
        compact([
            'member_count',
            'notify_message',
            'product_count',
            'product_details_count',
            'purchases_count',
            'product',
        ]));
    }
}
