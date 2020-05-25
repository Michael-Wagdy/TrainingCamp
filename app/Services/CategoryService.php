<?php

namespace App\Services;
 
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryService
{
    public function showAll()
    {
        $categories = Category::with('childs')->get();
        return $categories;
    }

    public function create(Request $request)
	{   
        $category =  Category::create([
            'name' => $request['name'],
            'parent_id' =>  $request['parent_id']
        ]);
    }

    public function read($categoryId)
	{
        $category = Category::findOrFail($categoryId);
        return $category;
    }
    
    public function update(Request $request)
	{
        $category = Category::find($request->categoryId);
        $category -> name = $request -> name;
        $category -> parent_id = $request -> parent_id;
        $category -> save();
	}
    
    public function delete($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $category->delete();
    }
}