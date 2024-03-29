<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisteredUserController;


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
Route::get('/registerStaff', function () {
    return view('admins.createStaff');
})->name('registerStaff');
// Route::get('/greeting', function () {
//     return 'Hello World';
// });
// Route::get('/', function () {
//     return view('events.index');
// });


Route::get('/logout', function () {
    auth()->logout();
    Session()->flush();
    return Redirect::to('/login');
})->name('logout');

Route::get('/', function () { //staff rosarin
    return view('auth/login');
});
// Route::get('/', function () {
//     return view('events.index');
// });


Route::get('/profile', function () {
    return view('profile.index');
})->name('profile.index');


Route::get('/manage', [EventController::class, 'manage'])
    ->name('events.manage');
Route::get('/manage/{event}/kanban', [EventController::class, 'kanban'])
    ->name('events.kanban');
// Route::get('/manage/{event}/join', [EventController::class, 'join'])
//     ->name('events.kanban');
Route::get('/events/{event}/edit', [EventController::class, 'edit']) // edit data of event and complete an event
    ->name('events.edit');
Route::get('/events/{event}/needBudget', [EventController::class, 'needBudgetView']) // for student need budget
    ->name('events.needBudget');
Route::get('/events/{event}/header', [EventController::class, 'header']) // edit data of event and complete an event
->name('events.header');
Route::get('/needBudgetList', [EventController::class, 'needBudgetList'])->name('needBudgetList'); // for staff
Route::get('/{event}/acceptBudget', [EventController::class, 'acceptBudget'])->name('acceptBudget');
Route::get('/{event}/requestBudget', [EventController::class, 'needBudget'])->name('sendRequestBudget');





Route::get('/events/{event}/join', [EventController::class, 'joinEvent'])
    ->name('events.join');
Route::put('/events/{event}/storeJoinUser', [EventController::class, 'storeJoinUser'])
    ->name('events.storeJoinUser');
Route::get('/events/joinList', [EventController::class, 'joinList'])
    ->name('events.joinList');
Route::get('/events/portfolio', [EventController::class, 'portfolio'])
    ->name('events.portfolio');

Route::get('/events/{event}/organize', [EventController::class, 'joinEvent'])
    ->name('events.organize');
Route::put('/events/{event}/store', [EventController::class, 'storeOrganizeUser'])
    ->name('events.storeOrganizeUser');
Route::get('/events/organizeList', [EventController::class, 'organizeList'])
    ->name('events.organizeList');
Route::put('/events/{event}/member', [ProfileController::class, 'getAllStudent'])
    ->name('events.pickOrganize');




Route::get('events/joined', [EventController::class, 'joined'])->name('events.joined');
// Route::get('/manage/{event}/kabans.join', function () {
//     return 'Hello World';
Route::get('/manage/{event}/{kanban}', [EventController::class, 'move'])
    ->name('kanban.move');
Route::get('/manage/{event}/kanban/join', [EventController::class, 'join'])
    ->name('kanban.join');
Route::get('/manage/{event}/kanban/addJoin', [EventController::class, 'addJoin'])
    ->name('kanban.addJoin');
Route::get('/manage/{event}/kanban/deleteJoin', [EventController::class, 'deleteJoin'])
    ->name('kanban.deleteJoin');


Route::get('/manage/{event}/kanban/member', [EventController::class, 'member'])
    ->name('kanban.member');
Route::get('/manage/{event}/kanban/searchMember', [EventController::class, 'seachMember'])
    ->name('kanban.seachMember');
Route::get('/manage/{event}/kanban/addMember', [EventController::class, 'addMember'])
    ->name('kanban.addMember');
Route::get('/manage/{event}/kanban/disbursement', [EventController::class, 'disbursement'])
    ->name('kanban.disbursement');
Route::get('/manage/{event}/kanban/disburseConfirm', [EventController::class, 'disburseConfirm'])
    ->name('kanban.disburseConfirm');
Route::get('/manage/{event}/kanban/eventComplete', [EventController::class, 'eventComplete'])
    ->name('kanban.eventComplete');
Route::get('/manage/{event}/kanban/storeComplete', [EventController::class, 'storeComplete'])
    ->name('kanban.storeComplete');
Route::get('/manage/{event}/kanban/createKanbanPage', [EventController::class, 'createKanbanPage'])
    ->name('kanban.createKanbanPage');
Route::get('/manage/{event}/kanban/createKanbanNotes', [EventController::class, 'createKanban'])
    ->name('kanban.createKanban');

Route::get('/eventsList', [EventController::class, 'getAllEvent'])->name('EventsList');

Route::get('/usersList', [ProfileController::class, 'getAllUser'])->name('UsersList');
Route::get('/{user}/deleteUser', [ProfileController::class, 'delete'])->name('DeleteUser');
Route::get('/{event}/deleteEvent', [EventController::class, 'delete'])->name('DeleteEvent');
Route::get('/{event}/getBudget', [EventController::class, 'needBudgetView'])->name('needBudget');




Route::post('addStaff', [RegisteredUserController::class, 'storeStaff'])->name('addStaff');



Route::resource('/', UserController::class);
Route::resource('/users', UserController::class);
// Route::get('/manage/{event}/kabans/join', function () {
//     return view('greeting', ['name' => 'James']);
// });
Route::resource('/', EventController::class);
Route::resource('/events', EventController::class);
// Route::resource('/manage/{event}/kanban', KanbanController::class);





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::resource('/profile', ProfileController::class);

    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile', [ProfileController::class, 'view'])->name('profile.index');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.user');

});

require __DIR__ . '/auth.php';
