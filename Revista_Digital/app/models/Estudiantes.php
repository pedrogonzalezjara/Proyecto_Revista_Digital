<?php

class Estudiantes extends Eloquent
{
    protected $table = 'estudiantes';
    protected $fillable = array('rut','nombres','apellidos','fecha_nacimiento','genero','email','estado','carrera_fk');
    public $timestamps=false;
    
    public function Carreras(){
        return $this->belongsTo('Carreras');
    }
    
}

