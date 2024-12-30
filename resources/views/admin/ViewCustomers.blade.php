<!DOCTYPE html>
<html>

<head>
  <title>View Customers</title>
  <link rel="stylesheet" href="{{ asset('assets/css/admindashboard.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/css/viewcustomers.css')}}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

  <style>

  </style>
</head>

<body>
  <nav class="navbar 
                   navbar-expand-lg 
                   navbar-dark 
                   bg-danger">
    <div class="container-fluid">
      <a class="navbar-brand" href="AdminDashboard">
        Dashboard
      </a>
      <div class="collapse navbar-collapse justify-content-center">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="AddCar">
              Add Car
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="ViewCar">
              View Cars
            </a>
          </li>
        </ul>
      </div>
      <a class="logout-btn" href="AdminLogout">
        Logout
      </a>
    </div>
  </nav>

  <section style="background-color: #eee; " class="mt-5">
    @foreach($customers as $customer)
    <div class="container py-5">
    <div class="row">
      <div class="col-lg-4">
      <div class="card mb-2">
        <div class="card-body text-center">
        <img src="{{ asset('assets/images/no-pic.png')}}" alt="avatar" class="rounded-circle img-fluid"
          style="width: 150px;">
        <h5 class="my-3">{{$customer->name}}</h5>
        <p class="text-muted mb-1">{{$customer->city}}</p>
        <form method="POST" class="d-inline" action="{{$customer->email}}/DeleteUser">
        @csrf
        @method('Delete')
        <button type="submit" class="btn btn-danger">Delete</button>
      </form>
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
          <p class="text-muted mb-0">{{$customer->name}}</p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
          <p class="mb-0">Email</p>
          </div>
          <div class="col-sm-9">
          <p class="text-muted mb-0">{{$customer->email}}</p>
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
          <p class="text-muted mb-0">{{$customer->address}}</p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
          <p class="mb-0">Date Of Birth</p>
          </div>
          <div class="col-sm-9">
          <p class="text-muted mb-0">{{$customer->dob}}</p>
          </div>
        </div>
        </div>
      </div>
      </div>
    </div>
    </div>
  @endforeach
  </section>
</body>

</html>