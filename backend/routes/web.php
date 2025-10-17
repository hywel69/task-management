<?php

use Illuminate\Support\Facades\Route;

Route::resource('/', App\Http\Controllers\MainController::class);
Route::resource('dashboard', App\Http\Controllers\DashboardController::class);



Route::get('/getsession', function(){
	return Session::all();
});
// Route Setup
Route::resource('company', App\Http\Controllers\Setup\CompanyController::class);
Route::any('company/{id}', [App\Http\Controllers\Setup\CompanyController::class, 'update']);

Route::resource('role', App\Http\Controllers\Setup\RoleController::class);
Route::resource('rolemenu', App\Http\Controllers\Setup\RolemenuController::class);
Route::resource('menu', App\Http\Controllers\Setup\MenuController::class);
Route::resource('user', App\Http\Controllers\Setup\UserController::class);
Route::resource('usercomp', App\Http\Controllers\Setup\UsercompController::class);
Route::resource('gantipass', App\Http\Controllers\Setup\GantipassController::class);

//Combo
Route::resource('comboparent', App\Http\Controllers\Combo\Master\ComboparentController::class);
Route::resource('comborole', App\Http\Controllers\Combo\Master\ComboroleController::class);
Route::resource('combodivisi', App\Http\Controllers\Combo\Master\CombodivisiController::class);
Route::resource('combouser', App\Http\Controllers\Combo\Master\CombouserController::class);
Route::resource('combostatus', App\Http\Controllers\Combo\Master\CombostatusController::class);

//Route Master
Route::resource('divisi', App\Http\Controllers\Master\DivisiController::class);
Route::resource('status', App\Http\Controllers\Master\StatusController::class);

//Route Pegawai
Route::resource('datapegawai', App\Http\Controllers\Pegawai\DatapegawaiController::class);

//Route Task
Route::resource('datatask', App\Http\Controllers\Task\DatataskController::class);