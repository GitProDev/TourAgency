<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\TourController;
use App\Http\controllers\AttractionController;
use App\Http\controllers\SessionController;
use App\Models\Tour;

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

Route::get('/', function () {
	$tours = Tour::simplePaginate('5');
    return view('index', ['tours' => $tours]);
});

Route::get('/contactus', function () {
    return view('contactus');
});

Route::get('/search_tours', [TourController::class, 'search']);
Route::get('/dashboard/tours', [TourController::class, 'index'])->middleware('auth');
Route::get('/dashboard/attractions', [AttractionController::class, 'index'])->middleware('auth');

Route::get('/dashboard/tour/create', [TourController::class, 'create'])->middleware('auth');
Route::post('/dashboard/tour', [TourController::class, 'store'])->middleware('auth');
Route::get('/dashboard/tour/{tour}/edit', [TourController::class, 'edit'])->middleware('auth');
Route::patch('/dashboard/tour/{tour}', [TourController::class, 'update'])->middleware('auth');


Route::get('/dashboard/attraction/create', [AttractionController::class, 'create'])->middleware('auth');
Route::post('/dashboard/attraction', [AttractionController::class, 'store'])->middleware('auth');
Route::get('/dashboard/attraction/{attraction}/edit', [AttractionController::class, 'edit'])->middleware('auth');
Route::patch('/dashboard/attraction/{attraction}', [AttractionController::class, 'update'])->middleware('auth');

Route::delete('/dashboard/attraction/{attraction}', [AttractionController::class, 'destroy'])->middleware('auth');
Route::delete('/dashboard/tour/{tour}', [TourController::class, 'destroy'])->middleware('auth');

Route::delete('/dashboard/attraction/{attraction}/image', [AttractionController::class, 'delete_image'])->middleware('auth');

Route::get('/login', [SessionController::class, 'create'])->middleware('guest')->name('login');	
Route::post('/login', [SessionController::class, 'store'])->middleware('guest');	
Route::get('/logout', [SessionController::class, 'destroy'])->middleware('auth');
