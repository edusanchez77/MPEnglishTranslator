/* ----------------------------------------------------------- */
/*  Mostrar Modal Agregar Proyecto
/* ----------------------------------------------------------- */
function abrirModalAdd(idAgencia, nombreAgencia){
    $('#modalAddProject').modal('show');
    $('#inputAgenciaProyecto').val(nombreAgencia);
    $('#inputIdAgenciaProyecto').val(idAgencia);
}


/* ----------------------------------------------------------- */
/*  Mostrar Modal Agregar Facturación
/* ----------------------------------------------------------- */
function abrirModalAddFacturacion(idAgencia, nombreAgencia){
    //alert("edu");
    $('#modalAddFacturacion').modal('show');
    $('#inputAgenciaFacturacion').val(nombreAgencia);
    $('#inputIdAgenciaFacturacion').val(idAgencia);
}



/* ----------------------------------------------------------- */
/*  Agregar Proyectos
/* ----------------------------------------------------------- */
function cargarProyecto(){
    var idAgencia = document.getElementById('inputIdAgenciaProyecto').value;
    var fecha = document.getElementById('inputFechaProyecto').value;
    var nroProyecto = document.getElementById('inputNroProyecto').value;
    var cuenta = document.getElementById('inputCuentaProyecto').value;
    var parIdiomas = document.getElementById('inputIdiomaProyecto').value;
    var importe = document.getElementById('inputImporteProyecto').value;
    var deadLine = document.getElementById('inputDeadProyecto').value;
    var catTool = document.getElementById('inputToolProyecto').value;

    $.ajax({
        type: 'POST',
        url: 'addProject.php',
        dataType: 'json',
        data: {
               idAgencia: idAgencia, 
               fecha: fecha, 
               nroProyecto: nroProyecto, 
               parIdiomas: parIdiomas, 
               cuenta: cuenta, 
               importe: importe, 
               deadLine: deadLine, 
               catTool: catTool,
               flag: 'add'
            }
    })
    .done(function(resultado){
        if(resultado.error == false){
            alertify.set('notifier','position', 'bottom-center');
            alertify.success("Proyecto Cargado");
            setTimeout(
                function(){
                   location.reload(true);
                }, 1000); 
        }else{
            alertify.set('notifier','position', 'bottom-center');
            alertify.error("Se produjo un error");
        }
    })
}



/* ----------------------------------------------------------- */
/*  Obtener Proyectos
/* ----------------------------------------------------------- */
function getProject(idProyecto, idAgencia){
    $.ajax({
        type: 'POST',
        url: 'addProject.php',
        dataType: 'json',
        data: {
            idProyecto: idProyecto,
            idAgencia: idAgencia,
            flag: 'get'
        }
    })
    .done(function(resultado){
        if(resultado.error == false){
            $('#modalEditProject').modal('show');
            $('#editProyectoId').val(idProyecto);
            $('#editFechaProyecto').val(resultado.fechaProyecto);
            $('#editNroProyecto').val(resultado.nroProyecto);
            $('#editCuentaProyecto').val(resultado.cuentaProyecto);
            $('#editIdiomaProyecto').val(resultado.idiomaProyecto);
            $('#editImporteProyecto').val(resultado.importeProyecto);
            $('#editToolProyecto').val(resultado.cattoolProyecto);
            $('#editDeadProyecto').val(resultado.deadlineProyecto);
        }
    })
}



/* ----------------------------------------------------------- */
/*  Editar Proyectos
/* ----------------------------------------------------------- */
function editProject(){
    var idProyecto = $('#editProyectoId').val();
    //alert(idProyecto);
    var fechaProyecto = $('#editFechaProyecto').val();
    var nroProyecto = $('#editNroProyecto').val();
    var cuentaProyecto = $('#editCuentaProyecto').val();
    var idiomaProyecto = $('#editIdiomaProyecto').val();
    var importeProyecto = $('#editImporteProyecto').val();
    var cattoolProyecto = $('#editToolProyecto').val();
    var deadlineProyecto = $('#editDeadProyecto').val();

    $.ajax({
        type: 'POST',
        url: 'addProject.php',
        dataType: 'json',
        data: {
            idProyecto: idProyecto,
            fechaProyecto: fechaProyecto,
            nroProyecto: nroProyecto,
            cuentaProyecto: cuentaProyecto,
            idiomaProyecto: idiomaProyecto,
            importeProyecto: importeProyecto,
            cattoolProyecto: cattoolProyecto,
            deadlineProyecto: deadlineProyecto,
            flag: 'edit'
        }
    })
    .done(function(resultado){
        if(resultado.error == false){
            alertify.set('notifier','position', 'bottom-center');
            alertify.success("Proyecto Modificado");
            setTimeout(
                function(){
                   location.reload(true);
                }, 1000); 
        }else{
            alertify.set('notifier','position', 'bottom-center');
            alertify.error("Se produjo un error");
        }
    })
}


