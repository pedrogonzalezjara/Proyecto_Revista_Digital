<head>
  	<title>Revista Digital</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
        {{ HTML::style('css/style_post.css') }}
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
    
<div id="page-wrapper">
  <div id="content-wrapper" class="clearfix">
    
    <div id="left">
      <h2>{{$articulo->titulo}}</h2>
      <h4>{{$articulo->fecha}} </h4>
      <h5><p>{{$articulo->introduccion}}   </p></h5>
      
      <p>{{$articulo->articulo}}   </p>
      
      
    </div>
    
  </div>
</div>

</body>