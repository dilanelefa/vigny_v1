<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('/blog')->name('blog.')->controller(\App\Http\Controllers\BlogController::class)->group(function(){
   Route::get('/', 'index')->name('index');
   Route::get('/{slug}-{post}', 'show')
       ->where([
           'slug' => '[0-9a-z\-]+',
           'post' => '[0-9]+'
       ])
       ->name('show');
});

Route::prefix('/dashboard')->name('dashboard.')->middleware('auth')->group(function(){
    Route::get('/', function(){
        return view('dashboard.home');
    })->name('home');

    Route::resource('posts', \App\Http\Controllers\Blog\PostController::class)->except('show');
});

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return redirect('/');
});


Route::get('/set-theme', function(Request $request){
    $theme = $request->query('theme');
    if($theme){
        \Illuminate\Support\Facades\Cookie::queue('theme', $theme, 86400 * 30); // 1 month
    }else{
        \Illuminate\Support\Facades\Cookie::forget('theme');
    }

    return redirect()->back();
});

