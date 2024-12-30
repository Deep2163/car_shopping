<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('assets/css/admindashboard.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
</head>

<body>

    <div class="menu">
        <a class="navbar-brand" href="">Dashboard</a>
        <a class="menu_item" href="AddCar">Add Car</a>
        <a class="menu_item" href="ViewCar">View Cars</a>
        <a class="menu_item" href="ViewCustomers">View Customers</a>
        <a class="menu_item" href="Sales">Sales</a><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <div class="logout">
            <a class="logout-btn" href="AdminLogout">
                <img class="logout_icon" src='{{ asset('assets/images/logout_icon.png')}}' alt="Sales">&nbsp;&nbsp;
                Logout</a>
        </div>
    </div>
    <div class="welcome-admin">
        <strong> Welcome Car Guy</strong>
    </div>
    <div class="content">
        <div class="uppar">
            <div class="update">
                <h2>Recent Updates</h2>
                <h4>Sales Report</h4>
                <img class="sales_img" src='{{ asset('assets/images/sales.png')}}' alt="Sales">
            </div>
            <div class="car">
                <img class="sales_img" src='{{ asset('assets/images/pw_supra.png')}}' alt="Sales">
            </div>
        </div>
        <div class="updates"><br>
            <h2 class="status">Status</h2>
            <div class="updates_div">
                <div class="boxes">
                    <h1>20</h1>
                    <p>Purchase Requests</p>
                </div>
                <div class="boxes">
                    <h1>12</h1>
                    <p>Delivered</p>
                </div>
                <div class="boxes">
                    <h1>2</h1>
                    <p>New Models</p>
                </div>
                <div class="boxes">
                    <h1>33</h1>
                    <p>Sold Week</p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>