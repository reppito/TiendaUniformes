<!--sidebar nav start-->
@if (Auth::check())
					<ul class="nav nav-pills nav-stacked custom-nav">
						<li class="active"><a href="usuario"><i class="glyphicon glyphicon-user"></i><span>
						Usuarios</span></a></li>
						<li class="active"><a href="{{URL::to('conductor')}}"><i class="glyphicon glyphicon-vehicle"></i><span>choferes</span></a></li>
						
							
						@endif



					</ul>
				<!--sidebar nav end-->
