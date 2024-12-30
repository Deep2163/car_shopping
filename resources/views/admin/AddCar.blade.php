<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Car</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

<style>
button{
    width: 100%;
    height:50px;
    margin-bottom:20px;
    border-radius: 15px;
    background-color:#CC4949;
    color:white;
    font-family:consolas;
    font-size:30px;
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
                        <a class="nav-link active" href="ViewCar">
                            View Cars
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
    <!--Page-->
    <div class="addcar text-center mt-3">
        <h1>Add New Car</h1>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-5 center">
                <form action="SaveCar" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col">
                        <label>Name:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name')}}"/>
                        </div>
                        @if($errors->has('name'))
                            <span class="text-danger">{{$errors->first('name')}}</span>
                        @endif
                        <div class="col">
                        <label>Company:</label>
                        <input type="text" name="company" id="company" class="form-control" value="{{ old('company')}}"/>
                        </div>
                        @if($errors->has('company'))
                            <span class="text-danger">{{$errors->first('company')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Model:</label>
                        <input type="text" name="carmodel" id="carmodel" class="form-control"value="{{ old('carmodel')}}"/>
                    </div>
                    @if($errors->has('carmodel'))
                            <span class="text-danger">{{$errors->first('carmodel')}}</span>
                    @endif
                    <div class="form-group">
                        <label>Description:</label>
                        <Textarea name="description" id="description" class="form-control">{{ old('description')}}
                        </Textarea>
                    </div>
                    @if($errors->has('description'))
                            <span class="text-danger">{{$errors->first('description')}}</span>
                    @endif
                        <br>
                    <div class="form-group">
                        <label>Car Type: </label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <select class="custom-select mr-sm-2" id="cartype" name="cartype">
                            <option value="Sedan">Sedan</option>
                            <option value="City">City</option>
                            <option value="SUV">SUV</option>
                            <option value="Super">Super</option>
                            <option value="Sports">Sports</option>
                            <option value="Hyper">Hyper</option>
                            <option value="Muscle">Muscle</option>
                            <option value="4X4">4X4</option>
                            <option value="Pickup">Pickup</option>
                            <option value="Luxury">Luxury</option>
                        </select>
                    </div>
                    @if($errors->has('cartype'))
                            <span class="text-danger">{{$errors->first('cartype')}}</span>
                        @endif
                    </br>
                    <div class="form-group">
                        <label>Transmission Type: </label>&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="transmissiontype" value="Manual"> Manual</radio>&nbsp;
                        <input type="radio" name="transmissiontype" value="Auto"> Auto</radio>
                    </div>
                    @if($errors->has('transmissiontype'))
                            <span class="text-danger">{{$errors->first('transmissiontype')}}</span>
                        @endif
                    <div class="form-group"><br>
                        <label>Fuel Type: </label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <select class="custom-select mr-sm-2" name="fueltype" id="fueltype">
                            <option value="Petrol">Petrol</option>
                            <option value="Diesel">Diesel</option>
                            <option value="Electric">Electric</option>
                            <option value="Hybrid">Hybrid</option>
                        </select>
                    </div>
                    @if($errors->has('fueltype'))
                            <span class="text-danger">{{$errors->first('fueltype')}}</span>
                    @endif
                        <br>
                    <div class="form-group">
                        <label>Year:</label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="number" min="1900" max="2024" step="1" value="2024" name="year"/>
                    </div>
                    @if($errors->has('year'))
                            <span class="text-danger">{{$errors->first('year')}}</span>
                        @endif
                    <br>
                    <div class="form-group">
                        <label>Stock:</label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="number" min="1" max="1000" step="1" value="1" name="stock"/>
                    </div>
                    @if($errors->has('stock'))
                            <span class="text-danger">{{$errors->first('stock')}}</span>
                        @endif
                    <br>
                    <div class="form-group">
                        <label>price(₹):</label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;
                        <input type="number" min="100000" max="3000000000" name="price" value="{{ old('price')}}"/>
                    </div>
                    @if($errors->has('price'))
                            <span class="text-danger">{{$errors->first('price')}}</span>
                        @endif
                    <br> 
                    <div class="form-group">
                        <label>Front Image:</label>
                        <input type="file" name="frontimage" id="frontimage" class="form-control"/>
                    </div>
                    @if($errors->has('frontimage'))
                            <span class="text-danger">{{$errors->first('frontimage')}}</span>
                        @endif
                        
                        <br>
                    <div class="form-group">
                        <label>Back Image:</label>
                        <input type="file" name="backimage" id="backimage" class="form-control"/>
                    </div>
                    @if($errors->has('backimage'))
                            <span class="text-danger">{{$errors->first('backimage')}}</span>
                        @endif
                    <br>
                    <div class="form-group">
                        <label>Side Image:</label>
                        <input type="file" name="sideimage" id="sideimage" class="form-control"/>
                    </div>
                    @if($errors->has('sideimage'))
                            <span class="text-danger">{{$errors->first('sideimage')}}</span>
                        @endif
                    <br>
                    <div class="form-group">
                        <label>Interior Image:</label>
                        <input type="file" name="interiorimage" id="Interiorimage" class="form-control"/>
                    </div>
                    @if($errors->has('interiorimage'))
                            <span class="text-danger">{{$errors->first('interiorimage')}}</span>
                        @endif
                    <br><br>
                    <div class="submit-btn">
                        <button type="submit">Add Car</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
