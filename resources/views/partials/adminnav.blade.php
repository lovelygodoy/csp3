 <nav class="navbar navbar-default navbar-static-top">
	  	<div class="container-fluid">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span> 
		      </button>

                   		<img src="{!! asset('image/logo.jpg') !!}" style="width:75px; height: 50px; margin:5px; border-radius: 50%;">
                   
		    </div>
		    
		    <div class="collapse navbar-collapse" id="myNavbar">

			    <ul class="nav navbar-nav navbar-right">
					
					@guest

			        <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="/admin/register">Register</a></li>

                    @else

			         
			       	<li><a href="/admin/dashboard">Dashboard</a></li>
			       	<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>

                        </ul>
                    </li>

                    @endguest
			    
			    </ul>
		    </div>
	  	</div>
	</nav>

