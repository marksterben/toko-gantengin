<?php

use App\Http\Livewire\Home;
use App\Http\Livewire\User;
use App\Http\Livewire\Product;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Cart;
use App\Http\Livewire\Checkout;
use Illuminate\Support\Facades\Route;

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

Route::get('/', Home\Index::class);
Route::get('/detail/{product}', Home\Detail::class)->name('detail');

Route::get('/user', User\Index::class)->middleware(['auth', 'admin'])->name('user');
Route::get('/product', Product\Index::class)->middleware(['auth', 'admin'])->name('product');
Route::get('/profile', Profile\Index::class)->middleware('auth')->name('profile');
Route::get('/cart', Cart\Index::class)->middleware('auth')->name('cart');
Route::get('/checkout', Checkout\Index::class)->middleware('auth')->name('checkout');
Route::get('/myorder', Profile\MyOrder::class)->middleware('auth')->name('myorder');
Route::get('/myorder/{order}', Profile\MyOrderDetail::class)->middleware('auth')->name('myorder.show');

require __DIR__ . '/auth.php';
