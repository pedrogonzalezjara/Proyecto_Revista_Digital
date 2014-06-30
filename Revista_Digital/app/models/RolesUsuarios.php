<?php

class RolesUsuarios extends Eloquent
{
    protected $table = 'roles_usuarios';
    protected $fillable = array('rol_fk','usuario_fk');
    public $timestamps=false;
    
    public function Usuarios(){
        return $this->belongsTo('Usuarios');
    }
    
    public function Roles(){
        return $this->belongsTo('Roles');
    }
    
}

