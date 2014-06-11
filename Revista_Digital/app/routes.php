<?php

Route::get('/', function()
{
	return View::make('hello');
});
Route::controller("/test","TestController");

Route::get('registro', function(){
    return View::make('registro'); 
});
  
Route::post('registro', function(){
 
    $input = Input::all();
   
        $reglas=array
            (
                'rut'=>'required|min:5|integer',
                'contrasena'=>'required|min:5'
            );
        $mensajes=array
            (
                "integer"=>"ingrese solo números",
                "required"=>"este campo es obligatorio",
                "min"=>"debe tener como minimo 5 caracteres"
            
            );
        $validar=Validator::make($input,$reglas,$mensajes);
        if($validar->fails())
        {
            return Redirect::back()->withErrors($validar);
        }
        else
        {
    $input['contrasena'] = Hash::make($input['contrasena']);
 
    Usuarios::create($input);
 
    return Redirect::to('registro')->with('mensaje_registro', 'Usuario Registrado');
        }
});
 Route::post('login', function(){
     $correo = Input::get('rut');
        $password = Input::get('contrasena');
     

     if(Auth::attempt(['rut' => $correo, 'contrasena' => $password])){
        return Redirect::to('inicio');
     }else{
        return Redirect::to('/test/newhtml')->with('mensaje_login', 'Ingreso invalido. ');
    
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
    
 
 

    
 
         
        
       
        
    





