<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;

class StoreController extends Controller
{
    public function index(){
        $category = Categories::get();

        return view('users.store', compact(['category']));
    }
}
