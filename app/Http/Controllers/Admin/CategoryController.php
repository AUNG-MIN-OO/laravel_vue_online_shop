<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::latest()->paginate(5);
        return Inertia::render('Admin/Category/Index',['categories'=>$categories]);
    }

    public function create(){
        return Inertia::render('Admin/Category/Create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
        ]);

        Category::create([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name)
        ]);

//        return Inertia::render('Admin/Category/Index')->with('success','Category is created');
        return redirect()->back()->with('success','Category is added.');
    }

    public function edit($id){
        $category = Category::where('id',$id)->first();
        if (!$category){
            return redirect()->back()->with('info','Category is invalid');
        }
        return Inertia::render('Admin/Category/Edit',['category'=>$category]);
    }

    public function update($id, Request $request){
        Category::where('id',$id)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);
        return redirect()->back()->with('success','Category is updated');
    }

    public function destroy($id){
        Category::where('id',$id)->delete();
        return redirect()->back()->with('success','Category is deleted!');
    }
}
