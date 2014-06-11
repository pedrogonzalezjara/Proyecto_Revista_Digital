<!doctype html>
<html>
<head>
    <meta charset="UTF-8"/>
 
    <title>
        @section('titulo')
        título desde template
        @show
    </title>
    @yield('css')
    @yield('javascript')
   
</head>
    <body>
        <div id="header">encabezado del sitio web</div>
        <h1>Titulo desde el template</h1>
      <div id="contenido">
        @yield('content')
      </div>
        <div id="footer">
            aca va el footer
        </div>
      
      
     
    </body>
</html>