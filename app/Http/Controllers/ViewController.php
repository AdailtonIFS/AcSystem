<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function adminLabs(){
        return view('admin.laboratories.labs');
    }
    public function adminUsers(){
        return view('admin.category.category');
    }
    public function adminCategories(){
        return view('admin.users.users');
    }
}
