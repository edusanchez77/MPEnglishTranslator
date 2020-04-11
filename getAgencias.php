<?php

    require_once("constantes.php");
    require_once("funcionesBD.php");
    date_default_timezone_set('America/Argentina/Cordoba');

    if(isset($_POST['idAgencia'])){
        $vConexion = conexionBD(DATABASE['DNS'], DATABASE['USUARIO'], DATABASE['PASSWORD']);
        $vAgencia = getAgencia($vConexion, $_POST['idAgencia']);

        if($vAgencia == true){
            echo json_encode(array('error' => false,
                                   'nombreAgencia' => $vAgencia[0]['age_nombre'],
                                   'direccionAgencia' => $vAgencia[0]['age_direccion'],
                                   'telefonoAgencia' => $vAgencia[0]['age_telefono'],
                                   'mailAgencia' => $vAgencia[0]['age_email'],
                                   'periodoPagoAgencia' => $vAgencia[0]['age_periodoPago'],
                                   'palabraEnEsAgencia' => $vAgencia[0]['age_palabraEnEs'],
                                   'palabraEsEnAgencia' => $vAgencia[0]['age_palabraEsEn'],
                                   'horaEnEsAgencia' => $vAgencia[0]['age_horaEnEs'],
                                   'horaEsEnAgencia' => $vAgencia[0]['age_horaEsEn']
                                ));
        }else{
            echo json_encode(array('error' => true));
        }
    }

?>