<!--sidebar nav start-->
					<ul class="nav nav-pills nav-stacked custom-nav">
						<li class="active"><a href="usuario"><i class="glyphicon glyphicon-user"></i><span>
						Usuarios</span></a></li>
						<li class="active"><a href="{{URL::to('conductor')}}"><i class="glyphicon glyphicon-vehicle"></i><span>choferes</span></a></li>
						@if (Auth::check())
							<li class="active"><a href="{{URL::to('conductor')}}">{!!Auth::user()->id_privilegio!!}</span></a></li>
						@endif



					</ul>
				<!--sidebar nav end-->
