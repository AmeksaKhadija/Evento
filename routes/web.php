<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategorieController;

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
    return view('welcome');
});

require __DIR__.'/auth.php';

Route::resource('/home',EventsController::class);

Route::get('/index',[HomeController::class,'index'])->name('index')->middleware(['auth', 'verified'])->name('index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/generateticket/{id}',[TicketController::class,'generate']);
});

Route::get('/index',[HomeController::class,'index'])->name('index');

Route::put('/events/{id}', 'EventsController@update')->name('events.update');

Route::get('/dashAdmin',[DashboardController::class, 'index']);

Route::get('/accepted/{id}',[DashboardController::class, 'accepted']);

Route::resource('/categorie', CategorieController::class);

Route::get('/details/{id}', [EventsController::class, 'details'])->name('details');

Route::get('/search', [EventsController::class, 'search']);
Route::get('/search', [EventsController::class, 'filterByCategory']);

Route::get('/statistic',[DashboardController::class, 'statistic']);


Route::get('/statisticOrg',[HomeController::class, 'statisticOrg']);

Route::get('/validateTicket',[EventsController::class, 'validateTicket']);
Route::get('/rejected/{id}',[EventsController::class, 'RejecteTicket']);

Route::get('/approved/{id}',[EventsController::class, 'approvedTicket']);

