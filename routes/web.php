<?php

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

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\Admin\NewsController;
Route::controller(NewsController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('news/create', 'add')->name('news.add');
    Route::post('news/create', 'create')->name('news.create');
});

#PHP/Laravel 10 課題3.「http://XXXXXX.jp/XXX というアクセスが来たときに、 AAAControllerのbbbというAction に渡すRoutingの設定」を書いてみてください
Route::controller(AAAController::class)->group(function() {
    Route::get('XXX', 'bbb');
});

#PHP/Laravel 10 課題4.web.phpを編集して、admin/profile/create にアクセスしたら ProfileController の add Action に、
#admin/profile/edit にアクセスしたら ProfileController の edit Action に割り当てるように設定してください
//php/laravel 12課題 ログインページへのリダイレクト設定を追記
//php/laravel 13課題 admin/profile/create に POSTメソッドでアクセスしたら ProfileController の create Action に割り当てるように設定してください
//php/laravel 13課題 admin/profile/edit に POSTメソッドでアクセスしたら ProfileController の update Action に割り当てるように設定してください
use App\Http\Controllers\Admin\ProfileController;
Route::controller(ProfileController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::get('profile/create', 'add')->name('profile.add');
    Route::post('profile/create', 'create')->name('profile.create');
    Route::get('profile/edit', 'edit')->name('profile.edit');
    Route::post('profile/edit', 'update')->name('profile.update');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
