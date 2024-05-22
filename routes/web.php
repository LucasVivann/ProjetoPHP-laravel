
<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CaixaController;
use App\Http\Controllers\JurosMultaController;
use App\Http\Controllers\ContaController;


 
Route::get('/', function () {
    return view('welcome');
});
 
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
  
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
  
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});
  
Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
 
    Route::controller(CaixaController::class)->prefix('caixa')->group(function () {
        Route::get('/', 'index')->name('caixa');
        Route::get('/create', 'create')->name('caixa.create');
        Route::post('/store', 'store')->name('caixa.store');
        Route::get('/show/{id}', 'show')->name('caixa.show');
        Route::get('/edit/{id}', 'edit')->name('caixa.edit');
        Route::put('/edit/{id}', 'update')->name('caixa.update');
        Route::delete('/destroy/{id}', 'destroy')->name('caixa.destroy');
        
    });
    
    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
    
    Route::get('/contas/baixadas', [ContaController::class, 'contasBaixadas'])->name('contas.baixadas');
    Route::get('/calcular-juros', 'JurosController@calcularJuros');
});

