<?php

class ArticulosController extends BaseController {

    protected $layout = 'layouts.master';
    
    public function getPublicacion($id=null)
    {
        $articulo = Articulos::find($id);
        return $this->layout->content = View::make('articulos.post',compact("articulo"));
    }
    
     public function getAdd($rut=null)
    {
        $perfil = Usuarios::where('rut','=',$rut)->first(array("rut")); 
        $autor = Estudiantes::where('rut','=',$rut)->first(array('nombres'));
        return $this->layout->content = View::make('articulos.add',compact("perfil","autor"));
    }
    
    
    public function get_busqueda($buscar=null){
		$p = Input::get('buscar');
                $datos = Articulos::where('titulo','LIKE' , $p)->orwhere('introduccion','LIKE',$p)->orwhere('articulo','LIKE',$p)->get();
		return View::make('articulos.busqueda', compact("datos"));
	}
        
        public function get_categoria($categoria=null){
		$n = Input::get('categoria');
                $datos = Articulos::where('categoria','=' , $n)->get();
		return View::make('articulos.busqueda', compact("datos"));
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
                "integer"=>"Ingrese solo Numeros",
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
               $n->categoria_fk = $inputs["categoria"];
               $n->titulo = $inputs["titulo"];
               $n->introduccion=$inputs["introduccion"];
               $n->articulo=$inputs["articulo"];
               $n->fecha=date("Y-m-d");
               $n->rut=$inputs["rut"];
               $n->rut_autorizador= 12345679;//defecto antes de que ingrese su rut el autorizador
               $n->estado= 0;//defecto 0, cuando sea aprobado se cambia por 1
               $n->autor= $inputs["autor"];
               $n->save();
               
               Session::flash('mensaje', 'su registro se ingresó correctamente');
               return Redirect::to('articulos/add');
        }
    }
    
    
    public function get_aprobar($rut = null) {
        $datos = Articulos::find($rut);
        $datos = Articulos::where("estado","=",0)->get();
        return $this->layout->content = View::make('articulos/aprobar', compact("datos"));
    }
    public function post_aprobar()
    {   
                $inputs=Input::All();
                $editar = Articulos::find($inputs['id']);
                $editar->rut_autorizador = $inputs['id'];
                $editar->estado=1;
                $editar->save();
                Session::flash('mensaje', 'su registro se actualizo correctamente');
                return Redirect::to('articulos/aprobar');
        }
        
        public function get_editar($id = null) {
        $datos = Articulos::find($id);
        return $this->layout->content = View::make('articulos/editar', compact("datos"));
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
                Session::flash('mensaje', 'su registro se actualizo correctamente');
                return Redirect::to('articulos/editar');
            }
        }
        
    public function getDelete($id = null) {
            $borrar = Articulos::find($id);
            $borrar->delete();
            return Redirect::to('inicio');
        }

    
}
    
    
 

 

 
