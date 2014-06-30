<?php

class Docentes extends Eloquent
{
    protected $table = 'docentes';
    protected $fillable = array('departamento_fk','nombres','apellidos','rut','fecha_nacimiento','genero','direccion');
    public $timestamps=false;
    
     public function Departamentos (){
        return $this->belongsTo('Departamentos');
    }
    
}

