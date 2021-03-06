<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUpload;
use App\Http\Controllers\ChallengeController;

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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::resource('/users', \App\Http\Controllers\UsersController::class);
    Route::resource('/tasks', \App\Http\Controllers\TaskController::class);
});

Route::get('/upload-file', [FileUpload::class, 'createForm']);
Route::post('/upload-file', [FileUpload::class, 'fileUpload'])->name('fileUpload');

Route::middleware(['auth'])->group(function () {
    Route::get('/listChallenge', [ChallengeController::class, 'list'])->name("listChallenge");
    Route::get('/addChallenge', [ChallengeController::class, 'addChallenge'])->name("addChallenge");
    Route::post('/addChallenge', [ChallengeController::class, 'storeChallenge'])->name("challenge.store");
    Route::post('/removeChallenge', [ChallengeController::class, 'removeChallenge'])->name("challenge.remove");
    Route::get('/submitChallenge', [ChallengeController::class, 'submitChallengeView'])->name("submitChallenge");
    Route::post('/submitChallenge', [ChallengeController::class, 'submitChallenge'])->name("challenge.submit");
});
