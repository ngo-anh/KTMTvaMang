<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\Admin\ManagementController;

/* Resource Controller */
use App\Http\Controllers\User\CurriculumVitaeController;
use App\Http\Controllers\User\CompanyController;
use App\Http\Controllers\User\RecruitmentController;

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

// Route::middleware(['auth:sanctum', 'verified'])->get('/', [HomeController::class, 'index'])->name('home');
Route::get(
    '/',
    [HomeController::class, 'index']
)->name('index');

Route::get(
    '/company',
    [HomeController::class, 'company']
)->name('company');

Route::get(
    '/recruitment',
    [HomeController::class, 'recruitment']
)->name('recruitment');

Route::get(
    '/curriculum-vitae',
    [HomeController::class, 'curriculumVitae']
)->name('curriculum-vitae');
/* Authenication */

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

/* Admin Routes */
Route::prefix('admin')->group(function () {
    Route::get('/management', [ManagementController::class, 'index'])->name('admin.management');
    // Route::post('/searchUsersWithEmail', [ManagementController::class, 'searchUsersWithEmail'])->name('admin.searchUsersWithEmail');
    Route::get('/statistic/{id}', [ManagementController::class, 'statistic'])->name('admin.statistic');
    Route::get('/showListCurriculumVitaeUser/{id}', [ManagementController::class, 'showListCurriculumVitaeUser'])->name('admin.showListCurriculumVitaeUser');
    Route::get('/showListCompanyUser/{id}', [ManagementController::class, 'showListCompanyUser'])->name('admin.showListCompanyUser');
});


/* User Routes */
Route::prefix('user')->group(function () {
    Route::resource('/curriculum-vitae', CurriculumVitaeController::class)->names([
        'index' => 'curriculum-vitae.index',
        'create' => 'curriculum-vitae.create',
        'store' => 'curriculum-vitae.store',
        'show' => 'curriculum-vitae.show',
        'edit' => 'curriculum-vitae.edit',
        'update' => 'curriculum-vitae.update',
        'destroy' => 'curriculum-vitae.destroy'
    ])->middleware(['auth:sanctum']);

    Route::resource('/company', CompanyController::class)->names([
        'index' => 'company.index',
        'create' => 'company.create',
        'store' => 'company.store',
        'show' => 'company.show',
        'edit' => 'company.edit',
        'update' => 'company.update',
        'destroy' => 'company.destroy'
    ])->middleware(['auth:sanctum']);

    Route::resource('/recruitment', RecruitmentController::class)->names([
        'index' => 'recruitment.index',
        'create' => 'recruitment.create',
        'store' => 'recruitment.store',
        'show' => 'recruitment.show',
        'edit' => 'recruitment.edit',
        'update' => 'recruitment.update',
        'destroy' => 'recruitment.destroy'
    ])->middleware(['auth:sanctum']);

    Route::get('/recruitment/display/{id}', [RecruitmentController::class, 'display'])->name('recruitment.display');
});
