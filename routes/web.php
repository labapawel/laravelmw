<?php

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
    return view('welcome');
});

Route::get('/test/{id?}/{p1?}', function($id=1, $p1='ala'){
    return date("Y-m-d H:i:s", strtotime(" +$id days"));
});


    // dodanie innych metod
    Route::controller(\App\Http\Controllers\pierwszyController::class)
    ->group(function(){
        Route::get('metoda1', 'metoda')->name('metoda');
    });

    Route::prefix('/testowe')->group(function(){
    Route::resource('/pierwszy', \App\Http\Controllers\pierwszyController::class)
    // zmiana nazwa
    ->names([
        'create'=>'p.create'
    ])
// ograniczenie metod na rutingu
    ->only(['index','create']);
    });