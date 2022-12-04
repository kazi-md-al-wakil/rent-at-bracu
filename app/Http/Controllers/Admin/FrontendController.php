<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use function Ramsey\Uuid\v1;

class FrontendController extends Controller
{
    public function index()
    {
        $users=User::all();
        $orders=Order::all();
        return view('admin.index',compact('users, orders'));
    }
}

