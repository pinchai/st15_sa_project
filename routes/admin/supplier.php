<?php
use \App\Http\Controllers\SupplierController;

Route::get('/admin/supplier', [SupplierController::class, 'supplier']);
Route::post('/admin/createSupplierRecord', [SupplierController::class, 'createSupplierRecord']);
Route::post('/admin/updateSupplierRecord', [SupplierController::class, 'updateSupplierRecord']);
Route::get('/admin/fetchSupplierRecord', [SupplierController::class, 'fetchSupplierRecord']);
Route::post('/admin/deleteSupplierRecord', [SupplierController::class, 'deleteSupplierRecord']);
