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
                    <h3 class="title">My Orders</h3>
                </div>
            </div>

            <div class="col-md-12">
        
                <div class="table-responsive" >
                <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
  
          <th scope="col">Full Name</th>
          <th scope="col">Phone Number</th>
          <th scope="col">Delivery Status</th>
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
          <td>{!! $order['delivery_status'] !!}</td>
  
  
  
          <td>
  
              
              <a href="/userview_orderhistory/{!! $order['id'] !!}" class="btn btn-primary">View Order</a>
  
          </td>
        </tr>
  
  
        @endforeach
      </tbody>
    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@stop
