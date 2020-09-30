<?php

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

Route::get('/test','MainController@getData');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

// Route::middleware('auth','mainMiddleware')->group(function(){

    
// });

//cara 1
// Route::group(['middleware' => ['auth', 'mainMiddleware']],function(){
//     Route::group(['mainMiddleware'=>'SUPERADMIN'],function(){
//         Route::get('/route_1','MainController@admin');
//     });
    
//     Route::group(['mainMiddleware'=>['ADMIN','SUPERADMIN']],function(){
//      Route::get('/route_2', 'MainController@admin');
//     });

//     Route::group(['mainMiddleware'=>['ADMIN','GUEST']],function(){
//         Route::get('/route_3', 'MainController@admin');
//        });
//     });
//uncomment sampai sini;

//cara 2
Route::group(['middleware' => ['auth','mainMiddleware:SUPERADMIN']], function () {
    Route::get('/route_1', 'MainController@admin');
});
Route::group(['middleware' => ['auth','mainMiddleware:SUPERADMIN,ADMIN']], function () {
    Route::get('/route_2', 'MainController@admin');
});
Route::group(['middleware' => ['auth','mainMiddleware:ADMIN,GUEST']], function () {
     Route::get('/route_3', 'MainController@admin');
});


//uncomment sampai sini
Route::get('/home', 'HomeController@index')->name('home');
