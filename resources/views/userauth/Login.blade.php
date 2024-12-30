@extends('Master')
@section('content')


<link rel="stylesheet" href="{{ asset('assets/css/login.css')}}">
<link rel="stylesheet" href="{{ asset('assets/css/header.css')}}">
<link rel="stylesheet" href="{{ asset('assets/css/master.css')}}">


<script src="{{ asset('js/login.js')}}" defer></script>

        <div class="login-form-container">
        <form class="" action="login" method="POST">

            @if(Session::has('error'))
                <p class="alert alert-danger"> {{ Session::get('error')}} </p>
            @endif

            <!-- @if(Session::has('success'))
                <p class="alert alert-success"> {{ Session::get('success')}} </p>
            @endif -->

                <h3> LogIn </h3>
                @csrf
                @method('post')

                <div>
                    <input type="email" placeholder="Email" name="email" class="box" >
                    @if ($errors->has('eamil'))
                        <p class="text-danger">{{ $errors->first('email') }}</p>
                    @endif
                </div>

                <div>
                    <input type="password" placeholder="Password" name="password" class="box" >
                    @if ($errors->has('password'))
                        <p class="text-danger">{{ $errors->first('password') }}</p>
                    @endif
                </div>

                <p>Forget Password? <a href="#">Click Here</a> </p>
                <input type="submit" value="Login Now" class="btn">
                <p>Don't Have An Account? <a href="{{ route('Register') }}"> Create Now </a></p>
            </form>
        </div>
        
@endsection