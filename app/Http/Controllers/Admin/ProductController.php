<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
use App\Models\ProductImage;
use App\Models\ProductDetails;

class ProductController extends Controller
{
    public function index(Request $request){
        $search = $request->input('search');
        $query = Products::query();

        $category = Categories::all();

        if ($search) {
           $query->where('name', 'like', "%$search%");
        }

        $product = $query->paginate(10);

        return view('admin.product', compact(['product','category']));
    }

    public function add_product(Request $request){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category' => 'required',
            'images.*' => 'required|image',
        ]);

        // บันทึกสินค้า
        $product = Products::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category,
        ]);

        // บันทึกรูปหลายไฟล์
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                $imageData = file_get_contents($imageFile);
                $base64Image = base64_encode($imageData);

                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $base64Image,
                ]);
            }
        }

        return back()->with('success', 'เพิ่มสินค้าพร้อมรูปสำเร็จ');
    }

    public function edit_product(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category' => 'required',
        ]);

        $product = Products::findOrFail($id);

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category
        ]);

        return back()->with('success', 'เเก้สินค้าสำเร็จ');
    }

    public function delete_product($id)
    {
        $product = Products::findOrFail($id);
        $product_images = ProductImage::where('product_id', $id)->get();
        foreach ($product_images as $img) {
            $img->delete();
        }

        $product->delete();

        return back()->with('success', 'ลบสินค้าเเเละรูปทั้งหมดสำเร็จ');
    }

    // product image
    public function product_img($id)
    {
        $product = Products::with('productimage')->findOrFail($id);

        return view('admin.product_image.img_product', compact('product'));
    }

    public function add_productimg(Request $request){
        $request->validate([
            'images' => 'required|image',
            'product_id' => 'required|integer|exists:products,id',
        ]);

        if ($request->hasFile('images')) {
            $imageFile = $request->file('images');
            $imageData = file_get_contents($imageFile);
            $base64Image = base64_encode($imageData);

            ProductImage::create([
                'product_id' => $request->product_id,
                'image' => $base64Image,
            ]);
        } else {
            return back()->with('error', 'ไม่มีไฟล์รูปภาพ');
        }

        return back()->with('success', 'เพิ่มรูปสินค้าสำเร็จ');
    }

    public function edit_productimg(Request $request, $id)
    {
        $request->validate([
            'images' => 'required|image',
        ]);

        $product_images = ProductImage::findOrFail($id);

        if ($request->hasFile('images')) {
            $imageFile = $request->file('images');
            $imageData = file_get_contents($imageFile);
            $base64Image = base64_encode($imageData);

            $product_images->update([
                'image' => $base64Image,
            ]);
        } else {
            return back()->with('error', 'ไม่มีไฟล์รูปภาพ');
        }

        return back()->with('success', 'เเก้ไขรูปสินค้าสำเร็จ');
    }

    public function delete_productimg($id)
    {
        $product_images = ProductImage::findOrFail($id);

        if (!$product_images){
            return back()->with('error', 'ไม่สามารถลบรูปภาพ');
        }

        $product_images->delete();

        return back()->with('success', 'ลบรูปภาพสำเร็จ');
    }

    // product details
    public function product_details(Request $request,$id){
        $search = $request->input('search');

        $product = Products::findOrFail($id);
        $productDetailsQuery = $product->productDetails();

        if ($search){
            $productDetailsQuery->where(function ($query) use ($search){
                $query->where('username', 'like', '%' .$search . '%')
                    ->orwhere('email', 'like', '%' .$search . '%')
                    ->orwhere('password', 'like', '%' .$search . '%');
            });
        }

        $productDetails = $productDetailsQuery->paginate(10);

        return view('admin.product_image.product_details',compact(['product', 'productDetails', 'search']));
    }

    public function add_productdetails(Request $request){
        $request->validate([
            'product_id' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        ProductDetails::create([
            'product_id' => $request->product_id,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return back()->with('success', 'เพิ่มรหัสสินค้าสำเร็จ');
    }

    public function edit_productdetails(Request $request, $id){
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'is_sold' => 'required',
        ]);

        $product_details = ProductDetails::findOrFail($id);

        $product_details->update([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'is_sold' => $request->is_sold,
        ]);

        return back()->with('success', 'เเก้ไขรหัสสินค้าสำเร็จ');
    }

    public function delete_productdetails($id){
        $product_details = ProductDetails::findOrFail($id);
        $product_details->delete();

        return back()->with('success', 'ลบรหัสสำเร็จ');
    }
}
