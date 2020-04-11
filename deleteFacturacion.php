<?php
    session_start();
    require_once("constantes.php");
    require_once("funcionesBD.php");

    date_default_timezone_set('America/Argentina/Cordoba');
    putenv("TZ=America/Argentina/Cordoba");

    if(isset($_POST['idFacturacion'])){
        $conexion = conexionBD(DATABASE['DNS'], DATABASE['USUARIO'], DATABASE['PASSWORD']);  
        
        $deletedFacturacion = delFacturacion($conexion, $_POST['idFacturacion']);

        if(isset($deletedFacturacion)){
            echo json_encode(array('error' => false));
        }else{
            echo json_encode(array('error' => true));
        }
    }

?>