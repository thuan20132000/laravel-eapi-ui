<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestCategory;
use App\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::paginate(10);

        return view('pages.category.categories',['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestCategory $request)
    {
        $getCategory = $request->all();
        $slug =Str::slug($getCategory['name'],'-');

        $category = new Category;
        $category->name = $getCategory['name'];
        $category->slug = $slug;
        $category->description = $getCategory['description'];
        $category->status = $getCategory['status'];

        $category->save();

        return redirect()->back()->with('success',"Created Category");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        //
        return response()->json($category,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {


        $validatorData = Validator::make($request->all(),[
            'name'=>'required'
        ], [
            'required'=>"name was empty"
        ]);



        if($validatorData->fails()){
            return response([
                'errors'=>$validatorData->errors(),
            ]);
        }


        $category = Category::find($id);



        $category->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'slug'=>Str::slug($request->name,'-'),
            'status'=>$request->status
        ]);

        return response()->json($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $category = Category::find($id);
        $category->delete();
        return response()->json([
            'state'=>'success'
        ]);
    }
}
