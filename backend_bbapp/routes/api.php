<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MiscellaneousController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SupplyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkdayController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

// Services Routes

Route::prefix('/v1/services')->group(function () {
    Route::get('/', [ServiceController::class, 'index']);
    Route::post('/', [ServiceController::class, 'store']);

    Route::get('/{id}', [ServiceController::class, 'show']);
    Route::put('/update-service/{id}', [ServiceController::class, 'update']);
    Route::delete('/delete-service/{id}', [ServiceController::class, 'destroy']);
});

// Employees Routes

Route::prefix('/v1/employees')->group(function () {
    Route::get('/', [EmployeeController::class, 'index']);
    Route::post('/', [EmployeeController::class, 'store']);

    Route::get('/{id}', [EmployeeController::class, 'show']);
    Route::put('/update-employee/{id}', [EmployeeController::class, 'update']);
    Route::delete('/delete-employee/{id}', [EmployeeController::class, 'destroy']);
});

// Clients Routes

Route::prefix('/v1/clients')->group(function () {
    Route::get('/', [ClientController::class, 'index']);
    Route::post('/', [ClientController::class, 'store']);

    Route::get('/{id}', [ClientController::class, 'show']);
    Route::put('/update-client/{id}', [ClientController::class, 'update']);
    Route::delete('/delete-client/{id}', [ClientController::class, 'destroy']);
});

// Miscellaneous Routes

Route::prefix('/v1/miscellaneous')->group(function () {
    Route::get('/', [MiscellaneousController::class, 'index']);
    Route::post('/', [MiscellaneousController::class, 'store']);

    Route::get('/{id}', [MiscellaneousController::class, 'show']);
    Route::put('/update-miscellaneous/{id}', [MiscellaneousController::class, 'update']);
    Route::delete('/delete-miscellaneous/{id}', [MiscellaneousController::class, 'destroy']);
});

// Quotations Routes

Route::prefix('/v1/quotations')->group(function () {
    Route::get('/', [QuotationController::class, 'index']);
    Route::post('/', [QuotationController::class, 'store']);

    Route::get('/{id}', [QuotationController::class, 'show']);
    Route::put('/update-quotation/{id}', [QuotationController::class, 'update']);
    Route::delete('/delete-quotation/{id}', [QuotationController::class, 'destroy']);
});

// Sales Routes

Route::prefix('/v1/sales')->group(function () {
    Route::get('/', [SaleController::class, 'index']);
    Route::post('/', [SaleController::class, 'store']);

    Route::get('/{id}', [SaleController::class, 'show']);
    Route::put('/update-sale/{id}', [SaleController::class, 'update']);
    Route::delete('/delete-sale/{id}', [SaleController::class, 'destroy']);
});

// Supplies Routes

Route::prefix('/v1/supplies')->group(function () {
    Route::get('/', [SupplyController::class, 'index']);
    Route::post('/', [SupplyController::class, 'store']);

    Route::get('/{id}', [SupplyController::class, 'show']);
    Route::put('/update-supply/{id}', [SupplyController::class, 'update']);
    Route::delete('/delete-supply/{id}', [SupplyController::class, 'destroy']);
});

// Users Routes

Route::prefix('/v1/users')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::post('/', [UserController::class, 'store']);

    Route::get('/{id}', [UserController::class, 'show']);
    Route::put('/update-user/{id}', [UserController::class, 'update']);
    Route::delete('/delete-user/{id}', [UserController::class, 'destroy']);
});


Route::middleware(['auth:sanctum'])->group(function () {
    // Workdays Routes

    Route::prefix('/v1/workdays')->group(function () {
        Route::get('/', [WorkdayController::class, 'index']);
        Route::post('/', [WorkdayController::class, 'store']);

        Route::get('/{id}', [WorkdayController::class, 'show']);
    });

    Route::get('/v1/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->middleware('auth')
        ->name('logout');
});


Route::post('/v1/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest')
    ->name('login');
