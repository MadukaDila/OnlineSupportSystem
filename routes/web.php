<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;

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


// Create a support ticket
Route::post('/', [TicketController::class, 'create'])->name('tickets.create');

// List all support tickets
Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');

// View a support ticket
Route::get('/tickets/{id}', [TicketController::class, 'show'])->name('tickets.show');

// Reply to a support ticket
Route::post('/tickets/{id}/reply', [TicketController::class, 'reply'])->name('tickets.reply');
