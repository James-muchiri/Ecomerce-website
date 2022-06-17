<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
<style>
    #heads{
        font-weight: 800;
        font-size: 16px;
    }
    </style>

<body>

    @include('layouts/includes/sidebar')

      @include('layouts/includes/header')

          <!-- Content -->
          <div class="content">
              <!-- Animated -->
              <div class="col-sm-12">

                @if(session()->get('success'))
                  <div class="alert alert-success">
                    {{ session()->get('success') }}
                  </div>
                @endif
              </div>
              <p class="display-6">Admin / Pending Orders</p>
              <div>
           <hr>
                </div>
              <div>


















              </div>
              <input class="form-control mb-4" id="myInput" type="text" placeholder="Search..">
              <div class="table-responsive" >
              <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>

        <th scope="col">Full Name</th>
        <th scope="col">Phone Number</th>
        <th scope="col">Status</th>
        <th scope="col">action</th>
      </tr>
    </thead>
    <tbody id="myTable">

      @php
      $n = 0;
   @endphp
      @foreach ($orders as $order)
      <tr>
        <th scope="row"> {!! $n =$n +1 !!} </th>
       <td>{!! $order['names'] !!}</td>
        <td>{!! $order['phone_number'] !!}</td>
        <td>{!! $order['status'] !!}</td>



        <td>

            <a href="/aprove_order/{!! $order['id'] !!}" class="btn btn-success">Approve</a>
            <a href="/view_orderhistory/{!! $order['id'] !!}" class="btn btn-primary">View Order</a>
             

        </td>
      </tr>


      @endforeach


    </tbody>
  </table>
              </div>
          </div>

          <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                .
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">View order</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="/admin/edit_product" method="POST">
                    @csrf <!-- {{ csrf_field() }} -->
                <div class="modal-body" id="product">
                    <div class="row" id="heads" style="padding-top: 10px;">
    <div class="col-sm-3"> Full Names</div>
    <div class="col-sm-3">Total</div>
    <div class="col-sm-3"> Order Number</div>
    <div class="col-sm-3"> Phone Number</div>
</div>
<div class="row" style="padding-top: 10px;">
<div class="col-sm-3" id="names"> </div>
<div class="col-sm-3" id="total"> </div>
<div class="col-sm-3" id="ordernumber"> </div>
<div class="col-sm-3" id="phonenumber"> </div>
    </div>

<div class="row" style="padding-top: 10px;">
    <hr>
</div>
<div class="row" id="heads" style="padding-top: 10px;">
        <div class="col-sm-2">Status</div>
        <div class="col-sm-3">Location</div>
        <div class="col-sm-3">Mode </div>
        <div class="col-sm-2">Delivery </div>
        <div class="col-sm-2">Item  Count</div>
    </div>
    <div class="row" style="padding-top: 10px;">
<div class="col-sm-2" id="status"> </div>
<div class="col-sm-3" id="location"> </div>
<div class="col-sm-3" id="mode"> </div>
<div class="col-sm-2" id="delivery"> </div>
<div class="col-sm-2" id="itemcount"> </div>
</div>
<table  style="padding-top: 10px;" id="row">
</table>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </form>
                </div>
              </div>
            </div>
        </div>

          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">

          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
          <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>


</body>






    <!--Local Stuff-->



    <script>
        $(document).ready(function(){
          $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
        </script>
    <script>

        function fetchorders(id){
            console.log("add by one");

            var orderid = id;
            // console.log(dataId);


            let _token   = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
          url: "/api/fetchorder",
          type:"get",
          data:{
            orderid,
            _token: _token
          },

            success:
            function(data){

       
        $("#row").html("");
        var t_data="";
        $.each(data, function(index, element) {
            t_data=t_data+
                '<tr id="t_data">'+
                                        '<td>'+element.name+'</td>'+
                   
                    '<td>'+'Ksh '+element.price+'</td>'+
                    '<td>'+'Ksh '+element.price  * element.quantity+'</td>'+
                   
                '</tr>';




        });
        $('#names').text(data.orders.names);
        $('#total').text(data.total);
        $('#ordernumber').text(data.order_number);
        $('#phonenumber').text(data.phone_number);
        $('#mode').text(data.mode_of_delivery);
        $('#status').text(data.status);
        $('#location').text(data.location);
        $('#delivery').text(data.delivery_status);
        $('#itemcount').text(data.item_count);


        },
            });
        };





        function fetchRecord(){
    console.log("fetch record");

    $.ajax({
    type: 'get',
    url: '/api/fetchorder',
    dataType: 'json',
    success:
        function( data ){
               
            var t_data="";
            var total=0;
            var count=0;
            var item_id=[];
            $("#row").html("");
            $.each(data, function(index, element) {
              
                    '<td>'+'Ksh'+'</td>'+
                    
                   
               
                qty = element.quantity;
                price = element.price;
                prod = qty*price;
                total +=prod;
                qty = element.quantity;
                count+=qty;
                item_id=element.id;
                // console.log(item_id);
            });

            $("#names").html("Total Amount: Ksh "+qty);
            $("#modal_table tbody").append(t_data);
            $("#total_price_header").html('<h4>'+"Your Total Amount is : Ksh "+total+'</h4>');
            $("#form_amount").html('<input type="hidden" name="total" id="amount"  placeholder="" value='+total+' >');
            $("#item_count").html('<input type="hidden" name="item_count" id="item_count"  placeholder="" value='+count+' >');
            
        }
    });
};






            </script>


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

