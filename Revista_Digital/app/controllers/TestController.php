<?php

class TestController extends BaseController {

    protected $layout = 'layouts.master';
    
     public function getNewhtml()
    {
        $datos=Noticias::all();
        $datos=Noticias::paginate(3);
        return $this->layout->content = View::make('test.newhtml',compact("datos"));
    }
    public function getAdd()
    {
        $datos=Noticias::paginate(2);
        return $this->layout->content = View::make('test.add');
    }
    public function postAdd()
    {
        $inputs=Input::All();
        $reglas=array
            (
                'titulo'=>'required|min:5',
                'contenido'=>'required|min:5'
            
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
            $path='uploads/noticias';
            $file = Input::file('archivo');
            $archivo=$file->getClientOriginalName();
            $extension =$file->getClientOriginalExtension();
            $tamano=$file->getsize();
            $upload= $file->move($path, $archivo);
            if($upload)
            {
                $inputs=Input::All();
                $n= new Noticias;
               $n->titulo = $inputs["titulo"];
               $n->contenido=$inputs["contenido"];
               $n->seo_slug=$inputs["titulo"];
               $n->fecha=date("Y-m-d");
               $n->foto=$archivo;
               $n->save();
               Session::flash('mensaje', 'su registro se ingresó correctamente');
               return Redirect::to('test/add');
            }
            else
            {
               Session::flash('mensaje', 'no se pudo subir el archivo');
               return Redirect::to('test/add');
            }
        }
    
    }
    
 

    
    
}

 
