<!DOCTYPE HTML>
<html>
<head>
<title>Tienda Uniformes</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="css/style2.css" rel="stylesheet" type="text/css" media="all"/>
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--Google Fonts-->
<script src="js/jquery-1.11.0.min.js"></script>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->

</head>
<body>
<!--header start here-->
<div class="header">
	<div class="container">
	  <div class="header-main">
	     <div class="logo">
		    <h1><a href="index.html">Tienda Uniformes</a></h1>
		 </div>
		 <div class="top-nav">

		   	<nav class="cl-effect-13" id="cl-effect-13">
					<ul class="res">
						<li><a href="index.html">principal <span class="glyphicon glyphicon-user"></span></a></li>
						<li><a href="about.html">nosotros <span class="	glyphicon glyphicon-phone-alt"></span><span></span></a></li>
						<li><a href="#contact" class="scroll">login<span class="	glyphicon glyphicon-off"></span></a></li>
					</ul>
				</nav>
				<!-- script-for-menu -->
								 <script>
								   $( "span.menu" ).click(function() {
									 $( "ul.res" ).slideToggle( 300, function() {
									 // Animation complete.
									  });
									 });
								</script>
				<!-- /script-for-menu -->

		 </div>
	     <div class="clearfix"> </div>
	  </div>
	</div>
</div>
<!--header end here-->
<!--short codes start here-->

   @yield('content')
<!--get in touch start here-->
<div class="touch-wthree" id="contact">
	<div class="container">
		<div class="touch-wthree-main w3ls">
			<div class="touch-wthree-top">
				 <h3>Uniformes Escolares</h3>
				 <p>Empresa dedicada a la produccion, venta y distribucion de uniformes</p>
			</div>
			<div class="touch-wthree-bottom">
				<div class="col-md-5 touch-wthree-left">
					<h4>contactanos</h4>
					<ul>
				    	<li><span class="glyphicon glyphicon-map-marker" aria-hidden="true"> </span>Puerto La cruz</li>
				    	<li><span class="glyphicon glyphicon-map-marker" aria-hidden="true"> </span>Universidad de Oriente</li>
			        </ul>
			        <h5>telefonos</h5>
			        <ul>
				    	<li><span class="glyphicon glyphicon-earphone" aria-hidden="true"> </span>+5828127745</li>
				    	<li><span class="glyphicon glyphicon-phone" aria-hidden="true"> </span>+582818345</li>

			        </ul>
			        <h6>Email</h6>
			        <ul>
			           <li><span class="glyphicon glyphicon-envelope" aria-hidden="true"> </span><a href="mailto:prueba@udo.anz.ve">prueba@udo.anz.ve</a></li>
			        </ul>
				</div>
				<div class="col-md-7 touch-wthree-right">
					<form action="#" method="post">
						<input type="text" placeholder="Nombre" required="" name="Your Name">
						<input type="text" class="no-mar" placeholder="Telefono" name="Phone">
						<input type="text" placeholder="Mail" name="e-mail">
						<input type="text" class="no-mar" placeholder="Sitio Web" name="Website">
						<textarea name="Message" placeholder="deja tu mensaje"></textarea>
						<input type="submit" value="Submit">
					</form>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
</div>
<!--get in touch end here-->
<!--copy rights start here-->
<div class="copy-right w3l">
	<div class="container">
		 <div class="copy-rights-main">
		 		  <p>Universidad de Oriente </p>
    	 </div>
    </div>
</div>
<!--copy right end here-->
</body>
</html>
