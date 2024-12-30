<?php

namespace App\Http\Controllers;

use Faker\Provider\ar_EG\Payment;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\payments;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    public function addcar()
    {
        if (Session::get('Loggedadmin') == 'admin@123') {
            Session::put('email', 'admin@123');
            return view('admin.AddCar')->with("success");
        }
        // Display the login form
        return redirect('Login')->with('error', 'Please Login First');
    }
    public function viewcar()
    {
        $car = Car::get();

        return view('admin.ViewCar', ['car' => $car]);
    }

    public function SaveCar(Request $request)
    {
        //validation
        $request->validate([
            'name' => 'required',
            'company' => 'required',
            'carmodel' => 'required',
            'description' => 'required',
            'cartype' => 'required',
            'transmissiontype' => 'required',
            'fueltype' => 'required',
            'year' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'frontimage' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
            'backimage' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
            'sideimage' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
            'interiorimage' => 'required|mimes:jpeg,jpg,png,gif|max:10000'
        ]);

        //dd($request->all());
        //insert in database
        $frontimagename = time() . '.' . $request->frontimage->extension();
        $request->frontimage->move(public_path('carimages/front'), $frontimagename);

        $backimagename = time() . '.' . $request->backimage->extension();
        $request->backimage->move(public_path('carimages/back'), $backimagename);

        $sideimagename = time() . '.' . $request->sideimage->extension();
        $request->sideimage->move(public_path('carimages/side'), $sideimagename);

        $interiorimagename = time() . '.' . $request->interiorimage->extension();
        $request->interiorimage->move(public_path('carimages/interior'), $interiorimagename);

        $Car = new Car;
        $Car->name = $request->name;
        $Car->company = $request->company;
        $Car->carmodel = $request->carmodel;
        $Car->description = $request->description;
        $Car->cartype = $request->cartype;
        $Car->transmissiontype = $request->transmissiontype;
        $Car->fueltype = $request->fueltype;
        $Car->year = $request->year;
        $Car->stock = $request->stock;
        $Car->price = $request->price;
        $Car->frontimage = $frontimagename;
        $Car->backimage = $backimagename;
        $Car->sideimage = $sideimagename;
        $Car->interiorimage = $interiorimagename;

        $Car->save();
        return back()->withSuccess('New Car Added Successfully...');
    }


    //edit
    public function edit($id)
    {
        $car = car::where('id', $id)->first();

        return view('admin.EditCar', ['car' => $car]);
    }

    //Update
    public function Update(Request $request, $id)
    {
        //validation
        $request->validate([
            'name' => 'required',
            'company' => 'required',
            'carmodel' => 'required',
            'description' => 'required',
            'cartype' => 'required',
            'transmissiontype' => 'required',
            'fueltype' => 'required',
            'year' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'frontimage' => 'nullable|mimes:jpeg,jpg,png,gif|max:10000',
            'backimage' => 'nullable|mimes:jpeg,jpg,png,gif|max:10000',
            'sideimage' => 'nullable|mimes:jpeg,jpg,png,gif|max:10000',
            'interiorimage' => 'nullable|mimes:jpeg,jpg,png,gif|max:10000'
        ]);

        $Car = car::where('id', $id)->first();


        if (isset($request->frontimage)) {
            $frontimagename = time() . '.' . $request->frontimage->extension();
            $request->frontimage->move(public_path('carimages/front'), $frontimagename);
            $Car->frontimage = $frontimagename;
        }

        //dd($request->all());
        //insert in database
        if (isset($request->backimage)) {
            $backimagename = time() . '.' . $request->backimage->extension();
            $request->backimage->move(public_path('carimages/back'), $backimagename);
            $Car->backimage = $backimagename;
        }
        if (isset($request->sideimage)) {
            $sideimagename = time() . '.' . $request->sideimage->extension();
            $request->sideimage->move(public_path('carimages/side'), $sideimagename);
            $Car->sideimage = $sideimagename;
        }
        if (isset($request->interiorimage)) {
            $interiorimagename = time() . '.' . $request->interiorimage->extension();
            $request->interiorimage->move(public_path('carimages/interior'), $interiorimagename);
            $Car->interiorimage = $interiorimagename;
        }

        $Car->name = $request->name;
        $Car->company = $request->company;
        $Car->carmodel = $request->carmodel;
        $Car->description = $request->description;
        $Car->cartype = $request->cartype;
        $Car->transmissiontype = $request->transmissiontype;
        $Car->fueltype = $request->fueltype;
        $Car->year = $request->year;
        $Car->stock = $request->stock;
        $Car->price = $request->price;

        $Car->save();
        return back()->withSuccess('Car Updated Successfully...');
    }

    //Delete
    public function Destroy($id)
    {
        $Car = car::where('id', $id)->first();
        $Car->delete();
        return back()->withSuccess('Car Deleted Successfully...');
    }

    //show one car
    public function show($id)
    {
        $car = car::where('id', $id)->first();

        return view('admin.ShowCar', ['car' => $car]);
    }

    public function details($name)
    {

        $user = Auth::user();
        $current_useremail = Auth()->user()->email;
        $userinfo = User::where('email', $current_useremail)->first();
        $userprofile = Profile::where('user_email', '=', '$current_useremail')->first();

        Session::put('success', true);

        $car = car::where('name', $name)->first();

        return view('userauth.details', compact('userinfo', 'car'))->with('success');
    }

    public function BuyNow($name)
    {
        $user = Auth::user();
        $current_useremail = Auth()->user()->email;
        $userinfo = User::where('email', $current_useremail)->first();
        $userprofile = Profile::where('user_email', '=', '$current_useremail')->first();
        Session::put('success', true);

        //dd($userinfo->name);
        $car = Car::where('name', $name)->first();
        return view('userauth.BuyNow', compact('userinfo', 'car'))->with('success');
    }

    public function Paynow(Request $request, $name)
    {

        $car = Car::where('name', $name)->first();

        $payment = new payments();
        $payment->cust_email = $request->customer;
        $payment->car_name = $car->name;
        $payment->card_number = $request->card_number;
        $payment->amount = $request->amount;
        $payment->status = 'Pending';
        //dd($request->all);
        $payment->save();

        return view('userauth.ThankYou')->withSuccess('success');
    }

    public function Approve($id)
    {
        $car = car::where('id', $id)->first();

        $payment = payments::where('id', $id)->first();

        $customer = $payment->cust_email;
        $card_no = $payment->card_number;
        $money = $payment->amount;
        $payment->cust_email = $customer;
        $payment->car_name = $car->name;
        $payment->card_number = $card_no;
        $payment->amount = $money;
        $payment->status = 'Approved';

        $stock = $car->stock;
        $car->stock = $stock - 1;

        $car->save();
        $payment->save();

        $sales = payments::get();
        return view('admin.Sales', ['sales' => $sales]);
    }
    public function Deny($id)
    {
        $car = car::where('id', $id)->first();

        $payment = payments::where('id', $id)->first();

        $customer = $payment->cust_email;
        $card_no = $payment->card_number;
        $money = $payment->amount;
        $payment->cust_email = $customer;
        $payment->car_name = $car->name;
        $payment->card_number = $card_no;
        $payment->amount = $money;
        $payment->status = 'Denied';
        $payment->save();

        $sales = payments::get();
        return view('admin.Sales', ['sales' => $sales]);
    }

    public function applyFilter(Request $request)
    {
        $cars = Car::query();

        if ($request->has('company')) {
            $cars->where('company', $request->company);
        }

        if ($request->has('cartype')) {
            $cars->where('cartype', $request->cartype);
        }

        if ($request->has('fueltype')) {
            $cars->where('fueltype', $request->fueltype);
        }
        
        if ($request->has('maxprice')) {
            $cars->where('price','<', $request->maxprice);
        }

        $car = $cars->get();

        // //$maxprice = $request->maxprice;
        // $company = $request->company;
        // $cartype = $request->cartype;
        // $fueltype = $request->fueltype;
        // //dd($maxprice);
        // //dd($company);
        // //dd($cartype);
        // //dd($fueltype);

        // $car = car::where('company',$company)
        // ->where('cartype', $cartype)
        // ->where('fueltype', $fueltype)
        // //->where('price',$maxprice)
        // ->get();

        return view('userauth.Filtered', ['car' => $car]);
    }

}
