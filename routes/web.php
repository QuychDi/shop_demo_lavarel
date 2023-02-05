<?php

use Facade\FlareClient\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\danhmucsanpham;
use App\Http\Controllers\QuanlysanphamController;
use App\Http\Controllers\GiohangController;
use Facade\Ignition\QueryRecorder\Query;
use Illuminate\Support\Facades\Session;
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

// Route::get('/', function () {
//     return "hello";
// });

/*
|--------------------------------------------------------------------------
| Client
|--------------------------------------------------------------------------
|
*/
Route::get('/',[HomeController::class,'index']);

Route::get('/danh-muc-san-pham/{id}',[HomeController::class,'spdanhmuc']);

Route::get('san-pham',[HomeController::class,'listItems']);

// xem chi tiet san pham
Route::get('chi-tiet-san-pham/{id}',[QuanlysanphamController::class,'chitietsp']);

// them gio hang

Route::post('them-gio-hang',[GiohangController::class,'them_giohang'])->name('show');

// Xem gio hang

Route::get('gio-hang',[GiohangController::class,'giohang'])->name('xemgiohang');

// Gio san pham trong gio hang

Route::get('delete-sp/{id}',[GiohangController::class,'delete_spGH']);

//Tim kiem

Route::post('tim-kiem',[HomeController::class,'timkiem']);

// Send mail

Route::get('send-mail',[HomeController::class,'sendEmail']);

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
|
*/
Route::prefix('admin')->group(function(){
    Route::get('/',[AdminController::class, 'index']);
    

    Route::get('dashboard',[AdminController::class, 'showdashboard']);  

    Route::post('admin-dashboard', [AdminController::class, 'dashboard']);
    
    Route::get('logout',[AdminController::class, 'logout']);

    // DANH MUC SAN PHAM
    Route::get('add-product',[danhmucsanpham::class, 'add_product']);

    Route::get('list-product', [danhmucsanpham::class, 'list_product']);
    
    Route::post('save-product', [danhmucsanpham::class, 'save_product']);

    Route::get('active-product/{id}', [danhmucsanpham::class, 'active_prod']);

    Route::get('unactive-product/{id}', [danhmucsanpham::class, 'unactive_prod']);

    Route::get('chi-tiet/{id}', [danhmucsanpham::class, 'xem_chi_tiet']);

    Route::prefix('list-product')->group(function(){
        Route::get('update/{id}',[danhmucsanpham::class, 'update_danhmuc']);
        Route::get('delete/{id}', [danhmucsanpham::class, 'delete_danhmuc']);
    });

    Route::post('update-product/{id}', [danhmucsanpham::class, 'edit_postdanhmuc']);

    // -----------QUAN LY SAN PHAM

    Route::prefix('them-san-pham')->group(function(){
        Route::get('/', [QuanlysanphamController::class, 'showthemsanpham'])->name('/');
        Route::post('/add-san-pham', [QuanlysanphamController::class, 'add_sanpham'])->name('add_san_pham');
    });

    Route::prefix('danh-sach-san-pham')->group(function(){
        Route::get('/', [QuanlysanphamController::class, 'list_sp'])->name('danh-sach-san-pham');
       
        Route::get('/delete/{id}', [QuanlysanphamController::class, 'delete_sanpham'])->name('delete-sanpham');

        Route::get('/edit/{id}',[QuanlysanphamController::class, 'edit_sp']);

        Route::post('updatesp/{id}',[QuanlysanphamController::class, 'post_editsp']);

        Route::get('loc',[QuanlysanphamController::class,'loc_sanpham']);

    });

    // UPDATE SAN PHAM
});