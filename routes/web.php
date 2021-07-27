<?php

use App\Http\Livewire\Home;
use App\Http\Livewire\Product;
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

Route::get('/product', Product\Index::class)->name('product');

require __DIR__ . '/auth.php';
