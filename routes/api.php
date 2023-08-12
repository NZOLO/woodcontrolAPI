<?php

use App\Http\Controllers\AACController;
use App\Http\Controllers\ActivitesController;
use App\Http\Controllers\BordereauController;
use App\Http\Controllers\CFADController;
use App\Http\Controllers\CNAMGSController;
use App\Http\Controllers\CNSSController;
use App\Http\Controllers\DasboardController;
use App\Http\Controllers\EmployesController;
use App\Http\Controllers\EntreprisesController;
use App\Http\Controllers\EssencesController;
use App\Http\Controllers\ExigencesController;
use App\Http\Controllers\LigneActiviteController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\UFGController;
use App\Http\Controllers\ValidationsController;
use App\Http\Controllers\VehiculesController;
use App\Models\LigneBordereau;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::resource('services', ServicesController::class);
Route::resource('aac', AACController::class);
Route::resource('bordereau', BordereauController::class);
Route::resource('cfad', CFADController::class);
Route::resource('entreprises', EntreprisesController::class);
Route::resource('essences', EssencesController::class);
Route::resource('lignebordereau', LigneBordereau::class);
Route::resource('ufg', UFGController::class);
Route::resource('validations', ValidationsController::class);
Route::resource('vehicules', VehiculesController::class);
Route::resource('activites', ActivitesController::class);
Route::resource('cnamgs', CNAMGSController::class);
Route::resource('cnss', CNSSController::class);
Route::resource('employes', EmployesController::class);
Route::resource('exigences', ExigencesController::class);
Route::resource('ligneactivites', LigneActiviteController::class);

//Register
Route::get('register', [RegisterUserController::class, 'index']);
Route::post('saveUser', [RegisterUserController::class, 'save']);
Route::put('updateUser/{users}', [RegisterUserController::class, 'updateUser']);
Route::post('updatePassword', [RegisterUserController::class, 'password']);
Route::get('destroyusers/{users}', [RegisterUserController::class, 'destroy']);
Route::post('verification', [RegisterUserController::class, 'verified']);

Route::get('dashboard', [DasboardController::class, 'index']);
