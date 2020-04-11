<?php

    require_once("constantes.php");
    require_once("funcionesBD.php");
    date_default_timezone_set('America/Argentina/Cordoba');

    if(isset($_POST['idAgencia']) || isset($_POST['idContacto'])){
        $vConexion = conexionBD(DATABASE['DNS'], DATABASE['USUARIO'], DATABASE['PASSWORD']);
        switch($_POST['flagContacto']){
            case 'get':
                $contacto = "";
                $vContactos = getContacto($vConexion, $_POST['idAgencia']);

                if(count($vContactos) > 0){
                    for($i=0; $i<count($vContactos); $i++){
                        echo "<div class='item'>
                                <div class='testimonial-content'>
                                    <div class='row'>
                                        <div class='col-10'>
                                            <h3 class='name'>".$vContactos[$i]['con_nombre']."<span>".$vContactos[$i]['con_puesto']."</span></h3>
                                        </div>
                                        <div class='col-2'>
                                            <p></p>
                                            <i class='fa fa-edit' onclick=mostrarModalEditContacto(".$vContactos[$i]['con_id'].",".$_POST['idAgencia'].")></i>&nbsp;&nbsp;
                                            <i class='fa fa-trash' onclick=eliminarContacto(".$vContactos[$i]['con_id'].")></i>
                                        </div>
                                    </div>
                                    
                                    <p>
                                        <u><b>Skype</b></u>: ".$vContactos[$i]['con_skype']."<br>
                                        <u><b>Teléfono</b></u>: ".$vContactos[$i]['con_telefono']."
                                    </p>
                                    <p></p>
                                    <div class='gap-20'></div>
                                </div>
                            </div>";
                    }
                }else{
                    echo "No hay ningún contacto cargado para esta agencia";
                }
                break;

            case 'getContacto':
                $vContacto = getContacto($vConexion, $_POST['idAgencia'], $_POST['idContacto']);
                if($vContacto == true){
                    echo json_encode(array('error' => false,
                                           'nombreContacto' => $vContacto[0]['con_nombre'],
                                           'puestoContacto' => $vContacto[0]['con_puesto'],
                                           'skypeContacto' => $vContacto[0]['con_skype'],
                                           'telefonoContacto' => $vContacto[0]['con_telefono']));
                }else{
                    echo json_encode(array('error' => true));
                }
                break;

            case 'add':
                $vContacto = setContacto($vConexion, null, $_POST['idAgencia'], $_POST['nombreContacto'], $_POST['puestoContacto'], $_POST['skypeContacto'], $_POST['telefonoContacto'], 'add');
                if($vContacto == true){
                    echo json_encode(array('error' => false));
                }else{
                    echo json_encode(array('error' => true));
                }
                break;

            case 'edit':
                $vContacto = setContacto($vConexion, $_POST['idContacto'], null, $_POST['nombreContacto'], $_POST['puestoContacto'], $_POST['skypeContacto'], $_POST['telefonoContacto'], 'edit');
                if($vContacto == true){
                    echo json_encode(array('error' => false));
                }else{
                    echo json_encode(array('error' => true));
                }
                break;

            case 'del':
                $vContacto = delContacto($vConexion, $_POST['idContacto']);
                if($vContacto == true){
                    echo json_encode(array('error' => false));
                }else{
                    echo json_encode(array('error' => true));
                }
                break;
        }
    

        
    }
?>