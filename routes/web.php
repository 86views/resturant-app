<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Front\AboutUsController;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Front\MenuController as FrontMenuController;
use App\Http\Controllers\Front\CategoryController as FrontCategoryController;
use App\Http\Controllers\Front\ReservationController as FrontReservationController;
use App\Http\Controllers\Front\WelcomeController as FrontWelcomeController;

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


Route::get('/', [FrontWelcomeController::class, 'index']);  

Route::get('/about', [AboutUsController::class, 'index'])->name('about.index');

Route::get('/categories', [FrontCategoryController::class, 'index'])->name('categories.index');

Route::get('/categories/{category}', [FrontCategoryController::class, 'show'])->name('categories.show');

Route::get('/menus', [FrontMenuController::class, 'index'])->name('menus.index');

Route::get('/reservation/step-one', [FrontReservationController::class, 'StepOne'])
      ->name('reservations.store.step.one');

Route::post('/reservation/step-one', [FrontReservationController::class, 'storeStepOne'])
      ->name('reservations.step.one');


Route::get('/reservation/step-two', [FrontReservationController::class, 'StepTwo'])
->name('reservations.store.step.two');     


Route::post('/reservation/step-two', [FrontReservationController::class, 'storeStepTwo'])
      ->name('reservations.step.two');


// Route::get('/thankYou', [FrontReservationController::class, 'thankYou'])->name('thankYou');

Route::get('/thankYou', [FrontWelcomeController::class, 'thankYou'])->name('thankYou');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

 Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function() {
     Route::get('/', [AdminController::class, 'index'])->name('index');
     Route::resource('/categories', CategoryController::class);
     Route::resource('/menus', MenuController::class);
     Route::resource('/tables', TableController::class);
     Route::resource('/reservation', ReservationController::class);
     
   
 });


require __DIR__.'/auth.php';
