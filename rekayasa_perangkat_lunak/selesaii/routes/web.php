<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KostController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PemilikController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\FiturFasilitasController;

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

//--------------------------------------------------------- CUSTOMER ---------------------------------------------------------
// Route::get('/', function () {
//     return view('customer.index');
// });

Route::get('/', [CustomerController::class, 'indeks']);
Route::post('/succesRegis', [CustomerController::class, 'store']);
Route::post('/succesLogin', [CustomerController::class, 'login']);
Route::get('/logoutt', [CustomerController::class, 'logout']);

//kamar
Route::get('/kost', [KostController::class, 'viewkostlist']);
Route::get('/detail/{id}', [KostController::class, 'kostdetail']);
Route::post('/cekKetersediaanKamar', [KostController::class, 'filterkamar']);

//fasilitas
Route::get('/fasilitas', [FiturFasilitasController::class, 'viewfacilities']);

//contact
// Route::get('/contact', [SettingController::class, 'viewcontact']);

//setting
Route::get('/aboutUs', [SettingController::class, 'viewaboutus']);

Route::group(["middleware" => ["cekLogin"]], function () {
    //profil
    Route::get('/profil', [CustomerController::class, 'profil']);
    Route::get('/editprofil/{id}/edit', [CustomerController::class, 'editprofil']);
    Route::put('/updateprofil/{id}', [CustomerController::class, 'updateprofil']);
    Route::put('/updateimage/{id}', [CustomerController::class, 'updateimage']);

    //testimoni
    Route::post('/newtestimoni', [TestimonialController::class, 'newtestimoni']);
    Route::get('/testimonial/{id}', [TestimonialController::class, 'viewtestimoni']);

    //booking
    Route::get('/bookingroom', [BookingController::class, 'viewbooking']);
    Route::get('/booking/{id}', [BookingController::class, 'bookingroom']);
    Route::post('/newbooking/{id}', [BookingController::class, 'newbooking']);
    // Route::get('/cancelbooking', [BookingController::class, 'newbooking']);
    Route::get('/bookingriwayat', [BookingController::class, 'viewriwayat']);

    //antrian
    Route::get('/antrianselesai/{id}', [AdminController::class, 'editantrianselesai']);
});




//----------------------------------------------------------- ADMIN -----------------------------------------------------------

Route::get('/admin', [AdminController::class, 'indeks']);
Route::post('/succesLoginAdmin', [AdminController::class, 'login']);
Route::get('/logout', [AdminController::class, 'logout']);

Route::get('/adminn', function () {
    return view('admin.welcome');
});

Route::group(["middleware" => ["cekLoginAdmin"]], function () {

    Route::get('/pengajuanD', [AdminController::class, 'viewpengajuan']);
    
    Route::get('/pengajuanselesai/{id}', [SettingController::class, 'pengajuanselesai']);
    
    //profil
    Route::get('/profilD', [AdminController::class, 'profil']);
    Route::get('/user', [AdminController::class, 'user']);
    Route::post('/newadmin', [AdminController::class, 'addadmin']);
    Route::get('/profiladmin/{id}/edit', [AdminController::class, 'editprofil']);
    Route::put('/profiladmin/{id}', [AdminController::class, 'updateprofil']);
    Route::put('/updateprofilimage/{id}', [AdminController::class, 'updateimage']);
    
    //kost
    Route::get('/kostD', [KostController::class, 'viewkost']);
    Route::get('/kostN', [KostController::class, 'newkost']);
    Route::post('/kostNew', [KostController::class, 'addkost']);
    Route::get('/kost/{id}/edit', [KostController::class, 'editkost']);
    Route::put('/kost/{id}', [KostController::class, 'updatekost']);
    Route::delete('/kost/{id}', [KostController::class, 'destroykost']);
    Route::get('/kost/detail/{id}', [KostController::class, 'detailkost']);

    //fasilitas
    Route::post('/fasilitasbaru', [KostController::class, 'addfasilitas']);
    Route::delete('/fasilitas/{id}', [KostController::class, 'destroyfasilitas']);
    
    //photos
    Route::post('/photobaru', [KostController::class, 'addphoto']);
    Route::delete('/photo/{id}', [KostController::class, 'destroyphoto']);

    //carousel
    Route::get('/carouselD', [CarouselController::class, 'viewcarousel']);
    Route::post('/newcarousel', [CarouselController::class, 'newcarousel']);
    Route::delete('/carousel/{id}', [CarouselController::class, 'destroycarousel']);

    //setting
    Route::get('/settingD', [SettingController::class, 'viewsetting']);

    Route::post('/newteam', [SettingController::class, 'newteam']);
    Route::delete('/team/{id}', [SettingController::class, 'destroyteam']);

    Route::put('/updateInformasi/{id}', [SettingController::class, 'updateinfo']);

    Route::put('/updateKontak/{id}', [SettingController::class, 'updatekontak']);

    Route::get('/statusaktif/{id}', [SettingController::class, 'aktif']);
    Route::get('/statustidakaktif/{id}', [SettingController::class, 'tidakaktif']);

});

//----------------------------------------------------------- PEMILIK -----------------------------------------------------------
Route::group(["middleware" => ["cekLoginPemilik"]], function () {

    Route::get('/pengajuan', function () {
        return view('pemilik.contact');
    });
    
    Route::post('/pengajuannew', [SettingController::class, 'pengajuan']);
    
    //pemilik
    Route::get('/dashboard', [PemilikController::class, 'dashboard']);
    Route::get('/properti', [PemilikController::class, 'viewproperti']);
    Route::get('/penghuni', [PemilikController::class, 'viewpenghuni']);
    Route::get('/review', [PemilikController::class, 'review']);
    Route::delete('/review/{id}', [PemilikController::class, 'destroyreview']);


    //antrian
    Route::get('/antrianedit/{id}', [AdminController::class, 'editantriankonfirmasi']);
    Route::get('/antrianback/{id}', [AdminController::class, 'editantrianbatalkan']);

    Route::get('/antriankamarkotor1/{id}', [AdminController::class, 'editantriankamarkotor1']);
    Route::get('/antriankamarkotor2/{id}', [AdminController::class, 'editantriankamarkotor2']);

    //setting
    Route::get('/statusaktif/{id}', [SettingController::class, 'aktif']);
    Route::get('/statustidakaktif/{id}', [SettingController::class, 'tidakaktif']);

});