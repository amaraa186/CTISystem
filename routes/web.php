<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BedController;
use App\Http\Controllers\FloorController;
use App\Http\Controllers\PatientMasterController;
use Illuminate\Support\Facades\Route;

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
    return view('auth/login');
});

Route::group([ "middleware" => ['auth:sanctum', 'verified'] ], function() {
    Route::view('/dashboard', "dashboard")->name('dashboard');

    Route::get('/user', [ UserController::class, "index_view" ])->name('user');
    Route::view('/user/new', "pages.user.user-new")->name('user.new');
    Route::view('/user/edit/{userId}', "pages.user.user-edit")->name('user.edit');

    Route::get('/patient', [ PatientController::class, "index_view" ])->name('patient');
    Route::view('/patient/new', "pages.patient.patient-new")->name('patient.new');
    Route::view('/patient/edit/{patientId}', "pages.patient.patient-edit")->name('patient.edit');

    Route::get('/room', [ RoomController::class, "index_view" ])->name('room');
    Route::view('/room/new', "pages.room.room-new")->name('room.new');
    Route::view('/room/edit/{roomId}', "pages.room.room-edit")->name('room.edit');

    Route::get('/bed', [ BedController::class, "index_view" ])->name('bed');
    Route::view('/bed/new', "pages.bed.bed-new")->name('bed.new');
    Route::view('/bed/edit/{bedId}', "pages.bed.bed-edit")->name('bed.edit');

    Route::get('/floor', [ FloorController::class, "index_view" ])->name('floor');
    Route::view('/floor/new', "pages.floor.floor-new")->name('floor.new');
    Route::view('/floor/edit/{floorId}', "pages.floor.floor-edit")->name('floor.edit');

    Route::get('/patient_master', [ PatientMasterController::class, "index_view" ])->name('patient_master');
    Route::view('/patient_master/new', "pages.patient_master.patient_master-new")->name('patient_master.new');
    Route::view('/patient_master/edit/{patient_masterId}', "pages.patient_master.patient_master-edit")->name('patient_master.edit');
});
