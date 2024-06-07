<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\CreatorController;
use App\Http\Controllers\EduLevelController;
use App\Http\Controllers\LoginController;
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

Route::get('/', function () {
    return redirect(route('login'));
})->name('dashboard');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('auth');


Route::middleware('auth')->group(function () {
    Route::get('/creators', [CreatorController::class, 'index'])->name('creators');
    Route::post('/creators/store', [CreatorController::class, 'store'])->name('creators.store');
    Route::delete('/creators/destroy', [CreatorController::class, 'destroy'])->name('creators.destroy');
    Route::put('/creators/put', [CreatorController::class, 'put'])->name('creators.put');

    Route::get('/edulvls', [EduLevelController::class, 'index'])->name('edulevels');
    Route::post('/edulvls/store', [EduLevelController::class, 'store'])->name('storeedulevels');
    Route::delete('/edulvls/destroy', [EduLevelController::class, 'destroy'])->name('destroyedulevels');
    Route::put('/edulvls/put', [EduLevelController::class, 'put'])->name('putedulevels');

    Route::get('/contents', [ContentController::class, 'index'])->name('contents');
    Route::post('/contents/store', [ContentController::class, 'store'])->name('contents.store');
    Route::delete('/contents/destroy', [ContentController::class, 'destroy'])->name('contents.destroy');
    Route::put('/contents/put', [ContentController::class, 'put'])->name('contents.put');
});
