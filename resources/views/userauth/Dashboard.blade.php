@extends('Master')
@section('content')

<link rel="stylesheet" href="{{ asset('assets/css/dashboard.css')}}">
<br/><br/><br/><br/><br/>
<section style="background-color: #eee; " class="mt-5">
  <div class="container py-5">

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="{{ asset('assets/images/no-pic.png')}}" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3">{{$userinfo->name}}</h5>
            <p class="text-muted mb-1">{{$userinfo->city}}</p>
          </div>
            </div>
        </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$userinfo->name}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$userinfo->email}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Phone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$userinfo->address}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Date Of Birth</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$userinfo->dob}}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


@endsection
