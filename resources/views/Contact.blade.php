
    <title>Contact Us</title>
    <link rel="stylesheet" href="{{ asset('assets/css/contact.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />


</head>
<body>
@extends('Master')
@section('content')

<section>
<h1 class="contactus">
    Contact us
</h1>
@if($messege = Session::get('success'))
        <div class="alert alert-success alert-block">
            <strong> {{ $messege }}</strong>
        </div>
    @endif
<form action="ContactSave" method="post">  
  @csrf    
  <input name="name" type="text" class="feedback-input" placeholder="Name" value="{{$userinfo->name}}" readonly/>   
  <input name="phone" type="number" class="feedback-input" placeholder="Phone Number" />
  <input name="email" type="text" class="feedback-input" placeholder="Email" value="{{$userinfo->email}}"  readonly/>
  <textarea name="messege" class="feedback-input" placeholder="Messege"></textarea>
  <input type="submit" value="SUBMIT"/>
</form>

</section>
@endsection
</body>
</html>
