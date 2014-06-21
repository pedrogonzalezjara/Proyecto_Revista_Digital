e

echo (" <form method='GET' action='buscar.php'> 
<input type='text' autocomplete='off' placeholder='Escribe tu Busqueda...' name='search'> 
<input type='submit' value='BUSCAR!'>"); 
echo "<br>";


$busqueda=$_GET['busqueda'];  ///////busqueda/////////


/////////por fecha////////////

if($busqueda != ""
  { $a=mysql_query("ALTER table articulo drop fecha"); 
    $b=mysql_query("ALTER table articulo add fecha)"; 
    $sql=mysql_query("SELECT * FROM articulo WHERE fecha LIKE '%$busqueda%'"; 
    while($row=mysql_fetch_array($sql)){ 
      if($row['fecha']!=1)
        { 
              $s = $row['buscar']; 
              $ya=mysql_query("update articulo set fecha =1 where codigo =$s"; 

              echo (" * ".$row['nombre']."<hr><p>".$row['contenido']."</p><hr><br>"; 
        } 
  } 
  $sql=mysql_query("SELECT * FROM una_variable WHERE contenido LIKE '%$busqueda%'"; 
  
  while($row=mysql_fetch_array($sql))
  { 
        if($row['fecha']!=1)
        { 
           $s = $row['codigo']; 
          $ya=mysql_query("update tabla_a_buscar set fecha =1 where codigo=$s"; 
           echo (" * ".$row['nombre']."<hr><p>".$row['contenido']."</p><hr><br>"; 
        } 
  } 

  }
else 
  { 
             echo ("Busqueda de $search Incorrecta")
  }

/////////por titulo////////////

if($busqueda != ""
  { $a=mysql_query("ALTER table articulo drop titulo"); 
    $b=mysql_query("ALTER table articulo add titulo)"; 
    $sql=mysql_query("SELECT * FROM articulo WHERE fecha LIKE '%$busqueda%'"; 
    while($row=mysql_fetch_array($sql)){ 
      if($row['titulo']!=1)
        { 
              $s = $row['buscar']; 
              $ya=mysql_query("update articulo set titulo =1 where codigo =$s"; 

              echo (" * ".$row['nombre']."<hr><p>".$row['contenido']."</p><hr><br>"; 
        } 
  } 
  $sql=mysql_query("SELECT * FROM una_variable WHERE contenido LIKE '%$busqueda%'"; 
  
  while($row=mysql_fetch_array($sql))
  { 
        if($row['fecha']!=1)
        { 
           $s = $row['codigo']; 
          $ya=mysql_query("update tabla_a_buscar set fecha =1 where codigo=$s"; 
           echo (" * ".$row['nombre']."<hr><p>".$row['contenido']."</p><hr><br>"; 
        } 
  } 

  }
else 
  { 
             echo ("Busqueda de $search Incorrecta")
  }



///////////por autor///////////

if($busqueda != ""
  { $a=mysql_query("ALTER table articulo drop autor"); 
    $b=mysql_query("ALTER table articulo add autor)"; 
    $sql=mysql_query("SELECT * FROM articulo WHERE fecha LIKE '%$busqueda%'"; 
    while($row=mysql_fetch_array($sql)){ 
      if($row['autor']!=1)
        { 
              $s = $row['buscar']; 
              $ya=mysql_query("update articulo set autor =1 where codigo =$s"; 

              echo (" * ".$row['nombre']."<hr><p>".$row['contenido']."</p><hr><br>"; 
        } 
  } 
  $sql=mysql_query("SELECT * FROM una_variable WHERE contenido LIKE '%$busqueda%'"; 
  
  while($row=mysql_fetch_array($sql))
  { 
        if($row['fecha']!=1)
        { 
           $s = $row['codigo']; 
          $ya=mysql_query("update tabla_a_buscar set fecha =1 where codigo=$s"; 
           echo (" * ".$row['nombre']."<hr><p>".$row['contenido']."</p><hr><br>"; 
        } 
  } 

  }
else 
  { 
             echo ("Busqueda de $search Incorrecta")
  }
  
  
