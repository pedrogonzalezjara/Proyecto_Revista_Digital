<?php

Route::get('/', function()
{
	return View::make('hello');
});
Route::controller("/test","TestController");


 Route::post('login', function(){
        $input = Input::all();
        $correo = Input::get('rut');
        $password = Input::get('contrasena');
        $reglas=array
            (
                'rut'=>'required',
                'contrasena'=>'required'
            );
        $mensajes=array
            (
                "required"=>"este campo es obligatorio"
            
            );
            $validar=Validator::make($input,$reglas,$mensajes);
            if($validar->fails())
            {
                return Redirect::to('/test/newhtml')->withErrors($validar);
            }
            else
            {
                if(Auth::attempt(['rut' => $correo, 'contrasena' => $password])){
                return Redirect::to('inicio');
                }
                else{
                return Redirect::to('/test/newhtml')->with('mensaje_login', 'Ingreso invalido. ');
                }
            }
});
Route::group(array('before' => 'auth'), function()
{
    Route::get('inicio', function(){
        echo 'Bienvenido '. Auth::user()->rut . ', su Id es: '.Auth::user()->id ;
        
        return  View::make('test.add',compact('id'));
    });
});

    Route::get('logout', array('before' => 'auth', function()
    {
         if(Auth::check()){
         Session::flush();
      }
        return Redirect::to('/test/newhtml')->with('mensaje_login', 'Gracias por visitarnos!.');
    }));
    
 
 

    
 
         
        
       
        
    





