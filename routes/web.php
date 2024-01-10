<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;


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
//logout
Route::get('/logout', [PageController::class, 'logout']);

//guest
Route::middleware(['isLogin'])->group(function () {
    Route::get('/', [PageController::class, 'index']);
    Route::get('/login', [PageController::class, 'login']);
    Route::get('/register', [PageController::class, 'register']);
    Route::post('/registerstore', [PageController::class, 'registerstore']);
    Route::post('/loginstore', [PageController::class, 'loginstore']);
});

//user
Route::middleware(['isGuest', 'isAdmin'])->group(function () {
    Route::get('/book', [PageController::class, 'userlanding']);
    Route::get('/user', [PageController::class, 'userdashboard']);
    Route::get('/readbook/{id}', [PageController::class, 'readbook']);
    Route::get('/pdfbook/{id}', [BookController::class, 'pdfbook']);
});
                                                         
//admin
Route::middleware(['isGuest', 'isUser'])->group(function () {
    Route::get('/admin', [PageController::class, 'adminlanding']);
    Route::get('/datauser', [PageController::class, 'datauser']);
    Route::get('/databook', [PageController::class, 'databook']);
    Route::get('/category', [PageController::class, 'category']);
    Route::post('/categorystore', [CategoryController::class, 'category']);
    Route::post('/bookstore', [BookController::class, 'store']);
    Route::delete('/categorydelete/{id}', [CategoryController::class, 'delete']);
    Route::delete('/bookdelete/{id}', [BookController::class, 'bookdelete']);
    Route::delete('/userdelete/{id}', [PageController::class, 'userdelete']);
    Route::get('/editbook/{id}', [PageController::class, 'editbook']);
    Route::patch('/bookpatch/{id}', [BookController::class, 'bookpatch']);
    Route::get('/users_export', [PageController::class, 'exportuser']);
    Route::get('/books_export', [PageController::class, 'exportbook']);
});