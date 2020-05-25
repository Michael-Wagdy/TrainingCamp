<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Services\CategoryService;
use App\Category;

class CategoryController extends Controller
{
    protected $categoryservice;

    public function __construct(CategoryService $categoryservice)
	{
		$this->categoryservice = $categoryservice ;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categoryservice->showAll();
        return response()->json(['success'=>'records returned successfully','all categories'=>$categories],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $this->categoryservice->create($request);
        return response()->json(['success'=>'record stored successfully','new category'=>$category],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return response()->json(['success'=>'record showed successfully','Target category'=>$category],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->categoryservice->update($request);
        return response()->json(['success'=>'Record Updated Successfully'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if(!$category)
        {
            return response()->json(['data'=>[],'status'=>404,'message'=>'Category Not Found'],404);
        }

        if($category->delete())
        {
            return response()->json(['data'=>[],'status'=>200,'message'=>'Category Deleted'],200);
        }else
        {
            return response()->json(['data'=>[],'status'=>500,'message'=>'Something Wrong'],500);
        }
        
    }
}
