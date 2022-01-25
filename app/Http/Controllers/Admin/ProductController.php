<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);
        return Inertia::render('Admin/Product/Index',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        $category = Category::all();
        return Inertia::render('Admin/Product/Create',['category'=>$category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $request->validate([
            'category' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png'
        ]);

        $file = $request->file('image');
        $new_file_name = uniqid().$file->getClientOriginalName();
        $path = "/image";
        $file->move(public_path($path),$new_file_name);

        Product::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'price' => $request->price,
            'image' => "image/".$new_file_name,
            'category_id' => $request->category,
            'view_count' => 50,
        ]);

        return redirect()->back()->with('success','Product is added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Inertia\Response
     */
    public function show($id)
    {
        $product = Product::where('id',$id)->with('category')->first();
        return Inertia::render('Admin/Product/Detail',['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Inertia\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $category = Category::all();
        return Inertia::render('Admin/Product/Edit',['product'=>$product,'category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Request
     */
    public function update(Request $request, $id)
    {
        return $file = $request->file('image');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Product::where('id',$id)->delete();
        return redirect()->back()->with('success','Product is deleted!');
    }
}
