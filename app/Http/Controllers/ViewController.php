<?php

namespace App\Http\Controllers;
class ViewController extends Controller
{
    public function adminLabs()
    {
        return view('admin.laboratories.labs');
    }
    public function adminCategories()
    {
        return view('admin.category.category');
    }
    public function adminUsers()
    {
        return view('admin.users.users');
    }
    public function showLogin()
    {
        return view('formLogin');
    }
}
