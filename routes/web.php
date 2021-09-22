<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaceController;

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
Route::view('/', 'layout');

Route::resource('places', PlaceController::class);
Route::match(['post', 'get'], '/places/{id}/photos/add', [PlaceController::class, 'addPhoto']);
Route::get('/places/delete/{id}', [PlaceController::class, 'destroy']);
