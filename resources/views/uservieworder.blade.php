
@extends('layouts.includes.index')

{{-- Page title --}}
@section('content')

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
            @stop
