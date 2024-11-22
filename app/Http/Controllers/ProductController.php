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
        // dd($request->all());
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

    public function update(Request $request, Product $product)
    {
        dd($request->all());

    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

    public function changes(Request $request, string $id)
    {

        try {
            $product = Product::findOrFail($id);
            $imagePath = $product->image; // Gambar lama
            if ($request->hasFile('image')) {
                if ($imagePath && \Storage::exists("public/$imagePath")) {
                    \Storage::delete("public/$imagePath");
                }

                $imagePath = $request->file('image')->store('images', 'public');
            }
            $product->update([
                'name' => $request->name,
                'price' => $request->price,
                'category_id' => $request->category_id,
                'stock' => $request->stock,
                'image' => $imagePath,
            ]);

            return redirect()->route('products.index')->with('success', 'Product updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Update failed: '.$e->getMessage());
        }
    }
}
