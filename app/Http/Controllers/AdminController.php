<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\payments;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{

    public function ViewCustomers(){
        $customers = User::get();
        Session::put('Loggedadmin','admin@123');
        Session::put('success',true);
        return view('admin.ViewCustomers',['customers'=> $customers ])->with("success");
    }
    public function Sales(){
        $sales=payments::get();
        
        Session::put('Loggedadmin','admin@123');
        Session::put('success',true);
        return view('admin.Sales',['sales'=> $sales])->with("success");
        //return view('admin.Sales',['sales'=> $sales]);
    }
}
