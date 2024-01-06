<?php

use Illuminate\Support\Facades\Route;
use App\Models\People;
use App\Http\Controllers\PeopleController;

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
    return view('welcome');
});

Route::get('janbanka/310216/people', [PeopleController::class, 'index']);
Route::get('janbanka/310216/people/{person}', [PeopleController::class, 'show']);
Route::delete('janbanka/310216/people/{id}', [PeopleController::class, '@destroy']);
