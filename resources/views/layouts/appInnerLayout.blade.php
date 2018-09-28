<!DOCTYPE html>
<html>
<head>
    <title>Inventory Project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">   
    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery-ui.css') }}">
     <script src="{{ asset('frontend/js/jquery-1.12.4.js') }}"></script>
     <script src="{{ asset('frontend/js/jquery-ui.js') }}"></script>     
     <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/resonsive.css') }}">
      <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css"/>
   <script>
  $( function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 500,
      values: [ 75, 300 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "Rs" + ui.values[ 0 ] + " - Rs" + ui.values[ 1 ] );
      }
    });
    $( "#amount" ).val( "Rs" + $( "#slider-range" ).slider( "values", 0 ) +
      " - Rs" + $( "#slider-range" ).slider( "values", 1 ) );
  } );
  </script>
    <!-- javascript -->
    <script src="{{ asset('frontend/owl.carousel.js') }}"></script>
</head>
<body>
    <div class="container wtbg">
        <div class="container"> 
            <div class="row">   
                <div class="col-md-12">
                    <div class="row">   
                    <div class="header">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-12"><div class="logoimg"><a href=""><img src="{{ asset('frontend/img/logo.png') }}"></a></div></div>
                            <div class="col-lg-6 col-md-3 col-sm-12">
                                <!--
                                <ul class="tablnk">
                                    <li><a href="">Flights</a></li>
                                    <li><a href="">Hotels</a></li>
                                    <li><a href="">Money Transfer</a></li>
                                    <li><a href="">Recharge</a></li>
                                    <li><a href="">Hotel</a></li>
                                    <li><a href="">Bus</a></li>
                                    <li><a href="">Payment</a></li>
                                </ul>
                            -->
                            </div>                      
                            <div class="col-md-4 text-right">                               
                                <div class="contact_lnk text-right"><a href="">Contact Us</a> <a href="">Bank Details</a></div>
                                <div class="welcomebox">
                                    <div class="weltxt"><label>Welcome {{ Auth::user()->name }}</label><span>JCT000001</span></div>
                                    <ul class="profilemenu">
                                        <li><a href="">Balance</a></li>
                                        <li><a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Sign out</a></li>                                    
                                    </ul>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                                <div class="logout"><a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><img src="{{ asset('frontend/img/logouticon.png') }}"></a></div>                         
                            </div>
                            
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mainmenu">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                <ul class="menu_link">
                      <li><a href="{{ URL::to('add_hotel') }}">Hotels</a>
                        <ul class="submenulink">
                            <li><a href="{{ URL::to('hotel_listing') }}">Hotel Listing</a></li>
                        </ul>
                    </li>
                      <li><a href="{{ URL::to('add_hotel_room') }}">Hotel Room</a>
                        <ul class="submenulink">
                            <li><a href="{{ URL::to('hotel_room_listing') }}">Hotel Room Listing</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            </div>      
        </div>
    </div>
    @yield('content')

    </div>
    
    <div class="bottomtxt">Copyright © justclickkaro  2002–2018. All rights reserved.</div>

<script>


   $( function() {
    $( "#datepicker3" ).datepicker();
  } );

   
  </script>
 
<script type="text/javascript">
    $(".submenu").hide();
    $(".dashbord h2").click(function(){
        $(".submenu").slideToggle();
    })
</script>
<script type="text/javascript">
    $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:3,
            nav:false
        },
        1000:{
            items:5,
            nav:true,
            loop:false
        }
    }
})
</script>

<script type="text/javascript">
    $(".profilemenu").hide();
$(".membericon, .weltxt").click(function(){
   $(".profilemenu").slideToggle();
})
</script>

<script type="text/javascript">
    $(".fairdetail, .flightdetail_info, .baggagebox_info").hide();
    $(".baggagebox").click(function(){
        $(".baggagebox_info").slideToggle();
        $(".flightdetail_info, .fairdetail ").hide();
    })

$(".otherinfo li:nth-child(1)").click(function(){
    $(".flightdetail_info").slideToggle();
    $(".baggagebox_info, .fairdetail").hide();
})
$(".otherinfo li:nth-child(2)").click(function(){
    $(".fairdetail").slideToggle();
    $(".baggagebox_info").hide();
    $(".flightdetail_info").hide();
})
</script>
<script type="text/javascript">
    $(".refinesearch").click(function(){
        $(".part").slideToggle();
        $(this).toggleClass("minusicon");
    })

</script>
<script type="text/javascript">
    $(".more_optn").hide();
    $(".adultbtn").click(function(){
        $(".more_optn").slideToggle(); 
    })
    $(".childbtn").click(function(){
        $(".more_optn1").slideToggle();
    })
    $(".infantbtn").click(function(){
        $(".more_optn2").slideToggle();
    })
</script>

<script type="text/javascript">
    $(".lefttabbing li a").click(function(){
        $(".rttabbing > div").hide();
  var linkbox = $(this).attr("rel");
 $("#" + linkbox).show();

    })
    $(".paymentoptnbox").hide();
    $(".paymentoptn").css("cursor","pointer");
    $(".paymentoptn").click(function(){
        $(".paymentoptnbox").slideToggle();
    })
</script>

</body>
</html>






