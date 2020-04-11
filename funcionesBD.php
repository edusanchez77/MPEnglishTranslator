<?php

/**
* Conexión a la BD
* @param string $pDns
* @param string $pUser
* @param string $pPassword
* @return object PDO
*/
function conexionBD($pDns, $pUser, $pPassword){
    $conexion = false;
    try {
        $conexion = new PDO($pDns, $pUser, $pPassword);
    }catch (PDOException $e) {
        writeLog(LOGS['CONNECTION'], 'errorConnection.log', 'a+', $e->getMessage());
        header('location: error.php?msg=ERROR_CONNECTION');
        die();
    }
    
    return $conexion;   
}

/**
 * Escribir log
 * @param string $pPath
 * @param string $pName
 * @param string $pMode
 * @param string $pMsg
 * @return void
 */
function writeLog($pPath, $pName, $pMode, $pMsg){
    $fecha = new DateTime();
    $fecha->setTimezone(new DateTimeZone('America/Argentina/Buenos_Aires'));
    $fechaFormateada = $fecha->format('Y-m-d H:i:s');

    $logFile = fopen($pPath.$pName, $pMode);
    $log = fwrite($logFile, '['.$fechaFormateada.'] DEBUG - '.$pMsg.PHP_EOL);
    fclose($logFile);
}


/**
 * Login User
 * @param objectPDO $pConexion
 * @param string $pPassword
 * @return bool
 */
function loginUser($pConexion, $pPassword){

    $vUser = false;
    $vPassword = sha1($pPassword); //mp34579548

    $select =  "SELECT 'Y' 
                FROM user 
                WHERE usr_email = 'palmierimaribel@gmail.com' 
                   AND usr_password = '$vPassword'";
    
    $query = $pConexion->prepare($select);
    $query->execute();

    if($query->rowCount() > 0){
        $vUser = true;
    }
    
    return $vUser;
}


/**
 * Cargo Agencias
 * @param PDOobject $pConexion
 * @param string $pNombreAgencia
 * @param string [$pDireccionAgencia]
 * @param int [$pTelefonoAgencia]
 * @param String [$pMailAgencia]
 * @param int $pPeriodoPago
 * @param float $pTarifa1
 * @param float $pTarifa2
 * @param float $pTarifa3
 * @param float $pTarifa4
 */
function setAgencia($pConexion, $pNombreAgencia, $pDireccionAgencia = null, $pTelefonoAgencia = null, $pMailAgencia = null, $pPeriodoPago, $pTarifa1, $pTarifa2, $pTarifa3, $pTarifa4){
    $vAgencia = false;

    $insert = "INSERT INTO agencia(age_nombre, age_direccion, age_telefono, age_email, age_periodoPago, age_palabraEnEs, age_palabraEsEn, age_horaEnEs, age_horaEsEn)
                      VALUES ('$pNombreAgencia', '$pDireccionAgencia', '$pTelefonoAgencia', '$pMailAgencia', '$pPeriodoPago', '$pTarifa1', '$pTarifa2', '$pTarifa3', '$pTarifa4')";
    
    $queryInsert = $pConexion->prepare($insert);
    $queryInsert->execute();

    if($queryInsert->rowCount() > 0){
        $vAgencia = true;
    }

    return $vAgencia;
}

/**
 * Obtengo Agencias
 * @param PDOobject $pConexion
 * @param int [$pIdAgencia]
 * @return array
 */
function getAgencia($pConexion, $pIdAgencia = null){
    $vAgencia = array();

    if(isset($pIdAgencia)){
        $select = "SELECT * FROM agencia WHERE age_id = $pIdAgencia";
    }else{
        $select = "SELECT * FROM agencia ORDER BY age_id ASC";
    }
    
    $querySelect = $pConexion->prepare($select);
    $querySelect->execute();

    if($querySelect->rowCount() > 0){
        while($row = $querySelect->fetch(PDO::FETCH_ASSOC)){
            $vAgencia[] = $row;
        }
    }

    return $vAgencia;
}



/**
 * Editar Agencias
 * @param PDOobject $pConexion
 * @param int $pIdAgencia
 * @param string $pNombreAgencia
 * @param string [$pDireccionAgencia]
 * @param int [$pTelefonoAgencia]
 * @param String [$pMailAgencia]
 * @param int $pPeriodoPago
 * @param float $pTarifa1
 * @param float $pTarifa2
 * @param float $pTarifa3
 * @param float $pTarifa4
 * @return bool
 */
