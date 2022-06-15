<?php

use Illuminate\Support\Facades\Route;
use Symfony\Component\Process\Process;

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

Route::get('/', function () {
    return redirect('login');
});

// ============================================== ADMINISTRATOR ==============================================
Route::middleware(['ceklogout'])->group(function () {
    Route::get('login', function () {
        return view('V_login');
    });
    Route::post('login-process', 'AuthController@login_process');
});

Route::middleware(['ceklogin'])->group(function () {
    // ======================= Auth =======================
    Route::get('logout', 'AuthController@logout');
    // ===== ./Auth =====

    Route::get('home', 'HomeController@index');


    // ======================= Profile =======================
    Route::get('profile', 'HomeController@profile');
    Route::get('edit-profile', 'HomeController@edit_profile');
    Route::post('edit-profile-process', 'HomeController@edit_profile_process');
    Route::get('edit-password', function () {
        return view('home/V_edit_password');
    });
    Route::post('edit-password-process', 'HomeController@edit_password_process');
    // ===== ./Profile =====


    // ======================= Manage User =======================
    Route::resource('manage-admin', 'User\AdminController');
    Route::resource('manage-user', 'User\UserController');
    // ===== ./Manage User =====

    // ======================= Manage Parking =======================
    Route::get('parking-gatein', function () {
        return view('parking/V_gatein');
    });
    Route::get('parking-gateout', function () {
        return view('parking/V_gateout');
    });
    Route::post('parking-gatein', 'Parking\ParkingController@gatein');
    Route::post('parking-gateout', 'Parking\ParkingController@gateout');
    Route::post('export-parking', 'Parking\ManageParkingController@export_data');
    Route::resource('manage-parking', 'Parking\ManageParkingController');
    Route::get('export-parking', function () {
        return view('manage_parking/export');
    });
    // ===== ./Manage User =====

    // ======================= Access =======================
    Route::resource('permissions', 'Access\ManagePermissionsController');
    Route::resource('roles', 'Access\ManageRolesController');
    Route::resource('user-access', 'Access\ManageUserAccessController');
    // ===== ./Access =====
});
// ============================================== ./ ADMINISTRATOR ==============================================
//Auth::routes();
