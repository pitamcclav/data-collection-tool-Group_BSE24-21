<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth', 'user-access:user'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::controller(PostController::class)->group(function () {

        Route::get('/posts', 'index')->name('posts');
        Route::get('/posts/new', 'create')->name('new_post');
        Route::post('/posts/create', 'store');

        Route::get('/posts/view/{id}', 'show');
        // Route::get('/posts/{search}', 'search')->name('set');
    });
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('/user', [UserController::class, 'index'])->name('user');

    Route::controller(AdminController::class)->group(function () {

        Route::get('/admin/posts', 'index')->name('admin.posts');
        Route::get('/admin/posts/new', 'create')->name('admin.new_post');
        Route::post('/admin/posts/create', 'store');
        Route::get('/admin/posts/edit/{id}', 'edit');
        Route::post('/admin/posts/update/{id}', 'update');
        Route::get('/admin/posts/view/{id}', 'show');
        Route::get('/admin/posts/delete/{id}', 'destroy');
    });
});
