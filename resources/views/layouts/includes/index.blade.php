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
</style>
    </head>
	<body>
		<!-- HEADER -->
		<header id="headr">
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> +25418360109</a></li>
						

					</ul>
					<ul class="header-links pull-right">
						<li><a href="#"><i class="fa fa-map-marker"></i> 1224 Embu Kenya</a></li>
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="/" class="logo">
                                    <img style="height: 50px;" src="{{ asset('images/logo/logo1.png') }}" alt="E-shop">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form action="/search" method="post">
									@csrf <!-- {{ csrf_field() }} -->
									<select class="input-select" name="categories">
										<option value="all">All Categories</option>
										@foreach ($categories as $cat )


										<option value="{!! $cat['name'] !!}">{!! $cat['name'] !!}</option>
										@endforeach
									</select>
								   <input class="input" type="search" name="product" placeholder="Search Names" id="searchbo">
									<button class="search-btn" type="submit">Search</button>
								</form>

							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">



								<!-- Cart -->
								<div class="dropdown" id="divShoppingCard">
									<a class="img_basket popup_cart" id="cart" onclick="fetchRecord()" data-toggle="modal" data-target="#shoppingCartModal"aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Your Cart</span>
										<div class="qty"><span class="cart-basket d-flex align-items-center justify-content-center" id="counter"></span></div>

									</a>

								</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->


        <header id="headex" >
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> +25418360109</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>

					</ul>
					<ul class="header-links pull-right">
						<li><a href="#"><i class="fa fa-map-marker"></i> 1224 Embu Kenya</a></li>
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">

                    <div class="headex-logo">
                        <a href="#" class="logo" style="">
                            <img style="height: 50px;padding-top:15px;" src="{{ asset('images/logo/logo1.png') }}" alt="E-shop">
                        </a>

                    </div>
                        <div class="header-ctn">

                            		<!-- Cart -->
								<div class="dropdown" id="divShoppingCard">
									<a class="img_basket popup_cart" id="cart" onclick="fetchRecord()" data-toggle="modal" data-target="#shoppingCartModal"aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Your Cart</span>
										<div class="qty"><span class="cart-basket d-flex align-items-center justify-content-center" id="countermobile"></span></div>

									</a>

								</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
                </div>

                </div>
                    <div class="row">
                        <div class="col">

                            <div class="header-search">
								<form action="/search" method="post">
									@csrf <!-- {{ csrf_field() }} -->
									<select class="input-select" name="categories">
										<option value="all">All Categories</option>
										@foreach ($categories as $cat )



										<option value="{!! $cat['name'] !!}">{!! $cat['name'] !!}</option>
										@endforeach
									</select>
								   <input class="input" type="search" name="product" placeholder="Search Names" id="searchbox">
									<button class="search-btn" type="submit">Search</button>
								</form>
                                <div id="popup" style="display: none;">
                                    <div id="backgroundOverlay"></div>
                                <div id="content">
                                   <!-- <input type="search" name="keyword" placeholder="Search Names" id="searchbox">
                                   -->
                                    <div id="results"></div>
                                 </div>
                                </div>
							</div>


                        </div>

                            </div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>



		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href="/">Home</a></li>
                        {{-- <li><a href="/adverts">Adverts</a></li> --}}
                        @foreach($product as $category => $categoryItems)


						<li><a href="/searchbycat/{{ $category }}">{{ $category }}</a></li>

						@endforeach

                        
					</ul>
                    <ul class="main-nav nav" style="float: right;">
                     
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account <b class="caret"></b></a>
                          <ul class="dropdown-menu" >
                @if (Auth::guard('userauth')->check())           
                            <li  style="padding:10px;"><a href="#">{{auth()->guard('userauth')->user()->first_name}} {{auth()->guard('userauth')->user()->last_name}}</a></li>
                            <li  style="padding:10px;"><a href="#">Profile</a></li>
                            <li  style="padding:10px;"><a href="#">Change Password</a></li>     
                            <li  style="padding:10px;"><a href="#">Wishlists</a></li>      
                            <li  style="padding:10px;"><a href="#">My Orders</a></li>    
                            <li  style="padding:10px;"><a href="/customer_signOut">Logout</a></li>              
         @else
                            <li  style="padding:10px;"><a href="/user_register">Sign Up</a></li>
                            <li  style="padding:10px;"><a href="/user_signIn">Sign In</a></li>
             @endif
                        
                          </ul>
                        </li>
                </ul>
         

   
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

@yield('content')


<!-- FOOTER -->
<footer id="footer">
    <!-- top footer -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">About Us</h3>
                        <p>E-shop is an online shop that you can buy goods and be delivered at your door step</p>
                        <ul class="footer-links">
                            <li><a href="#"><i class="fa fa-map-marker"></i>1224 Embu Kenya</a></li>
                            <li><a href="#"><i class="fa fa-phone"></i>+25471836009</a></li>
                            <li><a href="#"><i class="fa fa-envelope-o"></i>email@email.com</a></li>
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
                            <li><a href="/admin">admin</a></li>
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

<script>
$(function(){ 
         
            $("#searchbox").on('keyup', function () {
                console.log("ddd");
                var typingTimer;                //timer identifier
            var doneTypingInterval = 300;  //time in ms (5 seconds)

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
                console.log("ddd");
                $.ajax({
                    url: "/indexx",
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


$('ul.nav li.dropdown').hover(function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
}, function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
});
        </script>
</body>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/slick.min.js') }}"></script>
<script src="{{ asset('js/nouislider.min.js') }}"></script>
<script src="{{ asset('js/jquery.zoom.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}" ></script>

<script src="{{ asset('js/shop.js') }}" ></script>





<div  class="modal fade in" id="shoppingCartModal" tabindex="-1" role="dialog" aria-labelledby="shoppingCartModalTitle" aria-hidden="true">
<div class="modal-dialog " role="document" >
    <div class="modal-content cart-pop" >
        <div class="modal-header ">
            <div class="row text-center cart_modal_header">
                <h5 class="modal-title" id="shoppingCartModalTitle">Cart Items</h5>&nbsp;&nbsp;

            </div>
            &nbsp;&nbsp;
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

            <div class="table-responsive">

                <table class="table " id="modal_table">
                    <thead>
                        <tr>
                            <td class="t_head"></td>
                            <td class="t_head">Product</td>
                            <td class="t_head">Quantity</td>
                            <td class="t_head">Price</td>
                            <td class="t_head">Sub-Total</td>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <hr class=cart_divider>

            <div id = "product_total" style="padding-bottom: 10px;" class="col-sm-6 col-md-6 col-md-offset3 col-sn-offset-3 product_total">
               <strong id="total_price"> </strong>
             </div>
          </div>

          <div class="modal-footer row">
            <button id="continue_shopping" type="button" class="btn btn-success" data-dismiss="modal">Continue Shopping</button>
            <a href="/checkout" onclick=checkRecord()  type="button" class="btn btn-danger">Make Order</a>
          </div>


            </div>

    </div>
</div>



</html>


