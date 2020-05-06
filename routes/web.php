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
})->middleware('language');
//Cuando se utiliza resource se agiliza la codificación
Route::resource('post', 'PostController');

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

use Illuminate\Support\Facades\DB;
//coleción de datos
Route::get('/query', function () {
    $user=DB::table('users')->get();
    dd($user);
});
//me devuelve el primer registro donde coincide
Route::get('/query-where', function () {
    $user=DB::table('users')->where('email','nyasia65@example.com')->first();
    dd($user);
});

//me devuelve el join entre users y posts
Route::get('/query-join', function () {
    $user=DB::table('users')
    ->join('posts','users.id','posts.user_id')
    ->select('users.id','users.name','posts.title','posts.content')
    ->get();
    dd($user);
});
//Estoy accediendo a un Servicio que registre en el service provider
Route::get('/paypal', function () {
    $paypal=resolve('App\Models\Paypal');
    return $paypal->doSomething();
});
//Estoy accediendo a un Servicio que registre en el service provider pero inyectando dependencia
Route::get('/paypal_inye', function (App\Models\Paypal $paypal) {

    return $paypal->doSomething();
});
