<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\products;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $randomProducts = products::inRandomOrder()->take(3)->get();
        
        return response([
            'randomProducts' => $randomProducts,
        ]);
    }
}
