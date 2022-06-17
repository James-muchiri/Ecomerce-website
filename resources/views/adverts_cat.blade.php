<!doctype html>
<html class="" lang="zxx">

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
     <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
     <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
     <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

     <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
     <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

   <style>
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }
        hr{
            color: black;
        }
        #tab{
            background-color: #e6e4e4;

        }
        #tab p{
            text-align: center;
            padding-top: 13px;
            font-size: 14px;
            font-family: 'Courier New', Courier, monospace;
            font-weight: 600;

        }

    </style>
</head>

<body>
  @include('layouts/includes/sidebar')

    @include('layouts/includes/header')



        <!-- Content -->
        <div class="content">
            <!-- Animated -->

            <div class="col-sm-12">

                @if (Session::has('show.hide'))
  <div class="alert alert-success">
    {{ Session::get('show.hide') }}
  </div>
@endif
</div>

<h6 class="display-6">Categories</h6>
<div>
<hr>
</div>
<div>
<a style="margin: 19px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">New Category</a>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New category</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="/admin/post_cat" method="post">
            @csrf <!-- {{ csrf_field() }} -->
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Category Name:</label>
            <input type="text" class="form-control" id="recipient-name" name="name" required>
          </div>




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Category</button>
    </form>
      </div>
    </div>
  </div>
</div>


<!-- Edit categories -->

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="/admin/edit_category" method="post">
            @csrf <!-- {{ csrf_field() }} -->
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Category Name:</label>

          </div>
          <div class="form-group" id="cat">
          </div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Category</button>
    </form>
      </div>
    </div>
  </div>
</div>
<!-- Edit categories -->






</div>
<div class="table-responsive" >
<table class="table table-striped">
<thead>
<tr>
<th scope="col">#</th>
<th scope="col">Name</th>
<th scope="col">Is Hidden</th>
<th scope="col">action</th>
</tr>
</thead>
<tbody>
@php
$n = 0;
@endphp
@foreach ($categories as $category)
<tr>
<th scope="row"> {!! $n =$n +1 !!} </th>
<td>{!! $category['name'] !!}</td>
<td>{!! $category['is_hidden'] !!}</td>

<td>

<a href="/delete_cartegories/{!! $category['id'] !!}" class="btn btn-danger">Delete</a>
  <a style="margin: 19px;" type="button" onclick="fetchcat({!! $category['id'] !!})" class="btn btn-primary" data-toggle="modal" data-target="#editModal" data-whatever="@getbootstrap">Edit</a>
@if ( $category['is_hidden'] == 'yes')
<a href="/show_cartegories/{!! $category['id'] !!}" class="btn btn-success">Show</a>
@else
<a href="/hide_cartegories/{!! $category['id'] !!}" class="btn btn-success">Hide</a>
@endif

</td>
</tr>

@endforeach


</tbody>
</table>
</div>
        </div>


        @include('layouts.includes/footer')

<script>



function fetchcat(id){
    console.log("add by one");

    var catid = id;
    // console.log(dataId);


    let _token   = $('meta[name="csrf-token"]').attr('content');

$.ajax({
  url: "/api/fetchcat",
  type:"POST",
  data:{
    catid,
    _token: _token
  },

    success:
    function(data){

$('#cat').html(data);

},
    });
};



</script>

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


    <!-- /#right-panel -->

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

