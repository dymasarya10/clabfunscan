<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\CreatorController;
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

Route::get('/', function() {
    return redirect(route('creators'));
})->name('dashboard');

Route::get('/creators', [CreatorController::class, 'index'])->name('creators');
Route::post('/creators/store', [CreatorController::class, 'store'])->name('creators.store');
Route::delete('/creators/destroy', [CreatorController::class, 'destroy'])->name('creators.destroy');
Route::put('/creators/put', [CreatorController::class, 'put'])->name('creators.put');

Route::get('/edulvls', [EduLevelController::class, 'index'])->name('edulevels');
Route::post('/edulvls/store', [EduLevelController::class, 'store'])->name('storeedulevels');
Route::delete('/edulvls/destroy', [EduLevelController::class, 'destroy'])->name('destroyedulevels');
Route::put('/edulvls/put', [EduLevelController::class, 'put'])->name('putedulevels');

Route::get('/contents', [ContentController::class, 'index'])->name('contents');
Route::get('/contents/create', [AdminController::class, 'createContent'])->name('createcontents');
Route::post('/contents/store', [AdminController::class, 'store'])->name('storecontents');