/* ----------------------------------------------------------- */
/*  Eliminar Proyectos
/* ----------------------------------------------------------- */
function deletedProject(idProyecto, nroProyecto){
    alertify.confirm("Proyecto "+nroProyecto, 
                     "¿Queres eliminar el proyecto?",
                     function(){
                         $.ajax({
                             type: 'POST',
                             url: 'deleteProject.php',
                             dataType: 'json',
                             data: {idProyecto: idProyecto}
                         })
                         .done(function(resultado){
                            if(resultado.error == false){
                                alertify.set('notifier','position', 'bottom-center'); 
                                alertify.success("Proyecto Eliminado");
                                setTimeout(
                                    function(){
                                       location.reload(true);
                                    }, 1000); 
                            }else{
                                alertify.set('notifier','position', 'bottom-center'); 
                                alertify.error("Se produjo un error");
                            }
                         })
                     },
                     function(){
                        alertify.set('notifier','position', 'bottom-center'); 
                        alertify.error("Cancelado")
                    }
    );
}



/* ----------------------------------------------------------- */
/*  Proyecto Terminado
/* ----------------------------------------------------------- */
function finishProject(idProyecto){
    var trId = "project"+idProyecto;

    $.ajax({
        type: 'POST',
        url: 'marcarProyecto.php',
        dataType: 'json',
        data: {
            idProyecto: idProyecto,
            flag: 'finish'
        }
    })
    .done(function(resultado){
        if(resultado.error == false){
            alertify.set('notifier','position', 'bottom-center'); 
            alertify.success("Proyecto Terminado");
        }else{
            alertify.set('notifier','position', 'bottom-center'); 
            alertify.error("Se produjo un error");
        }
    })

    $('#'+trId).toggleClass('table-warning');
    $('#'+trId).toggleClass('table-danger');

}


/* ----------------------------------------------------------- */
/*  Proyecto Facturado
/* ----------------------------------------------------------- */
function chargedProject(idProyecto){
    var trId = "project"+idProyecto;

    $.ajax({
        type: 'POST',
        url: 'marcarProyecto.php',
        dataType: 'json',
        data: {
            idProyecto: idProyecto,
            flag: 'charged'
        }
    })
    .done(function(resultado){
        if(resultado.error == false){
            alertify.set('notifier','position', 'bottom-center'); 
            alertify.success("Proyecto Facturado");
        }else{
            alertify.set('notifier','position', 'bottom-center'); 
            alertify.error("Se produjo un error");
        }
    })

    $('#'+trId).toggleClass('table-danger');
    $('#'+trId).toggleClass('table-success');
}


/* ----------------------------------------------------------- */
/*  Agregar Facturacion
/* ----------------------------------------------------------- */
function cargarFacturacion(){
    var idAgencia = document.getElementById('inputIdAgenciaFacturacion').value;
    var fecha = document.getElementById('inputFechaFacturacion').value;
    var importe = document.getElementById('inputImporteFacturacion').value;

    $.ajax({
        type: 'POST',
        url: 'addFacturacion.php',
        dataType: 'json',
        data: {
               idAgencia: idAgencia, 
               fecha: fecha, 
               importe: importe, 
               flag: 'add'
            }
    })
    .done(function(resultado){
        if(resultado.error == false){
            alertify.set('notifier','position', 'bottom-center');
            alertify.success("Facturacion Cargada");
            setTimeout(
                function(){
                   location.reload(true);
                }, 1000); 
        }else{
            alertify.set('notifier','position', 'bottom-center');
            alertify.error("Se produjo un error");
        }
    })
}


