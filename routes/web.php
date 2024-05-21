<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ChiTietDonDatTourController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DatTourController;
use App\Http\Controllers\DiaDiemController;
use App\Http\Controllers\GoiTuorController;
use App\Http\Controllers\HoaDonKhachSanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KhachSanController;
use App\Http\Controllers\PhanHoiController;
use App\Http\Controllers\QuanLyBaiVietController;
use App\Http\Controllers\RegisterAdminController;
use App\Http\Controllers\ToursController;
use App\Models\ChiTietDonDatTour;
use App\Models\GoiTuor;
use App\Models\LoginAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');





Route::group(['prefix' => '/admin', 'middleware' => 'loginAdmin'], function () {
    Route::group(['prefix' => '/dia-diem'], function () {
        Route::get('/index', [DiaDiemController::class, 'index']);
        Route::post('/index', [DiaDiemController::class, 'store']);
        Route::get('/data', [DiaDiemController::class, 'getData']);
        Route::get('/delete/{id}', [DiaDiemController::class, 'destroy']);
        Route::post('/update', [DiaDiemController::class, 'update']);
    });
    Route::group(['prefix' => '/goi-tour'], function () {
        Route::get('/index', [GoiTuorController::class, 'index']);
        Route::post('/index', [GoiTuorController::class, 'store']);
        Route::get('/data', [GoiTuorController::class, 'getData']);
        Route::get('/delete/{id}', [GoiTuorController::class, 'destroy']);
        Route::post('/update', [GoiTuorController::class, 'update']);
    });
    Route::group(['prefix' => 'bai-viet'], function () {
        Route::get('/index', [QuanLyBaiVietController::class, 'index']);
        Route::post('/create', [QuanLyBaiVietController::class, 'createBaiViet']);
        Route::post('/update', [QuanLyBaiVietController::class, 'updateBaiViet']);
        Route::get('/data', [QuanLyBaiVietController::class, 'getData']);
        Route::get('/status/{id}', [QuanLyBaiVietController::class, 'doiTrangThai']);
        Route::post('/delete', [QuanLyBaiVietController::class, 'delete']);
    });

    Route::group(['prefix' => '/config'], function () {
        Route::get('/index', [ConfigController::class, 'index']);
        Route::post('/store', [ConfigController::class, 'store']);
    });

    Route::group(['prefix' => '/khach-hang'], function () {
        Route::get('/thong-tin', [CustomerController::class, 'viewThongTin']);
        Route::get('/data', [CustomerController::class, 'getData']);
        Route::post('/update', [CustomerController::class, 'update']);
        Route::post('/delete', [CustomerController::class, 'destroy']);
        Route::get('/change-status/{id}', [CustomerController::class, 'changeStatus']);
        Route::get('/kich-hoat/{id}', [CustomerController::class, 'kichHoat']);
        Route::post('/change-password', [CustomerController::class, 'changePassword']);
    });
    Route::group(['prefix' => '/nhan-su'], function () {

        Route::get('/index', [AdminController::class, 'viewNhanSu']);
        Route::post('/create', [AdminController::class, 'store']);
        Route::get('/data', [AdminController::class, 'getData']);
        Route::post('/delete', [AdminController::class, 'deleteNhanSu']);
        Route::get('/change-status/{id}', [AdminController::class, 'changeStatus']);
    });
    Route::group(['prefix' => '/dat-tour'], function () {
        Route::get('/index', [DatTourController::class, 'index']);
        Route::post('/index', [DatTourController::class, 'store']);
        Route::get('/data', [DatTourController::class, 'getData']);
        Route::get('/delete/{id}', [DatTourController::class, 'destroy']);
        Route::post('/update', [DatTourController::class, 'update']);
    });
    Route::group(['prefix' => '/phan-hoi'], function () {
        Route::get('/index', [PhanHoiController::class, 'viewPhanHoi']);
        Route::post('/index', [PhanHoiController::class, 'storePhanHoi']);
        Route::get('/data', [PhanHoiController::class, 'loadPhanHoi']);
        Route::post('/delete', [PhanHoiController::class, 'destroy']);
    });

    Route::group(['prefix' => '/khach-san'], function () {
        Route::get('/index', [KhachSanController::class, 'index']);
        Route::post('/index', [KhachSanController::class, 'store']);
        Route::get('/data', [KhachSanController::class, 'getData']);
        Route::post('/update', [KhachSanController::class, 'update']);
        Route::post('/delete', [KhachSanController::class, 'destroy']);
    });
    Route::group(['prefix' => '/hoa-don-tour'], function () {
        Route::get('/index', [GoiTuorController::class, 'viewHoaDon']);
        Route::get('/data', [GoiTuorController::class, 'getDataHoaDon']);
        Route::post('/update', [GoiTuorController::class, 'updateHoaDon']);
        Route::post('/delete', [GoiTuorController::class, 'destroyHoaDon']);
        Route::get('/change-status/{id}', [GoiTuorController::class, 'changeStatus']);
    });
    Route::group(['prefix' => '/hoa-don-khach-san'], function () {
        Route::get('/index', [KhachSanController::class, 'viewHoaDon']);
        Route::get('/data', [KhachSanController::class, 'getDataHoaDon']);
        Route::post('/update', [KhachSanController::class, 'updateHoaDon']);
        Route::post('/delete', [KhachSanController::class, 'destroyHoaDon']);
        Route::get('/change-status/{id}', [KhachSanController::class, 'changeStatus']);
    });
});
Route::group(['prefix' => '/tai-khoan'], function () {
    Route::get('/index', [AdminController::class, 'index']);
    Route::post('/index', [AdminController::class, 'actionLogin']);
    Route::post('/create', [AdminController::class, 'store']);
    Route::get('/logout', [AdminController::class, 'logout']);
});



