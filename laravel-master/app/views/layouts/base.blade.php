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

   $(document).ready(function () {

	   var menu = $('.navbar');
	   var origOffsetY = menu.offset().top;

	   function scroll() {
		   if ($(window).scrollTop() >= origOffsetY) {
			   $('.navbar').addClass('navbar-fixed-top');
			   $('.center').addClass('menu-padding');
		   } else {
			   $('.navbar').removeClass('navbar-fixed-top');
			   $('.center').removeClass('menu-padding');
		   }


	   }

	   document.onscroll = scroll;

   });
	</script>
</body>
</html>
