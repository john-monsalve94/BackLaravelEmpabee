<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\ColmenaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('home');
});

Route::get('home', function () {
    return view('home');
});

Route::get('nosotros', function () {
    return view('nosotros');
});





Route::get('/notificacion', function () {
    return view('pages/pruebas/notificacion', ['user_id' => Auth::id()]);
})->middleware(['auth']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('colmenas', ColmenaController::class);
});

require __DIR__ . '/auth.php';
