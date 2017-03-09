<!--sidebar nav start-->
@if (Auth::check())
					<ul class="nav nav-pills nav-stacked custom-nav">
						<li><a href="usuario"><i class="glyphicon glyphicon-user"></i><span>
						Usuarios</span></a></li>
						
						<li><a href="solicitudes-envio"><span>Solicitudes de Envío</span></a></li>
						<li><a href="solicitudes-envio-aceptadas"><span>Solicitudes Aceptadas</span></a></li>
						<!--<li><a href="solicitudes-envio-rechazadas"><span>Solicitudes Negadas</span></a></li>-->
						<li><a href="rutas-transporte"><span>Rutas de Transporte</span></a></li>
						<li><a href="envios-entregados"><span>Envíos Entregados</span></a></li>	
						<!--<li><a href="envios-extraviados"><span>Envíos Extraviados</span></a></li>-->
						<!--<li><a href="envios-retornados"><span>Envíos Retornados</span></a></li>-->
							
						@endif



					</ul>
				<!--sidebar nav end-->
