<?php

// use Illuminate\Http\Request;

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




Route::post('register','Auth\RegisterController');
Route::namespace('Auth')->group(function(){

    Route::post('register','RegisterController');
    Route::post('signIn','signInController');

});



Route::prefix('/mahasiswa')->middleware(['auth:api','mainMiddleware:ADMIN,MAHASISWA'])->group(function () {
    Route::get('/', 'mahasiswaController@index');
    Route::get('/mahasiswaform','mahasiswaController@create');
    Route::post('/create_mahasiswa','mahasiswaController@store');
    Route::post('/edit_mahasiswa/{mahasiswa_id}','mahasiswaCOntroller@edit');

});


Route::prefix('/book')->middleware(['auth:api','mainMiddleware:ADMIN,MAHASISWA'])->group(function () {
    Route::get('/', 'bookController@index');
    Route::get('/bookform','bookController@create');
    Route::post('/create_book','bookController@store');
    Route::post('/edit_book/{book_id}','bookController@edit');

});


Route::prefix('/borrow')->middleware(['auth:api','mainMiddleware:ADMIN,MAHASISWA'])->group(function () {
    Route::get('/', 'mappingkController@index');
    Route::get('/borrowform','mappingController@create');
    Route::post('/create_borrow','mappingController@store');
    Route::post('/edit_borrow/{pinjaman_id}','mappingController@edit');

});

Route::prefix('/borrow')->middleware(['auth:api','mainMiddleware:ADMIN'])->group(function () {

    Route::get('/edit_return/{pinjaman_id}','mappingController@updateAdmin');

});
Route::group(['middleware' => ['auth','mainMiddleware:SUPERADMIN,ADMIN']], function () {
    Route::get('/route_2', 'MainController@admin');
});



Route::get('user','userController');


