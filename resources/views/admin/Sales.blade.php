<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('assets/css/admindashboard.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Sales History</title>
</head>

<body>
    <nav class="navbar 
                   navbar-expand-lg 
                   navbar-dark 
                   bg-danger">
        <div class="container-fluid">
            <a class="navbar-brand" href="">
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
                    <li class="nav-item">
                        <a class="nav-link active" href="ViewCustomers">
                            View Users
                        </a>
                    </li>
                </ul>
            </div>
            <a class="logout-btn" href="AdminLogout">
                Logout
            </a>
        </div>
    </nav>
    <table class="table table-hover mt-4">
        <thead>
            <tr>
                <th>Id</th>
                <th>Customer Email:</th>
                <th>Car Name:</th>
                <th>Card Number:</th>
                <th>Amount(₹): </th>
                <th>Payment At:</th>
                <th>Status:</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sales as $sale)
                <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>{{$sale->cust_email}}</td>
                    <td>{{$sale->car_name}}</td>
                    <td>{{$sale->card_number}}</td>
                    <td>{{$sale->amount}}</td>
                    <td>{{$sale->created_at}}</td>
                    <td>{{$sale->status}}</td>
                    @if ($sale->status == 'Pending')
                        <td>
                            <a href="{{$sale->id}}/Approve" class="btn btn-primary">Approve</a>
                            <form method="POST" class="d-inline" action="{{$sale->id}}/Deny">
                                @csrf
                                <button type="submit" class="btn btn-danger">Deny</button>
                            </form>
                        </td>
                    @else
                        @if ($sale->status == 'Approved')
                            <td><strong>Sold</strong></td>
                        @else
                            <td><strong>Denied</strong></td>
                        @endif
                    @endif

                </tr>
            @endforeach
            <tr>
        </tbody>
    </table>
</body>

</html>