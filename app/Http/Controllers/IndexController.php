<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $inputSearch = $request->search;
        $productsQuery = Product::query();

        if ($inputSearch) {
            $productsQuery->where('name', 'like', "%$inputSearch%");
        }
        
        $products = $productsQuery->get();
        
        return view('index', compact('products'));
    }
}
