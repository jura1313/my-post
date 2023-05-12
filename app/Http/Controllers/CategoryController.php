<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\c;
use App\Models\User;
use App\Models\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function category()
    {
        $category = Category::all();
        return view('category', ["category"=>$category]);
    }


    public function new_category(Request $request) {
        $request->validate([

            'category'=>['required','string'],

        ]);

        Category::create([

            'category'=>$request->category,
            'slug' =>str($request->category)->slug(),

        ]);

        return redirect('category')->with('status_create', 'Data Berhasil Ditambahkan!');
    }


}
