<nav class="navbar navbar-inverse" role="navigation">
    <div class="container-fluid">
        <!-- add header -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">{{config('site-c.Appname')}}</a>
        </div>
        <!-- add menu -->
        <div class="collapse navbar-collapse" id="navbar1">
            <ul class="nav navbar-nav">
                
                 <li class="{{ set_active('home') }}"><a href="{{ URL::route('home') }}">Home</a></li>
                <li class="{{ set_active('about') }}"><a href="{{ URL::route('about') }}">About</a></li>
                 <li class="{{ set_active('services') }}"><a href="{{ URL::route('services') }}">Services</a></li>
                <li class="{{ set_active('contact') }}"><a href="{{ URL::route('contact') }}">Contact Us</a></li>
                  <li class="{{ set_active('contact') }}"><a href={{ URL::route('loggedin') }}>Protected page </a></li>
                
                  <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{Auth::check() ? Auth::user()->name : 'Guest'}} <span class="caret"></span></a>
                        
                 @if (Auth::check())
                         <ul class="dropdown-menu" role="menu">                    
                                                      
       <li><a href={{ URL::route('applicants') }}>View Applicants </a></li>
                                
                                <li><a href={{ URL::route('userprofile',Auth::user()->name ) }}>My Profile</a></li>
                                <li><a href={{ URL::route('useredit',Auth::user()->id ) }}>Edit Profile</a></li>
                                
                               
                                <li><a href={{ url('/logout') }}> <span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                                <li><a href="#"><span class="glyphicon glyphicon-user"></span> {{Auth::user()->name }}</a></li>
                         </ul>
                @else
                        <ul class="dropdown-menu" role="menu">
                                                                                      
                             
    <li class="{{ set_active('/register') }}"><a href="{{ url('/register') }}"><span class="glyphicon glyphicon-user"></span> Register</a></li>
     <li class="{{ set_active('/login') }}"><a href="{{ url('/login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>


                        </ul>
                @endif
                        </li>
            </ul>

            <!-- add search form -->
            <form class="navbar-form navbar-right" role="search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search this site">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">
                        <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</nav>

