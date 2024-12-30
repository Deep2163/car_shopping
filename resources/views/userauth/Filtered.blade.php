<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Cars</title>
    <link rel="stylesheet" href="{{ asset('assets/css/explore.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</head>

<body>
    @extends('Master')
    @section('content')

    <div class="page">
        <div class="side-panel">
            <form action="apply_filters" method="POST">
            @csrf
            <h2>Filters</h2>
            <label for="price-range">Price:</label>
            <span class="price-range-min"><span class="price-range__value"><span class="price-range__symbol">₹</span>100000</span></span>
            <span class="price-range-max"><span class="price-range__value"><span class="price-range__symbol">₹</span>10000000+</span></span>
            <input type="range" class="price_range" id="priceRange" name="maxprice" min="100000" max="100000000" step="100">
            
            <label for="company">Company:</label>
            <select id="company" name="company">
                <option selected disabled>--select--</option>
                <option value="ASTON MARTIN">ASTON MARTIN</option>
                <option value="AUDi">AUDI</option>
                <option value="BENTLEY">BENTLEY</option>
                <option value="BMW">BMW</option>
                <option value="BUGATTI">BUGATTI</option>
                <option value="CHAVROLET">CHAVROLET</option>
                <option value="DODGE">DODGE</option>
                <option value="FERRARI">FERRARI</option>
                <option value="FORd">FORD</option>
                <option value="HUMMER">HUMMER</option>
                <option value="JAGUAR">JAGUAR</option>
                <option value="KOENIGSEGG">KOENIGSEGG</option>
                <option value="LAMBORGHINI">LAMBORGHINI</option>
                <option value="MCLAREN">MCLAREN</option>
                <option value="MERCEDES">MERCEDES</option>
                <option value="NISSAN">NISSAN</option>
                <option value="PORSCHE">PORSCHE</option>
                <option value="ROLLS ROYCE">ROLLS ROYCE</option>
                <option value="TOYOTA">TOYOTA</option>
                <option value="MAHINDRA">MAHINDRA</option>
            </select>
            <label for="car-type">Car Type:</label>
            <select id="cartype" name="cartype">
            <option selected disabled>--select--</option>
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
            <label for="fuel-type">Fuel Type:</label>
            <select id="fueltype" name="fueltype">
                <option selected disabled>--select--</option>
                <option value="Petrol">Petrol</option>
                <option value="Diesel">Diesel</option>
                <option value="Electric">Electric</option>
                <option value="Hybrid">Hybrid</option>
            </select>
            <button class="apply_filter">Apply</button>
            </form>
        </div>
        <div class="container" id="car">
            <div class="car-cover-wrapper">
                @foreach($car as $cars)
                    <div class="items mt-1">
                        <img src="carimages/front/{{$cars->frontimage}}" alt="car">
                        <h3 class="carname mt-1"><a href="{{$cars->name}}/details" class="text-dark">{{$cars->name}}</a>
                        </h3>
                        <p class="cardesc mt-2">{{$cars->description}}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </section>
    @endsection
</body>

</html>