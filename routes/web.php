<?php

use Illuminate\Support\Facades\Route;

//// GET, POST
//Route::get('/', function () {
////    return view('welcome');
//    return view('home');
//});
//
//
//Route::get('/register', function () {
//    return view('register');
//});
//
//Route::post('/register', [\App\Http\Controllers\RegisterController::class, 'doRegister']);
//Route::get('/register-list', [\App\Http\Controllers\RegisterController::class, 'registerList']);
//Route::get('/get-delete', [\App\Http\Controllers\RegisterController::class, 'getDelete']);
//

include 'admin/auth.php';
Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return redirect('/admin/dashboard');
    });
    include 'admin/dashboard.php';
    include 'admin/user.php';
    include 'admin/branch.php';
    include 'admin/supplier.php';
    include 'admin/customer.php';
    include 'admin/category.php';
});

