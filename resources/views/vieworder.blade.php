<!doctype html>
<html class="" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/icon.png') }}">
     <!-- bootstrap -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{ asset('css/sty.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cs-skin-elastic.css') }}">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

   <style>
   h5 , h6, h4{
       font-size: 24px;
       color: #9b9b9b;
   }
span{
    color:rgb(27, 27, 27);
}
    </style>
</head>

<body>
  @include('layouts/includes/sidebar')

    @include('layouts/includes/header')



        <!-- Content -->
        <div class="content">
            <!-- Animated -->

               <div class="container">
                <div class="row">
    
                    <div class="col-md-6" >
                        <div class="card tec_card mb-2 border-0">
                            <div class="card-body card_body">
                        <h5 >Order Number: {!! $posts['order_number'] !!}</h5><br>
                        <h5 >Purchased At: {!! $posts['updated_at'] !!}</h5><br>
                        <h5 >Full Name {{ ($posts->names) }}</h5>    <br>                   
        
                                <h5 class="card-title" style="">Phone Number {{ ($posts->phone_number) }}</h5><br>
                                    
                            </div> 
                        </div> 
                    </div> 
                    <div class="col-md-6" >
                        <div class="card tec_card mb-2 border-0">
                            <div class="card-body card_body">
                        <h5 >mode of delivery: <span>{!! $posts['mode_of_delivery'] !!}</span></h5><br>
                        <h5 >  Location: {!! $posts['location'] !!}</h5><br>
                        <h5 >Status: {{ ($posts->status) }}</h5>  <br>                     
                         <h5 class="card-title" style="">Delivery status: {{ ($posts->delivery_status) }}</h5><br>
                                    
                            </div> 
                        </div> 
                    </div> 
                </div> 
                        <div class="row" >
                            <h5> Items Purchased</h5>
                            <div class="table-responsive" >
                                                     <table class="table" id="invoice_tabl" border="0" cellspacing="0" cellpadding="0">
            <thead>
                <tr>   
                    <th class="text-left">No.</th>                          
                    <th class="text-left">PRODUCT</th>
                    <th class="text-left">ITEM</th>
                    <th class="text-left">QUANTITY</th>
                    <th class="text-left">PRICE</th>
                    <th class="text-left">SUB-TOTAL</th>
                </tr>
            </thead>
            <tbody>
                @php
                $cart_items = 0;
                $total = 0;
                $sub = 0;
                $cart_items=unserialize($posts->cart);
                $n=0;
                    
                @endphp
           
                @foreach($cart_items as $item)
                <tr>  
                    <td>  {!! $n =$n +1 !!}   </td>
                    <td>  <img class="img-tec" style="height:60px; width:60px;" src="{{ asset('product') }}/{!! $item['image'] !!}" alt="">  </td>
                     <td> {{$item['product']}}</td>
                     <td> {{$item['quantity']}}</td>
                     <td> {{$item['price']}}</td>
                   
                    @php
                    $price = $item['price'] * $item['quantity'] ;
                    $total= $total + $price;
                    
             
                
                @endphp  
                <td class="total">{!!  $price !!}</td> 
            </tr>
                @endforeach
                 
        
            </tbody>
            <tfoot>
              
                
                <tr>
                    <td colspan="2"></td>
                  
                  
                    <td colspan="2">GRAND TOTAL</td>
                    <td> Ksh {!!  $total !!}</td>
                </tr>
            </tfoot>
        </table>
                            </div>

               </div>
        </div>







                            <script>
                            $(document).ready(function(){
                              $("#myInput").on("keyup", function() {
                                var value = $(this).val().toLowerCase();
                                $("#myTable tr").filter(function() {
                                  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                });
                              });
                            });



                            $(document).ready(function() {
                $('#modal_table').DataTable( {
                    "pagingType": "full_numbers"
                } );
            } );
                            </script>



            <!-- .animated -->

        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->


    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>






    <!--Local Stuff-->
    <script>

$.noConflict();

jQuery(document).ready(function($) {




	// Counter Number
	$('.count').each(function () {
		$(this).prop('Counter',0).animate({
			Counter: $(this).text()
		}, {
			duration: 3000,
			easing: 'swing',
			step: function (now) {
				$(this).text(Math.ceil(now));
			}
		});
	});




	// Menu Trigger
	$('#menuToggle').on('click', function(event) {
		var windowWidth = $(window).width();
		if (windowWidth<1010) {
			$('body').removeClass('open');
			if (windowWidth<760){
				$('#left-panel').slideToggle();
			} else {
				$('#left-panel').toggleClass('open-menu');
			}
		} else {
			$('body').toggleClass('open');
			$('#left-panel').removeClass('open-menu');
		}

	});


	$(".menu-item-has-children.dropdown").each(function() {
		$(this).on('click', function() {
			var $temp_text = $(this).children('.dropdown-toggle').html();
			$(this).children('.sub-menu').prepend('<li class="subtitle">' + $temp_text + '</li>');
		});
	});


	// Load Resize
	$(window).on("load resize", function(event) {
		var windowWidth = $(window).width();
		if (windowWidth<1010) {
			$('body').addClass('small-device');
		} else {
			$('body').removeClass('small-device');
		}

	});


});





    setTimeout(function() {

        // Do something after 3 seconds
        // This can be direct code, or call to some other function

      $('#alert').hide();

       }, 3000);
    </script>

</body>
</html>


