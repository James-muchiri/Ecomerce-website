<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>E-shop</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<!-- Bootstrap -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

		<!-- Slick -->

        <link href="{{ asset('css/slick.css') }}" rel="stylesheet">

        <link href="{{ asset('css/slick-theme.css') }}" rel="stylesheet">

		<!-- nouislider -->

        <link href="{{ asset('css/nouislider.min.css') }}" rel="stylesheet">

		<!-- Font Awesome Icon -->

        <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">


		<!-- Custom stlylesheet -->

        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style>
#results {
    position: absolute;
top: 0px;
background-color: white;
box-shadow: 0 4px 8px 0 rgba(0,0,0,0.15);

}

#item  {
      width: 290px;
    padding-left: 16px;
    padding-top: 8px;
    padding-bottom: 8px;
    color: #67003c;
    font-weight: 800;
    font-size: 14px;
}


#backgroundOverlay{
    background-color:transparent;
    position:fixed;
    top:0;
    left:0;
    right:0;
    bottom:0;
    display:block;
}
#popup{

border: 1px solid #000;
width: 300px;
height: max-content;
position: absolute;
margin-left: 25vw;
}
.list-inline{
    padding-top: 20px;
    border-bottom:2px solid #E4E7ED;
}

.list-inline li{
    border-right:2px solid #E4E7ED;
    padding: 10px;
    font-size: 24px;
    font-weight: 600;
}
.aboutus{
    -webkit-box-shadow: 1px 0 20px rgb(0 0 0 / 8%);
       box-shadow: 1px 0 20px rgb(0 0 0 / 67%);
    text-align: center;
    width: 90%;
    float: left;
    height: 300px;
}
.ContactUs{
    -webkit-box-shadow: 1px 0 20px rgb(0 0 0 / 8%);
       box-shadow: 1px 0 20px rgb(0 0 0 / 67%);
    text-align: center;
    width: 400px;
    float: right;
    position:relative;
    top:200px;
}
.OurProducts{
    -webkit-box-shadow: 1px 0 20px rgb(0 0 0 / 8%);
       box-shadow: 1px 0 20px rgb(0 0 0 / 67%);
    text-align: center;
    width: 400px;
    position:relative;
    top:250px;
}

h3{
    border-bottom:2px solid #E4E7ED;
    padding-top: 20px;
    padding-bottom: 20px;
    font-size: 24px;
    font-weight: 600;
}
p{
    padding-top: 20px;

    font-size: 24px;

}
.list-inline a{
    color: #f9793e;
}
.aboutus a{
    padding-top: 15px;

    font-size: 20px;
}
@media only screen and (max-width: 767px) {
    #hidepic{
    display:none;
}
.list-inline li{
    border-right:2px solid #E4E7ED;
    padding: 10px;
    font-size: 20px;
    font-weight: 500;
}

}


.pic-wrapper {
  position: absolute;
  width: 100%;
  height: 400px;
  overflow: hidden;
  left:0;
  top:20px;
}

figure {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  opacity: 0;
  /*animation*/

  animation: slideShow 24s linear infinite 0s;
  -o-animation: slideShow 24s linear infinite 0s;
  -moz-animation: slideShow 24s linear infinite 0s;
  -webkit-animation: slideShow 24s linear infinite 0s;
}



