<?php

use App\Http\Controllers\BorrowController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeriodicalsController;
use App\Http\Controllers\ThesesController;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\BooksController;
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
/* Route::post();
    Route::delete();
    Route::put();
    Route::get(); 

    Route::match(['get','post','delete','put'],'/', function(){
        return '<h1>Hello World!</h1>';
    });

    Route::any('/', function () {
        return '<h1>Hello World!</h1>';
    });
*/

/*  Common routes naming conventions
    index = show all data
    show = show a single data
    create = show a form to add a new data
    store = store a data
    edit = show a form to edit a data
    update = update a data
    destroy = delete a data 
*/
Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('admin.login');
})->name('login');

// Route::get('/search', [ContentController::class, 'index']);
Route::get('/search/books', [ContentController::class, 'books']);
Route::get('/search/periodicals', [ContentController::class, 'periodicals']);
Route::get('/search/theses', [ContentController::class, 'theses']);


Route::middleware(['auth:web', 'App\Http\Middleware\RevalidateBackHistory'])->group(function(){
    Route::get('/borrowed-materials', [BorrowController::class, 'index']);
    Route::put('/update/{id}/{category}/{material_id}', [BorrowController::class, 'update']);

    //books
    Route::get('/books', [BooksController::class, 'index']);
    Route::post('/store/books', [BooksController::class, 'store']);
    Route::get('/edit/book/{id}', [BooksController::class, 'edit']);
    Route::put('/update/book/{id}', [BooksController::class, 'update']);
    Route::delete('/delete/book/{id}', [BooksController::class, 'destroy']);

    //theses
    Route::get('/theses', [ThesesController::class, 'index']);
    Route::post('/store/theses', [ThesesController::class, 'store']);
    Route::get('/edit/theses/{id}', [ThesesController::class, 'edit']);
    Route::put('/update/theses/{id}', [ThesesController::class, 'update']);
    Route::delete('/delete/theses/{id}', [ThesesController::class, 'destroy']);

    //periodicals
    Route::get('/periodicals', [PeriodicalsController::class, 'index']);
    Route::post('/store/periodicals', [PeriodicalsController::class, 'store']);
    Route::get('/edit/periodicals/{id}', [PeriodicalsController::class, 'edit']);
    Route::put('/update/periodicals/{id}', [PeriodicalsController::class, 'update']);
    Route::delete('/delete/periodicals/{id}', [PeriodicalsController::class, 'destroy']);

    //accounts
    Route::get('/accounts', [AccountsController::class, 'index']);
    Route::post('/store/account', [AccountsController::class, 'store']);
    Route::get('/edit/account/{id}', [AccountsController::class, 'edit']);
    Route::put('/update/account/{id}', [AccountsController::class, 'update']);
    Route::delete('/delete/account/{id}', [AccountsController::class, 'destroy']);

    //dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/home', function () {
        return view('admin.home');
    })->name('home');
});
Route::get('/borrow/{material}/{id}', [BorrowController::class, 'create']);
Route::post('/confirm/borrow/{material}', [BorrowController::class, 'store']);

Route::post('/process', [AccountsController::class, 'process']);
Route::post('/logout', [AccountsController::class, 'logout']);
// Route::get('/theses', function(){
//     return view('admin.theses');
// });
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
