<?php

use Illuminate\Support\Facades\Route;
use Mediapress\Modules\Content\Models\Sitemap;

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

Route::post('applications/start', [\App\Http\Controllers\ApplicationController::class, 'startApplicationForm'])->name('application.start');
Route::get('applications/get', [\App\Http\Controllers\ApplicationController::class, 'getSession'])->name('application.get');
Route::post('applications/step/{step}', [\App\Http\Controllers\ApplicationController::class, 'applicationSteps'])->name('application.step1');
Route::post('applications/check', [\App\Http\Controllers\ApplicationController::class, 'checkUser'])->name('application.check');

Route::get('GetDistricts/{province_name}', [\App\Http\Controllers\CountiesController::class, 'show'])->name('site.district.get');
Route::get('GetUnivercityBranchs/{lang}/{branch_id}', [\App\Http\Controllers\CountiesController::class, 'getBranchs'])->name('site.branchs.get');



Route::group(['prefix' => 'mp-admin'], function () {
    Route::group(['middleware' => 'panel.auth'], function () {
        Route::get('form-results', [\App\Http\Controllers\formResult::class, 'index'])->name('panel.formresult');
        Route::get('form-results/{form_id}', [\App\Http\Controllers\formResult::class, 'export'])->name('panel.formresult.export');

    });
});
