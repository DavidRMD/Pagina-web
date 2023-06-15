<?php

include("conexion.php");

session_start();
$_SESSION['login']= false;

//decalarando varibales para recibir y guardar los datos enviados desde el formulario
$nickname = $_POST["nickname"];
$password = $_POST["contraseña"];


//Evaluamos el nickname ingresado
$consulta = "SELECT *
            FROM 'persona' 
            WHERE Nickname= '$nickname'";
$consulta = mysqli_query($conexion, $consulta); //Ejecutamos la consulta
$consulta = mysqli_fetch_array($consulta);



if($consulta){
    if(password_verify($password, $consulta['Password'])){
        $_SESSION[login]      = true;
        $_SESSION[nickname]   = $consulta['Nickname'];
        $_SESSION[nombre]     = $consulta['Nombre'];
        $_SESSION[apellidos]  = $consulta['Apellidos'];
        $_SESSION[edad]       = $consulta['Edad'];
        $_SESSION[descripcion]= $consulta['Descripcion'];
        $_SESSION[fotoPerfil] = $consulta['FotoPerfil'];

        header('Location: ../miPerfil.php');
    }
    else{
        echo"Contraseña Incorrecta";
        echo"<br><a href='../index.html'>Intentalo de Nuevo.</a></div>";
    }
}
else{
    echo"El usuario no existe";
    echo"<br><a href='../index.html'>Intentalo de Nuevo.</a></div>";
}

mysqli_close($conexion);

?>