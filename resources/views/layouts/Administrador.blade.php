
<!DOCTYPE HTML>
<html>
<head>
<title>TiendaUniformes</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript">
addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }
</script>
 <!-- Bootstrap Core CSS -->
 {!!Html::style('css/bootstrap.min.css')!!}
<!-- Custom CSS -->
 {!!Html::style('css/style.css')!!}
<!-- Graph CSS -->
 {!!Html::style('css/font-awesome.css')!!}
<!-- jQuery -->
<!-- lined-icons -->
 {!!Html::style('css/icon-font.min.css')!!}
<!-- //lined-icons -->
<!-- chart -->
 {!!Html::script('js/Chart.js')!!}
<!-- //chart -->
<!--animate-->
{!!Html::script('js/wow.min.js')!!}
{!!Html::style('css/animate.css')!!}
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
 <!-- Meters graphs -->
 {!!Html::script('js/jquery-1.10.2.min.js')!!}
<!-- Placed js at the end of the document so the pages load faster -->

</head>

 <body class="sticky-header left-side-collapsed"  onload="initMap()">
    <section>
    <!-- left side start-->
		<div class="left-side sticky-left-side">

			<!--logo and iconic logo start-->
			<div class="logo">
				<h1><a href="index.html">Tienda<span>Uniformes</span></a></h1>
			</div>
			<div class="logo-icon text-center">
				<a href="{{URL::to('/')}}"><i class="glyphicon glyphicon-home"></i> </a>
			</div>

			<!--logo and iconic logo end-->
			<div class="left-side-inner">

				@include('menus.adminmenu')
			</div>
		</div>
		<!-- left side end-->

		<!-- main content start-->
		<div class="main-content">
			<!-- header-starts -->
			<div class="header-section">

			<!--toggle button start-->
			<a class="toggle-btn  menu-collapsed"><i class="fa fa-bars"></i></a>
			<!--toggle button end-->

			<!--notification menu start -->
			<div class="menu-right">
				<div class="user-panel-top">
					<div class="col-md-8 ">
						<!--aqui se puede rellenar con informacion-->
						<span>Buscar</span>
						{{Form::text('Buscar',null,['class'=>'input-sm form-group','placeholder'=>'Buscar'])}}
					</div>
					<div class="clearfix"></div>
				</div>
			  </div>
			<!--notification menu end -->
			</div>
		<!-- //header-ends -->
			<div id="page-wrapper">

			   @yield('content')
				</div>
			<!--body wrapper start-->
			</div>
			 <!--body wrapper end-->

        <!--footer section start-->
			<footer>
			   <p>Universidad de Oriente</p>
			</footer>
        <!--footer section end-->

      <!-- main content end-->
   </section>

<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
</body>
</html>
