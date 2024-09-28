<?php

use App\Controllers\DatabaseHelper\UserTable;
use App\Controllers\LoginController;
use App\Controllers\UserController;
use App\Kernel\Router\Route;

return [
    Route::post('/createUsersRows', [UserTable::class, 'createUsersRows']),

    Route::post('/login', [LoginController::class, 'login']),
    Route::post('/authUser', [LoginController::class, 'getLoggedUser']),
    Route::post('/logout', [LoginController::class, 'logout']),

    Route::post('/createUser', [UserController::class, 'createUser']),
    Route::post('/updateUser', [UserController::class, 'updateUser']),
    Route::post('/deleteUser', [UserController::class, 'deleteUser']),
    Route::post('/getUser', [UserController::class, 'getUser']),
];
