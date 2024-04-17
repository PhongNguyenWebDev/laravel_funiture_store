<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Mail\OrderMail;
use App\Models\orders;
use App\Models\OrderDetail;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public $data = [];
    public function index()
    {
        $this->data['title'] = 'Checkout';
        return view('furniture_page.checkout', $this->data);
    }

    public function store(OrderRequest $request)
    {
        if (session()->has('user')) {
            $orders = session()->get('cart');
            $coupon = session()->get('coupons');
            $total_money = 0;
            foreach ($orders as $value) {
                $total_money += $value['price'] * $value['quantity'];
            }
            $token = Str::random(30);
            $user_id = session()->get('user');
            $order = Orders::create([
                'user_id' => $user_id['id'],
                'coupon_id' => $coupon['id'],
                'fullname' => $request->fullname,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'token' => $token,
                'order_date' => Carbon::now(),
                'note' => $request->note,
                'total_money' => $total_money,
            ]);

            if (isset($order)) {
                $order_id = $order['id'];
                $cart = session()->get('cart');
                if (isset($cart)) {
                    foreach ($cart as $item) {
                        OrderDetail::create([
                            'order_id' => $order_id,
                            'product_id' => $item['product_id'],
                            'num' => $item['quantity'],
                            'price' => $item['price'],
                            'total_money' => $item['quantity'] * $item['price'],
                        ]);
                    }
                };
            }
            Mail::to($request->email)->send(new OrderMail($order, $token));

            session()->forget('cart');
            session()->forget('coupons');
            return redirect()->route('shop');
        }else{
            return redirect()->route('login');
        }
    }
    public function verify($token)
    {
        $order = orders::where('token', $token)->first();
        if (isset($order)) {
            $order->token = null;
            $order->status = 1;
            $order->save();
            return redirect()->route('thankyou')->with('success', 'Verify Order Successfully');
        } else {
            return redirect()->route('home')->with('error', 'Không tìm thấy đơn hàng');
        }
    }
}
