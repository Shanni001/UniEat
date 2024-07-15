<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenusController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\OrderController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;
use App\Http\Middleware\AuthAdmin;
use App\Livewire\Auth\ForgotPasswordPage;

//use App\Livewire\Auth\ResetPassword;
use App\Livewire\Auth\LoginPage;
use App\Livewire\Auth\RegisterPage;
use App\Livewire\CancelPage;
use App\Livewire\HomePage;
use App\Livewire\MenuPage;
use App\Livewire\CartPage;
use App\Livewire\ProductDetailPage;
use App\Livewire\CheckoutPage;
use App\Livewire\MyOrderDetailPage;
use App\Livewire\MyOrdersPage;
use App\Livewire\SuccessPage;
use App\Models\Menu;
use Filament\Pages\Auth\PasswordReset\ResetPassword;

Route::get('index', function () {
    return view('index');
});

Route::get('layout3', function () {
    return view('layout3');
});
 
 

//Route::get('/', HomePage::class);

//Route::get('/products', MenuPage::class);

//Route::get('/cart2', CartPage::class);

//Route::get('/checkout2', CheckoutPage::class);

//Route::get('/myOrders', MyOrdersPage::class);

//Route::get('/myOrders {order}', MyOrderDetailPage::class);
//Route::get('/products/{product}', MenuPage::class) ->name('products.show');

//Route::get('/products/{product}', ProductDetailPage::class);

//Route::get('/login', LoginPage::class);
//Route::get('/register', RegisterPage::class);
//Route::get('/forgot', ForgotPasswordPage::class);
//Route::get('/resest', ResetPassword::class);

//Route::get('/sucess', SuccessPage::class);
//Route::get('/resest', CancelPage::class);

// routes/web.php

use App\Http\Middleware\RedirectIfAuthenticated;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('/index2', [UserController::class,'index'])->name('index2');
});


// Route::middleware('auth', 'auth.admin')->group(function(){
//     Route::get('/admin', [VendorController::class,'index'])->name('admin');
// });





Route::get('layout3', function () {
    return view('layout3');
});



Route::get('index2', function () {
    return view('index2');
});

Route::post('index', function () {
    return view('index');
});



Route::get('start', function () {
    return view('start');
});

Route::get('/registration', [MainController::class, 'registration' ]);
Route::post('/registerUser', [MainController::class, 'registerUser' ]);
Route::get('/profile', [MainController::class, 'profile' ]);
Route::post('/updateUser', [MainController::class, 'updateUser' ]);

Route::get('/login', [MainController::class, 'login' ]);
Route::get('/logout', [MainController::class, 'logout' ]);
Route::post('/loginUser', [AdminController::class, 'loginUser' ]);
//Route::post('/loginUser', [MainController::class, 'loginUser' ]);
Route::get('menu', [MenusController::class, 'menu' ])->name('menu');

Route::get('cart', [MenusController::class, 'cart' ])->name('cart');

Route::get('addToCart/{id}', [MenusController::class, 'addToCart' ])->name('addToCart');
//Route::post('/add-to-cart/{id}', [MenusController::class, 'addToCart'])->name('add-to-cart');

//Route::get('addToCart/{id}', [CartController::class, 'addToCart' ])->name('addToCart');
 Route::delete('remove_cart', [MenusController::class, 'remove' ])->name('remove_cart');

Route::patch('update-cart', [MenusController::class, 'update' ])->name('update_cart');

// Route::get('menu', [MenusController::class, 'menu'])->name('menu');
Route::get('menu/{restaurant_id}', [MenusController::class, 'show'])->name('menu.show');
// Route::get('cart', [MenusController::class, 'cart'])->name('cart');
//Route::post('add-to-cart/{id}', [MenusController::class, 'addToCart'])->name('add_to_cart');
// Route::patch('update-cart', [MenusController::class, 'update'])->name('update_cart');
//Route::delete('remove-from-cart', [MenusController::class, 'remove'])->name('remove_cart');

// Route for displaying the checkout form
// Route::get('/checkout', function () {
//     return view('checkout');
// })->name('checkout');

// Route for processing the checkout form
//Route::post('/checkout', [CheckoutController::class, 'processCheckout'])->name('process_checkout');

Route::get('/university', [UniversityController::class, 'university'])->name('university');

Route::get('/restaurants/{university}', [RestaurantController::class, 'show'])->name('restaurant');

// web.php
Route::get('/menus/{restaurant}', [MenusController::class, 'show'])->name('menu');



Route::get('/testMail}', [MenusController::class, 'show'])->name('testMail');
// routes/web.php



//Route::post('/checkout', [OrderController::class, 'store'])->name('process_checkout');
// web.php


//Route::get('/checkout', [OrderController::class, 'showCheckout'])->name('checkout');
//Route::get('/checkout', [OrderController::class, 'checkout'])->name('process_checkout');
// Route::match(['get', 'post'], '/checkout', [OrderController::class, 'checkout'])->name('checkout');


//Route::get('/add-to-cart/{menu}', [OrderController::class, 'addToCart'])->name('addToCart');
//Route::get('/cart', [OrderController::class, 'viewCart'])->name('viewCart');
//Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');

// routes/web.php
Route::post('/checkout', [MainController::class, 'checkout']);
Route::get('/checkout', [OrderController::class, 'showCheckout'])->name('checkout');

Route::get('/ourOrders', [AdminController::class, 'foods']);
Route::get('/changeOrderStatus/{status}/{id}', [AdminController::class, 'changeOrderStatus']);
Route::get('/ourOrders', [AdminController::class, 'foods']);
Route::get('/googleLogin', [MainController::class, 'googleLogin']);
Route::get('/auth/google/callback', [MainController::class, 'googleHandle']);
//Route::post('/checkout', [OrderController::class, 'processCheckout'])->name('process_checkout');
//Route::patch('/order/{order}/status', [OrderController::class, 'updateStatus'])->name('update_order_status');


//at night


//Route::get('/menu/{restaurant}', [OrderController::class, 'showMenu'])->name('menu');
//Route::post('/checkout', [OrderController::class, 'checkout'])->name('process_checkout');
Route::get('/orders', [OrderController::class, 'orders'])->name('orders');
Route::patch('/order/{order}/status', [OrderController::class, 'updateStatus'])->name('update_order_status');
//Route::get('/cart', [OrderController::class, 'viewCart'])->name('cart');


//Admin Routes
Route::get('/vendor', [AdminController::class, 'index3']);
Route::get('/index3Menu', [AdminController::class, 'products']);

//Route::get('/ourOrders', [AdminController::class, 'users']);
Route::get('/adminProfile', [AdminController::class, 'profile']);
Route::get('/deleteProduct/{id}', [AdminController::class, 'deleteProduct']);

//Route::get('/AddNewProduct', [AdminController::class, 'AddNewProduct']);



Route::post('/AddNewProduct', [AdminController::class, 'AddNewProduct']);
Route::post('/UpdateProduct', [AdminController::class, 'UpdateProduct'])->name('UpdateProduct');
Route::post('/cart', [MainController::class, 'cart']);


Route::get('/myOrders', [MainController::class, 'myOrders']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


//require _DIR_.'auth.php';

use App\Http\Controllers\CartController;



