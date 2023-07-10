<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\SupportAgentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MyTicketController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [MyTicketController::class, 'index'])->name('myticket.index');
Route::get('/myticket', [MyTicketController::class, 'view'])->name('myticket.view');
Route::get('/myticket/search', [MyTicketController::class, 'search'])->name('myticket.search');  
Route::post('/', [TicketController::class, 'create'])->name('tickets.create');

Route::post('/register', [SupportAgentController::class, 'register']);

// Authentication Routes
Route::get('/login', [SupportAgentController::class, 'index'])->name('login');
Route::post('/login', [SupportAgentController::class, 'login']);
Route::post('/logout', [SupportAgentController::class, 'logout'])->name('logout');

// Protected Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'show'])->name('dashboard.show');
    
    Route::get('/supportreply/{id}', [TicketController::class, 'show'])->name('tickets.show');
    Route::post('/tickets/{id}/reply', [TicketController::class, 'reply'])->name('tickets.reply');
});




