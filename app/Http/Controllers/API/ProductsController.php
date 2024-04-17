<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(){
        $products = products::all();
        return response([
            "status" => "success",
            "products" => $products
        ]);
    }
}
