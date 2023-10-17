<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $category->id = str_replace(' ', '_', strtolower($request->input('name')));
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
            if (!empty($category->image)) {
                unlink(public_path('images/categories/' . $category->image));
            }

            $category->delete();
        }

        return redirect()->route('categories.adminIndex');
    }
}
