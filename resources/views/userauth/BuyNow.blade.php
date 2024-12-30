<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Car</title>
    <link rel="stylesheet" href="{{ asset('assets/css/buynow.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <h1 class="buy-text">Buy Your Car</h1>
    <div class="container">
        <div class="row">
            <div class="car-summury justify-content-center">
                <h3>{{$car->name}}</h3>
                <b>{{$car->company}}</b><br>
                <img src="/carimages/front/{{$car->frontimage}}" style="width:85%;"><br><br>
                <p style="text-align: center;">Price: ₹<b>{{$car->price}}</b></p>
            </div>
        </div>
        <div class="payment-container">
            <h1>Payment Details</h1>
            <form action="paynow" method="POST">
                @csrf
                <label>Your E-mail:</label>
                <input name="customer" type="text" placeholder="customer" value="{{$userinfo->email}}" readonly />
                <label for="card-number">Card Number:</label>
                <input type="text" id="card_number" name="card_number" placeholder="0000 0000 0000 0000" required>
                <div class="exp_cvv">
                    <div class="exp">
                        <label for="expiry-date">Expiry Date:</label><br>
                        <input type="text" id="expiry-date" name="expiry-date" placeholder="mm/yy" required>
                    </div>
                    <div class="cvv">
                        <label for="cvv">CVV:</label><br>
                        <input type="number" id="cvv" name="cvv" min="100" max="999" placeholder="000" required>
                    </div><br>
                </div>
                <label>Amount:</label>
                <input type="number" id="amount" name="amount" value="{{$car->price}}" readonly><br>
                <button type="submit">Pay Now</button>
            </form>
        </div>
    </div>
</body>

</html>