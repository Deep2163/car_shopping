<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    return view('home.Home');
});

Route::get('About',[AuthController::class,'about']);
Route::get('Contact',[AuthController::class,'contact']);


// Route::get('/', function () {
//     return view('Master');
// });

// @include("Hero")  
//     @include("Icon")
//     @include("Services")
//     @include("Newsletter")


/*Route::get('/userauth/Login', function () {
    return view('userauth/Login');
});*/


Route::group(['middleware' => 'guest'], function () {
Route::get('Login',[AuthController::class,'index'])->name('Login');
Route::post('login',[AuthController::class,'login']);


Route::get('Register',[AuthController::class,'register_view'])->name('Register');
Route::post('registerUser',[AuthController::class,'register'])->name('registerUser');
});



    Route::get('Dashboard',[AuthController::class,'dashboard'])->name('Dashboard');
    Route::get('Logout',[AuthController::class,'Logout'])->name('Logout');
    

Route::get('AdminDashboard',[AuthController::class,'AdminDashboard'])->name('AdminDashboad');
Route::get('AdminLogout',[AuthController::class,'AdminLogout']);

//add and view all cars
Route::get('AddCar',[CarController::class,'addcar'])->name('AddCar');
Route::get('ViewCar',[CarController::class,'viewcar'])->name('ViewCar');
Route::get('Sales',[AdminController::class, 'Sales']);

//crud car
Route::get('{id}/edit',[CarController::class,'edit']);
Route::put('{id}/Update',[CarController::class,'Update']);
Route::Delete('{id}/Delete',[CarController::class,'Delete']);
Route::get('{id}/show',[CarController::class,'show']);

Route::post('SaveCar', [CarController::class, 'savecar'])->name('SaveCar');

//admin view customers
Route::get('ViewCustomers',[AdminController::class,'ViewCustomers']);
//delete customer
Route::Delete('{id}/DeleteUser',[AuthController::class,'DeleteUser']);


//user explore cars
Route::get('Explore',[AuthController::class,'Explore']);


//contact us
Route::post('ContactSave',[AuthController::class,'ContactSave']);

//specific car details
Route::get('{name}/details',[CarController::class,'details']);


//buy car
Route::get('{name}/Buy',[CarController::class,'BuyNow']);
Route::post('{name}/paynow',[CarController::class,'Paynow']);

//approve or deny sale

Route::get('{id}/Approve',[CarController::class,'Approve']);
Route::post('{id}/Deny',[CarController::class,'Deny']);

//apply filter on explore page
Route::post('apply_filters',[CarController::class,'applyFilter']);

Route::get('home',[AuthController::class,'Home']);
/*Route::get('/Footer', function () {
    return view('Footer');
});*/
