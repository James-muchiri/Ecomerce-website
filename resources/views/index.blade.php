@extends('layouts.includes.index')

{{-- Page title --}}
@section('content')

		<!-- SECTION -->
		<div class="section" >
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">New Products</h3>





						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<!-- product -->
										@foreach ( $newproducts as $post)
										<div class="product">
											<div class="product-img">
												<img style="height: 150px;" src="{{ asset('product') }}/{{$post->photo}}" alt="">
												<div class="product-label">
												@php

												$dis =  $post['price'] - $post['original_price'];

												$discount = $dis/ $post['original_price'] *100;
												settype($discount,'integer');
												@endphp

													<span class="sale">{!! $discount !!}%</span>
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">


												<p class="product-category">{!! $post['category'] !!}</p>
												<h3 class="product-name"><a href="#">{!! $post['name'] !!}</a></h3>
												<h3 class="product-name"><a href="#">{!! $post['description'] !!}</a></h3>
												<h4 class="product-price">Ksh {!! $post['price'] !!} <del class="product-old-price">Ksh {!! $post['original_price'] !!}</del></h4>


											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn" onclick="postRecord('{!! $post['id'] !!}')"><i class="fa fa-shopping-cart" ></i> add to cart</button>
											</div>
										</div>
										<!-- /product -->

@endforeach






									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->


        @foreach($product as $category => $categoryItems)

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->



				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">{{ $category }}</h3>

						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-2">
										<!-- product -->
										@foreach ( $categoryItems as $post)



										<div class="product">
											<div class="product-img">
												<img style="height: 150px;" src="{{ asset('product') }}/{{$post->photo}}" alt="">
												<div class="product-label">
												@php

												$dis =  $post['price'] - $post['original_price'];

												$discount = $dis/ $post['original_price'] *100;
												settype($discount,'integer');
												@endphp


													<span class="new">{!! $discount !!}%</span>
												</div>
											</div>
											<div class="product-body">




												<p class="product-category">{!! $post['category'] !!}</p>
												<h3 class="product-name"><a href="#">{!! $post['name'] !!}</a></h3>
												<h3 class="product-name"><a href="#">{!! $post['description'] !!}</a></h3>
												<h4 class="product-price">Ksh {!! $post['price'] !!} <del class="product-old-price">Ksh {!! $post['original_price'] !!}</del></h4>


											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn" onclick="postRecord('{!! $post['id'] !!}')"><i class="fa fa-shopping-cart" ></i> add to cart</button>
											</div>
										</div>
										<!-- /product -->

@endforeach
										<!-- /product -->




									</div>

								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- /Products tab & slick -->
				</div>

				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
        @endforeach

		@stop
