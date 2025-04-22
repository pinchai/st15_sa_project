<?php
use \App\Http\Controllers\UserController;

Route::get('/admin/user', [UserController::class, 'user']);
Route::post('/admin/createUserRecord', [UserController::class, 'createUserRecord']);
Route::post('/admin/updateUserRecord', [UserController::class, 'updateUserRecord']);
Route::get('/admin/fetchUserRecord', [UserController::class, 'fetchUserRecord']);
Route::post('/admin/deleteUserRecord', [UserController::class, 'deleteUserRecord']);
