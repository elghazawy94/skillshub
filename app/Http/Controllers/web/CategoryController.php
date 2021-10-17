<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($id){
        $category = Category::select('id' , 'name')->where('id' , $id)->first();
        $categories = Category::select('id' , 'name')->get();
        $skills = $category->skills()->paginate(9);
        return view('web.categories.index' , [
            'category' => $category ,
            'categories' => $categories ,
            'skills' => $skills
        ]);
    }
}
