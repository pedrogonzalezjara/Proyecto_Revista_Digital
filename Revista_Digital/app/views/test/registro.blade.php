<head>
  	<title>Revista Digital</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
        {{ HTML::style('css/style_registrarse.css') }}
        {{ HTML::style('css/fx.slide.css') }}

	

</head>
<body>
    <div>
            <center>
                {{HTML::image('imagenes/titulo1.png')}}
            </center> 
    </div>
    <div id="wrapper">
        <div id="header">
            <ul class="categories">
                <li><a href="{{ URL::to('/') }}">Home</a></li>
                <li><a href="{{ URL::to('/contacto') }}">Contacto</a></li>
                <li><a href="{{ URL::to('/faq') }}">FAQ</a></li>
            </ul>
            
        </div>
    </div>
    
    <div id="content">
    <!-- begin recent posts -->
        <div class="recent">
      <!-- begin perfil -->
            <div class="o post"> 
            <h1>Ingresar Datos</h1>
            {{ Form::open(array('method'=>'post','url' => 'test/registro')) }}
                <div class="campoLargo">
                    <div id="wwgrp_nombre" class="wwgrp">
                        <span id="wwlbl_nombre" class="wwlbl">
                            <label class="label" for="usuario">Tipo de usuario:</label>
                        </span>
                        <span id="wwctrl_nombre" class="wwctrl">
                            {{ Form::select('rol', Roles::lists('rol', 'id'))}}
                        <h5>Solo los docentes pueden registrarse como moderadores</h5>
                            </span>
                        
                    </div>
                    <div id="wwgrp_nombre" class="wwgrp">
                        <span id="wwlbl_nombre" class="wwlbl">
                            <label class="label" for="rut">Rut:</label>
                        </span>
                        <span id="wwctrl_nombre" class="wwctrl">
                              {{ Form::text('rut'); }}<h5>{{$errors->first('rut')}}</h5>
                              <h5>Ingrese su rut sin puntos ni guión</h5>
                        </span>
                    </div>
                    <div id="wwgrp_nombre" class="wwgrp">
                        <span id="wwlbl_nombre" class="wwlbl">
                            <label class="label" for="contra">Contraseña:</label>
                        </span>
                        <span id="wwctrl_nombre" class="wwctrl">
                          {{ Form::password('contrasena'); }}<h5>{{$errors->first('contrasena')}}</h5>
                        </span>
                    </div>
                    {{ Form::submit('Registrar'); }}
                    <h3><span>{{ Session::get('mensaje') }}</span></h3>
                </div>
             {{Form::close()}}
        
        
            <div class="break"></div>
            </div>
        </div>
    </div>

  
</body>
</html>
