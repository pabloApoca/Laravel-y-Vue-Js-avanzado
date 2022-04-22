<?php

use Illuminate\Support\Facades\Route;

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
    return view('app');
});

//Also
//Route::view('/','app');
/*
Route::get('products', function(){
    return 'Productos list';
});

Route::post('products', function(){
    return 'Stocking products';
});

Route::put('products/{id}', function($id){
    return 'Update product' . $id;
});*/