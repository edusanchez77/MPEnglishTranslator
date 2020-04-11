<?php
    session_start();
    require_once("constantes.php");
    require_once("funcionesBD.php");

    date_default_timezone_set('America/Argentina/Cordoba');
    putenv("TZ=America/Argentina/Cordoba");

    if(isset($_POST['idProyecto'])){
        $conexion = conexionBD(DATABASE['DNS'], DATABASE['USUARIO'], DATABASE['PASSWORD']);  
        
        $deletedProject = delProject($conexion, $_POST['idProyecto']);

        if(isset($deletedProject)){
            echo json_encode(array('error' => false));
        }else{
            echo json_encode(array('error' => true));
        }
    }

?>