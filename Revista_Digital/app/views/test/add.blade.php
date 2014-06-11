

<h1>Agregar Noticia </h1>

  
    <div class="alert-box success">
        <h2>{{ Session::get('mensaje') }}</h2>
    </div>

    <?php
    echo Form::open(array('method'=>'post','url'=>'test/add',"name"=>"form", 'files' => true));
    ?>
    
    <p>
Título:     {{Form::text("titulo")}} {{$errors->first("titulo")}}
    </p>
    <p>
Contenido:     {{Form::textarea("contenido")}}
    </p>
    <p>
Archivo:     {{Form::file("archivo")}}
    </p>
    <p>
    <hr />
    {{Form::submit("Enviar")}}
    </p>
    (<a href="{{ URL::to('logout') }}">Salir</a>)
    <?php
    echo Form::close();
    ?>
   



