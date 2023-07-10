<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\SupportAgentController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', function () {
    return view('support');
});
Route::post('/', [TicketController::class, 'create'])->name('tickets.create');

Route::post('/register', [SupportAgentController::class, 'register']);

// Authentication Routes
Route::get('/login', [SupportAgentController::class, 'index'])->name('login');
Route::post('/login', [SupportAgentController::class, 'login']);
Route::post('/logout', [SupportAgentController::class, 'logout'])->name('logout');

// Protected Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Define other protected routes here
});
// Create a support ticket

// List all support tickets
Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');

// View a support ticket
Route::get('/tickets/{id}', [TicketController::class, 'show'])->name('tickets.show');

// Reply to a support ticket
Route::post('/tickets/{id}/reply', [TicketController::class, 'reply'])->name('tickets.reply');



