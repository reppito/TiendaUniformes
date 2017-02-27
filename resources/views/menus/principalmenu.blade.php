<nav class="cl-effect-13" id="cl-effect-13">
					<ul class="res">
						<li><a href="{!! asset('/') !!}">principal <span class="glyphicon glyphicon-user"></span></a></li>
						<li><a href="about.html">nosotros <span class="	glyphicon glyphicon-phone-alt"></span><span></span></a></li>
						<li><a href="{{URL::to('usuario/ingresar')}}">Ingresar<span class="	glyphiconglyphicon-off"></a></li>
							@if (Auth::check())

								<li><a href="{{URL::to('logout')}}">Salir<span class="	glyphiconglyphicon-off"></a></li>
							@endif


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
