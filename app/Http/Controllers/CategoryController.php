<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('category', compact('category'));
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $category = new Category($request->input());
        $category->saveOrFail();
        return redirect('category');

    }
    public function show(string $id)
    {
        $categoryy = Category::find($id);
        return view('editCategory', compact('categoryy'));
    }
    public function edit(string $id)
    {
        //
    }
    public function update(Request $request, string $id)
    {
        $categoryy = Category::find($id);
        $categoryy->fill($request->input())->saveOrFail();
        return redirect('category');
    } 
    public function destroy(string $id)
    {
        $categoryy = Category::find($id);
        $categoryy->delete();
        return redirect('category');
    }
}
