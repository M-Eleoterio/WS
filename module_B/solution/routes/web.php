<?php

use App\Http\Controllers\TokenController;
use App\Http\Controllers\WorkspaceController;
use App\Models\Workspace;
use App\Models\Token;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::redirect('/', '/login');
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [UserController::class, 'login'])->name('user.login');

Route::middleware('auth:sanctum')->group(function () {
    /* VIEWS */
    Route::get('/workspaces', [WorkspaceController::class, 'index'])->name('workspace.index');
    Route::get('/workspace/create', [WorkspaceController::class, 'create'])->name('workspace.create');
    Route::get('/workspace/{id}', [WorkspaceController::class, 'show'])->name('workspace.show');
    Route::get('/token/create', [TokenController::class, 'show'])->name('token.create');

    /* ACTIONS */
    Route::get('/token/revoke/{id}', [TokenController::class, 'revoke'])->name('token.revoke');
    Route::post('/token/create', [TokenController::class, 'create'])->name('token.create');
    Route::post('/workspace/create', [WorkspaceController::class, 'store'])->name('workspace.store');
});
