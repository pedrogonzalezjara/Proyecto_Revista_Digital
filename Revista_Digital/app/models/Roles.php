<?php

class Roles extends Eloquent
{
    protected $table = 'roles';
    protected $fillable = array('roles','descripcion');
    public $timestamps=false;
    
    public function RolesUsuarios() {
        return $this->hasMany('RolesUsuarios', 'rol_fk');
    }
    
}

