<html>
    <head>
  	<title>Revista Digital</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
        {{ HTML::style('css/style_busq.css') }}
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
      <!-- begin post -->
      <h1>Resultados busqueda</h1>
      <div class="o post"> 
          @foreach($datos as $dato)
        <h2><a href="">{{HTML::link("articulos/publicacion/".$dato->id,$dato->titulo)}}</a></h2>
        <p>{{$dato->introduccion}}</p>
       @endforeach

        <div class="break"></div>
      </div>
     
      
      
   
  </div>




</body>
</html>