<?php

session_start();

$_SESSION = array();

        // Si se desea destruir la sesión completamente, borre también la cookie de sesión.
        // Nota: ¡Esto destruirá la sesión, y no la información de la sesión!
        /*if (ini_get ("session. use cookies")) {
        $params = session_get_cookie params ();
        setcookie (session_name(), " time 0 - 42000,
        $params ["path"], $params ["domain"],
        $params ["secure"], $params ["httponly"]
        );
        }*/

session_destroy();
header('Location: ../index.html');
?>