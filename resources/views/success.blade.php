@extends('layouts.includes.index')

{{-- Page title --}}
@section('content')
@php
    $categories = \App\Categories::all();


@endphp
<style>
    .img-tec{
    height: 150px;
    width: 200px;
}
</style>
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-lg-12">
                            <h3 style="text-align:center;">Your order have been recieved </h3>



                <h3 style="text-align:center;">Order Number:


                      {{ session()->get('order-number') }}



                </h3>
            </div>

        </div>


        <div class="row">
            <div class="col-sm-5"></div>
            <div class="col-sm-2">
                <img class="img-tec" src="{{ asset('images/check.png') }}" alt="check">

            </div>
            <div class="col-sm-5"> </div>
        </div>
        <div class="row">

            <div class="col-lg-12">


                <h3 style="text-align:center;">You will be contacted shortly by our Customer Agent</h3>



            </div>

        </div>

        <div class="row">

</div></div>
    		@stop
