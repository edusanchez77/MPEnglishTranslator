<?php
    session_start();
    require_once("constantes.php");
    require_once("funcionesBD.php");

    date_default_timezone_set('America/Argentina/Cordoba');
    putenv("TZ=America/Argentina/Cordoba");

    if((isset($_POST['idAgencia'])) || (isset($_POST['idFacturacion']))){
        $conexion = conexionBD(DATABASE['DNS'], DATABASE['USUARIO'], DATABASE['PASSWORD']);  

        switch($_POST['flag']){
            case 'add':
                $newDate = date("Y-m-d", strtotime($_POST['fecha']));
                $vFacturacion = setFacturacion($conexion, $_POST['idAgencia'], $newDate, $_POST['importe']);
                break;

            case 'get':
                $vFacturacion = getFacturacion($conexion, $_POST['idAgencia'], $_POST['idFacturacion']);
                break;

            case 'edit':
                $newDate = date("Y-m-d", strtotime($_POST['fechaFacturacion']));
                $vFacturacion = editFacturacion($conexion, $_POST['idFacturacion'], $newDate, $_POST['importeFacturacion']);
                break;
        }
    }

    if($vFacturacion == true){
        switch($_POST['flag']){
            case 'add':
                echo json_encode(array('error' => false));
                break;

            case 'get':
                echo json_encode(array('error' => false,
                                        'fechaFacturacion'      => $vFacturacion[0]['fc_month'],
                                        'importeFacturacion'    => $vFacturacion[0]['fc_importe']));
                break;

            case 'edit':
                echo json_encode(array('error' => false));
                break;
        }
    }

?>