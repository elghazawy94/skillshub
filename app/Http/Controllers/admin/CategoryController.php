<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::orderBy('id' , 'DESC')->paginate(10);
        return view('admin.category.index' , [
            'categories' => $categories
        ]);
    }


    public function store(Request $request){
        $request->validate([
            'name_en' => 'required|string|max:50',
            'name_ar' => 'required|string|max:50',
        ]);
        Category::create([
            'name' => json_encode([
                'en' => $request->name_en,
                'ar' => $request->name_ar
            ]),
        ]);
        $request->session()->flash('success' , 'row add successfuly');
        return back();
    }


    public function update(Request $request){
        $request->validate([
            'id' => 'required|exists:categories,id',
            'name_en' => 'required|string|max:50',
            'name_ar' => 'required|string|max:50',
        ]);
        Category::findorfail($request->id)->update([
            'name' => json_encode([
                'en' => $request->name_en,
                'ar' => $request->name_ar
            ]),
        ]);
        $request->session()->flash('success' , 'category updated successfuly');
        return back();
    }

    public function delete($id ,Request $request){
        try{
            $delete = Category::findorfail($id);
            $delete->delete();
            $request->session()->flash('success' , 'row deleted successfuly');
        } catch(Exception $e){
            $request->session()->flash('error' , 'can not delete this row');
        }
        return back();
    }
}
