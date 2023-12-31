<?php
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::group(['middleware' => 'auth'], function () {
    // Rutas para Categorías
    Route::get('/categorias', [CategoriaController::class, 'index'])->name('index.categorias');
    Route::post('/categorias', [CategoriaController::class, 'store']);
    Route::get('/categorias/edit/{id}', [CategoriaController::class, 'edit']);
    Route::put('/categorias/edit/{id}', [CategoriaController::class, 'putEdit']);
    Route::delete('/categorias/delete/{id}', [CategoriaController::class, "delete"]);

    // Rutas para Productos
    Route::get('/productos', [ProductoController::class, 'index']);
    Route::post('/productos', [ProductoController::class, 'store']);
    Route::get('/productos/edit/{id}', [ProductoController::class, 'edit']);
    Route::put('/productos/edit/{id}', [ProductoController::class, 'putEdit']);
    Route::delete('/productos/delete/{id}', [ProductoController::class, "delete"]);

    // Rutas para Ventas
    Route::get('/ventas', [VentaController::class, 'index'])->name('salidas.index');
    Route::post('/ventas/store', [VentaController::class, 'store'])->name('salidas.store');

    // Rutas para permisos
    Route::resource('permission', PermissionController::class);
    Route::resource('user', UserController::class);
    Route::resource('roles', RoleController::class);

    // Rutas para roles
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('/roles/{id}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('/roles/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');

    // Rutas de user
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/edit/{id}', [UserController::class, 'update'])->name('user.update');

    // Rutas para permissions
    Route::get('/permissions', [PermissionController::class, 'index'])->name('permission.index');
    Route::get('/permissions/create', [PermissionController::class, 'create'])->name('permission.create');
    Route::post('/permissions', [PermissionController::class, 'store'])->name('permission.store');
    Route::get('/permissions/{id}', [PermissionController::class, 'show'])->name('permission.show');
    Route::put('/permissions/update/{id}', [PermissionController::class, 'update'])->name('permission.update');
    Route::delete('/permissions/delete/{id}', [PermissionController::class, 'destroy'])->name('permission.destroy');
});

Auth::routes();

// Ruta para el Panel de Control (Home)
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
