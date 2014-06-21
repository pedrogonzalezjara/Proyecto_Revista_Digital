


<html>
    <head>
        <meta charset="UTF-8">
        {{ HTML::style('css/estilos2.css') }}
        
        <title>Revista Digital</title>
    </head>
    <body>
        <div id="web">
            <header>
                <hgroup>
                    <h1>Revista Digital</h1>
                    <h2>Unidad Informatica UTEM</h2>
                    
                    
                    
                </hgroup>
                
            </header>
            <nav>
                <ul>
                    <li>Estudios</li>
                    <li>Investigaciones</li>
                    <li>Articulos</li>
                    <li>FAQ</li>
                    <li>Contacto</li>
                    
                </ul>
            </nav>
            
            <div id="main">
                
                <div id="contenido">
                    
                    
                    <section>
                        
                        
                        
                        <hr/>
                        @foreach($datos as $dato)
                        <article>
                             <header><h3>{{$dato->titulo}}</h3></header>
                             <div>
                                
                                                    
                                                    <li>
                                                    
                                                        {{$dato->introduccion}}</br>
                                                    
                                                
                                                
                                                <?php
                                                echo HTML::link("test/editar/" . $dato->id, 'Actualizar')
                                                ?>
                                                <?php echo HTML::link('test/delete/' . $dato->id,'Eliminar') ?>
                                                </li>
                                                
                                                
                                               
                            </div>
                            
                            <footer></footer>
                        </article>
                         @endforeach
                        Pagina Actual : <?php echo $datos->getCurrentPage();?>
                        <?php echo $datos->links();?>
                       
                    </section>
                    
                    
                   
                    
                    
                </div>
                 <aside>
                     
                     <section>
                         <h3>Iniciar Sesión</h3>
                         {{ Form::open(array('url' =>'login')) }}
    
                        {{ Form::label('rut', 'Rut'); }}<br/>
                        {{ Form::text('rut'); }}{{$errors->first("rut")}}
                        {{ Form::label('contrasena', 'Clave'); }} <br/>
                        {{ Form::password('contrasena'); }}{{$errors->first("contrasena")}}
                        {{ Form::submit('Ingresar'); }}
 
                        {{ Form::close() }}
                        <span>{{ Session::get('mensaje_login') }}</span>
                        
                        <?php echo HTML::link("test/registro","Registrarse") ?>
                        
                     </section>
                     <section>
                         <h3>Busqueda</h3><input type="text" name="busqueda">
                         <a href="">avanzada</a>
                     </section>
                     
                 </aside>
            </div>
            
            <footer>
                <span>Ingeniería de Software</span>
            </footer>
            
        </div>
        
        
    </body>
</html>
