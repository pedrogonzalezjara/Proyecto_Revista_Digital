<?php

class Facultades extends Eloquent
{
    protected $table = 'facultades';
    protected $fillable = array('nombre','descripcion');
    public $timestamps=false;
    
    public function Departamentos() {
        return $this->hasMany('Departamentos', 'facultad_fk');
    }
    
}

    
