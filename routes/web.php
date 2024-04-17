<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminProductCateController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FurnitureController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BlogsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// admin routes
Route::prefix('admin')->name('admin.')->middleware(['admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('home');
    Route::get('/datatable', [AdminController::class, 'datatable'])->name('datatable');
    Route::get('/forms', [AdminController::class, 'forms'])->name('forms');
    Route::get('/basic-table', [AdminController::class, 'basic_table'])->name('basictable');

    Route::prefix('show')->name('show.')->group(function () {
        Route::resource('/user-list', AdminUserController::class);
        Route::resource('/product-list', AdminProductController::class);
        Route::resource('/order-list', AdminOrderController::class);
        Route::resource('/cate-list', AdminProductCateController::class);
        Route::resource('/coupon-list', CouponController::class);
    });
});
Route::prefix('profile')->name('profile.')->middleware('auth')->group(function () {
    Route::get('/',[ProfileController::class, 'show'])->name('profile');
    Route::get('/update-profile/{id}',[ProfileController::class, 'edit'])->name('ShowUpdateProfile');
    Route::post('/update-profile/{id}',[ProfileController::class, 'update'])->name('UpdateProfile');
    Route::get('/infor-bank-profile',[ProfileController::class, 'InforBank'])->name('InforBank');
    Route::get('/address-profile',[ProfileController::class, 'Address'])->name('Address');
    Route::get('/infor-order-profile/{id}',[ProfileController::class, 'InforOrder'])->name('InforOrder');
    Route::get('/another-feature-profile',[ProfileController::class, 'AnotherFeature'])->name('AnotherFeature');
});
// client routes
Route::resource('blogs', BlogsController::class)->only(['index', 'show']);
Route::get('/', [FurnitureController::class, 'home'])->name('home');
Route::get('/shop', [FurnitureController::class, 'shop'])->name('shop');
Route::get('/product-detail/{id}', [FurnitureController::class, 'product_detail'])->name('product-detail');
Route::get('/about', [FurnitureController::class, 'about'])->name('about');
Route::get('/services', [FurnitureController::class, 'services'])->name('services');
Route::get('/fun/responses', [FurnitureController::class, 'responses'])->name('responses');


Route::get('/contact', [FurnitureController::class, 'contact'])->name('contact');
Route::post('/contact', [FurnitureController::class, 'contact_email'])->name('contactemail');

// Route checkout
Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout.index');
Route::post('/checkout',[CheckoutController::class,'store'])->name('checkout.store');
Route::get('/order', [CheckoutController::class, 'getOrderDetails'])->name('checkout.detailorder');
Route::get('/verify/{token}', [CheckoutController::class, 'verify'])->name('checkout.verify');
// Route Cart
Route::get('/cart', [CartController::class,'index'])->name('cart.index');
Route::put('/cart', [CartController::class, 'checkout_coupon'])->name('cart.coupon');
Route::post('/addToCart', [CartController::class, 'addToCart'])->name('cart.addToCart');
Route::post('/updateCart', [CartController::class, 'updateCart'])->name('cart.updateCart');
Route::get('/deleteCart/{session_id}', [CartController::class,'deleteCart'])->name('cart.deleteCart');


Route::get('/thankyou', [FurnitureController::class, 'thankyou'])->name('thankyou');

// Login and register routes
// login
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'handleLogin'])->name('loginsubmit');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// register
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register', [LoginController::class, 'handleRegister'])->name('registersubmit');
Route::get('/forgot-pass', [LoginController::class, 'forgot_pass'])->name('forgotpass');
Route::post('/forgot-pass', [LoginController::class, 'forgot_password_post'])->name('forgotpasspost');
Route::get('/reset-pass/{token}', [LoginController::class, 'reset_pass'])->name('resetpass');
Route::post('/reset-pass', [LoginController::class, 'reset_password_post'])->name('resetpasspost');


//Route emails
Route::get('send-mail', function () {
    $user = Auth::user(); // Lấy người dùng hiện tại từ session
    // Kiểm tra xem người dùng có tồn tại không trước khi gửi email
    if ($user) {
        Mail::raw('Hello world this is a test email', function ($message) use ($user) {
            $message->to($user->email)->subject('This is a test email');
        });
        dd('success');
    } else {
        dd('User not authenticated'); // Xử lý trường hợp người dùng không được xác thực
    }
});

//
Route::get('/announcement', function () {
    return view('admin.announcement');
})->name('announcement');
Route::fallback(function () {
    return 'Still got somewhere!';
});

//Login with gg
// Route::get('auth/google/callback', function(){
//     $user = Sociallite::driver('google')->user();
//     dd($user);
// });