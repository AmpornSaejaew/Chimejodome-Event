<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

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



Route::get('/login', function () {
    return view('auth/login');
});

Route::get('/register', function () {
    return view('auth/register');
});

Route::get('/logout', function () {
    auth()->logout();
    Session()->flush();
    return Redirect::to('/login');
})->name('logout');

Route::get('/', function () {
    return view('events.index');
});

Route::get('/profile', function () {
    return view('profile.index');
})->name('profile.index');


Route::get('/testE', [EventController::class, 'show_join'])->name('event.event-show');
Route::get('/testO', [EventController::class, 'show_organize'])->name('event.event-show');

Route::get('/manage', [EventController::class, 'manage'])
    ->name('events.manage');
Route::get('/manage/{event}/kanban', [EventController::class, 'kanban'])
    ->name('events.kanban');
// Route::get('/manage/{event}/join', [EventController::class, 'join'])
//     ->name('events.kanban');
Route::get('/events/{event}/edit', [EventController::class, 'edit'])
    ->name('events.edit');
Route::get('/events/{event}/join', [EventController::class, 'joinEvent'])
    ->name('events.join');
Route::put('/events/{event}/store', [EventController::class, 'storeJoinUser'])
    ->name('events.storeJoinUser');
Route::get('/events/joinList', [EventController::class, 'joinList'])
    ->name('events.joinList');

Route::get('events/joined',[EventController::class, 'joined'])->name('events.joined');
// Route::get('/manage/{event}/kabans.join', function () {
//     return 'Hello World';
// });
Route::resource('/', EventController::class);
Route::resource('/events', EventController::class);






Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::resource('/profile', ProfileController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
