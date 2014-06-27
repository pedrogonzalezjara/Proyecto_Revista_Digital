<?php

Route::get('/', function()
{
	return View::make('hello');
});
Route::controller("/test","TestController");

Route::get('login', function(){
    return View::make('login'); 
});
 Route::post('login', function(){
     
        $input = Input::all();
        $rut = Input::get('rut');
        $password = Input::get('contrasena');
        $reglas=array
            (
                'rut'=>'required|integer',
                'contrasena'=>'required'
            );
        $mensajes=array
            (
                "integer"=>"Ingrese solo Numeros",
                "required"=>"este campo es obligatorio"
            
            );
            $validar=Validator::make($input,$reglas,$mensajes);
            if($validar->fails())
            {
                return Redirect::to('/test/newhtml')->withErrors($validar);
            }
            else
            {
                if(Auth::attempt(['rut' => $rut, 'contrasena' => $password])){
                return Redirect::to('inicio');
     }          else{
                    return Redirect::to('/test/newhtml')->with('mensaje_login', 'Ingreso invalido. ');
                    }
            }
});
Route::group(array('before' => 'auth'), function()
{
    
    Route::get('inicio', function(){
        echo 'Bienvenido '. Auth::user()->rut . ', su Id es: '.Auth::user()->id ;
        $cuek = Auth::user()->rut;
        $datos =Articulos::all();
        return  View::make('/test/perfil',compact(array("datos","cuek")));
    });
});

    Route::get('logout', array('before' => 'auth', function()
    {
         if(Auth::check())
         Auth::logout();
        return Redirect::to('/test/newhtml')->with('mensaje_login', 'Gracias por visitarnos!.');
    }));

    
 
 

    
 
         
        
       
        
    





