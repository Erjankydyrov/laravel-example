<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function show($category, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            abort(404); // Отобразить страницу 404, если продукт не найден
        }

        return view('products.show', compact('product', 'category'));
    }


    public function index()
    {
        $products = Product::all();
        return view('products.admin.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.admin.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Пример валидации изображения
            'category_ids' => 'array',
        ]);

        $product = new Product;
        $product->id = str_replace(' ', '_', strtolower($request->input('name')));
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

        // Получаем выбранные категории из формы
        $selectedCategories = $request->input('category_ids', []); // предполагая, что поле в форме называется category_ids

        // Связываем продукт с выбранными категориями
        $product->categories()->attach($selectedCategories);

        return redirect()->route('products.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_ids' => 'array',
        ]);

        $product = Product::find($id);
        $oldProductId = $product->id;

        // Обновляем связи продукта с категориями
        $selectedCategories = $request->input('category_ids', []);

        // Удаляем старые связи продукта с категориями
        DB::table('category_product')->where('product_id', $oldProductId)->delete();

        // Обновляем продукт
        $newProductId = str_replace(' ', '_', strtolower($request->input('name')));
        $product->id = $newProductId;
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            if ($image->isValid()) {
                // Обработка изображения
                $imageName = time() . '.' . $image->extension();
                $image->move(public_path('images/products'), $imageName);
                $product->image = $imageName;
            }
        }

        $product->save();

        // Создаем новые связи продукта с категориями
        $product->categories()->attach($selectedCategories);

        return redirect()->route('products.index');
    }


    public function edit($id)
    {
        $product = Product::find($id); // Найти продукт по ID
        $categories = Category::all(); // Получить список всех категорий
        $selectedCategoryIds = $product->categories->pluck('id')->toArray(); // Получение ID выбранных категорий
        return view('products.admin.edit', compact('product', 'categories', 'selectedCategoryIds'));
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if ($product) {
            // Удаляем связи продукта с категориями
            $product->categories()->detach();

            if (!empty($product->image)) {
                unlink(public_path('images/products/' . $product->image));
            }

            $product->delete();
        }

        return redirect()->route('products.index');
    }
}
