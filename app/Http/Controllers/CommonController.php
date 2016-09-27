<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Products;

class CommonController extends Controller
{
    //
    public function index(Request $request)
    {
        $products = Products::all();

		return view('common.index', compact('products'));
	}
}
