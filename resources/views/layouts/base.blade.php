<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>RuedanDos | @yield('title')</title>
    <link rel="stylesheet" href="/css/app.css">
    <link href="https://fonts.googleapis.com/css?family=Catamaran" rel="stylesheet">
    <link rel="stylesheet" href="/css/estilos_terceros.css">
    <link rel="stylesheet" href="/css/main.css">
    
    <script src="https://use.fontawesome.com/1cf0ab8e3f.js"></script>
    
</head>
<body>


    
        <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle  collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
       
        <div class="row">
            <div class="col-md-4" style="padding-left:0">
                <ul class="nav navbar-nav">

                @if (Auth::guest())
       
                @else   
                                      
                    <li><a href="/historia/nueva">Nueva Historia </a></li>   
                                                  
                @endif

                </ul>   
            </div>

            <div class="col-md-4 text-center " style="background-color:#e67e22 ">
                
                <span ><a href="/" style="color:white;text-decoration:none" class="moto-ini"><div class="motot " style="font-size:1.33em !important">
                  <span class="dott">. </span><span class="dott">. </span><span class="dott">. </span><i class="fa fa-motorcycle" aria-hidden="true"></i><span class="dott"> .</span><span class="dott"> .</span><span class="dott"> .</span>
                </div></a></span>
            </div>


            <div class="col-md-4">
                
                <ul class="nav navbar-nav navbar-right">
        
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Ingreso</a></li>
                    <li><a href="{{ url('/register') }}">Registrate</a></li>
                @else   
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img  src="{{ asset('perfiles') }}/5717457807_677818249064512_8709846642394549447_n.jpg" alt="..." style="width:22px;height:22px"> {{ Auth::user()->name }}</a>
                      <ul class="dropdown-menu">
                        <li><a href="{{ url('/perfil') }}">Mi Perfil</a></li>
                        <!--<li><a href="{{ url('/home') }}">Mis Historias</a></li>-->
                        <li><a href="{{ url('/perfil/editar') }}">Editar Perfil</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Salir</a></li>
                      </ul>
                    </li>
                    
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>                                     
                @endif
            </ul>

            </div>

        </div>
       
      
      
      
    </div><!-- /.navbar-collapse -->
  </div>


</nav>

        
     <div class="container" style="margin-top:80px">  

            
            


            
       
        @yield('content')

        

        <hr>
        

        <footer>
            <div class="text-center">
                <div class="text-center">
                    <img src="{{ asset('img/logo-nazshware.png') }}" width="20px" height="20px" style="background-color: #fdfdfd;opacity: 0.4;">
                </div>
                 
                <small style="color: #afafaf;">&copy;Nazshware Copyrigth</small><br>
                <small style="color: #afafaf;"><a href="https://twitter.com/nazshware">@nazshware</a> - <span class="glyphicon glyphicon-envelope"></span> nazshware@gmail.com</small><br>
                <!--<small style="color: #afafaf;">Desarrollado por Jhon F. Medina Zapata</small>-->
            </div>
            <br>
            
        </footer>

    </div>
    
    
    <script src="/js/vue.js"></script>
    <script src="/js/app.js"></script>
    @yield('scripts')
    
</body>
</html>