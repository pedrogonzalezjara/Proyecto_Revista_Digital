<h1>Agregar Articulo </h1>

  
    <div class="alert-box success">
        <h2>{{ Session::get('mensaje') }}</h2>
    </div>

   <?php
    echo Form::open(array('method'=>'post','url'=>'test/add',"name"=>"form", 'files' => true));
    ?>
    
    
<p>
   
            
            
            @foreach($datos as $dato)
            @if($dato->rut == $rut
            {{$dato->titulo}}
            <?php
            echo HTML::link("test/editar/" . $dato->id, 'Actualizar')
                    ?>
            <?php echo HTML::link('test/delete/' . $dato->id,'Eliminar') ?></br>
            @endif
            @endforeach
            
          
            
            
        
           
       
    
    
</p>
<?php echo HTML::link("test/add","Agregar Articulo") ?>
    </p>
    (<a href="{{ URL::to('logout') }}">Cerrar Sesion</a>)
     <?php
    echo Form::close();
    ?>
    
   



