<h1>Agregar Articulo </h1>

  
    <div class="alert-box success">
        <h2>{{ Session::get('mensaje') }}</h2>
    </div>

    <?php
    echo Form::open(array('method'=>'post','url'=>'test/add',"name"=>"form", 'files' => true));
    ?>
    
    <p>
        Título: </br>     {{Form::text("titulo")}} {{$errors->first("titulo")}}
    </p>
    <p>
        Introducción: </br>      {{Form::textarea("introduccion")}}
    </p>
    <p>
        Articulo:  </br>          {{Form::textarea("articulo")}}
    </p>
        Rut: </br>     {{Form::text("rut")}} {{$errors->first("rut")}}

    
    <hr />
    {{Form::submit("Enviar")}}
    </p>
    (<a href="{{ URL::to('logout') }}">Cerrar Sesion</a>)
    <?php
    echo Form::close();
    ?>
   



