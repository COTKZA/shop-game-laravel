<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Categories::query();

        if ($search) {
           $query->where('name', 'like', "%$search%");
        }

        $category = $query->paginate(10);

        return view('admin.categories', compact(['category']));
    }

    public function add_categories(Request $request){
        $request->validate([
            'name' => 'required',
            'image' => 'required|file|image',
        ]);

        $imageFile = $request->file('image');
        $imageData = file_get_contents($imageFile);
        $base64Image = base64_encode($imageData);

        Categories::create([
            'name' => $request->name,
            'image' => $base64Image,
        ]);

        return back()->with('success', 'เพิ่มหมวดหมู่เรียบร้อย');
    }

    public function delete_categories(Request $request, $id){
        $category = Categories::findOrFail($id);

        $category->delete();

        return back()->with('success', 'ลบหมวดหมู่เรียบร้อย');
    }

    public function edit_categories(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|file|image',
        ]);

        $category = Categories::findOrFail($id);

        $category->name = $request->name;

        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $imageData = file_get_contents($imageFile);
            $base64Image = base64_encode($imageData);
            $category->image = $base64Image;
        }

        $category->save();

        return back()->with('success', 'แก้ไขหมวดหมู่เรียบร้อย');
    }

}
