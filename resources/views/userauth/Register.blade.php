@extends('Master')
@section('content')

<link rel="stylesheet" href="{{ asset('assets/css/login.css')}}">
<link rel="stylesheet" href="{{ asset('assets/css/header.css')}}">
<link rel="stylesheet" href="{{ asset('assets/css/master.css')}}">


<script src="{{ asset('js/login.js')}}" defer></script>

        <div class="login-form-container">

            @if(Session::has('error'))
                <p class="text-danger"> {{ Session::get('error')}} </p>
            @endif

            <form class="" action="registerUser" method="POST">
                @csrf
                @method('post')

                <h3> Regiter Now! </h3>
                
                <div>
                    <input type="text" placeholder="Name" name="name" class="box" >
                    @if ($errors->has('name'))
                        <p class="text-danger">{{ $errors->first('name') }}</p>
                    @endif
                </div>
                <div>
                    <input type="email" placeholder="Email" name="email" class="box" >
                    @if ($errors->has('email'))
                        <p class="text-danger">{{ $errors->first('email') }}</p>
                    @endif
                </div>
                <div>
                    <input type="password" placeholder="Password" name="password" class="box" >
                    @if ($errors->has('password'))
                        <p class="text-danger">{{ $errors->first('password') }}</p>
                    @endif
                </div>

                <input type="date" placeholder="Date Of Birth" name="dob" class="box" >
                <input type="textarea" placeholder="Address" name="address" class="box" >
                <input type="text" placeholder="City" name="city" class="box" >
                <input type="number" placeholder="Pin Code" name="pincode" min="100000" max="999999"class="box" >
                <input type="submit" value="Register Now" class="btn">
                <p>Already Have An Account? <a href="{{ route('Login') }}"> Login Now </a></p>
            </form>
        </div>

@endsection