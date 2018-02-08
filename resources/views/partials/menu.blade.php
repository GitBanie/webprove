<!-- Navigation -->
<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header page-scroll">
          <ul class="nav navbar-nav navbar-right">
              <li>
                  <a href="{{route('index')}}">Home</a>
              </li>
              <li>
                  <a href="{{route('stage')}}">Stage</a>
              </li>
              <li>
                  <a href="{{route('formation')}}">Formation</a>
              </li>
              <li>
                  <a href="{{route('contact')}}">Contact</a>
              </li>
          </ul>
        </div>
        @if(!Auth::check())
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{route('login')}}">Login</a>
                </li>
                <li>
                    <a href="{{route('register')}}">Register</a>
                </li>
            </ul>
        </div>

          @else
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                  <li>
                      <a href="{{route('post.index')}}">Dashboard</a>
                  </li>
                  <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                          {{ Auth::user()->name }} <span class="caret"></span>
                      </a>

                      <ul class="dropdown-menu">
                          <li>
                              <a style="color:black;" href="{{ route('logout') }}"
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
              </ul>
          </div>
        @endif
    </div>
    <!-- /.container -->
</nav>
