<?php

    require_once("constantes.php");
    require_once("funcionesBD.php");
    date_default_timezone_set('America/Argentina/Cordoba');

    if(isset($_POST['flag'])){
        $vConexion = conexionBD(DATABASE['DNS'], DATABASE['USUARIO'], DATABASE['PASSWORD']);
        
        switch($_POST['flag']){
            case 'login':
                $login = loginUser($vConexion, $_POST['password']);
                break;

            case 'logout':
                session_start();
                session_destroy();
                session_unset();
                unset($_SESSION);
                $login = true;
            break;
        }

        if($login == true){
            switch($_POST['flag']){
                case 'login':
                    //Definir variables de sesión
                    session_start();
                    $_SESSION["email"] = "palmierimaribel@gmail.com";
                    
                    $vMensaje = "Bienvenida Maribel";
                    break;
    
                case 'logout':
                    $vMensaje = "Sesión Cerrada";
                    break;
            }
            echo json_encode(array('error' => false,
                                   'mensaje' => $vMensaje));
            
        }else{
            echo json_encode(array('error' => true));
        }
    }

?>