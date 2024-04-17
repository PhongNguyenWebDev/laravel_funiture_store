<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public $data = [];
    protected $checkadmin;
    public function index(Request $request){
        $checkadmin = Auth::user();
        if($checkadmin->role_id ==  1){
            $this->data['title'] = 'Dashboard';
            return view('admin.index',$this->data);
        }else{
            return view('admin.announcement');
        }
    }
    public function datatable(){
        return view('admin.datatable');
    }
    public function basic_table(){
        return view('admin.basic-table');
    }
    public function forms(){
        return view('admin.form-basic');
    }
}
