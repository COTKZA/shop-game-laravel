<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Purchases;
use App\Models\Products;
use App\Models\Categories;
use App\Models\ProductDetails;
use App\Models\WalletTransactions;
use App\Models\Wallets;
use App\Models\Bans;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $startDateParsed = null;
        $endDateParsed = null;


        // ตั้งค่า default เป็นวันนี้ ถ้าไม่ได้กรอก
        if (!empty($startDate) && !empty($endDate))
        {
            $startDateParsed = Carbon::parse($startDate)->startOfDay();
            $endDateParsed = Carbon::parse($endDate)->endOfDay();
        }


        $userQuery = User::query();
        if ($startDateParsed && $endDateParsed) {
            $userQuery->whereBetween('created_at', [$startDateParsed, $endDateParsed]);
        }
        $user = $userQuery->count();

        $incomeQuery = Purchases::query();
        if ($startDateParsed && $endDateParsed) {
            $incomeQuery->whereBetween('purchased_at', [$startDateParsed, $endDateParsed]);
        }
        $income = $incomeQuery->sum('price');

        $product = Products::count();
        $category = Categories::count();
        $product_available = ProductDetails::where('is_sold', 'available')->count();

        $productSoldQuery = ProductDetails::where('is_sold', 'sold');
        if ($startDateParsed && $endDateParsed) {
            $productSoldQuery->whereBetween('created_at', [$startDateParsed, $endDateParsed]);
        }
        $product_sold = $productSoldQuery->count();

         $topupQuery = WalletTransactions::where('payment_state', 'success');
        if ($startDateParsed && $endDateParsed) {
            $topupQuery->whereBetween('created_at', [$startDateParsed, $endDateParsed]);
        }
        $topup_amount = $topupQuery->sum('amount');

        $user_wallet = Wallets::sum('balance');

        $use_ban = Bans::where('user_status', 'banned')->count();

        return view('admin.dashboard',
              compact(
                [
                    'user',
                    'income',
                    'product',
                    'category',
                    'product_available',
                    'product_sold',
                    'topup_amount',
                    'user_wallet',
                    'use_ban',
                    'startDate',
                    'endDate'
                ]));
    }
}
