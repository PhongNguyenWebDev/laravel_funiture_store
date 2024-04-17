<?php

namespace App\Http\Controllers;

use App\Models\coupon;
use Illuminate\Http\Request;
use App\models\products;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public $data = [];
    public function index(Request $request)
    {
        $this->data['title'] = 'Cart';
        $cart = Session::get('cart');
        $subTotal = 0;
        return view('furniture_page.cart', compact('cart', 'subTotal'), $this->data);
    }
    public function addToCart(Request $request)
    {
        $data = $request->all();
        $productId = $data['productId'];
        $session_id = substr(md5(microtime()), rand(0, 26), 5);
        $cart = session()->get('cart', []);
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                'session_id' => $session_id,
                'product_id' => $data['cart_product_id_' . $productId],
                'quantity' => $data['cart_product_quantity_' . $productId],
                'price' => $data['cart_product_price_' . $productId],
                'name' => $data['cart_product_name_' . $productId],
                'thumbnail' => $data['cart_product_thumbnail_' . $productId],
            ];
        }
        Session::put('cart', $cart);
        return redirect()->back()->with('addtocart', 'Added to Cart successfully');
    }

    public function updateCart(Request $request)
    {

        $data = $request->all();
        $cart = Session::get('cart');
        if (isset($cart)) {
            foreach ($data['cart_quantity'] as $key => $value) {
                foreach ($cart as $k => $v) {
                    if ($v['session_id'] == $key) {
                        $cart[$k]['quantity'] = $value;
                    }
                }
            }
            Session::put('cart', $cart);
            return redirect()->back()->with('updateItem', 'Update Cart successfully');
        } else {
            return redirect()->back()->with('updateErorr', 'Update Cart failly');
        }
    }

    public function deleteCart(Request $request, $session_id)
    {
        //delete
        if (Session::has('cart')) {
            $cart = Session::get('cart');
            if (isset($cart)) {
                foreach ($cart as $key => $item) {
                    if ($item['session_id'] == $session_id) {
                        unset($cart[$key]);
                    }
                }
                Session::put('cart', $cart);
                return redirect()->back()->with('deleteItem', 'Product removed from cart successfully.');
            }
        }
        return redirect()->back()->with('error', 'Unable to remove product from cart.');
    }
    public function checkout_coupon(Request $request)
    {
        $couponCode = strtolower($request->input('coupon_code'));

        $coupon = Coupon::whereRaw('LOWER(coupon_code) = ?', $couponCode)->first();

        if ($coupon) {
            Session::put('coupons', [
                'coupon_code' => $coupon->coupon_code,
                'coupon_condition' => $coupon->coupon_condition,
                'coupon_number' => $coupon->coupon_number,
                'id' => $coupon->id
            ]);

            return redirect()->back()->with('coupon', 'Coupon code applied successfully');
        }

        return redirect()->back()->with('coupon_error', 'Coupon code is not valid');
    }
}
