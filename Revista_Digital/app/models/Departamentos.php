<?php

class Departamentos extends Eloquent
{
    protected $table = 'departamentos';
    protected $fillable = array('facultad_fk','nombre','descripcion');
    public $timestamps=false;
    
    public function Escuelas() {
        return $this->hasMany('Escuelas', 'departamento_fk');
    }
    
    public function Facultad(){
        return $this->belongsTo('Facultad');
    }
    
}

