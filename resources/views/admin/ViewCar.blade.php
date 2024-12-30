<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Car</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    .table{
        margin-left: 30px;
    }
    th{
        font-size: 20px;
    }
    .car_name{
        color: black;
        font-family: sans-serif;
    }
  </style>
</head>
<body>
    <!--Navbar-->
    <nav class="navbar 
                   navbar-expand-lg 
                   navbar-dark 
                   bg-danger">
        <div class="container-fluid">
            <a class="navbar-brand" href="AdminDashboard">
                Dashboard
            </a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="AddCar">
                            Add Cars
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> 
    @if($messege = Session::get('success'))
        <div class="alert alert-success alert-block">
            <strong> {{ $messege }}</strong>
        </div>
    @endif
    <table class="table table-hover mt-15">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Year</th>
        <th>Stock</th>
        <th>Image</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach($car as $cars)
      <tr>
        <td>{{$loop->index+1}}</td>
        <td><b><a href="{{$cars->id}}/show" class="car_name">{{$cars->name}}</a></b></td>
        <td>{{$cars->year}}</td>
        <td>{{$cars->stock}}</td>
        <td>
            <img src="carimages/front/{{$cars->frontimage}}" height="85" width="100"/>
        </td>
        <td>
            <a href="{{$cars->id}}/edit" class="btn btn-primary">Edit</a>
            <form method="POST" class="d-inline" action="{{$cars->id}}/Delete">
            @csrf
            @method('Delete')
            <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
      </tr>
      @endforeach
      <tr>
    </tbody>
    </table>
    
</body>
</html>