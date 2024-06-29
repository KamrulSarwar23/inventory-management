<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    function CategoryPage()
    {
        return view('pages.dashboard.category-page');
    }

    function CategoryList(Request $request)
    {
        $user_id = $request->header('id');
        return Category::where('user_id', $user_id)->get();
    }

    function CategoryCreate(Request $request)
    {
        $user_id = $request->header('id');
        return Category::create([
            'name' => $request->name,
            'user_id' => $user_id
        ]);
    }

    function CategoryDelete(Request $request)
    {
        $user_id = $request->header('id');
        $category_id = $request->input('id');

        $countCategory = Category::where('id', $category_id)->where('user_id', $user_id)->first();

        if (count($countCategory->product) > 0) {
            return response()->json(['message' => 'You Cant Delete This! This Category Has Product!']);
        } else {
            return Category::where('id', $category_id)->where('user_id', $user_id)->delete();
        }
    }


    function CategoryByID(Request $request)
    {
        $user_id = $request->header('id');
        $category_id = $request->input('id');
        return Category::where('id', $category_id)->where('user_id', $user_id)->first();
    }


    function CategoryUpdate(Request $request)
    {
        $user_id = $request->header('id');
        $category_id = $request->input('id');
        try {

            Category::where('id', $category_id)->where('user_id', $user_id)->update([
                'name' => $request->input('name'),
            ]);
            return response()->json(['status' => 'success', 'message' => 'Category Updated Successfully']);
        } catch (Exception $e) {
            return response()->json(['status' => 'failed', 'message' => 'Something Goes Wrong']);
        }
    }
}
