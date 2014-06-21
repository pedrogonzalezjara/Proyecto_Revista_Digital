<?php

class TestController extends BaseController {

    protected $layout = 'layouts.master';
    
     public function getNewhtml()
    {
        $datos=Articulos::all();
        $datos=Articulos::paginate(3);
        return $this->layout->content = View::make('test.newhtml',compact("datos"));
    }
    public function getAdd()
    {
        return $this->layout->content = View::make('test.add');
    }
    public function postAdd()
    {
        $inputs=Input::All();
        $reglas=array
            (
                'titulo'=>'required|min:5',
                'introduccion'=>'required|min:5',
                'articulo'=>'required|min:5'
            
            );
        $mensajes=array
            (
                "required"=>"este campo es obligatorio",
                "min"=>"debe tener como minimo 5 caracteres"
            
            );
        $validar=Validator::make($inputs,$reglas,$mensajes);
        if($validar->fails())
        {
            return Redirect::back()->withErrors($validar);
        }
        else
        {
               $inputs=Input::All();
               $n= new Articulos;
               $n->titulo = $inputs["titulo"];
               $n->introduccion=$inputs["introduccion"];
               $n->articulo=$inputs["articulo"];
               $n->fecha=date("Y-m-d");
               $n->rut= 12345678;
               $n->rut_autorizador= 12345679;
               $n->estado= 1;
               $n->autor= 'prueba';
               $n->save();
               Session::flash('mensaje', 'su registro se ingresó correctamente');
               return Redirect::to('test/add');
        }
    }
    public function get_editar($id = null) {
        $datos = Articulos::find($id);
        return $this->layout->content = View::make('test/editar', compact("datos"));
    }
    public function post_editar()
    {
        $inputs=Input::All();
        $reglas=array
            (
                'titulo'=>'required|min:5',
                'introduccion'=>'required|min:5',
                'articulo'=>'required|min:5'
            
            );
        $mensajes=array
            (
                "required"=>"este campo es obligatorio",
                "min"=>"debe tener como minimo 5 caracteres"
            
            );
        $validar=Validator::make($inputs,$reglas,$mensajes);
        if($validar->fails())
        {
            return Redirect::back()->withErrors($validar);
        }
        else
        {
            $editar = Articulos::find($inputs['id']);
            $editar->titulo = $inputs["titulo"];
            $editar->introduccion=$inputs["introduccion"];
            $editar->articulo=$inputs["articulo"];
            $editar->save();
            Session::flash('mensaje', 'su registro se ingresó correctamente');
            return Redirect::to('test/editar');
        }
    }
    public function getDelete($id = null) {
        $borrar = Articulos::find($id);
        $borrar->delete();
        return Redirect::to('test/newhtml');
    }
    
    public function get_registro(){
    return $this->layout->content = View::make('test.registro');
    }

public function post_registro()
        {
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
            $usuario = new Usuarios;
        $usuario->rut=$input['rut'];       
    $usuario->contrasena = Hash::make($input['contrasena']);
    
    $usuario->save();
     
    Session::flash('mensaje', 'Usuario Registrado');
            return Redirect::to('test/registro');
 
        }
}
 public function post_login()
         {
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
                return Redirect::to('test/inicio');
                }
                else{
                return Redirect::to('/test/newhtml')->with('mensaje_login', 'Ingreso invalido. ');
                }
            }
         }
    public function get_inicio(){
        echo 'Bienvenido '. Auth::user()->rut . ', su Id es: '.Auth::user()->id ;
        
        return  View::make('test.add',compact('id'));
    }

    public function get_logout()
    {
         if(Auth::check()){
         Session::flush();
      }
        return Redirect::to('/test/newhtml')->with('mensaje_login', 'Gracias por visitarnos!.');
    }
        
    
}
    
    
 

 

 
