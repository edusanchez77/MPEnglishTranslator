<?php
    session_start();
    require_once("constantes.php");
    require_once("funcionesBD.php");

    date_default_timezone_set('America/Argentina/Cordoba');
    putenv("TZ=America/Argentina/Cordoba");

    if((isset($_POST['idAgencia'])) || (isset($_POST['idProyecto']))){
        $conexion = conexionBD(DATABASE['DNS'], DATABASE['USUARIO'], DATABASE['PASSWORD']);  
        
        switch($_POST['flag']){
            case 'add':
                $vProject = setProject($conexion, $_POST['idAgencia'], $_POST['fecha'], $_POST['nroProyecto'], $_POST['parIdiomas'], $_POST['cuenta'], $_POST['importe'], $_POST['deadLine'], $_POST['catTool']);
                break;
            
            case 'get':
                $vProject = getProject($conexion, $_POST['idAgencia'], $_POST['idProyecto']);
                break;

            case 'edit':
                $vProject = editProject($conexion, $_POST['idProyecto'], $_POST['fechaProyecto'], $_POST['nroProyecto'], $_POST['cuentaProyecto'], $_POST['idiomaProyecto'], $_POST['importeProyecto'], $_POST['cattoolProyecto'], $_POST['deadlineProyecto']);
                break;
        }
        

        if(isset($vProject)){
            switch($_POST['flag']){
                case 'add':
                    echo json_encode(array('error' => false));
                    break;
                
                case 'get':
                    echo json_encode(array('error' => false,
                                           'nroProyecto'        => $vProject[0]['pro_nro_proyecto'],
                                           'fechaProyecto'      => $vProject[0]['pro_fecha'],
                                           'cuentaProyecto'     => $vProject[0]['pro_cuenta'],
                                           'idiomaProyecto'     => $vProject[0]['pro_parIdiomas'],
                                           'importeProyecto'    => $vProject[0]['pro_importe'],
                                           'cattoolProyecto'    => $vProject[0]['pro_cattool'],
                                           'deadlineProyecto'   => $vProject[0]['pro_deadline']));
                    break;

                case 'edit':
                    echo json_encode(array('error' => false));
                    break;
            }
            
        }else{
            echo json_encode(array('error' => true));
        }
    }

?>