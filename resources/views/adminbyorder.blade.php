<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
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


        input[type=password], input[type=text] {
    border: 0!important;
    outline: 0!important;
    background: transparent!important;
    border-bottom: 1px solid #d3d3d3!important;
    box-shadow: none!important;
    padding-bottom: 0px!important;
    text-align: left;
    font-family: 'Open Sans', sans-serif;
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
                <div class="row" id="tab">
                    <div class="col" >
<h4>Search order</h4>   <br />
<form id="ajaxform" >
    @csrf <!-- {{ csrf_field() }} -->

    <div class="form-group">

        <label for="recipient-name" class="col-form-label">Enter Phonenumber:</label><br /> <br />

        <div class="form-inline">
            <input type="text" name="phone" id="phone" class="form-control" autofocus="" required  style="padding-right:20px;">

        <input type="submit" class="btn search btn-success padded-md font-md font-ubuntu " value="Search">

    </div> </div>


                </form>






                <script>

                    $(".search").click(function(event){
                        event.preventDefault();

                        let phone = $("input[name=phone]").val();

                        let _token   = $('meta[name="csrf-token"]').attr('content');

                        $.ajax({
                          url: "/api/search_order",
                          type:"POST",
                          data:{
                            phone:phone,
                            _token: _token
                          },
                          success:function(data){

                            $('tbody').html(data);
                            $("#ajaxform")[0].reset();
                          },
                         });
                    });
                  </script>


                </div>
            </div>
                <div class="row" style="padding:10px;">

                    <hr>






                </div>


                <div class="row" style="padding:10px;">

                    <table class="table" id="modal_table">
                        <thead>
                            <tr>
                                <td class="t_head"></td>
                                <td class="t_head">Product Name</td>
                                <td class="t_head">Phone number</td>
                                <td class="t_head">Order Number</td>
                                <td class="t_head">item count</td>
                                <td class="t_head">Total</td>
                                <td class="t_head">Actions</td>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>






                </div>









               </div>



        </div>




                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
                           </div>
                </div>


            <!-- .animated -->
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->


    <!-- /#right-panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>

    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script src="assets/js/init/weather-init.js"></script>
    <script type="text/javascript" src="{{ asset('js/weather-init.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="assets/js/init/fullcalendar-init.js"></script>
    <script type="text/javascript" src="{{ asset('js/fullcalendar-init.js') }}"></script>

    <!--Local Stuff-->


</body>
</html>

