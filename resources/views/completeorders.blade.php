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
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


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
              <h6 class="display-6">Admin / Complete Orders</h6>
              <div>
           <hr>
                </div>
              <div>


















              </div>
              <input class="form-control mb-4" id="myInput" type="text" placeholder="Search..">
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


            <a href="/view_orderhistory/{!! $order['id'] !!}" class="btn btn-primary">View Order</a>

        </td>
      </tr>


      @endforeach
    </tbody>
  </table>
          </div>









</body>
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

  function fetchorder(id){
      console.log("add by one");

      var orderid = id;
      // console.log(dataId);


      let _token   = $('meta[name="csrf-token"]').attr('content');

  $.ajax({
    url: "/api/fetchorder",
    type:"POST",
    data:{
      orderid,
      _token: _token
    },

      success:
      function(data){

  $('#product').html(data);

  },
      });
  };




  </script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>



    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>

    <script type="text/javascript" src="{{ asset('js/main1.js') }}"></script>

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

    $.noConflict();
    
    jQuery(document).ready(function($) {
    
        "use strict";
    
        [].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {
            new SelectFx(el);
        });
    
        jQuery('.selectpicker').selectpicker;
    
    
        
    
        $('.search-trigger').on('click', function(event) {
            event.preventDefault();
            event.stopPropagation();
            $('.search-trigger').parent('.header-left').addClass('open');
        });
    
        $('.search-close').on('click', function(event) {
            event.preventDefault();
            event.stopPropagation();
            $('.search-trigger').parent('.header-left').removeClass('open');
        });
    
        $('.equal-height').matchHeight({
            property: 'max-height'
        });
    
        // var chartsheight = $('.flotRealtime2').height();
        // $('.traffic-chart').css('height', chartsheight-122);
    
    
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
    
    
    
            jQuery(document).ready(function($) {
                "use strict";
    
                // Pie chart flotPie1
                var piedata = [
                    { label: "Desktop visits", data: [[1,32]], color: '#5c6bc0'},
                    { label: "Tab visits", data: [[1,33]], color: '#ef5350'},
                    { label: "Mobile visits", data: [[1,35]], color: '#66bb6a'}
                ];
    
                $.plot('#flotPie1', piedata, {
                    series: {
                        pie: {
                            show: true,
                            radius: 1,
                            innerRadius: 0.65,
                            label: {
                                show: true,
                                radius: 2/3,
                                threshold: 1
                            },
                            stroke: {
                                width: 0
                            }
                        }
                    },
                    grid: {
                        hoverable: true,
                        clickable: true
                    }
                });
                // Pie chart flotPie1  End
                // cellPaiChart
                var cellPaiChart = [
                    { label: "Direct Sell", data: [[1,65]], color: '#5b83de'},
                    { label: "Channel Sell", data: [[1,35]], color: '#00bfa5'}
                ];
                $.plot('#cellPaiChart', cellPaiChart, {
                    series: {
                        pie: {
                            show: true,
                            stroke: {
                                width: 0
                            }
                        }
                    },
                    legend: {
                        show: false
                    },grid: {
                        hoverable: true,
                        clickable: true
                    }
    
                });
                // cellPaiChart End
                // Line Chart  #flotLine5
                var newCust = [[0, 3], [1, 5], [2,4], [3, 7], [4, 9], [5, 3], [6, 6], [7, 4], [8, 10]];
    
                var plot = $.plot($('#flotLine5'),[{
                    data: newCust,
                    label: 'New Data Flow',
                    color: '#fff'
                }],
                {
                    series: {
                        lines: {
                            show: true,
                            lineColor: '#fff',
                            lineWidth: 2
                        },
                        points: {
                            show: true,
                            fill: true,
                            fillColor: "#ffffff",
                            symbol: "circle",
                            radius: 3
                        },
                        shadowSize: 0
                    },
                    points: {
                        show: true,
                    },
                    legend: {
                        show: false
                    },
                    grid: {
                        show: false
                    }
                });
                // Line Chart  #flotLine5 End
                // Traffic Chart using chartist
                if ($('#traffic-chart').length) {
                    var chart = new Chartist.Line('#traffic-chart', {
                      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                      series: [
                      [0, 18000, 35000,  25000,  22000,  0],
                      [0, 33000, 15000,  20000,  15000,  300],
                      [0, 15000, 28000,  15000,  30000,  5000]
                      ]
                  }, {
                      low: 0,
                      showArea: true,
                      showLine: false,
                      showPoint: false,
                      fullWidth: true,
                      axisX: {
                        showGrid: true
                    }
                });
    
                    chart.on('draw', function(data) {
                        if(data.type === 'line' || data.type === 'area') {
                            data.element.animate({
                                d: {
                                    begin: 2000 * data.index,
                                    dur: 2000,
                                    from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                                    to: data.path.clone().stringify(),
                                    easing: Chartist.Svg.Easing.easeOutQuint
                                }
                            });
                        }
                    });
                }
                // Traffic Chart using chartist End
                //Traffic chart chart-js
                if ($('#TrafficChart').length) {
                    var ctx = document.getElementById( "TrafficChart" );
                    ctx.height = 150;
                    var myChart = new Chart( ctx, {
                        type: 'line',
                        data: {
                            labels: [ "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul" ],
                            datasets: [
                            {
                                label: "Visit",
                                borderColor: "rgba(4, 73, 203,.09)",
                                borderWidth: "1",
                                backgroundColor: "rgba(4, 73, 203,.5)",
                                data: [ 0, 2900, 5000, 3300, 6000, 3250, 0 ]
                            },
                            {
                                label: "Bounce",
                                borderColor: "rgba(245, 23, 66, 0.9)",
                                borderWidth: "1",
                                backgroundColor: "rgba(245, 23, 66,.5)",
                                pointHighlightStroke: "rgba(245, 23, 66,.5)",
                                data: [ 0, 4200, 4500, 1600, 4200, 1500, 4000 ]
                            },
                            {
                                label: "Targeted",
                                borderColor: "rgba(40, 169, 46, 0.9)",
                                borderWidth: "1",
                                backgroundColor: "rgba(40, 169, 46, .5)",
                                pointHighlightStroke: "rgba(40, 169, 46,.5)",
                                data: [1000, 5200, 3600, 2600, 4200, 5300, 0 ]
                            }
                            ]
                        },
                        options: {
                            responsive: true,
                            tooltips: {
                                mode: 'index',
                                intersect: false
                            },
                            hover: {
                                mode: 'nearest',
                                intersect: true
                            }
    
                        }
                    } );
                }
                //Traffic chart chart-js  End
                // Bar Chart #flotBarChart
                $.plot("#flotBarChart", [{
                    data: [[0, 18], [2, 8], [4, 5], [6, 13],[8,5], [10,7],[12,4], [14,6],[16,15], [18, 9],[20,17], [22,7],[24,4], [26,9],[28,11]],
                    bars: {
                        show: true,
                        lineWidth: 0,
                        fillColor: '#ffffff8a'
                    }
                }], {
                    grid: {
                        show: false
                    }
                });
                // Bar Chart #flotBarChart End
            });
    
        setTimeout(function() {
    
            // Do something after 3 seconds
            // This can be direct code, or call to some other function
    
          $('#alert').hide();
    
           }, 3000);
        </script>
          