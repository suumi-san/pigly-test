<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\WeightLogController;
use App\Http\Controllers\GoalSettingController;

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
    return redirect('/login');
});
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');

Route::middleware(['auth'])->group(function () {
    Route::get('/register/step2', [RegisterController::class, 'showStep2'])->name('register.step2');
    Route::post('/register/step2', [RegisterController::class, 'registerStep2'])->name('register.step2.post');
    Route::get('/weight_logs', [WeightLogController::class, 'index'])->name('weight_logs.index');
    Route::get('/weight_logs/create', [WeightLogController::class, 'create'])->name('weight_logs.create');
    Route::post('/weight_logs', [WeightLogController::class, 'store'])->name('weight_logs.store');
    Route::get('/weight_logs/{weightLog}', [WeightLogController::class, 'show'])->name('weight_logs.show');
    Route::get('/weight_logs/{weightLog}/edit', [WeightLogController::class, 'edit'])->name('weight_logs.edit');
    Route::put('/weight_logs/{weightLog}', [WeightLogController::class, 'update'])->name('weight_logs.update');
    Route::delete('/weight_logs/{weightLog}', [WeightLogController::class, 'destroy'])->name('weight_logs.destroy');


    Route::get('/weight_logs/goal_setting', [GoalSettingController::class, 'edit'])->name('weight_targets.edit');
    Route::put('/weight_logs/goal_setting', [GoalSettingController::class, 'update'])->name('weight_targets.update');
});

Route::get('/weight_logs/modal-form', function () {
    return view('weight_logs.modal_form');
})->middleware('auth')->name('weight_logs.modal_form');

Route::get('/weight_targets/modal', function () {
    $target = \App\Models\WeightTarget::where('user_id', auth()->id())->first();
    return view('weight_logs.goal_setting', ['weightTarget' => $target]);
})->middleware('auth')->name('weight_targets.modal');
