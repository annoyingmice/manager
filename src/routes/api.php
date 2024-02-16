<?php

use App\Enums\ResponseMessage;
use Illuminate\Support\Facades\Route;
use App\Enums\ResponseType;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\PermissionController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\LogController;
use App\Http\Controllers\API\PaymentMethodController;
use App\Http\Controllers\API\PlanController;
use App\Http\Controllers\API\RequestTypeController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\UserRoleController;
use App\Http\Controllers\API\RolePermissionController;
use App\Http\Controllers\API\StatusController;
use App\Http\Controllers\API\SubscriptionController;
use App\Http\Controllers\API\v1\CompanyController;
use App\Http\Controllers\API\v1\CompanyUserController;
use App\Http\Controllers\API\v1\TimeLogController;
use App\Http\Controllers\API\v1\UserRequestController;
use App\Models\User;
use Illuminate\Http\Response;

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

Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware(['auth:api', 'secure-otp']);
Route::post('verify', [AuthController::class, 'verify']);
Route::get('v1/company-qr/{company}', [CompanyController::class, 'qr']);

Route::middleware(['auth:api', 'secure-otp', 'subscription'])
    ->group(function () {

        Route::prefix('v1')
            ->group(function() {
                Route::resource('companies', CompanyController::class);
                Route::resource('time-logs', TimeLogController::class);
                Route::resource('company-users', CompanyUserController::class);
                Route::resource('user-requests', UserRequestController::class);
            });

        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
        Route::resource('users', UserController::class);
        Route::resource('logs', LogController::class);
        Route::resource('plans', PlanController::class);
        Route::resource('payment-methods', PaymentMethodController::class);
        Route::resource('user-roles', UserRoleController::class);
        Route::resource('role-permissions', RolePermissionController::class);
        Route::resource('request-types', RequestTypeController::class);
        Route::resource('statuses', StatusController::class);
        Route::resource('subscriptions', SubscriptionController::class);
});


// Get current active user
Route::get(
    'auth',
    fn () => response()->json(
        [
            'message' => ResponseMessage::FOUND,
            'type' => ResponseType::GET,
            'data' => User::findOrFail(auth()->user()->id),
        ],
        Response::HTTP_OK
    )
)->middleware('auth:api');

Route::get(
    '/healthcheck',
    fn () =>
    response()->json(
        [
            "message" => ResponseMessage::SUCCESS,
            "type" => ResponseType::GET,
            "data" => [],
        ],
        200
    )
);
