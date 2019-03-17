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

Route::get('/test', function () {
    return view("test");
});

Route::get('/test/{nome}/{sobrenome}', function ($nome, $sobrenome) {
    return "<H1>Olá $nome $sobrenome</H1>";
});

Route::post('/add/{token}', function ($token) {
    return "<H1>Post: $token</H1>";
});
