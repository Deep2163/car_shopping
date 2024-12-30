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
        </div>
    </nav>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card p-4">
                    <p>Name: <b>{{$car->name}}</b></p>
                    <p>Company: <b>{{$car->company}}</b></p>
                    <p>Car Type: <b>{{$car->cartype}} Car</b></p>
                    <p>Year: <b>{{$car->year}}</b></p>
                    <p>Stock: <b>{{$car->stock}}</b></p>
                    <p>Price: <b>{{$car->price}}</b></p>
                    <p>Image: </p>
                    <img src="/carimages/front/{{$car->frontimage}}" height="100%" width="100%"></b>
                </div>
            </div>
        </div>
    </div>
</body>
</html>