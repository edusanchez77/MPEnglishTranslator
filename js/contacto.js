$(document).ready(function(){
    $('#contact-form').submit(function(){
        var vNombre = $('#name').val();
        var vEmail = $('#email').val();
        var vAsunto = $('#subject').val();
        var vMensaje = $('#message').val();

        if(vAsunto != "" && vMensaje != "" && vEmail != ""){
            $.ajax({
                type: 'POST',
                url: 'mail.php',
                datatype: 'json',
                data: {
                    nombre: vNombre,
                    email: vEmail,
                    asunto: vAsunto, 
                    mensaje: vMensaje
                }
            })

            .done(function(respuesta){
                console.log(respuesta);
                if(!respuesta.error == true){
                    //$('#msgContacto').html('Mensaje enviado correctamente');
                    $('#name').val('');
                    $('#email').val('');
                    $('#subject').val('');
                    $('#message').val('');
                    alertify.set('notifier','position', 'bottom-center');
                    alertify.success('Mensaje enviado correctamente');
                }else{
                    alertify.error("No se pudo enviar la consulta");
                }
            })   
        }else{
            alertify.alert("",
                           "Debe completar todos los campos para realizar la consulta"
            ).set({closable: false, transition:'zoom'});
        }
        
    })
})


function enviarMail(){
    alert("edu");
}