<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CanHoController;
use App\Http\Controllers\ChungCuController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [ClientController::class,'index']);
Route::get('/1', [ClientController::class,'cache']);
Route::get('/send-mail', function () {
    return view('send-mail');
});
Route::post('/send-mail', [MailController::class, 'sendMail'])->name('send.mail');
// Auth::routes();
// URL đăng nhập mới
Route::get('/admin-login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/admin-login', [LoginController::class, 'login']);

// URL đăng xuất
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/data', function () {
    return view('admin.data');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['admin'])->group(function () {

    Route::prefix('apartment')->group(function (){
        Route::get('/', [CanHoController::class, 'index'])->name('room.index');;
        Route::get('/add', [CanHoController::class, 'create']);
        Route::post('/add', [CanHoController::class, 'store'])->name('addNewRoom');
        Route::get('/edit/{id}', [CanHoController::class, 'edit'])->name('editRoom');
        Route::put('/update/{id}', [CanHoController::class, 'update'])->name('updateRoom');
        Route::post('/update-status/{id}', [CanHoController::class, 'updateStatus']);
        Route::get('/destroy/{id}', [CanHoController::class, 'destroy']);
        Route::get('/{id}', [CanHoController::class, 'show'])->name('apartment.show');
    });
    Route::prefix('building')->name('building.')->group(function () {
        Route::get('/', [ChungCuController::class, 'index'])->name('index'); // Danh sách
        Route::get('/add', [ChungCuController::class, 'create'])->name('create'); // Form thêm
        Route::post('/add', [ChungCuController::class, 'store'])->name('store'); // Lưu mới
        Route::get('/edit/{building}', [ChungCuController::class, 'edit'])->name('edit'); // Lấy dữ liệu sửa
        Route::put('/update/{building}', [ChungCuController::class, 'update'])->name('update'); // Cập nhật
        Route::delete('/{building}', [ChungCuController::class, 'destroy'])->name('destroy'); // Xóa
        // Route::get('/{id}', [ChungCuController::class, 'show'])->name('show'); // Xem chi tiết
    });
    Route::prefix('news')->name('news.')->group(function () {
        Route::get('/', [NewsController::class, 'index'])->name('index'); // Danh sách
        Route::get('/add', [NewsController::class, 'create'])->name('create'); // Form thêm
        Route::post('/add', [NewsController::class, 'store'])->name('store'); // Lưu mới
        Route::get('/edit/{news}', [NewsController::class, 'edit'])->name('edit'); // Lấy dữ liệu sửa
        Route::put('/update/{news}', [NewsController::class, 'update'])->name('update'); // Cập nhật
        Route::delete('/{news}', [NewsController::class, 'destroy'])->name('destroy'); // Xóa
        Route::get('/{news}', [NewsController::class, 'show'])->name('show'); // Xem chi tiết
    });
});
