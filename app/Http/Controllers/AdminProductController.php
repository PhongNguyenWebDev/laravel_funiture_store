<?php

namespace App\Http\Controllers;
use App\Models\products;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $data = [];
    public function index()
    {
        $this->data['title'] = 'Product Management';
        $products = Products::all();
        return view('admin.show.product-list',compact('products'), $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->data['title'] = 'Add Product';
        $categories = Category::all();
        return view('admin.handle.product-handle.add-product',compact('categories') ,$this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' =>['required','max:255'],
            'price' =>['required','integer'],
            'discount' =>['required'],
            'thumbnail' =>['required','image'],
            'description' =>'required',
        ]);
        $products = new Products();
        $products->category_id = $request->category_id;
        $products->product_name = $request->product_name;
        $products->price = $request->price;
        $products->discount = $request->discount;  
        $products->description = $request->description;
        $products->thumbnail = $request->thumbnail;
        $products->save();

        return redirect(url('/admin/show/product-list'))->with('success','Product Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->data['title'] = 'Edit Product';
        $products = Products::findOrFail($id);
        $categories = Category::all();
        return view('admin.handle.product-handle.edit-product',compact('products','categories'), $this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = products::findOrFail($id);
        $product->update($request->all());
        return redirect(url('/admin/show/product-list'))->with('success','Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $products = Products::findOrFail($id);
        $products->delete();
        return redirect(url('/admin/show/product-list'))->with('success','Product Deleted Successfully');
    }
}
