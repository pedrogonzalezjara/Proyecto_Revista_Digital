<?php

class TestController extends BaseController {

    protected $layout = 'layouts.master';
    
    
     public function get_Perfil()
    {
        return $this->layout->content = View::make('test/perfil');
    }

    public function get_registro()
    {
        return $this->layout->content = View::make('test.registro');
    }

    public function post_registro()
    {
        $input = Input::all();
        $rut = Input::get('rut');
        $reglas=array
                (
                    'rut'=>'required|min:5|integer',
                    'contrasena'=>'required|min:5',
                    'rol'=>'required'
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
                $rol = Input::get('rol');
                if($rol == 1)
                {
                        $url = "https://146.83.181.139/saap-rest/api/fichaEstudiante/$rut";

                        $opciones = array(
                            'http' => array(
                                'header' => "Authorization: Basic " . base64_encode("11.111.111-1:745948b275f6212ee233f52679d4ba1ea87b0dac")
                            )
                        );
                        $contexto = stream_context_create($opciones);

                        $objeto = json_decode(file_get_contents($url, false, $contexto));
                        if (!empty($objeto)) {

                           $data =  new Estudiantes;
                           $data->rut=$rut;
                           $data->nombres=$objeto->nombres;
                           $data->apellidos=$objeto->apellidos;  
                           $data->fecha_nacimiento=$objeto->fechaNacimiento; 
                           if($objeto->genero=='M')
                               $genero=1;
                           else
                               $genero=0;
                           $data->genero=$genero;
                           $data->email=$objeto->email;
                           $data->estado=$objeto->estado;
                           $nombre = $objeto->nombreCarrera;
                           $perfil = Carreras::where('codigo','=',$objeto->codigoCarrera)->first(array("id")); 
                           $data->carrera_fk= $perfil['id'];
                           $data->estado=$objeto->estado;
                           $data->save();
                           $usuario = new Usuarios;
                           $usuario->rut=Input::get('rut');  
                           $contrasena = Hash::make($input['contrasena']);
                           $usuario->contrasena = $contrasena;
                           $usuario->remember_token = $contrasena;
                           $usuario->save();
                           $roles = new RolesUsuarios;
                           $roles->usuario_fk = $usuario->id;
                           $roles->rol_fk = 1;
                           $roles->save();
                           Session::flash('mensaje', 'Usuario Registrado');
                                   return Redirect::to('test/registro');                    
                        }
                        else 
                        {
                           $url = "https://146.83.181.139/saap-rest/api/docente/$rut";

                            $opciones = array(
                                'http' => array(
                                    'header' => "Authorization: Basic " . base64_encode("11.111.111-1:745948b275f6212ee233f52679d4ba1ea87b0dac")
                                )
                            );
                            $contexto = stream_context_create($opciones);

                            $objeto = json_decode(file_get_contents($url, false, $contexto));
                            if (!empty($objeto)) {

                               $data =  new Docentes;
                               $data->rut=$rut;
                               $data->nombres=$objeto->nombres;
                               $data->apellidos=$objeto->apellidos;  
                               $data->fecha_nacimiento=$objeto->fechaNacimiento; 
                               if($objeto->genero=='M')
                                   $genero=1;
                               else
                                   $genero=0;
                               $data->genero=$genero;
                               $data->direccion="comuna";
                               $perfil = Departamentos::where('nombre','=',$objeto->departamento['departamento'])->first(array("id"));  
                               $data->departamento_fk= $perfil;
                               $data->save();
                               $usuario = new Usuarios;
                               $usuario->rut=Input::get('rut');  
                               $contrasena = Hash::make($input['contrasena']);
                               $usuario->contrasena = $contrasena;
                               $usuario->remember_token = $contrasena;
                               $usuario->save();
                               $roles = new RolesUsuarios;
                               $roles->usuario_fk = $usuario->id;
                               $roles->rol_fk = 2;
                               $roles->save();
                               Session::flash('mensaje', 'Usuario Registrado');
                                       return Redirect::to('test/registro');   
                            }
                            else
                            {
                                Session::flash('mensaje', 'Su rut no se encuentra en la base de datos');
                                return Redirect::to('test/registro');
                               
                            }
                        }
                }
                if($rol == 2)
                { 
                           $url = "https://146.83.181.139/saap-rest/api/docente/$rut";

                        $opciones = array(
                            'http' => array(
                                'header' => "Authorization: Basic " . base64_encode("11.111.111-1:745948b275f6212ee233f52679d4ba1ea87b0dac")
                            )
                        );
                        $contexto = stream_context_create($opciones);

                        $objeto = json_decode(file_get_contents($url, false, $contexto));
                        if (!empty($objeto)) {

                               $data =  new Docentes;
                               $data->rut=$rut;
                               $data->nombres=$objeto->nombres;
                               $data->apellidos=$objeto->apellidos;  
                               $data->fecha_nacimiento=$objeto->fechaNacimiento; 
                               if($objeto->genero=='M')
                                   $genero=1;
                               else
                                   $genero=0;
                               $data->genero=$genero;
                                $data->direccion="prueba";
                               $perfil = Departamentos::where('nombre','=',$objeto->departamento['departamento'])->first(array("id")); 
                               $data->departamento_fk=$perfil;
                               $data->save();
                               $usuario = new Usuarios;
                               $usuario->rut=Input::get('rut');  
                               $contrasena = Hash::make($input['contrasena']);
                               $usuario->contrasena = $contrasena;
                               $usuario->remember_token = $contrasena;
                               $usuario->save();
                               $roles = new RolesUsuarios;
                               $roles->usuario_fk = $usuario->id;
                               $roles->rol_fk =2;
                               $roles->save();
                               Session::flash('mensaje', 'Usuario Registrado');
                                       return Redirect::to('test/registro');                   
                        }
                        else 
                            {
                        Session::flash('mensaje', 'Su rut no se encuentra en la base de datos');
                        return Redirect::to('test/registro');

                    }
                    
                }

                
                
        }
   
    }
}
    
    
 

 

 
