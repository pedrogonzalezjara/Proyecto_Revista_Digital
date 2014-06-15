////////crear formulario///////// ( no sera necesario)

echo (" <form method='GET' action='buscar.php'> 
<input type='text' autocomplete='off' placeholder='Escribe tu Busqueda...' name='search'> 
<input type='submit' value='BUSCAR!'>"); 
echo "<br>";


$search=$_GET['search'];  ///////busqueda/////////

if($search != ""
  { $a=mysql_query("ALTER table tabla_a_buscar drop una_variable"; 
    $b=mysql_query("ALTER table tabla_a_buscar add la_misma_variable int(2)"; 
    $sql=mysql_query("SELECT * FROM nombre WHERE nombre LIKE '%$search%'"; 
    while($row=mysql_fetch_array($sql)){ 
      if($row['la_variable_del_principìo']!=1)
        { 
              $s = $row['codigo']; 
              $ya=mysql_query("update tabla_a_buscar set la_variable_del_principio =1 where codigo =$s"; 

              echo (" * ".$row['nombre']."<hr><p>".$row['contenido']."</p><hr><br>"; 
        } 
  } 
  $sql=mysql_query("SELECT * FROM una_variable WHERE contenido LIKE '%$search%'"; 
  
  while($row=mysql_fetch_array($sql))
  { 
        if($row['la_variable_del_principio']!=1)
        { 
           $s = $row['codigo']; 
          $ya=mysql_query("update tabla_a_buscar set la_variable_del_pricipio =1 where codigo=$s"; 
           echo (" * ".$row['nombre']."<hr><p>".$row['contenido']."</p><hr><br>"; 
        } 
  } 

  }
else 
  { 
             echo ("Busqueda de $search Incorrecta")
