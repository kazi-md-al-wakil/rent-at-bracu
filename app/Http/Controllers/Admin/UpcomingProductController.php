<?php

namespace App\Http\Controllers\Admin;

use App\Models\UpcomingProducts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpcomingProductController extends Controller
{
    public function index()
    {
        return view('admin.product.upcoming');
    }
    public function create(Request $request)
    {
        $upproducts = new UpcommingProducts();
        $upproducts->name = $request->input('name');
        $upproducts->small_desc = $request->input('small_desc');

        return redirect('/products')->with('status', 'The Product is sucessfully added');
    }
}
