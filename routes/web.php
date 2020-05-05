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
    try {
        DB::connection()->getPdo();
    } catch (\Exception $e) {
        die("Could not connect".$e);
    }
});

//Definir rutas agrupadas en una ruta padre
Route::group(['prefix' => 'admin'], function () {
    Route::get('/name/{name}',function($name){
        return config('app.timezone');
    })->where('name','[A-Za-z]+');
});
//redireccionamiento
Route::redirect('/foo', '/admin/name/redirect');
//Uso de vistas
Route::get('/views', function () {
    $name='Dixson';
    $secondName='Reyes';
    //return view('view')->with("name",$name);
    return view('view',compact("name","secondName"));
});


Route::view('/vue', 'vue');
/*
Route::get('/users', function () {
    dd(App\User::with(['posts'])->first()->posts->first()->id);
});*/

