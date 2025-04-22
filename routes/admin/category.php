<?php
use \App\Http\Controllers\CategoryController;

Route::get('/admin/category', [CategoryController::class, 'category']);
Route::post('/admin/createCategoryRecord', [CategoryController::class, 'createCategoryRecord']);
Route::post('/admin/updateCategoryRecord', [CategoryController::class, 'updateCategoryRecord']);
Route::get('/admin/fetchCategoryRecord', [CategoryController::class, 'fetchCategoryRecord']);
Route::post('/admin/deleteCategoryRecord', [CategoryController::class, 'deleteCategoryRecord']);
