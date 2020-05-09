<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    
    public function Password()
    {
        
        return view('auth.password_change');
        
    }
    
     public function updatepass(request $request)
    {
        
        $password=Auth::user()->password;
         $oldpas = $request->oldpass;
        
         if(Hash::check($oldpas,$password))
         {
             $user= User::find(Auth::id());
             $user->password=Hash::make($request->password);
             $user->save();
             Auth::logout();
             
             if ($user->save()) {
         
                $notification=array(
                    'messege'=>'your password change Successfully',
                    'alert-type'=>'success'
                );
                return redirect()->route('login')->with($notification);
            }
            else{

                 $notification=array(
                    'messege'=>'your password not matched',
                    'alert-type'=>'success'
                );
                return redirect()->back()->with($notification);
            }  
             
             
             
             
             
         }
         else{

                 $notification=array(
                    'messege'=>'your password not matched',
                    'alert-type'=>'error'
                );
                return redirect()->back()->with($notification);
            } 
         
    }
    
    
}
