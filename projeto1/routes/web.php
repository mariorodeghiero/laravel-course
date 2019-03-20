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

use Illuminate\http\Request;


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

Route::delete('/rest/hello', function () {
    return "<H1>Delete </H1>";
});

Route::put('/rest/hello', function () {
    return "<H1>Put </H1>";
});

Route::patch('/rest/hello', function () {
    return "<H1>Patch </H1>";
});

Route::options('/rest/hello', function () {
    return "<H1>Option </H1>";
});

// Passando parametros
Route::post('/rest/print', function (Request $req) {
    $nome = $req->input('name');
    $idade = $req->input('age');
    return "Hello $nome your age is $idade";
});

// Nomeando Rotas
Route::post('/rest/produtos', function () {
    echo "<H1>Produtos:</H1>";
})->name('Produtos');

// Agrupando Rotas
Route::prefix('app', function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/profile', function () {
        return view('welcome');
    });
    Route::get('/', function () {
        return view('welcome');
    });
})->name('app');

// Restringindo parametros
Route::get('/namerule/{name}/{n}', function ($name, $n) {
    for ($i=0; $i < $n; $i++) {
        echo "<h1>Hello, $name! $i</h1>";
    };
})->where('n', '[0-9]+')->where('name','[A-Za-z]+');


// Controllers
Route::get('/rest/name', 'MyController@getName');

Route::get('/rest/age', 'MyController@getAge');

Route::get('/rest/multiply/{n1}/{n2}', 'MyController@multiply');

Route::get('/rest/names/{id}', 'MyController@getNameById');
