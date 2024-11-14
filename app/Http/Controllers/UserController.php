<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator; 
use App\Models\User;
use Illuminate\Support\Facades\DB; 
 
class UserController extends Controller
{ 
    
    // HOme page
    public function index()
    {
        return view('login'); 
    } 

    public function show_user_details()
    {
       // $user = DB::table('users')->latest()->first(); 
       $user = 'siva';
        return $user; 
    } 
            
       
    // sign up page
    public function create() 
    {
        return view('signup');
    }  

       // sign up page
       public function createtwo() 
       { 
           return view('signuptwo');
       }  
   
    // dash bord
    public function dashbord() 
    { 
        $dashbordfirst1 = ['siva', 'sandeep', 'divya', 'sri'];
        $dashbordfirst2 = ['siva2', 'sandeep2', 'divya2', 'sri2'];
        $dashbordget1 = ['siva2', 'sandeep2', 'divya2', 'sri2'];
        $dashbordget2 = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
        return view('dashbord',[
            'webdashbordfirst1'=>$dashbordfirst1,
            'webdashbordfirst2'=>$dashbordfirst2,
            'webdashbordget1'=>$dashbordget1,
            'dashbordget2'=>$dashbordget2 
              ]);
    }  
     




}
