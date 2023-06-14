<?php
    //declarando variables para la conexión
    $servidor= "localhost";
    $usuario= "root";
    $pws= "";
    $BD= "redsocial";



    //Creando la conexion
    $conexion= mysqli_connect($servidor, $usuario, $pws, $BD);
    
    //Verificar la conexion
    if(!$conexion){
        echo"Fallo la conexioin <br>";
        die("Connection failed: " . mysqli_connect_error());
    }
    else{
        echo"conexion exitosa";
    }

?>