function updateAgencia($pConexion, $pIdAgencia, $pNombreAgencia, $pDireccionAgencia, $pTelefonoAgencia, $pMailAgencia, $pPeriodoPago, $pTarifa1, $pTarifa2, $pTarifa3, $pTarifa4){
    $vAgencia = false;

    $update = "UPDATE agencia
               SET age_nombre = '$pNombreAgencia',
                   age_direccion = '$pDireccionAgencia',
                   age_telefono = $pTelefonoAgencia,
                   age_email = '$pMailAgencia',
                   age_periodoPago = $pPeriodoPago,
                   age_palabraEnEs = $pTarifa1,
                   age_palabraEsEn = $pTarifa2,
                   age_horaEnEs = $pTarifa3,
                   age_horaEsEn = $pTarifa4
               WHERE age_id = $pIdAgencia";

    $queryUpdate = $pConexion->prepare($update);
    $queryUpdate->execute();

    if($queryUpdate->rowCount() > 0){
        $vAgencia = true;
    }

    return $vAgencia;
}



/**
 * Obtengo contactos
 * @param PDOobject $pConexion
 * @param int $pIdAgencia
 * @param int [$pIdContacto]
 * @return array
 */
function getContacto($pConexion, $pIdAgencia, $pIdContacto = null){
    $vContacto = array();

    if(isset($pIdContacto)){
        $select =  "SELECT *
                    FROM contacto
                    WHERE con_id = $pIdContacto";
    }else {
        $select =  "SELECT *
                    FROM contacto
                    WHERE con_age_id = '$pIdAgencia'
                        AND con_deleted = 'N'";    
    }

    $querySelect = $pConexion->prepare($select);
    $querySelect->execute();

    if($querySelect->rowCount() > 0){
        while($row = $querySelect->fetch(PDO::FETCH_ASSOC)){
            $vContacto[] = $row;
        }
    }

    return $vContacto;
}


/**
 * Cargo Contacto
 * @param PDOobject $pConexion
 * @param int [$pIdContacto]
 * @param int $pIdAgencia
 * @param String $pNombreContacto
 * @param String $pPuestoContacto
 * @param String $pSkypeContacto
 * @param String $pTelefonoContacto
 * @param String $pFlag
 * @return bool
 */
function setContacto($pConexion, $pIdContacto = null, $pIdAgencia, $pNombreContacto, $pPuestoContacto, $pSkypeContacto, $pTelefonoContacto, $pFlag){
    $vContacto = false;

    if($pFlag == 'add'){
        $vConsulta = "INSERT INTO contacto(con_age_id, con_nombre, con_puesto, con_skype, con_telefono)
                            VALUES($pIdAgencia, '$pNombreContacto', '$pPuestoContacto', '$pSkypeContacto', '$pTelefonoContacto')";
    }elseif($pFlag == 'edit'){
        $vConsulta = "UPDATE contacto
                      SET con_nombre = '$pNombreContacto', 
                          con_puesto = '$pPuestoContacto', 
                          con_skype = '$pSkypeContacto', 
                          con_telefono = '$pTelefonoContacto'
                      WHERE con_id = $pIdContacto"; 
    }

    $query = $pConexion->prepare($vConsulta);
    $query->execute();

    if($query->rowCount() > 0){
        $vContacto = true;
    }

    return $vContacto;
}


/**
 * Elimino Contacto
 * @param PDOobject $pConexion
 * @param int $pIdContacto
 * @return bool
 */
function delContacto($pConexion, $pIdContacto){
    $vContacto = false;
    $fecha = new DateTime();
    $fecha->setTimezone(new DateTimeZone('America/Argentina/Buenos_Aires'));
    $fechaFormateada = $fecha->format('Y-m-d H:i:s');

    $delete =  "UPDATE contacto
                SET con_deleted = 'Y',
                    con_deleted_date = '$fechaFormateada'
                WHERE con_id = $pIdContacto";

    $queryUpdate = $pConexion->prepare($delete);
    $queryUpdate->execute();

    if($queryUpdate->rowCount() > 0){
        $vContacto = true;
    }

    return $vContacto;
}



/**
 * Cargo Proyectos
 * @param PDOobject $pConexion
 * @param int $pIdAgencia
 * @param date $pFecha
 * @param int $pNroProyecto
 * @param String $pParIdiomas
 * @param String $pCuenta
 * @param float $pImporte
 * @param dateTime $pDeadline
 * @param String $pCatTool
 * @return bool
 */
function setProject($pConexion, $pIdAgencia, $pFecha, $pNroProyecto, $pParIdiomas, $pCuenta, $pImporte, $pDeadline, $pCatTool){
    $vProject = false;

    $insert = "INSERT INTO proyecto(pro_age_id, pro_fecha, pro_nro_proyecto, pro_parIdiomas, pro_cuenta, pro_importe, pro_deadline, pro_cattool)
                      VALUES('$pIdAgencia', '$pFecha', '$pNroProyecto', '$pParIdiomas', '$pCuenta', '$pImporte', '$pDeadline', '$pCatTool')";

    $queryInsert = $pConexion->prepare($insert);
    $queryInsert->execute();

    if($queryInsert->rowCount() > 0){
        $vProject = true;
    }

    return $vProject;
}


