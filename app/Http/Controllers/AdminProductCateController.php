<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\orders;
use Illuminate\Http\Request;

class AdminProductCateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $data = [];
    public function index()
    {
        $this->data['title'] = 'Product Category Management';
        $categories = Category::all();
        $order = orders::all();
        return view('admin.show.category-list',compact('categories','order') ,$this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->data['title'] = 'Add Product Category';
        return view('admin.handle.category-handle.add-category', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = $request->all();
        Category::create($category);
        return redirect()->route('admin.show.cate-list.index')->with('success');
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
        $this->data['title'] = 'Edit Product Category';
        $category = Category::findOrFail($id);
        return view('admin.handle.category-handle.edit-category',compact('category') ,$this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->data['title'] = 'Updated Category';
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return redirect()->route('admin.show.category-list.index')->with('success');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        // Kiểm tra xem có sản phẩm thuộc danh mục này hay không
        if ($category->products()->exists()) {
            return redirect(url('admin/show/cate-list'))->with('error', 'Không thể xóa danh mục vì tồn tại sản phẩm thuộc danh mục này.');
        }else{
            $category->delete();
            return redirect(url('admin/show/cate-list'))->with('success', 'Danh mục đã được xóa thành công.');
        }
        // Nếu không có sản phẩm thuộc danh mục, tiến hành xóa danh mục
    }
}
