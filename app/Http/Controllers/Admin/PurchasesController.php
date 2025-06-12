<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Purchases;

class PurchasesController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Purchases::with('user');

        if ($search) {
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('email', 'like', "%$search%");
            });
        }

        $purchases = $query->paginate(10);

        return view('admin.purchases', compact(['purchases']));
    }
}
