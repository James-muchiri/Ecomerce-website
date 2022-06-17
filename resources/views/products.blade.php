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

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
</head>

<body>
  @include('layouts/includes/sidebar')

    @include('layouts/includes/header')



        <!-- Content -->
        <div class="content">
            <!-- Animated -->

            <!-- Animated -->
            <div class="col-sm-12">


                @if (Session::has('show.hide'))
   <div class="alert alert-info">{{ Session::get('show.hide') }}</div>
@endif
              </div>
              <h6 class="display-6">Admin / Produts</h6>
              <div>
           <hr>
                </div>
              <div>
                <a style="margin: 19px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">New Product</a>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="/store_product" method="POST" enctype="multipart/form-data">
                          @csrf <!-- {{ csrf_field() }} -->
                          <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Product Name:</label>
                            <input type="text" class="form-control" id="recipienname" name="name" required>
                          </div>
                          <div class="form-group">
                            <label for="message-text" class="col-form-label">Description:</label>
                            <textarea class="form-control" id="message-text" name="description" required></textarea>
                          </div>
                          <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Category:</label>
                            <select class="form-select form-control" name="category" aria-label="Default select example" required>
                              <option value="" selected>Category</option>

                              @foreach ($categories as $category)

                              <option value="{!! $category['name'] !!}">{!! $category['name'] !!}</option>
                                                           @endforeach


                      </select>
                          </div>
                          <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Price:</label>
                            <input type="text" class="form-control" id="recipient-name" name="price" required>
                          </div>
                          <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Original price:</label>
                            <input type="text" class="form-control" id="recipient-name" name="original_price" required>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Product image</label>
                            <input type="file" name="file" required>

                          </div>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Product</button>
                      </form>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <input class="form-control mb-4" id="myInput" type="text" placeholder="Search..">
              <div class="table-responsive" >
              <table  class="table table-bordered table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Photo</th>
        <th scope="col">Name</th>
        <th scope="col">description</th>
        <th scope="col">Category</th>
        <th scope="col">Price</th>
        <th scope="col">Original Price</th>
        <th scope="col">Is Hidden</th>
        <th scope="col">action</th>
      </tr>
    </thead>
    <tbody id="myTable">

      @php
      $n = 0;
   @endphp
      @foreach ($products as $product)
      <tr>
        <th scope="row"> {!! $n =$n +1 !!} </th>
        <td>  <img class="img-tec" style="height:60px; width:60px;" src="{{ asset('product') }}/{!! $product['photo'] !!}" alt="">  </td>
        <td>{!! $product['name'] !!}</td>
        <td>{!! $product['description'] !!}</td>
        <td>{!! $product['category_id'] !!}</td>
        <td>{!! $product['price'] !!}</td>
        <td>{!! $product['original_price'] !!}</td>

        <td>{!! $product['is_hidden'] !!}</td>


        <td>

            <a href="/delete_product/{!! $product['id'] !!}" class="btn btn-danger">Delete</a>
              <a style="margin: 19px;" onclick="fetchproduct({!! $product['id'] !!})"  type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal" data-whatever="@getbootstrap">Edit</a>

            @if ( $product['is_hidden'] == 'yes')
            <a href="/show_product/{!! $product['id'] !!}" class="btn btn-success">Show</a>
            @else
            <a href="/hide_product/{!! $product['id'] !!}" class="btn btn-success">Hide</a>
            @endif
        </td>
      </tr>


      @endforeach
    </tbody>
  </table>
              </div>
          </div>



          <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="/admin/edit_product" method="POST">
                    @csrf <!-- {{ csrf_field() }} -->
                <div class="modal-body" id="product">


                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save Product</button>
                </form>
                </div>
              </div>
            </div>
        </div>


        @include('layouts.includes/footer')

<script>


function fetchproduct(id){
      console.log("add by one");

      var catid = id;
      // console.log(dataId);


      let _token   = $('meta[name="csrf-token"]').attr('content');

  $.ajax({
    url: "/api/fetchproduct",
    type:"POST",
    data:{
      catid,
      _token: _token
    },

      success:
      function(data){

  $('#product').html(data);

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
    </script>

                            <script>
                          



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

