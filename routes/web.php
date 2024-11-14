<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
  

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
    return view('login');
});
            
Route::get('login',[UserController::class,'index']);
Route::get('createUser',[UserController::class,'create']);
Route::get('createUsertwo',[UserController::class,'createtwo']); 
Route::get('dashbord',[UserController::class,'dashbord']);
Route::get('userdetails',[UserController::class,'show_user_details']); 

//auth
Route::any('/auth/register',[UserController::class,'createUser']);
Route::any('/auth/userlogin',[UserController::class,'loginUser']); 

 
