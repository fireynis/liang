<!doctype html>
<html lang="en">
<head>
{{HTML::style('css/styles.css');}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Merriweather:900' rel='stylesheet' type='text/css'>
{{ HTML::script('js/bootstrap.min.js'); }}
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
	@yield('body')
	<script>
   $(document).ready(function(){
       $(window).bind('scroll', function() {
       var navHeight = $( window ).height() - 50;
             if ($(window).scrollTop() > 195) {
                 $('nav#scroll').addClass('navbar-fixed-top');
                 $("nav#holder").show();
             }
             else {
                 $('nav').removeClass('navbar-fixed-top');
                 $("nav#holder").hide();
             }
        });
    });
	</script>
</body>
</html>
