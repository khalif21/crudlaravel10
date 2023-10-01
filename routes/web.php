<?php

use Illuminate\Support\Facades\Route;
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
    return view('welcome');
});

Route::get('/customer',[CustomerController::class, 'index'])->name('customer');
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

