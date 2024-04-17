<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfile;
use App\Models\User;
use App\Models\OrderDetails;
use App\Models\Order;
use App\Models\orders;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public $data = [];
    public $user = [];
    public function show()
    {
        $this->data['title'] = 'Profile';
        return view('furniture_page.profile.profile', $this->data);
    }
    public function edit(string $id)
    {
        $user = User::find($id);
        $this->data['title'] = 'Profile Update';
        return view('furniture_page.profile.feature.UpdateUser', compact('user'), $this->data);
    }
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->except('newpass', 'image'));

        if ($request->filled('newpass') && $request->filled('curpass')) {
            if (Hash::check($request->curpass, $user->password)) {
                $user->password = bcrypt($request->newpass);
            } else {
                return redirect()->back()->with('error', 'Current password is incorrect.');
            }
        }

        if ($request->hasFile('image')) {
            $file_name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/asset/client/images', $file_name);
            $user->image = $file_name;
        }
        $user->save();
        return redirect()->route('profile.profile', ['id' => $user->id])->with('success', 'Product Updated Successfully');
    }

    public function InforBank()
    {
        $this->data['title'] = 'INF Bank Profile';
        return view('furniture_page.profile.feature.InforBank', $this->data);
    }
    public function Address()
    {
        $this->data['title'] = 'Address Profile';
        return view('furniture_page.profile.feature.AddressUser', $this->data);
    }
    public function InforOrder(string $id)
    {
        $this->data['title'] = 'INF Order Profile';
        $user = User::findOrFail($id);
        $orders = orders::where('user_id', $user->id)->get();
        $orderDT = [];
        foreach ($orders as $order) {
            $orderDetails = $order->orderDetail()->get();
            $orderDT[] = $orderDetails;
        }
        return view('furniture_page.profile.feature.InforOrder', compact('orderDT', 'orders'), $this->data);
    }
    public function AnotherFeature()
    {
        $this->data['title'] = 'Another Feature Profile';
        return view('furniture_page.profile.feature.AnotherFeature', $this->data);
    }
}
