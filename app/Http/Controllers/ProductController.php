<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function adminIndex()
    {
        $products = Product::all();
        return view('products.admin.index', compact('products'));
    }

    public function index()
    {
        $products = Product::all(); // Получить список всех продуктов
        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::find($id);
        if (!$product) {
            abort(404); // Отобразить страницу 404, если продукт не найден
        }

        return view('products.show', compact('product'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Пример валидации изображения
        ]);

        $product = new Product;
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images/products'), $imageName);
            $product->image = $imageName;
        }

        $product->save();

        return redirect()->route('products.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');

        if ($request->hasFile('image')) {   
            $image = $request->file('image');
            if ($image->isValid()) {
                
                if (!empty($product->image) && file_exists(public_path('images/products/' . $product->image))) {
                    unlink(public_path('images/products/' . $product->image));
                }
    
                $imageName = time() . '.' . $image->extension();
                $image->move(public_path('images/products'), $imageName);
                $product->image = $imageName;
            }
        }

        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $imageName = time() . '.' . $image->extension();
        //     $image->move(public_path('images/products'), $imageName);
        //     $product->image = $imageName;
        // }

        $product->save();

        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        $product = Product::find($id); // Найти продукт по ID
        return view('products.edit', compact('product'));
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if ($product) {
            if (!empty($product->image)) {
                unlink(public_path('images/products/' . $product->image));
            }

            $product->delete();
        }

        return redirect()->route('products.index');
    }
}
