<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Employe;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('employes', function () {
    $employes = Employe::get();
    return $employes;
});

Route::post('employes', function(Request $request){
    $request->validate([
        'names' => 'required|max:50',
        'last_name' => 'required|max:50',
        'dni' => 'required|numeric',
        'email' => 'required|max:50|email|unique:employes',
        'gender' => 'required|max:50',
        'status_marital' => 'required|max:50',
        'phone' => 'required|numeric|max:5000000000'
    ]);

    $employe = new Employe;

    $employe->names = $request->input('names');
    $employe->last_name = $request->input('last_name');
    $employe->dni = $request->input('dni');
    $employe->email = $request->input('email');
    $employe->gender = $request->input('gender');
    $employe->status_marital = $request->input('status_marital');
    $employe->phone = $request->input('phone');


    $employe->save();
    return $request->all();
});

Route::put('employes/{id}', function(Request $request, $id){
    $request->validate([
        'names' => 'required|max:50',
        'last_name' => 'required|max:50',
        'dni' => 'required|numeric',
        'email' => 'required|max:50|email|unique:employes,email,' . $id,
        'gender' => 'required|max:50',
        'status_marital' => 'required|max:50',
        'phone' => 'required|numeric|max:5000000000'
    ]);
    $employe = Employe::findOrFail($id);
    $employe->names = $request->input('names');
    $employe->last_name = $request->input('last_name');
    $employe->dni = $request->input('dni');
    $employe->email = $request->input('email');
    $employe->gender = $request->input('gender');
    $employe->status_marital = $request->input('status_marital');
    $employe->phone = $request->input('phone');


    $employe->save();
    return $employe;
});


Route::delete('employes/{id}', function(Request $request, $id){

    $employe = Employe::findOrFail($id);
    $employe->delete();
    return 'Deleted';
});
