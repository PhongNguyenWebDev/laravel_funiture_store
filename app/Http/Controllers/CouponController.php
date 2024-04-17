<?php

namespace App\Http\Controllers;

use App\Models\coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $data = [];
    public function index(Request $request)
    {
        $this->data['title'] = 'Product Management';
        $coupons = coupon::all();
        return view('admin.show.coupon-list',compact('coupons'),$this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->data['title'] = 'Add Coupon';
        return view('admin.handle.coupon-handle.add-coupons',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $coupons = $request->except('expires_at');
        $coupons['expires_at'] = DB::raw("STR_TO_DATE('{$request->expires_at}', '%d/%m/%Y')");
        coupon::create($coupons);
        return redirect(url('admin/show/coupon-list'))->with('sucess','Coupon created successfully');
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
        $coupons = coupon::findOrFail($id);
        $coupons->delete();
        return redirect(url('admin/show/coupon-list'))->with('deletesuccess','Coupon deleted successfully');
    }
}
