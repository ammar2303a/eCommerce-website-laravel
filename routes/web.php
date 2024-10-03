<?php
use App\Http\Controllers\homecontroller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\productController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('dashboard', AdminController::class);

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
Route::resource('/', homecontroller::class);

Route::get('products',[homecontroller::class,'product']);

Route::get('about',[homecontroller::class,'about']);

Route::get('contact',[homecontroller::class,'contact']);

Route::get('viewCategory',[CategoryController::class,'viewCategory']);

Route::get('addcCategory',[CategoryController::class,'addcCategory']);

Route::get('editCategory/{id}',[CategoryController::class,'editCategory']);

Route::get('updcategory',[CategoryController::class,'updatecategory']);
Route::get('viewproduct',[CategoryController::class,'viewproduct']);
Route::post('addproduct',[CategoryController::class,'addproduct']);





