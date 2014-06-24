<h1>Editar Noticia </h1>

  
    <div class="alert-box success">
    </div>
    <h2>{{ Session::get('mensaje') }}</h2>
     {{Form::open(array('url' => 'test/editar/','method'=>'post'))}}
    
    <p>
Título:     {{Form::text("titulo")}} {{$errors->first("titulo")}}
    </p>
    <p>
Introducción:     {{Form::textarea("introduccion")}}{{$errors->first("introduccion")}}
    </p>
     <p>
Articulo:     {{Form::textarea("articulo")}}{{$errors->first("articulo")}}
    </p>
    <p>
    <hr />
    {{Form::hidden('id',$datos['id'])}}
    {{Form::submit("Enviar")}}
    </p>
    (<a href="{{ URL::to('/test/newhtml') }}">Salir</a>)
    <?php
    echo Form::close();
    ?>


