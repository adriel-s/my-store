<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductPostRequest;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products', compact('products'));
    }

    public function edit(Product $product)
    {
        return view('admin.product_edit', compact('product'));
    }

    public function update(ProductPostRequest $request, Product $product)
    {
        $input = $request->validated();
        $product->fill($input);
        $product->save();

        return Redirect::route('admin.products');
    }

    public function create()
    {
        return view('admin.product_create');
    }

    public function store(ProductPostRequest $request)
    {
        $input = $request->validated();
        $input['slug'] = Str::slug($request->name);
        $file = $input['cover'];
        $isValidFile = !empty($file) && $file->isValid();

        if ($isValidFile) {
            Storage::delete($file ?? '');
            $filePath = $file->store('products');
            $input['cover'] = $filePath;
        }

        Product::create($input);

        return Redirect::route('admin.products');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        Storage::delete($product->cover ?? '');

        return Redirect::route('admin.products');
    }

    public function destroyImage(Product $product)
    {
        Storage::delete($product->cover);
        $product->cover = null;
        $product->save();

        return Redirect::back();
    }
}
