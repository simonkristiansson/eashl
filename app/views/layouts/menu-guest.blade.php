<div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="../" class="navbar-brand">{{ Site::name() }}</a>
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

          </ul>

          <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="profile">Login<span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="profile">
                    <div class="container col-xs-12" style="width:300px;margin:10px;">
    
        {{ Form::open(array('url' => 'login', 'method' => 'post', 'class' => 'form-horizontal', 'auto-complete' => 'off'));}}
        
        <div class="form-group">
         
            {{ Form::text('email', Input::old('email'),
                array( 
                'class' => 'input square form-control',
                'placeholder' => 'email',))
            }}

        </div>
          
          <div class="form-group">
           

        {{ Form::password('password',
            array(
            'class' => 'input square form-control',
            'placeholder' => 'password'))
        }}       

          </div>

          <div class="form-group">

          {{ Form::submit('login', 
          array('class' => 'btn btn-primary btn-block')); }}
            </div>

    {{ Form::close(); }}

      </div>
              </ul>
              <li><a href="{{ URL::route('register') }}">Regster</a></li>
            </li>

          </ul>

        </div>
      </div>
    </div>




