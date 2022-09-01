<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\Auth\UserValidation;
use App\Http\Controllers\CriterionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\RegisterController;

// /*
// |--------------------------------------------------------------------------
// | API Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register API routes for your application. These
// | routes are loaded by the RouteServiceProvider within a group which
// | is assigned the "api" middleware group. Enjoy building your API!
// |
// */


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


//Authentication
Route::post('register', RegisterController::class);
Route::post('login', LoginController::class);
Route::post('forgot', [ForgotController::class, 'forgot']);
Route::post('reset', [ForgotController::class, 'reset']);
Route::get('plant', [PlantController::class, 'index']);
Route::get('dropbox/{id}/{images}/{edit}', [PlantController::class, 'showImage']);

Route::middleware(['jwt.verify'])->group(function(){
    Route::get('user', UserController::class);
    Route::put('profile', [ProfileController::class, 'update']);
    Route::post('logout', LogoutController::class);

    Route::get('plant/{id}', [PlantController::class, 'show']);
    Route::post('plant', [PlantController::class, 'store']);
    Route::put('plant/{id}', [PlantController::class, 'update']);
    Route::delete('plant/{id}', [PlantController::class, 'destroy']);

    Route::get('criteria', [CriterionController::class, 'index']);
    Route::get('ranking', [RankingController::class, 'index']);
    Route::get('ranking/{id}', [RankingController::class, 'show']);
    Route::post('ranking', [RankingController::class, 'store']);
});

