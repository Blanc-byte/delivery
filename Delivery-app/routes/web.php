<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RiderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
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
////////////////////////////////////////////////////////////////
Route::get('/admin/dashboard', [AdminController::class, 'getAllProducts'])
->middleware(['auth', 'isAdmin'])
->name('admin.products');

Route::get('/user/dashboard', [UserController::class, 'index'])
    ->middleware(['auth', 'isUser'])
    ->name('user.dashboard');

Route::get('/rider/dashboard', [RiderController::class, 'index'])
    ->middleware(['auth', 'isRider'])
    ->name('rider.dashboard');

////////////////////////////////////////////////////////////////
////user Route
Route::get('/user/cart',[UserController::class, 'showCart']
    )->middleware(['auth', 'isUser'])
    ->name('user.cart');
    
Route::post('/add-to-cart', [UserController::class, 'addToCart'])
    ->middleware('auth')
    ->name('cart.add');
    
Route::post('/order/place', [UserController::class, 'insertOrder'])
    ->middleware(['auth', 'isUser'])
    ->name('order.placeOrder');
    
Route::patch('/cart/increase/{productId}', [UserController::class, 'increaseQuantity'])->name('cart.increase');
Route::patch('/cart/decrease/{productId}', [UserController::class, 'decreaseQuantity'])->name('cart.decrease');
Route::delete('/cart/remove/{productId}', [UserController::class, 'removeItem'])->name('cart.remove');
Route::delete('/cart/clear', [UserController::class, 'clearCart'])->name('cart.clear');



Route::get('/user/orderDetails', [UserController::class, 'viewOrderDetails'])
    ->middleware(['auth', 'isUser'])
    ->name('user.orderDetails');

Route::get('/user/dashboard/search', [UserController::class, 'search'])
    ->middleware(['auth', 'isUser'])
    ->name('dashboard.search');

Route::get('/filter-products', [UserController::class, 'filterByCategory'])
    ->middleware(['auth', 'isUser'])
    ->name('filter.products');
    
Route::middleware(['auth', 'isUser'])->group(function () {
    Route::post('/wishlist/add', [UserController::class, 'addToWishlist'])->name('wishlist.add');
    Route::post('/wishlist/remove', [UserController::class, 'removeFromWishlist'])->name('wishlist.remove');
    Route::get('/wishlist', [UserController::class, 'viewWishlist'])->name('wishlist.view');
    Route::get('/user/feedback/{id}', [UserController::class, 'feedback'])->name('user.feedback');
    Route::post('/feedback', [UserController::class, 'store'])->name('feedback.store');
    Route::post('/product/{productId}/rate', [UserController::class, 'ratings'])->name('product.rate');
    Route::get('/home', function () {
        return view('user.page');
    })->name('home');
});    
    
/////////////////////////////////////////////////////////////////
////admin Route
Route::get('/admin/products', [AdminController::class, 'getAllProducts'])
    ->middleware(['auth', 'isAdmin'])
    ->name('admin.products');

// Route::get('/admin/users', function () {
//     return view('admin.users');})
//     ->middleware(['auth', 'isAdmin'])
//     ->name('admin.users');

Route::get('/admin/riders', [AdminController::class, 'getRiders'])
    ->middleware(['auth', 'isAdmin'])
    ->name('admin.riders');

Route::put('/products/{id}', [AdminController::class, 'update'])
    ->middleware(['auth', 'isAdmin'])
    ->name('products.update');
Route::delete('/products/{product}', [AdminController::class, 'destroy'])
    ->middleware(['auth', 'isAdmin'])
    ->name('products.destroy');
Route::put('/products', [AdminController::class, 'store'])
    ->middleware(['auth', 'isAdmin'])
    ->name('products.store');

Route::get('/admin/products', [AdminController::class, 'getAllDeletedProducts'])
    ->middleware(['auth', 'isAdmin'])
    ->name('admin.deletedProducts');

Route::delete('/productsAdd/{product}', [AdminController::class, 'addAgain'])
    ->middleware(['auth', 'isAdmin'])
    ->name('products.addAgain');
    
Route::prefix('admin')->middleware('auth', 'isAdmin')->group(function () {
    Route::get('/users', [AdminController::class, 'getUsers'])->name('admin.users');
    Route::get('/users/{user}/update', [AdminController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/{user}', [AdminController::class, 'updateUser'])->name('admin.users.update');
    Route::delete('/users/{user}', [AdminController::class, 'destroy'])->name('admin.users.destroy');
});
    

/////////////////////////////////////////////////////////////////
/////rider routes

Route::get('/rider/rider', function () {
    return view('rider.rider');
})->middleware(['auth', 'isRider'])
    ->name('rider.rider');

Route::get('/rider/tobedelivered',[RiderController::class, 'tobedelivered'])
    ->middleware(['auth', 'isRider'])
    ->name('rider.tobedelivered');
Route::get('/rider/delivered',[RiderController::class, 'delivered'])
    ->middleware(['auth', 'isRider'])
    ->name('rider.delivered');

Route::put('/orders/{id}/update-status', [RiderController::class, 'updateStatus'])
    ->middleware(['auth', 'isRider'])
    ->name('orders.updateStatus');

Route::post('/orders/{id}/{origOrdersId}/deliver', [RiderController::class, 'markAsDelivered'])
    ->middleware(['auth', 'isRider'])
    ->name('orders.deliver');

Route::get('/rider/feedback', [RiderController::class, 'feedback'])
        ->middleware(['auth', 'isRider'])
        ->name('rider.feedback');

////////////////////////////////////////////////////////////////

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = Auth::user(); // Get the authenticated user

    if ($user->role === 'admin') {
        return redirect()->route('admin.products'); 
    } elseif ($user->role === 'user') {
        return redirect()->route('home'); 
    }elseif ($user->role === 'rider') {
        return redirect()->route('rider.dashboard'); 
    }

    // Default fallback if no role matches
    abort(403, 'Unauthorized action.');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
