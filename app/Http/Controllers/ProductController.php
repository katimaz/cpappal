<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Product;
use DB;
use Response;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')
            ->join('categories','products.category_id','categories.id')
            ->select('products.*','categories.name as category_name')
            ->get();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $categories = Category::all();
        return view('admin.product.add',compact('categories'));
    }

    public function create(Request $request)
    {
        $product = new Product;
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->model_no = $request->model_no;
        $product->price = $request->price;
        $product->maintenance_period = $request->maintenance_period;
        $product->device_check = $request->device_check;
        $product->save();

        return redirect()->route('product')->with('success', true)->with('message','Product created successfully!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //
    }

    public function getProductByCategoryId($id)
    {
        $products = DB::table('products')
            ->join('categories','products.category_id','categories.id')
            ->select('products.*','categories.name as category_name')
            ->where('products.category_id','=',$id)
            ->get();

        return Response::json(array('success'=>true,'result'=>$products));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();

        $product = DB::table('products')
            ->join('categories','products.category_id','categories.id')
            ->where('products.id',$id)
            ->select('products.*','categories.name as category_name')
            ->first();
        return view('admin.product.edit',compact('product','categories'))->with('success', true)->with('message','Product updated successfully!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request)
    {
        $product = Product::find($request->id);
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->model_no = $request->model_no;
        $product->price = $request->price;
        $product->maintenance_period = $request->maintenance_period;
        $product->device_check = $request->device_check;
        $product->sale_check = $request->sale_check;
        $product->save();
        return redirect()->route('product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Product::destroy($request->id);
        return redirect()->route('product');
    }
}
