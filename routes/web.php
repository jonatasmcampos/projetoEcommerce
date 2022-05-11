<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DescontoController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\MinhaContaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\TamanhoController;
use App\Models\Desconto;

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

Auth::routes();
Route::resource('/', WelcomeController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Rotas para categoria

// Route::get('/home/cadastrar/categoria', [App\Http\Controllers\CategoriaController::class, 'create'])->name('createCategoria');
// Route::post('/home/cadastrar', [App\Http\Controllers\CategoriaController::class, 'store'])->name('saveCategoria');

//Route::get('/mihaConta/index', [App\Http\Controllers\MinhaContaController::class, 'index'])->name('mihaConta.index');
Route::get('/mihaConta/edit-configuracao', [App\Http\Controllers\MinhaContaController::class, 'edit_configuracao'])->name('edit_configuracao');
Route::put('/mihaConta/update-configuracao', [App\Http\Controllers\MinhaContaController::class, 'update_configuracao'])->name('update_configuracao');
Route::get('/mihaConta/edit-senha', [App\Http\Controllers\MinhaContaController::class, 'edit_senha'])->name('edit_senha');
Route::post('/mihaConta/update_senha', [App\Http\Controllers\MinhaContaController::class, 'update_senha'])->name('update_senha');

//categoiras
Route::resource('/home/categoria', CategoriaController::class);

//produtos
Route::delete('/deleta-imagem/{imagem}', [App\Http\Controllers\ProdutoController::class, 'deleta_image'])->name('deleta_image');
Route::put('/img_padrao/{imagem}', [App\Http\Controllers\ProdutoController::class, 'torna_imagem_padrao'])->name('img_padrao');
Route::resource('/home/produto', ProdutoController::class);

//estoques
Route::resource('/home/estoque', EstoqueController::class);

//tamanhos
Route::resource('/home/tamanho', TamanhoController::class);

//tamanhos
Route::resource('/home/descontos', DescontoController::class);