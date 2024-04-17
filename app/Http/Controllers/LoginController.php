<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public $data = [];
    public function login()
    {
        $this->data['title'] = 'Login';
        return view('furniture_page.users.login', $this->data);
    }
    public function handleLogin(LoginRequest $request)
    {
        $remember = $request->input('remember');
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            $user = Auth::user();
            Session::put('user', $user);
            if ($remember) {
                // Tạo token ngẫu nhiên
                $token = Str::random(60);
                $user = new User();
                $user->remember_token = $token;
                $user->save();
                // Thiết lập cookie với token và thời gian hết hạn
                $cookie = cookie('remember_token', $token, 60 * 24 * 30); // Ví dụ: hết hạn sau 30 ngày
                return redirect()->route('home')->withCookie($cookie);
            }
            if ($user->role_id == 1) {
                return redirect()->route('admin.home', compact('user'))->with('success', 'Congratulation');
            } elseif ($user->role_id == 0) {
                return redirect()->route('home')->with('success', 'Congratulation');
            }
        }else{
            return redirect()->back()->with('error', 'Email or password is incorrect');
        }
    }
    public function handleRegister(RegisterRequest $request)
    {
        $user = $request->except(['password']);
        $user['password'] =  Hash::make($request->password);
        User::Create($user);
        return redirect()->route('login')->with('regis', 'Congratulation');
    }
    public function register()
    {
        $this->data['title'] = 'Register';
        return view('furniture_page.users.register', $this->data);
    }
    public function forgot_pass()
    {
        $this->data['title'] = 'Forgot Password';
        return view('furniture_page.users.forgot-password', $this->data);
    }
    public function forgot_password_post(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);
        $token = Str::random(64);
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => now()
        ]);
        // Gửi email bằng mailable
        Mail::to($request->email)->send(new ForgotPasswordMail($token));
        return redirect()->to(route('forgotpass'))->with('success', 'Please check your email');
    }
    public function reset_pass($token)
    {
        $this->data['title'] = 'Reset Password';
        return view('furniture_page.users.reset-password', compact('token'), $this->data);
    }
    public function reset_password_post(Request $request)
    {
        // Validate input
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);

        // Tìm token tương ứng với email
        $resetToken = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->where('token', $request->token)
            ->first();

        // Nếu không tìm thấy token hoặc email tương ứng, chuyển hướng về trang đặt lại mật khẩu với thông báo lỗi
        if (!$resetToken) {
            return redirect()->back()->with('error', 'Invalid token');
        }

        // Cập nhật mật khẩu mới cho người dùng có email tương ứng trong bảng users
        $affected = DB::table('users')
            ->where('email', $resetToken->email)
            ->update(['password' => bcrypt($request->password)]);

        // Kiểm tra xem cập nhật mật khẩu đã thành công hay không
        if ($affected) {
            // Xóa token đã sử dụng khỏi bảng password_reset_tokens
            DB::table('password_reset_tokens')
                ->where('token', $request->token)
                ->delete();

            // Chuyển hướng đến trang đăng nhập với thông báo thành công
            return redirect()->route('login')->with('success_reset', 'Password reset successfully');
        } else {
            // Trường hợp có lỗi khi cập nhật mật khẩu
            return redirect()->back()->with('error', 'Failed to reset password');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
