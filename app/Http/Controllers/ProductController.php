<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();

        return Inertia::render('Products/IndexProduct', ['products' => $products, 'categories' => $categories]);
    }

    public function create()
    {
        $categories = Category::all();

        return Inertia::render('Products/CreateProduct', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'stock' => 'required',
            'image' => 'required',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'stock' => $request->stock,
            'image' => $imagePath,
        ]);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();

        return Inertia::render('Products/EditProduct', ['product' => $product, 'categories' => $categories]);
    }

    // public function update(Request $request, Product $product)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'price' => 'required',
    //         'category_id' => 'required',
    //         'stock' => 'required',
    //         'image' => 'required',
    //     ]);

    //     if ($request->hasFile('image')) {
    //         $imagePath = $request->file('image')->store('images', 'public');
    //         $product->image = $imagePath;
    //     }

    //     $product->update($request->only('name', 'stock', 'category_id', 'price', 'image'));

    //     return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    // }

    public function update(Product $product, Request $request)
    {

        if ($request->hasFile('image')) {
            // Simpan file image ke dalam folder 'images' di storage 'public'
            $imagePath = $request->file('image')->store('images', 'public');
            // Update field image pada produk
            $product->image = $imagePath;
        }

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'stock' => $request->stock,
            // 'image' => $request->image
        ]);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
