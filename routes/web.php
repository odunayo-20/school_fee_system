<?php

use App\Models\FeeStructure;
use App\Livewire\Admin\ResultsTable;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ResultController;
use App\Http\Controllers\MarkRegisterController;
use App\Http\Controllers\Admin\FeeTypeController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FeePaymentController;
use App\Http\Controllers\Admin\ResultTableController;
use App\Http\Controllers\Admin\FeeStructureController;

Route::middleware(['guest'])->group( function (){




// Route::get('/', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/signup', [AuthController::class, 'signup'])->name('admin.signup');
Route::post('/signup/confirm', [AuthController::class, 'signupConfirm'])->name('admin.signupConfirm');
Route::get('/', [AuthController::class, 'login'])->name('admin.login');
// Route::get('/login', [AuthController::class, 'login'])->name('admin.login');
Route::get('/forget', [AuthController::class, 'forget'])->name('admin.forget');
Route::post('/forget/send', [AuthController::class, 'forgetSend'])->name('admin.forgetSend');
Route::get('/reset-password/{token}/{email}', [AuthController::class, 'resetPassword'])->name('admin.resetPassword');
Route::post('/reset/password/change', [AuthController::class, 'resetPasswordChange'])->name('admin.resetPasswordChange');
Route::post('admin/login/confirm', [AuthController::class, 'loginConfirm'])->name('admin.loginConfirm');
Route::get('admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
});



Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::get('/profile', [DashboardController::class, 'profile'])->name('admin.profile');
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/student', [StudentController::class, 'index'])->name('admin.student');
    Route::get('/class', [ClassController::class, 'index'])->name('admin.class');
    Route::get('/fee-type', [FeeTypeController::class, 'index'])->name('admin.feeType');

    Route::get('/fee-structure', [FeeStructureController::class, 'index'])->name('admin.feeStructure');
    Route::get('/fee-structure/create', [FeeStructureController::class, 'create'])->name('admin.feeStructure.create');
    Route::post('/fee-structure/store', [FeeStructureController::class, 'store'])->name('admin.feeStructure.store');
    Route::get('/fee-structure/edit/{id}', [FeeStructureController::class, 'edit'])->name('admin.feeStructure.edit');
    Route::post('/fee-structure/update/{id}', [FeeStructureController::class, 'update'])->name('admin.feeStructure.update');


    Route::get('/fee-payment', [FeePaymentController::class, 'index'])->name('admin.feePayment');
    Route::get('/fee-payment/create', [FeePaymentController::class, 'create'])->name('admin.feePayment.create');
    Route::post('/fee-payment/store', [FeePaymentController::class, 'store'])->name('admin.feePayment.store');

    Route::get('/fee-payment/receipt/{payment}', [FeePaymentController::class, 'downloadReceipt'])
    ->name('admin.fee-payment.receipt');

    Route::get('/fee-payment/history', \App\Livewire\Admin\FeePayment\History::class)
    ->name('admin.fee-payment.history');

});

