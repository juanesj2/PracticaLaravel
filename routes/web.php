<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StudentController;
use App\Models\estudiante;

Route::get('/', function () {
    //return view('welcome');
    return view('principal');
    //$data = Estudiante::latest()->paginate(5);
    //return view('index', compact('data'))->with('i', (request()->input('page', 1) -
    //1) * 5);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::resource('students', StudentController::class)->middleware('auth');
