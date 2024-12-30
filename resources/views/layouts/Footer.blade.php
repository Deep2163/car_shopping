<link rel="stylesheet" href="{{ asset('assets/css/footer.css')}}">

<footer class="footer">
    <div class="footer-left">
        <h1> VeloCity Wheels </h1>
        <h3> Happy Miles </h3>
            <div class="socials">      
                <a href=""><i class="fab fa-facebook"></i></a>
                <a href=""><i class="fab fa-twitter"></i></a>
                <a href=""><i class="fab fa-google"></i></a>
                <a href=""><i class="fab fa-instagram"></i></a>
                <a href=""><i class="fab fa-linkedin"></i></a>
            </div>
    </div>
        <ul class="footer-right">
                <li>
                <h2> Services </h2>
                <ul class="box ho">
                    <li><a href=""> Sales Cars</a></li>
                    <li><a href=""> VeloCity Careers </a></li>
                    <li><a href=""> Feedback / Quaries </a></li>
                </ul>
            </li>
            <li class="features">
                <h2> Useful Links </h2>
                <ul class="box ho">
                    <li><a href=""> Home </a></li>
                    <li><a href=""> Register </a></li>
                    <li><a href=""> Log in </a></li>
                    <li><a href=""> Products </a></li>
                    <li><a href=""> DashBoard </a></li>
                    <li><a href=""> AboutUs </a></li>
                </ul>
            </li>

            <li>
            <h2> Address </h2>
                <ul class="boxy">
                    <li> VeloCity Wheels </li>
                    <li> Headquarter </li>
                    <li> 77, Royal Palace, </li>
                    <li> Mota Varachha, Surat, </li>
                    <li> Gujarat, India. </li>
                </ul>
            </li>
            <li>
                <br>
                    <ul class="boxy">
                        <li> VeloCity Wheels </li>
                        <li> Branch. </li>
                        <li> 47047, Charleston Rd, </li>
                        <li> Mountain View, </li>
                        <li> Washington, DC, USA. </li>
                    </ul>
                </li>
        </ul>

        <div class="footer-bottom">
            <p> India | USA </p>
            <p> All Right Reserved By &copy;VeloCityWheels 2024 </p>
        </div>

        <script type="text/javascript">
        jQuery(document).ready(function(){
        var slider = document.getElementById("myRange");
        var output = document.getElementById("price");
        output.innerHTML = slider.value;

        slider.oninput = function () {
            output.innerHTML = this.value;
        }
        });
    </script>
</footer>
