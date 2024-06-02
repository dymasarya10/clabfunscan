<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EduLevelController;
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

Route::get('/', [AdminController::class, 'index'])->name('dashboard');
Route::get('/contents', [AdminController::class, 'allContent'])->name('contents');
Route::get('/contents/create', [AdminController::class, 'createContent'])->name('createcontents');
Route::post('/contents/store', [AdminController::class, 'store'])->name('storecontents');

Route::get('/edulvls', [EduLevelController::class, 'index'])->name('edulevels');
Route::post('/edulvls/store', [EduLevelController::class, 'store'])->name('storeedulevels');
Route::delete('/edulvls/destroy', [EduLevelController::class, 'destroy'])->name('destroyedulevels');
Route::put('/edulvls/put', [EduLevelController::class, 'put'])->name('putedulevels');

