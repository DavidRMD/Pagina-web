<?php

    include("conexion.php");


    $nickname   = $_POST["nickname"];
    $nombre     = $_POST["nombre"];
    $apellidos  = $_POST["apellidos"];
    $edad       = $_POST["edad"];
    $descripcion= $_POST["descripcion"];
    $email      = $_POST["correo"];
    $password   = $_POST["contraseña"];


    $passwordHash   = password_hash($password, PASSWORD_BCRYPT);
    $fotoPerfil     = "img/$nickname/perfil.jpg";

    //Evaluamos si existe el nickname ingresado
    $consultaId= "SELECT NickName
                FROM persona
                WHERE NickName= '$nickname' ";
    $consultaId = mysqli_query($conexion, $consultaId);  //Devuelve un objeto con el resultado, dalse is hay error, true si se ejecuta
    $consultaId = mysqli_fetch_array($consultaId); // devuelve un array o NULL

    if(!$consultaId){//Si la consulta está vacia entonces significa que no existe el nickname, y creamos el nuevo usuario

         $sql="INSERT INTO persona VALUES ( '$nickname', '$nombre', '$apellidos', '$edad', '$descripcion', '$fotoPerfil', '$email', '$passwordHash')";
    
        if(mysqli_query($conexion, $sql)){

            mkdir("../img/$nickname");
            copy("../img/default.jpg", "../img/$nickname/perfil.jpg");

            echo"Tu cuenta ha sido creada";
            echo"<br> <a href='../index.html'>Iniciar Sesion</a></div>";
        }
        else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
        }
    }
    else{
        echo"El Nickname ya existe";
        echo"<a href='index.html'>Intentalo de nuevo.</a></div>";
    }

    mysqli_close($conexion);

?>