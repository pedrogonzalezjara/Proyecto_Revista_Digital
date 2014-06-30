<?php

class Carreras extends Eloquent
{
    protected $table = 'carreras';
    protected $fillable = array('codigo','nombre','escuela_fk');
    public $timestamps=false;
    
    public function Escuelas (){
        return $this->belongsTo('Escuelas');
    }
    
     public function Estudiantes() {
        return $this->hasMany('Estudiantes', 'carrera_fk');
    }
    
}

