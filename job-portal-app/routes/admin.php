<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\IndustryTypeController;
use App\Http\Controllers\admin\Auth\PasswordController;
use App\Http\Controllers\admin\Auth\NewPasswordController;
use App\Http\Controllers\admin\Auth\VerifyEmailController;
use App\Http\Controllers\Admin\OrganizationTypeController;
use App\Http\Controllers\admin\Auth\RegisteredUserController;
use App\Http\Controllers\admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\admin\Auth\ConfirmablePasswordController;
use App\Http\Controllers\admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\admin\Auth\EmailVerificationPromptController;
use App\Http\Controllers\admin\Auth\EmailVerificationNotificationController;

Route::group(['middleware'=>['guest:admin'],
    'prefix'=>'admin',
    'as'=>'admin.',

],function () {

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::group(['middleware'=>['auth:admin'],
    'prefix'=>'admin',
    'as'=>'admin.'
],function () {

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');

                // Admin DAsh
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');

    Route::resource('industry-types',IndustryTypeController::class);
    Route::resource('organization-types',OrganizationTypeController::class);
});
