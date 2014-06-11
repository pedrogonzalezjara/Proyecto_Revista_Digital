@extends('layouts.master')



 
<h2>
  Registro
</h2>
@if (Session::has('mensaje_registro'))
<span>{{ Session::get('mensaje_registro') }}</span>
@endif
 
{{ Form::open(array('url' => 'registro')) }}
    
    {{ Form::label('nombre', 'Nombre'); }}
    {{ Form::text('nombre'); }}{{$errors->first('nombre')}}</br>
    {{ Form::label('rut', 'Rut'); }}
    {{ Form::text('rut'); }}{{$errors->first('rut')}}</br>
    {{ Form::label('contrasena ', 'Clave'); }} 
    {{ Form::password('contrasena'); }}{{$errors->first('contrasena')}}</br>
    {{ Form::submit('Registrar'); }}</br>
    (<a href="{{ URL::to('/test/newhtml') }}">Volver atrás</a>)
    
 
{{ Form::close() }}


