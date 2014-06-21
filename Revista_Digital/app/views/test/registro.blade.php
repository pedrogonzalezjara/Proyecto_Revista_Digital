



 
<h2>
  Registro
</h2>
<span>{{ Session::get('mensaje') }}</span>
 
{{ Form::open(array('method'=>'post','url' => 'test/registro')) }}
                                                                           
    {{ Form::label('rut', 'Rut'); }}
    {{ Form::text('rut'); }}{{$errors->first('rut')}}</br>
    {{ Form::label('contrasena ', 'Clave'); }} 
    {{ Form::password('contrasena'); }}{{$errors->first('contrasena')}}</br>
    {{ Form::submit('Registrar'); }}</br>
    (<a href="{{ URL::to('/test/newhtml') }}">Volver atrás</a>)
    
 
{{ Form::close() }}


