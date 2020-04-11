<?php

    require_once("constantes.php");
    require_once("funcionesBD.php");
    date_default_timezone_set('America/Argentina/Cordoba');

    if(isset($_POST['nombreAgencia'])){
        $vConexion = conexionBD(DATABASE['DNS'], DATABASE['USUARIO'], DATABASE['PASSWORD']);
        switch($_POST['flag']){
            case 'add':
                $vAgencia = setAgencia($vConexion, $_POST['nombreAgencia'], $_POST['dirAgencia'], $_POST['telAgencia'], $_POST['mailAgencia'], $_POST['periodoPago'], $_POST['tarifa1'], $_POST['tarifa2'], $_POST['tarifa3'], $_POST['tarifa4']);
                break;

            case 'edit':
                $vAgencia = updateAgencia($vConexion, $_POST['idAgencia'], $_POST['nombreAgencia'], $_POST['dirAgencia'], $_POST['telAgencia'], $_POST['mailAgencia'], $_POST['periodoPago'], $_POST['tarifa1'], $_POST['tarifa2'], $_POST['tarifa3'], $_POST['tarifa4']);
                break;
        }
        
        

        if($vAgencia == true){
            echo json_encode(array('error' => false,
                                   'agencia' => $_POST['nombreAgencia']));
        }else{
            echo json_encode(array('error' => true));
        }
    }

?>