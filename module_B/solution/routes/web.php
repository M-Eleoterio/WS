<?php

use App\Http\Controllers\TokenController;
use App\Http\Controllers\WorkspaceController;
use App\Models\Workspace;
use App\Models\Token;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


/* Route::get('teste', function () {
    $ws_id = Workspace::pluck('id')->random();
    $ws = Workspace::where('id', $ws_id)->first();
    dd($user_id = $ws->user());
}); */


Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [UserController::class, 'login'])->name('user.login');

Route::middleware('auth:sanctum')->group(function () {
    Route::redirect('/', '/dashboard');
    /* VIEWS */
    Route::get('/dashboard', function () {
        return view('dashboard', ['workspaces' => Workspace::all()]);
    })->name('view.dashboard');
    Route::get('/workspace/{id}', [WorkspaceController::class, 'show'])->name('view.workspace');
    Route::get('/token/create', [TokenController::class, 'show'])->name('view.token');

    /* ACTIONS */
    Route::get('/token/revoke/{id}', [TokenController::class, 'revoke'])->name('token.revoke');
    Route::post('/token/create', [TokenController::class, 'create'])->name('token.create');
});
