<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use illuminate\Mail\Message;
use App\Models\products;
use App\Models\Category;


class FurnitureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public $data = [];
    public function product_detail($id)
    {
        $this->data['title'] = 'Product Detail';
        $productdetail = products::findOrFail($id);
        $products = products::all();
        $category = $productdetail->category_id;
        return view('furniture_page.product-detail', compact('productdetail', 'products', 'category'), $this->data);
    }
    public function home()
    {
        $this->data['title'] = 'Home';
        $products = products::inRandomOrder()->take(3)->get();
        return view('furniture_page.home',compact('products'), $this->data);
    }

    public function about()
    {
        $this->data['title'] = 'About';
        return view('furniture_page.about', $this->data);
    }

    public function contact()
    {
        $this->data['title'] = 'Contact';
        return view('furniture_page.contact', $this->data);
    }

    public function contact_email(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'messages' => 'required|string',
        ]);

        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $email = $request->input('email');
        $messages = $request->input('messages');
        // Gửi email bằng mailable
        Mail::to('phongntps27047@fpt.edu.vn')->send(new ContactMail($firstname, $lastname, $email, $messages));
        return redirect()->back()->with('success', 'Gửi thành công');
    }

    public function services()
    {
        $this->data['title'] = 'Services';
        $products = products::inRandomOrder()->take(3)->get();
        return view('furniture_page.services',compact('products'), $this->data);
    }

    public function shop(Request $request)
    {
        $this->data['title'] = 'Shop';
        $productsQuery = products::query();

        // Xử lý tìm kiếm
        if ($request->has('search')) {
            $search = $request->input('search');
            $productsQuery->where('product_name', 'like', "%$search%");
        }

        // Xử lý bộ lọc theo danh mục
        if ($request->has('category')) {
            $category = $request->input('category');
            if ($category != '') {
                $productsQuery->where('category_id', $category);
            }
        }
        if($request->has('sort_by_price')){
            $sort = $request->input('sort_by_price');
            if($sort == 'desc'){
                $productsQuery->orderBy('price', 'desc');
            }else{
                $productsQuery->orderBy('price', 'asc');
            }
        }
        $products = $productsQuery->get();
        $categories = Category::all();

        return view('furniture_page.shop', compact('products', 'categories'), $this->data);
    }

    public function thankyou()
    {
        $this->data['title'] = 'Thank you';
        return view('furniture_page.thankyou', $this->data);
    }

}
