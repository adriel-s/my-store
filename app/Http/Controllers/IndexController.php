<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $inputSearch = $request->search;
        $products = Product::query();

        if ($inputSearch) {
            $products->where('name', 'like', "%$inputSearch%");
        }
        
        $products = $products->get();
        
        return view('index', compact('products'));
    }
}
