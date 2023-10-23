<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function show($id)
    {
        $category = Category::find($id);
        if (!$category) {
            abort(404);
        }

        return view('categories.show', compact('category'));
    }

    public function adminIndex()
    {
        $categories = Category::all();
        return view('categories.admin.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $category = new Category;
        $category->id = str_replace(' ', '_', strtolower($request->input('name')));
        $category->name = $request->input('name');
        $category->description = $request->input('description');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images/categories'), $imageName);
            $category->image = $imageName;
        }

        $category->save();

        return redirect()->route('categories.adminIndex');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $category = Category::find($id);

        if (!$category) {
            return redirect()->route('categories.adminIndex');
        }

        $category->name = $request->input('name');
        $category->description = $request->input('description');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            if ($image->isValid()) {
                if (!empty($category->image) && file_exists(public_path('images/categories/' . $category->image))) {
                    unlink(public_path('images/categories/' . $category->image));
                }

                $imageName = time() . '.' . $image->extension();
                $image->move(public_path('images/categories'), $imageName);
                $category->image = $imageName;
            }
        }

        $category->save();

        // Получить новый ID категории
        $newCategoryId = $category->id;

        // Получить старый ID категории
        $oldCategoryId = $id;
        
        // Найти все продукты, связанные со старой категорией
        $products = Product::whereHas('categories', function ($query) use ($oldCategoryId) {
            $query->where('categories.id', $oldCategoryId);
        })->get();

        // Перебираем продукты и обновляем связи
        foreach ($products as $product) {
            $currentCategories = $product->categories->pluck('id')->toArray();
            if (!in_array($newCategoryId, $currentCategories)) {
                $currentCategories[] = $newCategoryId;
                $product->categories()->sync($currentCategories);
            }
        }


        return redirect()->route('categories.adminIndex');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('categories.admin.edit', compact('category'));
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        if ($category) {
            // Проверяем, есть ли у этой категории связанные продукты
            if ($category->products->isNotEmpty()) {
                // Если есть, выводим сообщение пользователю
                return redirect()->route('categories.adminIndex')->with('error', 'Нельзя удалить категорию, у которой есть продукты.');
            }

            // Если нет связанных продуктов, удаляем категорию
            if (!empty($category->image)) {
                unlink(public_path('images/categories/' . $category->image));
            }

            $category->delete();
        }

        return redirect()->route('categories.adminIndex');
    }
}
