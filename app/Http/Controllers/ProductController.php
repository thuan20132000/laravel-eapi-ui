<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestProduct;
use App\Model\Category;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::all();
        $products = Product::paginate(10);
        return view('pages.product.products',['products'=>$products,'categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('pages.product.create',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestProduct $request)
    {

        if ($request->file('image')) {
			// File này có thực, bắt đầu đổi tên và move
			$fileExtension = $request->file('image')->getClientOriginalExtension(); // Lấy . của file

			// Filename cực shock để khỏi bị trùng
			$fileName = time() . "_" . rand(0,9999999) . "_" . md5(rand(0,9999999)) . "." . $fileExtension;

			// Thư mục upload
			$uploadPath = public_path('/upload'); // Thư mục upload

			// Bắt đầu chuyển file vào thư mục
			$request->file('image')->move($uploadPath, $fileName);

			// Thành công, show thành công
		}
		else {
			// Lỗi file
			return redirect()->back()->with('message', 'Upload Failed');
        }


        $product = new Product;
        $product->category_id = $request->category;
        $product->name = $request->name;
        $product->slug = Str::slug($request->name,'-');
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->image = $fileName;
        $product->color = $request->color;
        $product->size = $request->size;
        $product->stock = $request->stock;
        $product->status = $request->status;

        $product->save();

        return redirect()->back()->with('message',"Created Successfull");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