/**
 * Obtengo Proyectos
 * @param PDOobject $pConexion
 * @param int $pIdAgencia
 * @param int [$pIdProyecto]
 * @return array
 */
function getProject($pConexion, $pIdAgencia, $pIdProyecto = null){
    $vProject = array();

    if(isset($pIdProyecto)){
        $select =  "SELECT *
                    FROM proyecto
                    WHERE pro_id = $pIdProyecto"; 
    }else{
        $select =  "SELECT *
                    FROM proyecto
                    WHERE pro_age_id = $pIdAgencia
                        AND pro_deleted = 'N'
                    ORDER BY pro_fecha ASC";
    }
    

    $querySelect = $pConexion->prepare($select);
    $querySelect->execute();

    if($querySelect->rowCount() > 0){
        while($row = $querySelect->fetch(PDO::FETCH_ASSOC)){
            $vProject[] = $row;
        }
    }

    return $vProject;
}


/**
 * Editar Proyectos
 * @param PDOobject $pConexion
 * @param int $pIdProyecto
 * @param date $pFechaProyecto
 * @param int $pNroProyecto
 * @param String $pCuentaProyecto
 * @param String $pIdiomaProyecto
 * @param float $pImporteProyecto
 * @param String $pCattoolProyecto
 * @param date $pDeadlineProyecto
 * @return bool
 */
function editProject($pConexion, $pIdProyecto, $pFechaProyecto, $pNroProyecto, $pCuentaProyecto, $pIdiomaProyecto, $pImporteProyecto, $pCattoolProyecto, $pDeadlineProyecto){
    $vUpdProject = false;

    $update =  "UPDATE proyecto
                SET pro_fecha = '$pFechaProyecto',
                    pro_nro_proyecto = $pNroProyecto,
                    pro_parIdiomas = '$pIdiomaProyecto',
                    pro_cuenta = '$pCuentaProyecto',
                    pro_importe = $pImporteProyecto,
                    pro_deadline = '$pDeadlineProyecto',
                    pro_cattool = '$pCattoolProyecto'
                WHERE pro_id = $pIdProyecto";

    $queryUpdate = $pConexion->prepare($update);
    $queryUpdate->execute();

    if($queryUpdate->rowCount() > 0){
        $vUpdProject = true;
    }

    return $vUpdProject;
}


/**
 * Marcar Proyecto
 * @param PDOobject $pConexion
 * @param int $pIdProyecto
 * @param String [$pFinProyecto]
 * @param String [$pCobroProyecto]
 * @return bool
 */
function marcarProyecto($pConexion, $pIdProyecto, $pFinProyecto = null, $pCobroProyecto = null){
    $vProject = false;

    $fecha = new DateTime();
    $fecha->setTimezone(new DateTimeZone('America/Argentina/Buenos_Aires'));
    $fechaFormateada = $fecha->format('Y-m-d H:i:s');

    if((isset($pFinProyecto)) && (!isset($pCobroProyecto))){
        $update = "UPDATE proyecto
                   SET pro_end = '$pFinProyecto',
                       pro_end_date = '$fechaFormateada' 
                   WHERE pro_id = $pIdProyecto";
    }elseif((!isset($pFinProyecto)) && (isset($pCobroProyecto))){
        $update = "UPDATE proyecto
                   SET pro_charged = '$pCobroProyecto',
                       pro_charged_date = '$fechaFormateada'
                   WHERE pro_id = $pIdProyecto";
    }else{
        $update = "UPDATE proyecto
                   SET pro_end = '$pFinProyecto',
                       pro_end_date = '$fechaFormateada',
                       pro_end = '$pCobroProyecto',
                       pro_charged_date = '$fechaFormateada'
                   WHERE pro_id = $pIdProyecto";
    }

    $queryUpdate = $pConexion->prepare($update);
    $queryUpdate->execute();

    if($queryUpdate->rowCount() > 0){
        $vProject = true;
    }

    return $vProject;
    
}


/**
 * Eliminar Proyectos
 * @param PDOobject $pConexion
 * @param int $pIdProyecto
 * @return bool
 */
