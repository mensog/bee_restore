<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('pages.admin.users', ['users' => $users]);
    }

    public function show($id)
    {
        $user = User::with('orders')->where('id', $id)->firstOrFail();
        return view('pages.admin.user', ['user' => $user]);
    }
}