Route::get('/bai-viet/index', [QuanLyBaiVietController::class, 'index']);
Route::post('/bai-viet/create', [QuanLyBaiVietController::class, 'createBaiViet']);
Route::post('/bai-viet/update', [QuanLyBaiVietController::class, 'updateBaiViet']);
Route::get('/bai-viet/data', [QuanLyBaiVietController::class, 'getData']);
Route::get('/bai-viet/status/{id}', [QuanLyBaiVietController::class, 'doiTrangThai']);
Route::post('/bai-viet/delete', [QuanLyBaiVietController::class, 'delete']);



//Giao diện trang chủ

Route::get('/', [HomeController::class, 'index']);

Route::get('/login', [CustomerController::class, 'viewLogin']);
Route::post('/login', [CustomerController::class, 'actionLogin']);

Route::get('/register', [CustomerController::class, 'viewRegister']);
Route::post('/register', [CustomerController::class, 'storeRegister']);
Route::get('/register/data', [CustomerController::class, 'dataRegister']);
Route::get('/active/{hash}', [CustomerController::class, 'active']);



Route::get('/logout', [CustomerController::class, 'actionLogout']);


Route::get('/khach-san/index', [KhachSanController::class, 'viewKhachSan']);
Route::get('/bai-viet', [HomeController::class, 'baiViet']);
Route::get('/lien-he', [HomeController::class, 'lienHe']);
// Route::get('/lien-he',[HomeController::class,'sendGmail']);

//Tìm kiếm
Route::post('/tim-kiem', [HomeController::class, 'search']);

Route::get('/chi-tiet-tour/{slug}', [HomeController::class, 'chiTietTour']);
Route::post('/tao-chi-tiet-hoa-don', [ChiTietDonDatTourController::class, 'taoChiTietHoaDon']);

//Page trả về tìm kiếm tour
Route::get('/danh-sach-tour', [ToursController::class, 'TraVeTour']);

//end
Route::get('/chi-tiet-khach-san/{slug}', [HomeController::class, 'chiTietKhachSan']);
Route::post('/tao-chi-tiet-hoa-don-khach-san', [HoaDonKhachSanController::class, 'taoChiTietHoaDon']);

Route::get('/tours', [ToursController::class, 'viewTours']);
Route::get('/thanh-toan', [ToursController::class, 'viewThanhToan']);

//Quên mật khẩu
Route::get('/reset-password', [CustomerController::class, 'viewResetPassword']);
Route::post('/reset-password', [CustomerController::class, 'actionResetPassword']);
//end

// Cập nhật lại mật khẩu
Route::get('/update-password/{hash}', [CustomerController::class, 'viewUpdatePassword']);
Route::post('/update-password', [CustomerController::class, 'actionUpdatePassword']);
//end

//Bài viết
Route::get('/khampha/index', [DiaDiemController::class, 'viewDiaDiem']);
Route::get('/chitietkhampha/{id}', [DiaDiemController::class, 'viewDiaDiemDetail']);

Route::get('/blog/index', [BlogController::class, 'viewBlog']);
Route::post('/blog/index', [BlogController::class, 'actionBlog']);
Route::group(['prefix' => '/blog', 'middleware' => 'loginCustomer'], function () {
 Route::post('/index', [BlogController::class, 'actionBlog']);
});

Route::get('/blog/detail/{id}', [BlogController::class, 'viewBlogDetail']);



//Bài viết

Route::get('/yeu-thich/index', [BlogController::class, 'viewYeuThich']);
Route::post('/yeu-thich/change', [BlogController::class, 'changeYeuThich']);



Route::group(['prefix' => '/yeu-thich', 'middleware' => 'loginCustomer'], function () {
    Route::get('/index', [BlogController::class, 'viewYeuThich']);
    Route::post('/change', [BlogController::class, 'changeYeuThich']);
});
Route::group(['prefix' => '/cap-nhap-thong-tin', 'middleware' => 'loginCustomer'], function () {
    Route::get('/index', [CustomerController::class, 'viewCapNhapThongTin']);
    Route::post('/index', [CustomerController::class, 'capNhapThongTin']);
});
Route::group(['prefix' => '/bill-khach-san', 'middleware' => 'loginCustomer'], function () {
    Route::get('/index', [CustomerController::class, 'viewHoaDon']);
    Route::get('/data', [CustomerController::class, 'getDataHoaDon']);
});
Route::group(['prefix' => '/bill-tour', 'middleware' => 'loginCustomer'], function () {
    Route::get('/index', [ToursController::class, 'viewHoaDon']);
    Route::get('/data', [ToursController::class, 'getDataHoaDon']);
});



Route::group(['prefix' => 'laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
