@extends('layouts.includes.index')

@section('content')
<style>

    /*  slider  */
    #slider {
        position: relative;
        overflow: hidden;
        margin: 4em;
        box-shadow: 0 6px 103px 0 rgba(0, 0, 0, .71);
        transition: transform .3s cubic-bezier(.175,.885,.32,1.275),-webkit-transform .3s cubic-bezier(.175,.885,.32,1.275);
    }
    #slider:hover {
        transform: scaleX(1.03) scaleY(1.03);
    }
    #slider ul {
        position: relative;
        margin: 0;
        padding: 0;
        list-style: none;
    }
    #slider ul li {
        position: relative;
        display: block;
        float: left;
        margin: 0;
        padding: 0;
        width: 1200px;
        height: 200px;
        background: #ccc;
        text-align: center;
        line-height: 300px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    
    /*  slider  */
    #slider2 {
        position: relative;
        overflow: hidden;
        margin: 4em;
        box-shadow: 0 6px 103px 0 rgba(0, 0, 0, .71);
        transition: transform .3s cubic-bezier(.175,.885,.32,1.275),-webkit-transform .3s cubic-bezier(.175,.885,.32,1.275);
    }
    #slider2:hover {
        transform: scaleX(1.03) scaleY(1.03);
    }
    #slider2 ul {
        position: relative;
        margin: 0;
        padding: 0;
        list-style: none;
    }
    #slider2 ul li {
        position: relative;
        display: block;
        float: left;
        margin: 0;
        padding: 0;
        width: 1200px;
        height: 200px;
        background: #ccc;
        text-align: center;
        line-height: 300px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .control_prev, .control_next {
        position: absolute;
        z-index: 999;
        display: flex;
        width: 10%;
        height: 90%;
        background: transparent;
        color: #fff;
        justify-content: center;
        align-items: center;
        text-decoration: none;
        font-weight: 600;
        font-size: 3em;
        opacity: 1;
        cursor: pointer;
        transition: all .2s ease-in-out;
    }
    .control_prev:hover, .control_next:hover {
        opacity: .8;
    }
    .control_prev {
        border-radius: 0 2px 2px 0;
    }
    .control_next {
        right: 0;
        border-radius: 2px 0 0 2px;
    }
    .slide1 img {
        width: 100%;
    }
    .slide2 img {
        width: 100%;
    }
    .slide3 img {
        width: 100%;
    }
    .slide4 img {
        width: 100%;
    }
    .slider-title-wrapper {
        width: 100%;
        height: 100%;
        position: absolute;
        background-color: rgba(0, 0, 0, .5);
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        line-height: 3.2em;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
    }
    .slider-title-h3 {
        margin: 0;
        color: #f5f5f5;
        display: block;
        font-size: 3em;
        font-weight: 900;
        line-height: 1em;
        letter-spacing: 0.1em;
        text-transform: uppercase;
    }
    .slider-subtitle {
        color: #bababa;
        font-size: 1.4em;
        margin: 0;
    }


    </style>

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->



			<div class="row">

	<!-- SEARCH BAR -->
    <div class="col-md-1">
    </div>
    <div class="col-md-10">
        <div class="header-search">
            <form action="/search" method="post">
                @csrf <!-- {{ csrf_field() }} -->
            
                <select class="input-select" name="categories">
                    <option value="all">Select Location</option>
                    @foreach ($categories as $cat )


                    <option value="{!! $cat['name'] !!}">{!! $cat['name'] !!}</option>
                    @endforeach
                </select>
               <input class="input" type="search" name="product" placeholder="Search For Adverts" >
                <button class="search-btn" type="submit">Search</button>
            </form>

        </div>
    </div>
    <!-- /SEARCH BAR -->
