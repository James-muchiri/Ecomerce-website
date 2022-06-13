<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        
        
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
               
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
                margin-top: 20px;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
       
      

                <div class="row" style="padding:0px;"> 
                    <div class="col-lg-2" style="padding-top:5px;">
                        <a class="navbar-brand"  href="{{ url('/backend') }}" >
                            <img style="width: 150px; height:40px;" src="{{ asset('images/image.png') }}" alt="nexcom">
                    </a>
                    </div>
                    <div class="col-lg-3" style="padding-top:20px; margin-left:0px;">
               
                        <div class="row mb-3">                                 
                            <div class="col">                                           
                               
                                <input type="text" class="form-control"  name="town" placeholder="Search" aria-label="Your Name" aria-describedby="basic-addon1">
                          
                        </div>
                        </div>
                
                </div>
               
                <div class="col-lg-7">
                
                <div class="basket" id="divShoppingCard">
                <div id="shopping_cart_box">
                    <a href="" id="cart" onclick="fetchRecord()" class="img_basket popup_cart" data-toggle="modal" data-target="#shoppingCartModal"><i class="fa fa-shopping-cart" style="font-size:48px;color:#658cb6;"></i>
                        <span class="cart-basket d-flex align-items-center justify-content-center" id="counter"></span>
                    </a>
                </div>
                </div>
                </div>
                
                
                
                </div>
                <div>
                    <hr>
                </div>
                <div class="content">
    
                <div class="flex-center position-ref full-height">
          
                    <div class="row" id="viewfew">

  


                        <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
                                    <div class="MultiCarousel-inner">
                        
                        
                                     
                        
                        
                        
                                    @foreach($categoryItems as $post)
                                  
                                        
                                   
                                        <div class="item">
                                            <div class="pad15">
                                <img class="img-tec" src="{{ asset('product') }}/{{$post->file_path}}" alt="">
                                                    <p>Ksh {!! $post['price'] !!}</p>
                                                <p >{!! $post['description'] !!}</p>
                                                <p id="name">{!! $post['item'] !!}</p>
                                                @if (Auth::guard('tecshop_signIn')->check()) 
                            <button type="button"  class="btn btn-primary save" onclick="addwishlist('{!! $post->id !!}')"   style="color:white;" ><i class="fa fa-save fa-lg" aria-hidden="true"></i> save item</button>
                           @else  
                           <button type="button"  class="btn btn-primary save"   style="color:white;" ><i class="fa fa-save fa-lg" aria-hidden="true"></i> save item</button>
                           @endif
                           
                            <button type="button"  class="btn btn-primary add" onclick="postRecord('{!! $post->id !!}')" style="color:white;" ><i class="fa fa-shopping-cart"></i> add to cart</button>
                                            </div>
                                        </div>
                                     
                                        @endforeach
                        
                                    </div>
                                    <button class="btn btn-primary leftLst"><</button>
                                    <button class="btn btn-primary rightLst">></button>
                                </div>
                        
                        
                        </div>
                        <div class="row" style="padding:10px;">
                        
                            <hr>
                           
                        </div>



            </div>
        </div>



        
    </body>
</html>
