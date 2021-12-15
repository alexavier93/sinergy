<?php

use App\Http\Controllers\Admin\AreasDeAtuacaoController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\GaleriaController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\ImovelController;
use App\Http\Controllers\Admin\ParceirosController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteImovelProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/admin', [App\Http\Controllers\Admin\AuthController::class, 'login'])->name('admin');
Route::post('/admin/do_login', [App\Http\Controllers\Admin\AuthController::class, 'do_login'])->name('admin.do_login');
Route::get('/admin/logout', [App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('admin.logout');
Route::get('/admin/password', [App\Http\Controllers\Admin\AuthController::class, 'password'])->name('admin.password');

Route::group(['middleware' => 'auth'], function () {

    Route::prefix('admin')->name('admin.')->group(function(){

        Route::prefix('dashboard')->name('dashboard.')->group(function(){
            Route::get('', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('index');
        });

        Route::resources([
            'users' => UserController::class,
            'banners' => BannerController::class,
            'areas' => AreasDeAtuacaoController::class,
            'galerias' => GaleriaController::class,
            'parceiros' => ParceirosController::class,
        ]);

        // IMOVEIS
        Route::prefix('galerias')->name('galerias.')->group(function(){
            Route::get('/{galeria}/edit}', [GaleriaController::class, 'edit'])->name('edit');
            Route::put('/update/{galeria}', [GaleriaController::class, 'update'])->name('update');
            Route::post('/delete', [GaleriaController::class, 'delete'])->name('delete');

            Route::post('/getGaleria', [GaleriaController::class, 'getGaleria'])->name('getGaleria');
            Route::post('/uploadGaleria', [GaleriaController::class, 'uploadGaleria'])->name('uploadGaleria');
            Route::post('/deleteImagem', [GaleriaController::class, 'deleteImagem'])->name('deleteImagem');
        });

        // AREAS
        Route::prefix('areas')->name('areas.')->group(function(){
            Route::post('/delete', [AreasDeAtuacaoController::class, 'delete'])->name('delete');
        });

        // PARCEIROS
        Route::prefix('parceiros')->name('parceiros.')->group(function(){
            Route::post('/delete', [AreasDeAtuacaoController::class, 'delete'])->name('delete');
        });
        
        // BANNERS
        Route::prefix('banners')->name('banners.')->group(function(){
            Route::post('/delete', [BannerController::class, 'delete'])->name('delete');
        });

        // USUÁRIOS
        Route::prefix('users')->name('users.')->group(function(){
            Route::post('/delete', [UserController::class, 'delete'])->name('delete');
        });

        // MESSAGES
        Route::prefix('messages')->name('messages.')->group(function(){
            Route::get('', [MessageController::class, 'index'])->name('index');
            Route::get('/{message}', [MessageController::class, 'show'])->name('show');
            Route::post('/delete', [MessageController::class, 'delete'])->name('delete');
        });

    });
    
});


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('areas-de-atuacao')->name('areas.')->group(function(){
    Route::get('/', [App\Http\Controllers\AreasDeAtuacaoController::class, 'index'])->name('index');
    Route::get('/area/{slug}', [App\Http\Controllers\AreasDeAtuacaoController::class, 'area'])->name('area');
});

Route::prefix('galeria')->name('galeria.')->group(function(){
    Route::get('/', [App\Http\Controllers\GaleriaController::class, 'index'])->name('index');
});

Route::prefix('parceiros')->name('parceiros.')->group(function(){
    Route::get('/', [App\Http\Controllers\ParceirosController::class, 'index'])->name('index');
});

Route::prefix('contato')->name('contato.')->group(function(){
    Route::get('/', [App\Http\Controllers\ContatoController::class, 'index'])->name('index');
    Route::post('/sendMail', [App\Http\Controllers\ContatoController::class, 'sendMail'])->name('sendMail');
});