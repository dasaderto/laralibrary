<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Str;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        
        return view('admin.categories.index', [
            'categories' => $categories,
        ]);
    }
    
    public function create()
    {
        $category = new Category();
        
        return view('admin.categories.create', [
            'category' => $category,
        ]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:255',
            'slug' => 'max:255',
        ]);
        $category = new Category();
        
        $category->name = $request->name;
        $category->slug = empty($request->slug) ? Str::slug(mb_substr($request->name, 0, 60)) : $request->slug;
        
        $category->save();
        
        return redirect()->route('admin.category.index');
    }
    
    public function edit($id)
    {
        $category = Category::find($id);
        
        return view('admin.categories.edit', [
            'category' => $category,
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        
        $category->name = $request->name;
        $category->slug = Str::slug(mb_substr($request->name, 0, 60));
        
        $category->save();
        
        return redirect()->route('admin.category.index');
    }
    
    public function destroy($id)
    {
        
    }
}

