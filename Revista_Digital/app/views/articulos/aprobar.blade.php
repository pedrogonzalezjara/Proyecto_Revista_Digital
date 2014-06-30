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
      <div class="o post"><h1>Post en cola</h1></div>
      @foreach($datos as $dato)
      <div class="e post"> 
        <a href="">{{HTML::link("articulos/publicacion/".$dato->id,$dato->titulo)}}</a>
        {{Form::open(array('method'=>'post','url'=>'/articulos/aprobar',"name"=>"form", 'files' => true))}}
        {{Form::hidden('id',$dato['id'])}}
        {{Form::hidden('rut',$dato['id'])}}
        {{Form::submit("Aceptar")}}
        <div class="break"></div>
      </div>
      @endforeach
     
    <!-- end recent posts -->
  </div>
  <!-- END content -->
  
  
</body>
</html>