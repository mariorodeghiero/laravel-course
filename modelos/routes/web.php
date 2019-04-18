<?php
use App\Categoria;

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

/**
 * Lista todas categorias.
 */
Route::get('/listar', function () {
    $categorias =  Categoria::all();
    foreach ($categorias as $c ) {
        # code...
        echo 'id: ' . $c->id . ' ; ';
        echo 'nome: ' . $c->nome . '<br>';
    }
});

/**
 * Insere uma nova categoria usando a classe Categoria.
 */
Route::get('/inserir/{nome}', function ($nome) {
    $cat = new Categoria();
    $cat->nome = $nome;
    $cat->save();
});

/**
 * Busca um ID na tabela categorias.
 */
Route::get('/busca/{id}', function ($id) {
    $cat = Categoria::find($id);

    if (isset($cat)) {
        echo 'id: ' . $cat->id . ' ; ';
        echo 'nome: ' . $cat->nome . '<br>';
    } else {
        echo '<h1>Categoria não encontrada!</h1>';
    }
});


/**
 * Atualiza o nome relacionado a um ID na tabela categorias.
 */
Route::get('/atualizar/{id}/{nome}', function ($id, $nome) {
    $cat = Categoria::find($id);

    if (isset($cat)) {
       $cat->nome = $nome;
       $cat->save();
       return redirect('/listar');
    } else {
        echo '<h1>Não foi possivel atualizar!</h1>';
    }
});

/**
 * Remove o nome relacionado a um ID na tabela categorias.
 */
Route::get('/delete/{id}', function ($id) {
    $cat = Categoria::find($id);

    if (isset($cat)) {
       $cat->delete();
       return redirect('/listar');
    } else {
        echo '<h1>Não foi possivel atualizar!</h1>';
    }
});

/**
 * Busca por nome na tabela categorias.
 */
Route::get('/search/{nome}', function ($nome) {
    $categorias = Categoria::where('nome', $nome)->get();
    foreach ($categorias as $c ) {
        # code...
        echo 'id: ' . $c->id . ' ; ';
        echo 'nome: ' . $c->nome . '<br>';
    }

});
