
<head>
  	<title>Revista Digital</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
        {{ HTML::style('css/style_usuario.css') }}
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
          {{Form::open(array('method'=>'post','url'=>'/articulos/add/',"name"=>"form", 'files' => true))}}
          @foreach($perfiles as $perfil)
            @foreach($carreras as $carrera)
                @if($perfil->rut == $rut)
                    @if($carrera->id == $perfil->carrera_fk)
                        <h1>Mi Perfil</h1>
                        <h3>Nombres:    {{$perfil->nombres}}</h3>
                        <h3>Apellidos:  {{$perfil->apellidos}}</h3>
                        <h3>Rut:        {{$perfil->rut}}</h3>
                        <h3>Fecha de nacimiento:  {{$perfil->fecha_nacimiento}}</h3>
                        <h3>E-mail:     {{$perfil->email}}</h3>
                        <h3>Carrera:    {{$carrera->nombre}}</h3>
                        <h3>Estado:     {{$perfil->estado}}</h3>
                        </br>
                    @endif
                @endif
            @endforeach
        @endforeach
        
        
       
        
        [<a>{{HTML::link("articulos/add/".$rut, 'Crear Nuevo Post',compact("rut"))}}</a>]
        {{Form::close()}}
        
        
        <div class="break"></div>
      </div>

      <div class="o post"><h1>Mis Post</h1></div>
      @foreach($datos as $dato)
            @if($dato->rut == $rut)
            <div class="e post"> 
            <a>{{HTML::link("articulos/publicacion/".$dato->id,$dato->titulo)}}</a>
            <p class="readmore">[ <a>{{HTML::link("articulos/editar/" . $dato->id, 'Actualizar')}}</a> ]
            [ <a>{{HTML::link('articulos/delete/' . $dato->id,'Eliminar')}}</a> ]</p>
            <div class="break"></div>
        
      </div>
            @endif
      @endforeach

    </div>
    <hr>
    <h3><a>{{HTML::link("logout","Cerrar Sesión")}}</a></h3>
    
  </div>
  
  
</body>
</html>





