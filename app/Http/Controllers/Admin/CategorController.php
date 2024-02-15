<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;

class CategorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Category::latest();

        if(!empty($request->get('keyword'))){

            $categories = $categories->where('name','like','%'.$request->get('keyword').'%');

        }
        $categories = $categories->paginate(5);
        return view('Admin.Categories.List',['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Categories.CategoryForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validator = Validator::make($request->all(),[
            'name'=>'required',
            'slug'=>'required|unique:categories',
       ]);
       if($validator->passes()){
        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->status = $request->status;
        $category->save();
        $request->session()->flash('success','Category added Successfully');
        return response([
            'status'=>true,
            'message'=> 'Category added Successfully',
        ]);
       }else{
            return response([
                'status'=>false,
                'errors'=>$validator->errors()
            ]);
       }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
