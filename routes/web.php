<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CartController;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Category;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {


//  $result =   DB::table('categories')->get();



//     return view('welcome', ['categories' => $result]);
// });

Route::get('/', function () {
    $result = Product::all();
    return view('welcome', ['products' => $result]);
})->name('welcome');

Route::get('/Products/{catid?}', function ($catid = null) {


    if ($catid == null) {
        $result = Product::all();
        return view('Products', ['products' => $result]);
    }else{
         $result = Product::where('category_id', $catid)->get();
         return view('Products', ['products' => $result]);
    }

});

// Route::get('/category', function () {
//     return view('category');
// });


Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/cart', function () {
    return view('cart');
});

Route::post('/cart-update', [App\Http\Controllers\CartController::class, 'cartUpdate'])->name('cart.update');


Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/news', function (){
    return view('news');
});

Route::get('admin', function () {
    return view('admin.auth.login');
});

Route::get('/add-to-cart/{id}', [App\Http\Controllers\CartController::class, 'addToCart'])->name('add.to.cart');

Route::post('/order', [App\Http\Controllers\CartController::class, 'order'])->name('order.post');
Route::get('/order-success', [App\Http\Controllers\CartController::class, 'orderSuccess'])->name('order.success');
