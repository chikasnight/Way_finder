                    <nav id="menu">
						<ul class="links">
							<li><a href="{{url('/')}}">Home</a></li>

							@auth
							<li><a href="{{url('locations')}}" >+ Add Locations</a></li>
							@if (Auth::user()->usertype == '1')
							<li><a href="{{url('manage')}}" class="">Manage Locations</a></li>
							@endif
							<li><a href="{{url('logout')}}" class="button next">logout</a></li>
							@else
							<li><a href="{{url('login')}}" class="button success ">login</a></li>
							<li><a href="{{url('register')}}" class="button primary fit">Register</a></li>
							@endauth

						</ul>
						<ul class="actions stacked">
							<!--<li><a href="#" class="button fit">Log In</a></li> -->
						</ul>
					</nav>