
<html>
    <head>

  	<title>Revista Digital</title>
        <meta charset="UTF-8">
        
        {{ HTML::style('css/style.css') }}
        {{ HTML::style('css/fx.slide.css') }}
        {{HTML::script('js/mootools-1.2-more.js')}}
        {{HTML::script('js/mootools-1.2-core-yc.js')}}
        {{HTML::script('js/fx.slide.js')}}
        
    </head>

<body>

	<div id="login">
		<div class="loginContent">
			
                        {{ Form::open(array('url' =>'login')) }}
                        {{ Form::select('rol', Roles::lists('rol', 'id'))}}
                        {{ Form::label('rut', 'Rut'); }}
                        {{ Form::text('rut'); }}
                        {{ Form::label('contrasena', 'Clave'); }} 
                        {{ Form::password('contrasena'); }}
                        {{ Form::submit('Ingresar'); }}
                        {{$errors->first("rut")}}
                        {{ Form::close() }}
				
                                
			<span>{{ Session::get('mensaje_login') }}</span>
                        
                        
			<div class="left">
            	</div>
			<div class="right">¿No es miembro? {{HTML::link("test/registro","Registrarse") }} </div>
		</div>
	</div> 

    <div id="container">
		<div id="top">

<div id="container">
   
    </div>
                   
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
    <div class="recent">
      @foreach($datos as $dato)
      <div class="o post"> <a href=""><img src="imagenes/_thumb.jpg" alt="" /></a>
        <h2>{{HTML::link("articulos/publicacion/".$dato->id,$dato->titulo)}}</a></h2>
        <p>{{$dato->introduccion}}</p>
        <div class="break"></div>
      </div>
       <hr>
      @endforeach
      
    </div>
   
 {{$datos->links()}}
  </div>
  <div id="sidebar">
    
    <div class="l">
        <div class="box">
            <h2>Buscar</h2>
            {{Form::open(array('method'=>'get','url'=>'/articulos/busqueda',"name"=>"form", 'files' => true))}}
            {{ Form::text('buscar') }}
             {{ Form::submit("Buscar") }}</br>
             {{ Form::close() }}
             
        </div>

    <div class="box">
        <h2>Busqueda por Categoria</h2>
        <ul>
            {{Form::open(array('method'=>'get','url'=>'/articulos/busqueda',"name"=>"form", 'files' => true))}}
             {{ Form::select('categoria', Categorias::lists('nombre', 'id'))}}
             {{ Form::submit("Buscar") }}</br>
             {{ Form::close() }}
          
        </ul>
      </div>

      
    </div>

    <div class="r">
        

    </div>

  </div>

</body>
</html>