/* ----------------------------------------------------------- */
/*  Marcar Facturacion
/* ----------------------------------------------------------- */
function chargedFact(idFacturacion, check){
    var trId = "fc"+idFacturacion;
    var iconFC = "icon"+idFacturacion;
    
    $.ajax({
        type: 'POST',
        url: 'marcarProyecto.php',
        dataType: 'json',
        data: {
            idFacturacion: idFacturacion,
            check: check,
            flag: 'facturacion'
        }
    })
    .done(function(resultado){
        if(resultado.error == false){
            alertify.set('notifier','position', 'bottom-center'); 
            alertify.success("Facturación Actualizada");
            /*setTimeout(
                function(){
                   location.reload(true);
                }, 1000);*/ 
        }else{
            alertify.set('notifier','position', 'bottom-center'); 
            alertify.error("Se produjo un error");
        }
    })

    $('#'+trId).toggleClass('table-success');
    if(check == 'Y'){
        $('#'+iconFC).toggleClass('fa fa-times');
        $('#'+iconFC).toggleClass('fa fa-check');
    }else{
        $('#'+iconFC).toggleClass('fa fa-check');
        $('#'+iconFC).toggleClass('fa fa-times');
    }
}

/* ----------------------------------------------------------- */
/*  Obtener Facturacion
/* ----------------------------------------------------------- */
function getFacturacion(idFacturacion, idAgencia){
    $.ajax({
        type: 'POST',
        url: 'addFacturacion.php',
        dataType: 'json',
        data: {
            idFacturacion: idFacturacion,
            idAgencia: idAgencia,
            flag: 'get'
        }
    })
    .done(function(resultado){
        if(resultado.error == false){
            $('#modalEditFacturacion').modal('show');
            $('#editAgenciaFacturacion').val(idAgencia);
            $('#editIdFacturacion').val(idFacturacion);
            $('#editFechaFacturacion').val(resultado.fechaFacturacion);
            $('#editImporteFacturacion').val(resultado.importeFacturacion);
        }
    })
}


/* ----------------------------------------------------------- */
/*  Editar Facturacion
/* ----------------------------------------------------------- */
function editFacturacion(){
    var idFacturacion = $('#editIdFacturacion').val();
    var fechaFacturacion = $('#editFechaFacturacion').val();
    var importeFacturacion = $('#editImporteFacturacion').val();
    //alert(fechaFacturacion+" "+importeFacturacion);

    $.ajax({
        type: 'POST',
        url: 'addFacturacion.php',
        dataType: 'json',
        data: {
            idFacturacion: idFacturacion,
            fechaFacturacion: fechaFacturacion,
            importeFacturacion: importeFacturacion,
            flag: 'edit'
        }
    })
    .done(function(resultado){
        if(resultado.error == false){
            alertify.set('notifier','position', 'bottom-center');
            alertify.success("Facturación Modificada");
            setTimeout(
                function(){
                   location.reload(true);
                }, 1000); 
        }else{
            alertify.set('notifier','position', 'bottom-center');
            alertify.error("Se produjo un error");
        }
    })
}



/* ----------------------------------------------------------- */
/*  Eliminar Facturación
/* ----------------------------------------------------------- */
function deletedFacturacion(idFacturacion){
    alertify.confirm("Facturación", 
                     "¿Queres eliminar esta facturación?",
                     function(){
                         $.ajax({
                             type: 'POST',
                             url: 'deleteFacturacion.php',
                             dataType: 'json',
                             data: {idFacturacion: idFacturacion}
                         })
                         .done(function(resultado){
                            if(resultado.error == false){
                                alertify.set('notifier','position', 'bottom-center'); 
                                alertify.success("Facturación Eliminada");
                                setTimeout(
                                    function(){
                                       location.reload(true);
                                    }, 1000); 
                            }else{
                                alertify.set('notifier','position', 'bottom-center'); 
                                alertify.error("Se produjo un error");
                            }
                         })
                     },
                     function(){
                        alertify.set('notifier','position', 'bottom-center'); 
                        alertify.error("Cancelado")
                    }
    );
}