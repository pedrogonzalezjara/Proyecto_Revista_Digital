<head>
  	<title>Revista Digital</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
        {{ HTML::style('css/style_publicar.css') }}
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
        <div class="recent">
            {{Form::open(array('method'=>'post_editar','url'=>'/articulos/editar/',"name"=>"form", 'files' => true))}}
            <form>
                <fieldset>
                    <legend>Publicación</legend>
                    <p>
                        Título: </br>     {{Form::text("titulo")}} {{$errors->first("titulo")}}
                    </p>
                    <p>
                        Introducción: </br>      {{Form::textarea("introduccion")}}
                    </p>
                    <p>
                        Articulo:  </br>          {{Form::textarea("articulo")}}
                    </p>
                    {{Form::hidden('id',$datos['id'])}}
                    {{Form::submit("Enviar")}}
                </fieldset>
            </form>
            
            
            {{Form::close()}}
            
            (<a href="{{ URL::to('inicio') }}">Volver atrás</a>)

            <h3><span>{{ Session::get('mensaje') }}</span></h3>
        </div>
        
    </div>
        
   

        

</body>
   


