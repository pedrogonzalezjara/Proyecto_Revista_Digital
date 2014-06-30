<?php

class Escuelas extends Eloquent
{
    protected $table = 'escuelas';
    protected $fillable = array('departamento_fk','nombres','descripcion');
    public $timestamps=false;
    
    public function Carreras() {
        return $this->hasMany('Carreras', 'escuela_fk');
    }
    
    public function Departamentos (){
        return $this->belongsTo('Departamentos');
    }
    
}

