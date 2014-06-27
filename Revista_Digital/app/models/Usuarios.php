<?php
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
 
Class Usuarios extends Eloquent implements UserInterface,RemindableInterface{
 
    protected $table = 'usuarios';
    protected $fillable = array('rut','contrasena','remember_token');//nombre', 'correo', 'password');
    public $timestamps=false;
    protected $hidden = array('contrasena');
    
    
 
    // este metodo se debe implementar por la interfaz
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }
    
    //este metodo se debe implementar por la interfaz
    // y sirve para obtener la clave al momento de validar el inicio de sesión 
    public function getAuthPassword()
    {
        return $this->contrasena;
    }


	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */

	/**
	 * Get the token value for the "remember me" session.
	 *
	 * @return string
	 */
	public function getRememberToken()
	{
		return $this->remember_token;
	}

	/**
	 * Set the token value for the "remember me" session.
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	/**
	 * Get the column name for the "remember me" token.
	 *
	 * @return string
	 */
	public function getRememberTokenName()
	{
		return 'remember_token';
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

}