</div>
</div>
</div>
	<!-- /SECTION -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->



			<div class="row">

				<div id="slider">
					{{-- <p class="control_next"><i class="fas fa-angle-right"></i></p>
					<p class="control_prev"><i class="fas fa-angle-left"></i></p> --}}
					<ul>
						  <li class="slide1">
							  <div class="slider-title-wrapper">
								  <h3 class="slider-title"><span class="slider-title-h3">Slide 1</span>
						  <span class="slider-subtitle">This is the first slide</span></h3>
							  </div>
							  <img src="https://images.unsplash.com/photo-1560779937-740129433ace?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2133&q=80" alt="">
						  </li>
						  <li class="slide2">
							  <div class="slider-title-wrapper">
								  <h3 class="slider-title"><span class="slider-title-h3">Slide 2</span>
								  <span class="slider-subtitle">This is the second slide</span></h3>
							  </div>
							<img src="https://images.unsplash.com/photo-1508216310976-c518daae0cdc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1674&q=80" alt="">
					  </li>
						  <li class="slide3">
							  <div class="slider-title-wrapper">
								  <h3 class="slider-title"><span class="slider-title-h3">Slide 3</span>
								  <span class="slider-subtitle">This is the third slide</span></h3>
							  </div>
							  <img src="https://images.unsplash.com/photo-1588165231518-b4b22bfa0ddf?ixlib=rb-1.2.1&auto=format&fit=crop&w=2134&q=80" alt="">
						  </li>
						  <li class="slide4">
							  <div class="slider-title-wrapper">
								  <h3 class="slider-title"><span class="slider-title-h3">Slide 4</span>
								  <span class="slider-subtitle">This is the fourth slide</span></h3>
							  </div>
							<img src="https://images.unsplash.com/photo-1514846326710-096e4a8035e0?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2134&q=80" alt="">
						  </li>
					   </ul>
				  </div>
			</div>

			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->


	<!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->



            <div class="row">

                <div id="slider2">
                    {{-- <p class="control_next"><i class="fas fa-angle-right"></i></p>
                    <p class="control_prev"><i class="fas fa-angle-left"></i></p> --}}
                    <ul>
                          <li class="slide1">
                              <div class="slider-title-wrapper">
                                  <h3 class="slider-title"><span class="slider-title-h3">Slide 1</span>
                          <span class="slider-subtitle">This is the first slide</span></h3>
                              </div>
                              <img src="https://images.unsplash.com/photo-1560779937-740129433ace?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2133&q=80" alt="">
                          </li>
                          <li class="slide2">
                              <div class="slider-title-wrapper">
                                  <h3 class="slider-title"><span class="slider-title-h3">Slide 2</span>
                                  <span class="slider-subtitle">This is the second slide</span></h3>
                              </div>
                            <img src="https://images.unsplash.com/photo-1508216310976-c518daae0cdc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1674&q=80" alt="">
                      </li>
                          <li class="slide3">
                              <div class="slider-title-wrapper">
                                  <h3 class="slider-title"><span class="slider-title-h3">Slide 3</span>
                                  <span class="slider-subtitle">This is the third slide</span></h3>
                              </div>
                              <img src="https://images.unsplash.com/photo-1588165231518-b4b22bfa0ddf?ixlib=rb-1.2.1&auto=format&fit=crop&w=2134&q=80" alt="">
                          </li>
                          <li class="slide4">
                              <div class="slider-title-wrapper">
                                  <h3 class="slider-title"><span class="slider-title-h3">Slide 4</span>
                                  <span class="slider-subtitle">This is the fourth slide</span></h3>
                              </div>
                            <img src="https://images.unsplash.com/photo-1514846326710-096e4a8035e0?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2134&q=80" alt="">
                          </li>
                       </ul>
                  </div>
            </div>

            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <script>
        jQuery(document).ready(function ($) {

// This is for the auto sliding
setInterval(function () {
  moveRight();
  move2Right();
}, 3000);

//variables
var slideCount = $('#slider ul li').length;
var slideWidth = $('#slider ul li').width();
var slideHeight = $('#slider ul li').height();
var sliderUlWidth = slideCount * slideWidth;

$('#slider').css({ width: slideWidth, height: slideHeight });

$('#slider ul').css({ width: sliderUlWidth, marginLeft: - slideWidth });

$('#slider ul li:last-child').prependTo('#slider ul');

function moveLeft() {
  $('#slider ul').animate({
      left: + slideWidth
  }, 300, function () {
      $('#slider ul li:last-child').prependTo('#slider ul');
      $('#slider ul').css('left', '');
  });
};

function moveRight() {
  $('#slider ul').animate({
      left: - slideWidth
  }, 300, function () {
      $('#slider ul li:first-child').appendTo('#slider ul');
      $('#slider ul').css('left', '');
  });
};

$('.control_prev').click(function () {
  moveLeft();
});

$('.control_next').click(function () {
  moveRight();
});
// second slider


//variables
var slide2Count = $('#slider ul li').length;
var slide2Width = $('#slider ul li').width();
var slide2Height = $('#slider ul li').height();
var slider2UlWidth = slide2Count * slide2Width;

$('#slider2').css({ width: slide2Width, height: slide2Height });

$('#slider2 ul').css({ width: slider2UlWidth, marginLeft: - slide2Width });

$('#slider2 ul li:last-child').prependTo('#slider2 ul');

function moveLeft2() {
  $('#slider2 ul').animate({
      left: + slide2Width
  }, 300, function () {
      $('#slider2 ul li:last-child').prependTo('#slider2 ul');
      $('#slider2 ul').css('left', '');
  });
};

function move2Right() {
  $('#slider2 ul').animate({
      left: - slide2Width
  }, 300, function () {
      $('#slider2 ul li:first-child').appendTo('#slider2 ul');
      $('#slider2 ul').css('left', '');
  });
};

$('.control_prev').click(function () {
  move2Left();
});

$('.control_next').click(function () {
  move2Right();
});

});
    </script>
    		@stop
