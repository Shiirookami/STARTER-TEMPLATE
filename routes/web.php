<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'is_user','prefix' => 'admin','as' => 'user.'], function () {

    });
    Route::group(['middleware' => 'is_admin','prefix' => 'admin','as' => 'admin.'], function () {
        Route::get('home', [AdminController::class, 'books'])->name('home');
        Route::get('books', [AdminController::class, 'books'])->name('books');
        Route::post('books', [AdminController::class, 'submit_book'])->name('book.submit');
        Route::patch('books/update', [AdminController::class, 'update_book'])->name('book.update');
        Route::get('ajaxadmin/dataBuku/{id}', [AdminController::class, 'getDataBuku']);
        Route::delete('books/delete/{id}', [AdminController::class, 'delete_book'])->name('book.delete');
        Route::get('print_books', [AdminController::class, 'print_books'])->name('print.books');
        Route::get('book/export', [AdminController::class, 'export'])->name('book.export');
        Route::post('book/import', [AdminController::class, 'import'])->name('book.import');

        Route::get('books/trash', [AdminController::class, 'trash'])->name('books.trash');
        Route::get('books/restore/{id}', [AdminController::class, 'restore'])->name('books.restore');
        Route::get('books/restore_all', [AdminController::class, 'restore_all'])->name('books.restore_all');
        Route::get('books/delete/{id}', [AdminController::class, 'delete'])->name('books.delete');
        Route::get('books/delete_all', [AdminController::class, 'delete_all'])->name('books.delete_all');
    });
});
// Route::middleware(['is_admin'])->name('admin.')->prefix('admin')->group(function () {


// });


