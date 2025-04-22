<?php
use \App\Http\Controllers\CustomerController;

Route::get('/admin/customer', [CustomerController::class, 'customer']);
Route::post('/admin/createCustomerRecord', [CustomerController::class, 'createCustomerRecord']);
Route::post('/admin/updateCustomerRecord', [CustomerController::class, 'updateCustomerRecord']);
Route::get('/admin/fetchCustomerRecord', [CustomerController::class, 'fetchCustomerRecord']);
Route::post('/admin/deleteCustomerRecord', [CustomerController::class, 'deleteCustomerRecord']);
