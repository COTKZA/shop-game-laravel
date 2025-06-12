<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notify;

class NotifyController extends Controller
{
    // show info notify
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Notify::query();

        if ($search) {
           $query->where('message', 'like', "%$search%");
        }

        $show_message = $query->paginate(10);

        return view('admin.notify', compact(['show_message']));
    }

    // function create notify
    public function add_notify(Request $request){
        $request->validate([
            'message' => 'required',
        ]);

        Notify::create([
            'message' => $request->message,
        ]);

        return back()->with('success', 'เพิ่มข้อมูลสำเร็จ');
    }

    // function delete notify
    public function delete_notify($id){
        $notify = Notify::findOrFail($id);
        $notify->delete();

        return  back()->with('success', 'ลบข้อมูลสำเร็จ');
    }

    // fn edit notify
    public function edit_notify(Request $request, $id){
        $request->validate([
            'message' => 'required',
        ]);

        $notify = Notify::findOrFail($id);

        $notify->update([
            'message' => $request->message,
        ]);

        return back()->with('success', 'เเก้ไขข้อมูลสำเร็จ');
    }
}