.pic-1 {
  opacity: 1;
  background: url('{{asset('images/unnamed.jpg')}}') no-repeat center center;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

.pic-2 {
  animation-delay: 6s;
  -o-animation-delay: 6s;
  -moz--animation-delay: 6s;
  -webkit-animation-delay: 6s;
  background: url('{{asset('images/1.jpeg')}}') no-repeat center center;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

.pic-3 {
  animation-delay: 12s;
  -o-animation-delay: 12s;
  -moz--animation-delay: 12s;
  -webkit-animation-delay: 12s;
  background: url('{{asset('images/2.jpg')}}') no-repeat center center;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

.pic-4 {
  animation-delay: 18s;
  -o-animation-delay: 18s;
  -moz--animation-delay: 18s;
  -webkit-animation-delay: 18s;
  background: url('{{asset('images/3.jpeg')}}') no-repeat center center;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
.pic-5 {
  animation-delay: 18s;
  -o-animation-delay: 18s;
  -moz--animation-delay: 18s;
  -webkit-animation-delay: 18s;
  background: url('{{asset('images/4.jpg')}}') no-repeat center center;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
/* keyframes*/

@keyframes
slideShow {  0% {
 opacity: 0;
 transform:scale(1);
 -ms-transform:scale(1);
}
 5% {
 opacity: 1
}
 25% {
 opacity: 1;
}
 30% {
 opacity: 0;
 transform:scale(1.1);
 -ms-transform:scale(1.1);
}
 100% {
 opacity: 0;
 transform:scale(1);
 -ms-transformm:scale(1);
}
}
 @-o-keyframes
slideShow {  0% {
 opacity: 0;
 -o-transform:scale(1);
}
 5% {
 opacity: 1
}
 25% {
 opacity: 1;
}
 30% {
 opacity: 0;
 -o-transform:scale(1.1);
}
 100% {
 opacity: 0;
 -o-transformm:scale(1);
}
}
 @-moz-keyframes
slideShow {  0% {
 opacity: 0;
 -moz-transform:scale(1);
}
 5% {
 opacity: 1
}
 25% {
 opacity: 1;
}
 30% {
 opacity: 0;
 -moz-transform:scale(1.1);
}
 100% {
 opacity: 0;
 -moz-transformm:scale(1);
}
}
 @-webkit-keyframes
slideShow {  0% {
 opacity: 0;
 -webkit-transform:scale(1);
}
 5% {
 opacity: 1
}
 25% {
 opacity: 1;
}
 30% {
 opacity: 0;
 -webkit-transform:scale(1.1);
}
 100% {
 opacity: 0;
 -webkit-transformm:scale(1);
}
}
.into-title{
    border-bottom: 1px solid black;
}
</style>
</head>


    <!-- HEADER -->
    <header id="headr">
        <!-- TOP HEADER -->
        <div id="top-header">
            <div class="container">
                <ul class="header-links pull-left">
                    <li><a href="#"><i class="fa fa-phone"></i> 0727294669</a></li>
                    <li><a href="#"><i class="fa fa-map-marker"></i>Accra rd/dubois Rd junction </a></li>


                </ul>
                <ul class="header-links pull-right">
                    <li><a href="#"><i class="fa fa-home"></i>Nyota Building  1st Floor  Room 105</a></li>
                </ul>
            </div>
        </div>
        <!-- /TOP HEADER -->


    </header>
    <!-- /HEADER -->


    <header id="headex" >
        <!-- TOP HEADER -->
        <div id="top-header">
            <div class="container">
                <ul class="header-links pull-left">
                    <li><a href="#"><i class="fa fa-phone"></i> 0727294669</a></li>
                    <li><a href="#"><i class="fa fa-map-marker"></i>Accra rd/dubois Rd junction </a></li>


                </ul>
                <ul class="header-links pull-right">
                    <li><a href="#"><i class="fa fa-home"></i>Nyota Building  1st Floor  Room 105</a></li>
                </ul>
            </div>
        </div>
        <!-- /TOP HEADER -->


    </header>
    <body>
	<div class="container imageslide" >
        <div class="row" >
                        <div class="pic-wrapper">
                <figure class="pic-1"></figure>
                <figure class="pic-2"></figure>
                <figure class="pic-3"></figure>
                <figure class="pic-4"></figure>
                <figure class="pic-5"></figure>

              </div>
        </div>

    </div>
    <div class="container" style="margin-top: 450px;">
        <div class="row" >

            <div class="col-lg-12">
                <div class="ts-intro">
                    <h2 class="into-title">About Us</h2>
              <p>At Afrimark we pride ourselves on being the best at supplying quality machine cut stones, sand, ballast, cement to any site anywhere in Kenya.</p>
                </div>

                <div class="gap-20"></div>

                <h4>We also offer transport services at a very affordable cost through our fleet:</h4>

                <div class="accordion accordion-group" id="our-values-accordion">
                    <div class="card">
                      <div class="card-header p-0 bg-transparent" id="headingOne">
                          <h2 class="mb-0">
                            <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Whatever you want to be carried
                            </button>
                          </h2>
                      </div>


                    </div>
                    <div class="card">
                      <div class="card-header p-0 bg-transparent" id="headingTwo">
                          <h2 class="mb-0">
                            <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                wherever you want it delivered
                            </button>
                          </h2>
                      </div>
                      <div class="card-header p-0 bg-transparent" id="headingTwo">
                        <h2 class="mb-0">
                          <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Talk to Afrimark
                          </button>
                        </h2>
                    </div>
                    <div class="gap-20"></div>
<h5>We are located at Accra rood/ road / Dubois Road junction - Nyota Building  1st floor  Room 105</h5>
                    </div>

                </div>
                <!--/ Accordion end -->
              <!-- Content row 1 end -->
              </div><!-- Col end -->


                    </div>
    </div>

  

<!-- FOOTER -->
<footer id="footer" style="margin-top: 20px;">
    <!-- top footer -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Location</h3>

                        <ul class="footer-links">
                            <li><a href="#"><i class="fa fa-map-marker"></i>Accra Road / Dubois Road Junction </a></li>
                            <li><a href="#"><i class="fa fa-home"></i>Nyota Building  1st Floor  Room 105</a></li>
                            <li><a href="#"><i class="fa fa-phone"></i>0727294669</a></li>

                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Categories</h3>
                        <ul class="footer-links">
                            @foreach($product as $category => $categoryItems)


						<li><a href="/searchbycat/{{ $category }}">{{ $category }}</a></li>

						@endforeach
                                                        </ul>
                    </div>
                </div>

                <div class="clearfix visible-xs"></div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Information</h3>
                        <ul class="footer-links">
                            <li><a href="/aboutus">About Us</a></li>


                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Service</h3>
                        <ul class="footer-links">

                            <li><a class="img_basket popup_cart" id="cart" onclick="fetchRecord()" data-toggle="modal" data-target="#shoppingCartModal"aria-expanded="true">
                            View Cart

                            </a></li>

                            <li><a href="#">Help</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /top footer -->


</footer>
<!-- /FOOTER -->
<script>

    $(document).ready(function(){
    fetchRecord();
    checkRecord();

    postRecord();
    // fetchTotalQty();
    cartCount();
    // cartCountNeg();
    cartCountmobile();


    });

    </script>
<!-- jQuery Plugins -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/slick.min.js') }}"></script>
<script src="{{ asset('js/nouislider.min.js') }}"></script>
<script src="{{ asset('js/jquery.zoom.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}" ></script>

<script src="{{ asset('js/shop.js') }}" ></script>
<script>
    $(document).ready(function () {
            var typingTimer;                //timer identifier
            var doneTypingInterval = 300;  //time in ms (5 seconds)

            $("#searchbox").on('keyup', function () {
                clearTimeout(typingTimer);
                if ($('#searchbox').val()) {
                    typingTimer = setTimeout(doneTyping, doneTypingInterval);
                }
            });
        });

        //user is "finished typing," do something
        function doneTyping() {
            var key = $('#searchbox').val();

            if (key.length >= 2) {
                $.ajax({
                    url: "/api/indexx",
                    type: 'POST',
                    data:{
                        key,

                        },
                    beforeSend: function () {
                        $("#results").slideUp('fast');
                    },
                    success: function (data) {
                        $("#results").html(data);
                        $("#results").slideDown('fast');
                    }
                });

       }
    }


    window.onload = function(){
	var popup = document.getElementById('popup');
    var overlay = document.getElementById('backgroundOverlay');
    var openButton = document.getElementById('searchbox');
    document.onclick = function(e){
        if(e.target.id == 'backgroundOverlay'){
            popup.style.display = 'none';
            overlay.style.display = 'none';
        }
        if(e.target === openButton){
         	popup.style.display = 'block';
            overlay.style.display = 'block';
        }
    };
};

        </script>
</body>
<script>


    </script>




</html>