function delProject($pConexion, $pIdProyecto){
    $vDelProject = false;
    $fecha = new DateTime();
    $fecha->setTimezone(new DateTimeZone('America/Argentina/Buenos_Aires'));
    $fechaFormateada = $fecha->format('Y-m-d H:i:s');

    $update = "UPDATE proyecto
               SET pro_deleted = 'Y',
                   pro_deleted_date = '$fechaFormateada'
               WHERE pro_id = $pIdProyecto";

    $queryUpdate = $pConexion->prepare($update);
    $queryUpdate->execute();

    if($queryUpdate->rowCount() > 0){
        $vDelProject = true;
    }

    return $vDelProject;
}


/**
 * Cargo Facturacion
 * @param PDOobject $pConexion
 * @param int $pIdAgencia
 * @param date $pFecha
 * @param float $pImporte
 * @return bool
 */
function setFacturacion($pConexion, $pIdAgencia, $pFecha, $pImporte){
    $vFacturacion = false;

    $insert = "INSERT INTO facturacion(fc_age_id, fc_month, fc_importe)
                      VALUES($pIdAgencia, '$pFecha', $pImporte)";

    $queryInsert = $pConexion->prepare($insert);
    $queryInsert->execute();

    if($queryInsert->rowCount() > 0){
        $vFacturacion = true;
    }

    return $vFacturacion;
}



/**
 * Obtengo Facturacion
 * @param PDOobject $pConexion
 * @param int $pIdAgencia
 * @param int [$pIdFacturacion]
 * @return array 
 */
function getFacturacion($pConexion, $pIdAgencia, $pIdFacturacion = null){
    $vFacturacion = array();

    if(isset($pIdFacturacion)){
        $select =  "SELECT *
                    FROM facturacion
                    WHERE fc_id = $pIdFacturacion
                       AND fc_deleted = 'N'"; 
    }else{
        $select =  "SELECT *
                    FROM facturacion
                    WHERE fc_age_id = $pIdAgencia
                        AND fc_deleted = 'N'
                    ORDER BY fc_month ASC";
    }

    $querySelect = $pConexion->prepare($select);
    $querySelect->execute();

    if($querySelect->rowCount() > 0){
        while($row = $querySelect->fetch(PDO::FETCH_ASSOC)){
            $vFacturacion[] = $row;
        }
    }

    return $vFacturacion;
}


/**
 * Marcar Facturacion
 * @param PDOobject $pConexion
 * @param int $pIdFacturacion
 * @param String $pCheck
 * @return bool
 */
function marcarFacturacion($pConexion, $pIdFacturacion, $pCheck){
    $vFacturacion = false;

    $fecha = new DateTime();
    $fecha->setTimezone(new DateTimeZone('America/Argentina/Buenos_Aires'));
    $fechaFormateada = $fecha->format('Y-m-d H:i:s');

    $update =  "UPDATE facturacion
                SET fc_check_cobro = '$pCheck',
                    fc_date = '$fechaFormateada' 
                WHERE fc_id = $pIdFacturacion";


    $queryUpdate = $pConexion->prepare($update);
    $queryUpdate->execute();

    if($queryUpdate->rowCount() > 0){
        $vFacturacion = true;
    }

    return $vFacturacion;
    
}


/**
 * Editar Facturacion
 * @param PDOobject $pConexion
 * @param int $pIdFacturacion
 * @param date $pFechaFacturacion
 * @param float $pImporteFacturacion
 * @return bool
 */
function editFacturacion($pConexion, $pIdFacturacion, $pFechaFacturacion, $pImporteFacturacion){
    $vUpdateFacturacion = false;

    $update =  "UPDATE facturacion
                SET fc_month = '$pFechaFacturacion',
                    fc_importe = $pImporteFacturacion
                WHERE fc_id = $pIdFacturacion";

    $queryUpdate = $pConexion->prepare($update);
    $queryUpdate->execute();

    if($queryUpdate->rowCount() > 0){
        $vUpdateFacturacion = true;
    }

    return $vUpdateFacturacion;
}



/**
 * Eliminar Facturacion
 * @param PDOobject $pConexion
 * @param int $pIdFacturacion
 * @return bool
 */
function delFacturacion($pConexion, $pIdFacturacion){
    $vDelFacturacion = false;
    $fecha = new DateTime();
    $fecha->setTimezone(new DateTimeZone('America/Argentina/Buenos_Aires'));
    $fechaFormateada = $fecha->format('Y-m-d H:i:s');

    $update = "UPDATE facturacion
               SET fc_deleted = 'Y',
                   fc_deleted_date = '$fechaFormateada'
               WHERE fc_id = $pIdFacturacion";

    $queryUpdate = $pConexion->prepare($update);
    $queryUpdate->execute();

    if($queryUpdate->rowCount() > 0){
        $vDelFacturacion = true;
    }

    return $vDelFacturacion;
}

?>