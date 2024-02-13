<?php

use App\Enums\ResponseMessage;
use Illuminate\Support\Facades\Route;
use App\Enums\ResponseType;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\PermissionController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\LogController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\UserRoleController;
use App\Http\Controllers\API\RolePermissionController;
use App\Http\Controllers\API\v1\CompanyController;
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

Route::middleware(['auth:api', 'secure-otp'])
    ->group(function () {

        Route::prefix('v1')
            ->group(function() {
                Route::resource('companies', CompanyController::class);
            });

        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
        Route::resource('users', UserController::class);
        Route::resource('logs', LogController::class);
        Route::resource('user-roles', UserRoleController::class);
        Route::resource('role-permissions', RolePermissionController::class);
});


// Get current active user
Route::get(
    'auth',
    fn () => response()->json(
        [
            'message' => ResponseMessage::FOUND,
            'type' => ResponseType::GET,
            'data' => request()->user(),
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
