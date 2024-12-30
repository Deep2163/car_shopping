<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Car</title>
    <link rel="stylesheet" href="{{ asset('assets/css/car-details.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- script for image slideshow-->
    <script>
        let slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("dot");
            if (n > slides.length) { slideIndex = 1 }
            if (n < 1) { slideIndex = slides.length }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
        }
    </script>
</head>

<body>
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="card p-4">
                        <h2>{{$car->name}}</h2>
                        <b>{{$car->company}}</b>
                        <div class="slideshow-container">
                            <div class="mySlides">

                                <div class="numbertext">1 / 4</div>
                                <img src="/carimages/front/{{$car->frontimage}}" style="width:100%">
                                <div class="text">Front</div>
                            </div>

                            <div class="mySlides">
                                <div class="numbertext">2 / 4</div>
                                <img src="/carimages/back/{{$car->backimage}}" style="width:100%">
                                <div class="text">Back</div>
                            </div>

                            <div class="mySlides">
                                <div class="numbertext">3 / 4</div>
                                <img src="/carimages/side/{{$car->sideimage}}" style="width:100%">
                                <div class="text">Side</div>
                            </div>

                            <div class="mySlides">
                                <div class="numbertext">4 / 4</div>
                                <img src="/carimages/interior/{{$car->interiorimage}}" style="width:100%">
                                <div class="text">Interior</div>
                            </div>

                            <a class="prev" onclick="plusSlides(-1)">❮</a>
                            <a class="next" onclick="plusSlides(1)">❯</a>

                        </div>
                        <br>

                        <div style="text-align:center">
                            <span class="dot" onclick="currentSlide(1)"></span>
                            <span class="dot" onclick="currentSlide(2)"></span>
                            <span class="dot" onclick="currentSlide(3)"></span>
                            <span class="dot" onclick="currentSlide(4)"></span>
                        </div>

                        <b>{{$car->description}}</b>
                        <div class="container-icons" id="car">
                            <div class="car-cover-wrapper">
                                <div class="items mt-1">
                                    <img src="{{ asset('assets/images/icons/cartype-icon.jpg')}}"><br>
                                    <strong>{{$car->cartype}}</strong>
                                </div>
                                <div class="items mt-1">
                                    <img src="{{ asset('assets/images/icons/transmission-icon.png')}}"><br>
                                    <strong>{{$car->transmissiontype}} transmission</strong>
                                </div>
                                <div class="items mt-1">
                                    <img src="{{ asset('assets/images/icons/calendar-icon.png')}}"><br>
                                    <strong>{{$car->year}}</strong>
                                </div>
                                <div class="items mt-1">
                                    <img src="{{ asset('assets/images/icons/fuel-icon.jpg')}}"><br><br>
                                    <strong>{{$car->fueltype}}</strong>
                                </div>
                            </div>
                        </div>
                        <p>Price: ₹<b>{{$car->price}}</b></p>
                        @if(($car->stock) > 0)
                            @guest
                                <p>Stock: <b>Out Of Stock</b></p>
                                <h3 class="after-some-time"> Visit After Some Time</h3>
                            @else
                                <p>Stock: <b>{{$car->stock}}</b></p>
                                <a href="Buy" class="btn btn-danger">Buy Now</a>
                            @endguest
                        @endif

                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
</body>

</html>