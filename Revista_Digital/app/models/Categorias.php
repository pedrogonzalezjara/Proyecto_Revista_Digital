<?php

class Categorias extends Eloquent
{
    protected $table = 'categorias';
    protected $fillable = array('nombre','descripcion');
    public $timestamps=false;
    
    public function Articulos() {
        return $this->hasMany('Articulos', 'categoria_fk');
    }
    
    
}

