<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Inventory Project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/resonsive.css') }}">
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
 @yield('content')

</body>
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
    $(".profilemenu").hide();
$(".membericon, .weltxt").click(function(){
   $(".profilemenu").slideToggle();
})
</script>
<script type="text/javascript">
    
    $(".forgetpass").click(function(){
        $(".forgetpass_box").show();
        $(".loginform").hide();
    })
    $(".login_txt").click(function(){
        $(".forgetpass_box").hide();
        $(".loginform").show();
    })
</script>



</body>
</html>
