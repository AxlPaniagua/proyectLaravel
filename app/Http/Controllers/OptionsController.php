<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Options;
use App\Models\Category;
class OptionsController extends Controller
{
    
    public function index()
    {
        $options = Options::all();
        $category = Category::all();
        return view('options', compact('options', 'category'));
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $options = new Options($request->input());
        $options->saveOrFail();
        return redirect('options');
    }
    public function show(string $id)
    {
        $options = Options::find($id);
        $category = Category::all();
        return view('editOptions', compact('options','category'));
    }
    public function edit(string $id)
    {
        //
    }
    public function update(Request $request, string $id)
    {
        $options = Options::find($id);
        $options->fill($request->input())->saveOrFail();
        return redirect('options');
    }
    public function destroy(string $id)
    {
        $options = Options::find($id);
        $options->delete();
        return redirect('options');
    }
}
