<?php
use \App\Http\Controllers\BranchController;

Route::get('/admin/branch', [BranchController::class, 'branch']);
Route::post('/admin/createBranchRecord', [BranchController::class, 'createBranchRecord']);
Route::post('/admin/updateBranchRecord', [BranchController::class, 'updateBranchRecord']);
Route::get('/admin/fetchBranchRecord', [BranchController::class, 'fetchBranchRecord']);
Route::post('/admin/deleteBranchRecord', [BranchController::class, 'deleteBranchRecord']);
