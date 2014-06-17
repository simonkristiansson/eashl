<div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="{{URL::route('home');}}" class="navbar-brand">{{ Site::name() }}</a>

          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
            <li><a href="{{ URL::route('home') }}">Start</a></li>

             <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="profile">Community <span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="profile">
                <li><a href="{{URL::route('tournament')}}">Tournaments</a></li>
                <li><a href="{{URL::route('team')}}">Teams</a></li>
                <li><a href="{{URL::route('player')}}">Players</a></li>
              </ul>
            </li>

           <li><a href="{{ URL::route('forum') }}">Forum</a></li>

          
          
          @if(Sentry::getUser()->hasAnyAccess(array('admin','moderator', 'writer')))
          <li><a href="{{ URL::route('admin') }}">Admin</a></li>
          


          @endif
          </ul>



          <ul class="nav navbar-nav navbar-right">

              <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="profile">
                <i class="fa fa-user fa-lg"></i>
                {{-- <span class="badge">27</span> --}}
                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu" aria-labelledby="profile">
                <li><a tabindex="-1" href="{{URL::route('user.myplayers')}}">My Player</a></li>
                <li><a tabindex="-1" href="{{URL::route('user.myteams')}}">My Team</a></li>

              </ul>
            </li>



              <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="profile">
                <i class="fa fa-comments fa-lg"></i>
                {{-- <span class="badge">27</span> --}}
                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu" aria-labelledby="profile">
                <li><a tabindex="-1" href="#">Settings</a></li>
                
              </ul>
            </li>

              <li class="dropdown">

              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="profile">
                <span class="badge">3</span>
                <i class="fa fa-envelope fa-lg"></i>
                <span class="caret"></span>
              </a>

              <ul class="dropdown-menu" aria-labelledby="profile">
                <li><a tabindex="-1" href="#">Settings</a></li>
                
              </ul>
            </li>




              <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="profile">{{ Sentry::getUser()->alias }} <span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="profile">
                <li><a tabindex="-1" href="#">Settings</a></li>
                <li class="divider"></li>
                <li><a tabindex="-1" href="{{ URL::route('logout') }}">Logout</a></li>
              </ul>
            </li>

          </ul>

        </div>
      </div>
    </div>




