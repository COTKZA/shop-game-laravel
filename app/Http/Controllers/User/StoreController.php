<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Categories;
use App\Models\Products;
use App\Models\ProductImage;
use App\Models\ProductDetails;
use App\Models\Purchases;
use App\Models\Wallets;

class StoreController extends Controller
{
    public function index(){
        $category = Categories::get();

        return view('users.store', compact(['category']));
    }

    public function product_category($id)
    {
        $category = Categories::with('product')->findOrFail($id);

        $category_img = Categories::findOrFail($id);

        return view('users.store.store_card', compact('category','category_img'));
    }

    public function product_details($id)
    {
        $product = Products::findOrFail($id);

        return view('users.store.store_details', compact(['product']));
    }

    public function buy_product(Request $request, $product_id)
    {
        $user = Auth::user();

        // หาตัว ProductDetails ที่ยัง is_sold != 'sold' ของ product_id นั้น (ตัวแรก)
        $availableProductDetail = ProductDetails::where('product_id', $product_id)
                                ->where('is_sold', '!=', 'sold')
                                ->first();

        if (!$availableProductDetail) {
            return response()->json([
                'success' => false,
                'message' => 'สินค้าหมด ไม่มีของเหลือให้ซื้อ'
            ]);
        }

        $wallet = Wallets::where('user_id', $user->id)->first();
        if (!$wallet) {
            return response()->json(['success' => false, 'message' => 'ไม่พบข้อมูล Wallet ของผู้ใช้']);
        }

        $product = $availableProductDetail->product;
        if (!$product) {
            return response()->json(['success' => false, 'message' => 'สินค้าไม่ถูกต้อง']);
        }

        if ($wallet->balance < $product->price) {
            return response()->json(['success' => false, 'message' => 'ยอดเงินใน Wallet ไม่เพียงพอ']);
        }

        // สร้างรายการซื้อ
        Purchases::create([
            'user_id' => $user->id,
            'product_details_id' => $availableProductDetail->id,
            'price' => $product->price,
        ]);

        // หักเงินใน Wallet
        $wallet->balance -= $product->price;
        $wallet->save();

        // อัพเดทสถานะสินค้าเป็น sold
        $availableProductDetail->update(['is_sold' => 'sold']);

        return response()->json(['success' => true, 'message' => 'ซื้อสินค้าสำเร็จ']);
    }
}
