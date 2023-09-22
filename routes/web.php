<?php

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
if (App::environment('production') || App::environment('staging')) {
    URL::forceScheme('https');
}

Route::get('/', function () {
    return redirect('home/list');
    // ログインしていない場合ログイン画面に遷移する
});

Auth::routes();

Route::prefix('home')->group(function() {
    Route::get('/list', [App\Http\Controllers\HomeController::class, 'index']);
    Route::get('/detail/{id}', [App\Http\Controllers\HomeController::class, 'detail']);
    Route::get('/favorite/', [App\Http\Controllers\HomeController::class, 'favorite']);
});


Route::prefix('items')->group(function () {
    Route::group(['middleware'=>['auth','can:admin']],function(){
        Route::get('/', [App\Http\Controllers\ItemController::class, 'index']);
        Route::get('/add', [App\Http\Controllers\ItemController::class, 'add']);
        Route::post('/add', [App\Http\Controllers\ItemController::class, 'add']);
        Route::get('/edit/{id}', [App\Http\Controllers\ItemController::class, 'edit']);
        Route::post('/edit/{id}', [App\Http\Controllers\ItemController::class, 'edit']);
        Route::post('/delete',[App\Http\Controllers\ItemController::class, 'delete']);
        Route::post('/imagedelete',[App\Http\Controllers\ItemController::class, 'imageDelete']);
    });
});

Route::get('/like/like/{id}', [App\Http\Controllers\LikeController::class, 'like']);
Route::get('/like/unlike/{id}', [App\Http\Controllers\LikeController::class, 'unlike']);
