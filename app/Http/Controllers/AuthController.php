<?php

namespace App\Http\Controllers;

use session;
use App\Models\User;
use App\Models\NewLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Notifications\EmailNotification;
use Illuminate\Notifications\Notification;

class AuthController extends Controller
{
    public function home(){
        $user = User::all();
        $newLocation = NewLocation::all();
        return view('home', compact('newLocation', 'user'));
    }

    public function register(){
        return view('register');

       
    }


    public function saveDetails(Request $request){

        $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'min:3'],
            'password' => ['required'],
            
        ]);


        $user = User:: create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);


        return redirect('/');

       
    }

    public function redirect(){

        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {
            # code...
            return view('admin.home');
        } else {
            # code...
            return view('home');
        }
        
       
    }

    public function login(){
        
        return view('login');
        
    }

    public function loginUser(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
 
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        // Auth::logout();

        // Revoke current user tokens (Still confirm if you need this)
        auth()->user()->tokens()->delete();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();

        // redirect the login page
        return redirect('/');
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $newLocation= NewLocation::where('location_state', 'LIKE', "%$search%")->get();
        if ($newLocation) {
            # code...
            return view('home', compact('newLocation'));
        } else {
            # code...
            // return redirect()->back();
        }
        

    }   

    public function sendEmail(Request $request)
    {
        $user = User::where('id', '1')->get();

        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            

        ];

        Notification::send($user, new EmailNotification($details));

        return redirect('/');
    }
}
