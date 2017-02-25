<nav class="cl-effect-13" id="cl-effect-13">
					<ul class="res">
						<li><a href="{!! asset('/') !!}">principal <span class="glyphicon glyphicon-user"></span></a></li>
						<li><a href="about.html">nosotros <span class="	glyphicon glyphicon-phone-alt"></span><span></span></a></li>
						<li><a href="{{URL::to('usuario/ingresar')}}">Prueba<span class="	glyphiconglyphicon-off"></a></li>
						<li><a href="{{URL::to('usuario/ingresar')}}">aqui<span class="	glyphiconglyphicon-off"></a></li>
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