<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VisitorController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/error', [HomeController::class, 'error']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/post', [HomeController::class, 'post']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/admin', [HomeController::class, 'admin']);
Route::get('/post-detail/{slug}', [HomeController::class, 'postDetail'])->name('post-detail');
Route::post('/comment/add', [CommentController::class, 'add'])->middleware(['is_auth_visitor']);


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/visitor/login', [VisitorController::class, 'index'])->name('visitor');
Route::post('/visitor/add', [VisitorController::class, 'add']);


require __DIR__ . '/auth.php';
Route::resource('posts', PostController::class)->missing(function (Request $request) {
    return Redirect::route('posts.index');
});

Route::post('contact/send', [ContactController::class, 'send']);
