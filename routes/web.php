<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;

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
    return view('login/loginpage');
});
Route::get('login', function () {
    return view('login/loginpage');
});
Route::get('register', function () {
    return view('register');
});
Route::get('logout', function () {
    Session::flush();
    return redirect('login');
});
Route::get('dashboard','LandingPageController@dashboard');
Route::get('deleteLeaves/{id}','Operations@deleteLeaves');
Route::get('editUser','LandingPageController@editUser');
// Route::get('login',[LandingPageController::class,'login']);
Route::post('userLogin','LandingPageController@checkLogin');
Route::post('users','LandingPageController@getData');
Route::post('editUserDetails','LandingPageController@editUserDetails');

Route::post('updateLeaves','Operations@leavesTaken');