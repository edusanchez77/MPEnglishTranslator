<?php
    session_start();
    require_once("constantes.php");
    require_once("funcionesBD.php");

    date_default_timezone_set('America/Argentina/Cordoba');
    putenv("TZ=America/Argentina/Cordoba");

    if((isset($_POST['idProyecto'])) || (isset($_POST['idFacturacion']))){
        $conexion = conexionBD(DATABASE['DNS'], DATABASE['USUARIO'], DATABASE['PASSWORD']);  
        
        switch($_POST['flag']){
            case 'finish':
                $vProject = marcarProyecto($conexion, $_POST['idProyecto'], 'Y', null);
                break;
            
            case 'charged':
                $vProject = marcarProyecto($conexion, $_POST['idProyecto'], null, 'Y');
                break;

            case 'facturacion':
                $vProject = marcarFacturacion($conexion, $_POST['idFacturacion'], $_POST['check']);
        }
    }

    if(isset($vProject)){
        echo json_encode(array('error' => false));
    }

?>