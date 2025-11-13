<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CarrosController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\CorController;
use App\Http\Controllers\ModeloController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

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

/**Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});*/


Route::get('/dashboard', function () {
    return view('template_dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/carros', [CarrosController::class, 'index']
    )->name('carros');

Route::get('/', [CarrosController::class, 'home']
    )->name('home');    

Route::get('/carro/detalhes/{id}', [CarrosController::class, 'detalhes']
    )->name('carros.detalhes');    

Route::middleware('auth')->group(function () {

//----Rota de cadastro de carros
Route::get('/carros/inicio', [CarrosController::class, 'inicio']
    )->name('carros.inicio');

Route::get('/carros/cadastrar', [CarrosController::class, 'incluirCarro']
    )->name('carros.cadastrar');    

route::get('/carros/{id}', [CarrosController::class, 'buscarCarro']
    )->name('carro.buscar');
    
route::post('/carros/cadastrar', [CarrosController::class, 'salvarCarros']
    )->name('carros.gravar');

route::post('/carros/alterar', [CarrosController::class, 'alterarCarros']
    )->name('carros.alterar');

route::get('/carros/deletar/{id}', [CarrosController::class, 'deletarCarros']
    )->name('carro.deletar');
        

//----Rota de cadastro de marcas
Route::get('/marcas', [MarcaController::class, 'marca'])->name('marcas');
Route::get('/marcas/cadastrar', [MarcaController::class, 'incluirMarca'])->name('marcas.cadastrar');
Route::post('/marcas/cadastrar', [MarcaController::class, 'salvarMarca'])->name('marcas.salvar');
route::get('/marcas/{id}', [MarcaController::class, 'buscarMarca'] 
    )->name('marcas.buscar');
route::post('/marcas/alterar', [MarcaController::class, 'AlterarMarca'] 
    )->name('marcas.alterar');
route::post('/marcas/deletar/{id}', [MarcaController::class, 'deletarMarca'] 
    )->name('marcas.deletar');


//----Rota de cadastro de cores
Route::get('/cores', [CorController::class, 'cores'])->name('cores');
Route::get('/cores/cadastrar', [CorController::class, 'incluirCor'])->name('cor.cadastrar');
Route::post('/cores/cadastrar', [CorController::class, 'salvarCor'])->name('cor.salvar');
route::get('/cores/{id}', [CorController::class, 'buscarCor'] 
    )->name('cor.buscar');
route::post('/cores/alterar', [CorController::class, 'AlterarCor'] 
    )->name('cor.alterar');
route::get('/cores/deletar/{id}', [CorController::class, 'deletarCor'] 
    )->name('cor.deletar');


//----Rota de cadastro de modelos
Route::get('/modelos', [ModeloController::class, 'modelo'])->name('modelos');
Route::get('/modelos/cadastrar', [ModeloController::class, 'incluirModelo'])->name('modelo.cadastrar');
Route::post('/modelos/cadastrar', [ModeloController::class, 'salvarModelo'])->name('modelo.salvar');
route::get('/modelos/{id}', [ModeloController::class, 'buscarModelo'] 
    )->name('modelo.buscar');
route::post('/modelos/alterar', [ModeloController::class, 'AlterarModelo'] 
    )->name('modelo.alterar');
route::get('/modelos/deletar/{id}', [ModeloController::class, 'deletarModelo'] 
    )->name('modelo.deletar');
});



route::get('/about', function(){
    return view ('template_carro.about');
})->name('carros.about');
