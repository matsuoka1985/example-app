<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//middlewareファイルをコマンドによって作成し、そのファイルのhandle関数内で
//controllerでの処理の前後にしてほしい処理を記述。
//そのファイルとそのエイリアスをapp/Http/Kernel.phpのルートミドルウェア登録箇所に登録する。
//そしてweb.phpのルーティングの記述において、メソッドチェーンでmiddlewareメソッドを
//つなげてあげてその引数にmiddlewareファイルのエイリアスを渡す。

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sample',[\App\Http\Controllers\Sample\IndexController::class,'show']);

Route::get('/sample/{id}',[\App\Http\Controllers\Sample\IndexController::class,'showId']);

//シングルアクションコントローラーの場合、ルーティングに対応するメソッド名は不要で、クラスのみ指定する。
Route::get('/tweet',\App\Http\Controllers\Tweet\IndexController::class)->name('tweet.index');

// Route::post('/tweet/create',\App\Http\Controllers\Tweet\CreateController::class)->name('tweet.create');

Route::middleware('auth')->group(function(){

    Route::post('/tweet/create',\App\Http\Controllers\Tweet\CreateController::class)
    ->name('tweet.create');

    Route::get('/tweet/update/{tweetId}',\App\Http\Controllers\Tweet\Update\IndexController::class)->name('tweet.update.index')->where('tweetId','[0-9]+');

    Route::put('/tweet/update/{tweetId}',\App\Http\Controllers\Tweet\Update\PutController::class)->name('tweet.update.put')->where('tweetId','[0-9]+');

    Route::delete('/tweet/delete/{tweetId}',\App\Http\Controllers\Tweet\DeleteController::class)->name('tweet.delete');
});


require __DIR__.'/auth.php';