<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Product;
use App\Models\Category;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return Inertia::render('Products/Index', ['products' => $products, 'categories' => $categories]);
    }

    public function create()
    {
        $categories = Category::all();
        return Inertia::render('Products/Create', ['categories' => $categories]);
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
        return Inertia::render('Products/Edit', ['product' => $product, 'categories' => $categories]);
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
    // Validasi input
    // $request->validate([
    //     'name' => 'required',
    //     'price' => 'required|numeric',
    //     'category_id' => 'required',
    //     'stock' => 'required|integer',
    //     'image' => 'nullable|image',  // Image tidak lagi required, hanya jika ada
    // ]);

    // dd($request->all());

    // Check jika ada file image yang di-upload
    if ($request->hasFile('image')) {
        // Simpan file image ke dalam folder 'images' di storage 'public'
        $imagePath = $request->file('image')->store('images', 'public');
        // Update field image pada produk
        $product->image = $imagePath;
    }

    // $product = Product::findOrFail($id);
    $product->update([
        'name' => $request->name,
        'price' => $request->price,
        'category_id' => $request->category_id,
        'stock' => $request->stock
        // 'image' => $request->image
    ]);

    // Update data lain (kecuali image jika tidak di-upload)
    // $product->fill($request->only('name', 'stock', 'category_id', 'price'));
    
    // Simpan perubahan ke database
    // $product->save();

    // Redirect kembali ke halaman index produk dengan pesan sukses
    return redirect()->route('products.index')->with('success', 'Product updated successfully.');
}

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
