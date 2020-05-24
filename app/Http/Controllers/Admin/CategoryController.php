<?php

namespace App\Http\Controllers\Admin;
use App\Services\CategoryService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Category;

class CategoryController extends Controller
{
    protected $categoryservice;

    public function __construct(CategoryService $categoryservice)
	{
		$this->categoryservice = $categoryservice ;
    }
    
    public function index()
    {   
        //$categories = Category::with('childs')->whereNull('parent_id')->get();
        $categories = $this->categoryservice->showAll();
        return view('auth.category.pages.dashboard',compact('categories'));
    }

    public function create()
    {
        $allCategories = Category::all();
        return view('auth.category.pages.create',compact('allCategories'));
    }

    public function store(CategoryRequest $request)
    {
        $this->categoryservice->create($request);
        return redirect('admin/dashboard/category');
    }

    public function edit($categoryId)
    {
        $category = Category::findOrFail($categoryId); //primary Key
        $allCategories = Category::all();
        return view('auth.category.pages.edit',compact('category','allCategories'));

    }
    
    public function update(CategoryRequest $request)
    {
        $this->categoryservice->update($request);
        return redirect('/admin/dashboard/category');
    }

    public function show($categoryId)
    {
        $category = $this->categoryservice->read($categoryId);
        return view('auth.category.pages.show', compact('category'));
    }

    public function destroy(CategoryRequest $request)
    {
        $this->categoryservice->delete($request->category_id);
        return response()->json(['message' => 'Record deleted successfully!']);
    } 
}
