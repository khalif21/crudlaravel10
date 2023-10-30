<?php

use App\Models\Customer;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CustomerController;

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

Route::get('/', function () {
    
    $jumlahcustomer = Customer::count();


    return view('welcome',compact('jumlahcustomer'));


})->middleware('auth');

Route::group(['middleware' => ['auth','hakakses:admin']], function(){
    Route::get('/customer',[CustomerController::class, 'index'])->name('customer')->middleware('auth');
});


//insert data
Route::get('/tambahcustomer',[CustomerController::class, 'tambahcustomer'])->name('tambahcustomer');
Route::post('/insertdata',[CustomerController::class, 'insertdata'])->name('insertdata');
//update data
Route::get('/tampilkandata/{id}',[CustomerController::class, 'tampilkandata'])->name('tampilkandata');
Route::post('/updatedata/{id}',[CustomerController::class, 'updatedata'])->name('updatedata');
//delete
Route::get('/deletedata/{id}',[CustomerController::class, 'deletedata'])->name('deletedata');
//export pdf
Route::get('/exportpdf',[CustomerController::class, 'exportpdf'])->name('exportpdf');
//export excel
Route::get('/exportexcel',[CustomerController::class, 'exportexcel'])->name('exportexcel');
//import excel
Route::post('/importexcel',[CustomerController::class, 'importexcel'])->name('importexcel');

//login
Route::get('/login',[LoginController::class, 'login'])->name('login');
Route::post('/loginuser',[LoginController::class, 'loginuser'])->name('loginuser');


//register
Route::get('/register',[LoginController::class, 'register'])->name('register');
Route::post('/registeruser',[LoginController::class, 'registeruser'])->name('registeruser');

//lupa password
Route::get('/lupapassword',[LoginController::class, 'lupapassword'])->name('lupapassword');
//recover password
Route::get('/recoverpassword',[LoginController::class, 'recoverpassword'])->name('recoverpassword');

//logout
Route::get('/logout',[LoginController::class, 'logout'])->name('logout');


