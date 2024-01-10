<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    public function category(Request $request)
    {
        $request->validate([
            'category_name',
        ]);

        Category::create([
            'category_name' => $request->category_name
        ]);

        return back();
    }

    public function delete($id)
    {

        Category::where('id', $id)->delete();
        return back();
    }

}
