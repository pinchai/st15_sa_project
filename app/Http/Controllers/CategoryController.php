<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function category(Request $request)
    {
        $module = 'category';
        return view('admin.category.category', ['module' => $module]);
    }

    public function fetchCategoryRecord(Request $request)
    {
        $category = new Category();
        $data = $category->all();
        return response()->json($data);
    }

    public function createCategoryRecord(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        return response()->json([
            'status'=>"create successfully",
            'data'=>$category,
        ]);
    }

    public function updateCategoryRecord(Request $request)
    {
        $category = Category::find($request->id);
        if ($category){
            $category->name = $request->name;
            $category->save();
        }
        return response()->json([
            'status'=>"update successfully",
            'data'=>$category,
        ]);
    }

    public function deleteCategoryRecord(Request $request){
        $category = Category::find($request->id);
        if ($category){
            $category->delete();
        }
        return response()->json($category);
    }
}
