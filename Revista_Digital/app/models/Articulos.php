<?php

class Articulos extends Eloquent
{
    protected $table = 'articulos';
    protected $fillable = array('fecha','autor','rut','rut_autorizador','estado','titulo','introduccion','articulo');
    public $timestamps=false;
    
    public function Categorias(){
        return $this->belongsTo('Categorias');
    }
    
}

