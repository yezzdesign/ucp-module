<?php

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



Route::name('ucp.')->group(function () {
    Route::group(['middleware' => ['auth'], 'prefix' => 'ucp'], function () {

        Route::get('/',                 [\Modules\UCP\Http\Controllers\UCPController::class, 'index'])                  ->name('backend.index');
        Route::get('/edit/{user}',      [\Modules\UCP\Http\Controllers\UCPController::class, 'edit' ])                  ->name('backend.edit');
        Route::get('/update_status/{user}',         [\Modules\UCP\Http\Controllers\UCPController::class, 'changeStatus'])   ->name('backend.status.update');
        Route::post('/edit/{user}/password_change', [\Modules\UCP\Http\Controllers\UCPController::class, 'updatePassword']) ->name('backend.password.change');
        Route::post('/edit/{user}/email_change',    [\Modules\UCP\Http\Controllers\UCPController::class, 'updateEmail'])    ->name('backend.email.change');
        Route::delete('/delete/{user}',             [\Modules\UCP\Http\Controllers\UCPController::class, 'destroy'])        ->name('backend.user.delete');

    });
});
