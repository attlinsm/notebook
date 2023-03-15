<?php

use App\Http\Controllers\NotebookController;
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

Route::controller(NotebookController::class)->prefix('v1')->group(function () {

    route::get('notebook', 'index');
    route::post('notebook', 'store');

    route::get('notebook/{id}', 'show');
    route::post('notebook/{id}', 'update');
    route::delete('notebook/{id}', 'destroy');

});

