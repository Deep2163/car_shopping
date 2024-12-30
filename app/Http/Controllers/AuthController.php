<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Car;
use App\models\contact;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    public function index()
    {
        return view('userauth.Login');
    }
    public function about()
    {
        return view('About');
    }
    
    public function AdminDashboard(){
        if(Session::get('Loggedadmin') == 'admin@123'){
            Session::put('email','admin@123');
            return view('admin.AdminDashboard')->with('success');
        }
        // Display the login form
        return redirect('Login')->with('error', 'Please Login First');
    }

    //delete user by admin
    public function DeleteUser($email){
        $user = User::where('email',$email)->first();
        $user->delete();
        return back()->withSuccess('User Deleted Successfully...');
    }

    public function contact()
    {
        if (Auth::check()) {
            $user = Auth::user();
            Session::put('email', $user);
            Session::put('success', true);
            // User is logged in, redirect to the homepage or any other page
            $car = Car::get();
            $current_useremail = Auth()->user()->email;
            $userinfo = User::where('email', $current_useremail)->first();
            $userprofile = Profile::where('user_email', '=', '$current_useremail')->first();

            return view('Contact', compact('userprofile', 'userinfo'))->withSuscess('success');
        }
        // Display the login form
        return redirect('Login')->with('error', 'Please Login First');

    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        //check if the user is admin or not         
        if ($request->email == "admin@123") {
            if ($request->password == "Admin123") {
                Session::put('Loggedadmin', $request->email);
                return redirect('AdminDashboard')->with("success", "Welcome Car Guy");
            } else {
                return back()->with("fail", "Password is incorrect");
            }
        }


        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            Session::put('email', $user);
            Session::put('success', true);

            request()->session()->get('success');

            return redirect('/')->with('success', 'Successfully logged in..');
        } else {
            return redirect('Login')->with('error', 'Username or Password Invalid..');
        }

    }

    public function AdminLogout(Request $request)
    {
        $request->session()->flush();
        Session::put('success', false);
        return view('home.home');
    }

    public function register_view()
    {
        return view('userauth.Register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:userdata|email',
            'password' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'city' => 'required',
            'pincode' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'dob' => $request->dob,
            'address' => $request->address,
            'city' => $request->city,
            'pincode' => $request->pincode
        ]);


        // $getuserid = $user->id;
        // $createprofile = new Profile();
        // $createprofile->user_id = $getuserid;
        // $createprofile->save();
        // Session::flash('flash_message','User Registration Success');

        // if(Auth::attempt($request->only('email','password'))){
        //     return redirect('Login');
        // }

        // return redirect('register')->withErrors('error');
        return redirect('Login');
    }

    public function dashboard()
    {
        if (Auth::check()) {
            $user = Auth::user();
            Session::put('email', $user);
            Session::put('success', true);
            // User is logged in, redirect to the homepage or any other page
            $car = Car::get();
            $current_useremail = Auth()->user()->email;
            $userinfo = User::where('email', $current_useremail)->first();
            $userprofile = Profile::where('user_email', '=', '$current_useremail')->first();

            return view('userauth.Dashboard', compact('userprofile', 'userinfo'));
        }
        // Display the login form
        return redirect('Login')->with('error', 'Please Login First');
    }

    public function Logout(Request $request)
    {
        $request->session()->flush();
        Session::put('success', false);
        return view('home.Home');
    }

    public function Explore()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $current_useremail = Auth()->user()->email;
            $userinfo = User::where('email', $current_useremail)->first();
            $userprofile = Profile::where('user_email', '=', '$current_useremail')->first();

            Session::put('success', true);
            
            request()->session()->get('success');
            $car = Car::get();
            return view('userauth.Explore', compact('userinfo', 'car'))->with('success');
        }
        // Display the login form
        return redirect('Login')->with('error', 'Please Login First');
    }
    public function ContactSave(Request $request)
    {

        request()->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'messege' => 'required'
        ]);

        $contact = new contact;
        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->messege = $request->messege;

        $contact->save();

        return back()->withSuccess('Your Messege Has Been Saved...');
    }
    public function home(){
        Session::put('success', false);
        return redirect('home.home');
    }

}
