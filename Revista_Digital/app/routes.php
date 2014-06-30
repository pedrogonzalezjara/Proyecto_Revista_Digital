<?php

Route::get('/', function()
{
        
        $datos=Articulos::where("estado","=",1)->paginate(3);
	return View::make('hello',compact("datos"));
});
Route::get('/contacto', function()
{
        
	return View::make('contacto',compact("datos"));
});
Route::get('/faq', function()
{
	return View::make('faq',compact("datos"));
});

Route::controller("/test","TestController");

Route::controller("/articulos","ArticulosController");

Route::get('login', function(){
    return View::make('login'); 
});

Route::post('login', function(){
     
        $input = Input::all();
        $reglas=array
            (
                'rut'=>'required|integer',
                'contrasena'=>'required'
            );
        $mensajes=array
            (
                "integer"=>"Ingrese solo Numeros",
                "required"=>"Uno de los Campos Esta Vacio"
            
            );
            $validar=Validator::make($input,$reglas,$mensajes);
            if($validar->fails())
                return Redirect::to('/')->withErrors($validar);
            else
            {
                 $user_data = array(
                     
                'rut' => Input::get('rut'),
                'contrasena' => Input::get('contrasena')
            );
             $rol = Input::get('rol');
            if($rol==1)
            {
                if(Auth::attempt($user_data))
                       return Redirect::to('inicio');       
                   else
                       return Redirect::to('/')->with('mensaje_login', 'Usuario o Contraseña Incorrectos. ');

            }
            else
            {
                if(Auth::attempt($user_data))
                       return Redirect::to('inicio2');       
                   else
                       return Redirect::to('/')->with('mensaje_login', 'Usuario o Contraseña Incorrectos. ');
               }
            }
                 
        
});

Route::get('inicio',array('before' => 'auth', function(){
        $rut = Auth::user()->rut;
        $perfiles = Estudiantes::all();
        $carreras = Carreras::all();
        $datos =    Articulos::all();
        return  View::make('/test/perfil',compact(array("datos","perfiles","rut","carreras")));
    }));
Route::get('inicio2',array('before' => 'auth', function(){
        $rut = Auth::user()->rut;
        $perfiles = Docentes::all();
        $departamentos = Departamentos::all();
        $datos =    Articulos::all();
        return  View::make('/test/admin',compact(array("datos","perfiles","rut","departamentos")));
    }));

Route::get('logout', function() {
    if (Auth::check()) {
        Auth::logout();
    }
    return Redirect::to('/')->with('mensaje_login', 'Gracias por visitarnos!.');
});

    

    
 
 

    
 
         
        
       
        
    





