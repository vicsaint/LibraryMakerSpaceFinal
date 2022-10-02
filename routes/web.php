<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WelcomeController;

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
    return view('welcome');
});


Route::get('/one', function () {
    return view('onepage');
});

Route::get('/two', function () {
    return view('twopage');
});

Route::get('/three', function () {
    return view('threepage');
});


Route::get('/four', function () {
    return view('fourpage');
});


Route::get('/five', function () {
    return view('fivepage');
});

Route::get('/six', function () {
    return view('sixpage');
});


Route::get('/result', function () {
    return view('resultpage');
});


Route::post('oneData',[WelcomeController::class, 'oneData'])->name('oneData');
Route::post('twoData',[WelcomeController::class, 'twoData'])->name('twoData');
Route::post('threeData',[WelcomeController::class, 'threeData'])->name('threeData');
Route::post('fourData',[WelcomeController::class, 'fourData'])->name('fourData');
Route::post('fiveData',[WelcomeController::class, 'fiveData'])->name('fiveData');
Route::post('sixData',[WelcomeController::class, 'sixData'])->name('sixData');
Route::post('result',[WelcomeController::class, 'result'])->name('result');
Route::post('regsForm',[WelcomeController::class, 'regsForm'])->name('formRegs');
