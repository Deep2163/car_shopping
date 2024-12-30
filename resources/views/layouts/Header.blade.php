<link rel="stylesheet" href="{{ asset('assets/css/header.css')}}">
<script href="{{ asset('js/header.js')}}"></script>

<header class="header">
    <div id="menu-btn" class="fas fa-bars"></div>
    <a href="{{ url('/') }}" class="logo"> <span>VeloCity</span> Wheels </a>
    <nav class="navbar">
        <a href="{{ url('/') }}"> Home </a>
        <a href="Explore"> Products </a>
        <a href="#reviews"> Reviews </a>
        <a href="Contact"> Contact </a>
        <a href="About"> AboutUs </a>
        @if($messege = Session::get('success'))
                <a href="{{ route('Dashboard') }}"> Profile </a>
        @endif

    </nav>

    <div id="login-btn">
        @if(!request()->session()->get('success'))
            <a href="{{ route('Login')}}" class="li btn">Login</a>
          @else
            <a href="{{ route('Logout')}}"  class="li btn">Logout</a>
          @endif

    </div>


    <!--<div id="login-btn">
        <a class="li btn" href="/userauth/Login"> Login </a>
        <i class="far fa-user i"></i>
    </div>-->

    <!-- <div class="login-btn">
        <button class="fa fa-bag-shopping ie"> </button>
        <span>0</span> -->
    </div>
</header>