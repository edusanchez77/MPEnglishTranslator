/*
  * @package Bizcraft
  * @subpackage Bizcraft HTML
  * 
  * Template Scripts
  * Created by Tripples
  
   1.    Style Switcher
   2.    Navigation
   3.    Fixed Header
   4.    Main Slideshow (Carousel)
   5.    Counter
   6.    Owl Carousel
   7.    Flex Slider
   8.    Wow Animation
   10.   Video Background
   11.   Back To Top

  
*/


jQuery(function ($) {
  'use strict';


  /* ----------------------------------------------------------- */
  /*  Style Switcher
  /* ----------------------------------------------------------- */
    $(document).ready(function () {
      $('.style-switch-button').click(function () {
        $('.style-switch-wrapper').toggleClass('active');
      });
      $('a.close-styler').click(function () {
        $('.style-switch-wrapper').removeClass('active');
      });
    });



  /* ----------------------------------------------------------- */
  /*  Fixed header
  /* ----------------------------------------------------------- */

  $(window).on('scroll', function () {

    if ($(window).scrollTop() > 100) {

      $('.header').addClass('header-solid animated fadeInDown');
    } else {

      $('.header').removeClass('header-solid animated fadeInDown');

    }

  });

  $(window).on('scroll', function () {

    if ($(window).scrollTop() > 200) {

      $('.header2').addClass('header-bgnone animated fadeInDown');
    } else {

      $('.header2').removeClass('header-bgnone animated fadeInDown');

    }

  });



  /* ----------------------------------------------------------- */
  /*  Main slideshow
  /* ----------------------------------------------------------- */

  /* Home 2 */

  $('.flexSlideshow').flexslider({
    slideshowSpeed: 5000,
    animationSpeed: 600
  });

  /* Home 3 and 4 */

  $('#main-slide').carousel({
    pause: true,
    interval: 100000
  });


  /* ----------------------------------------------------------- */
  /*  Counter
  /* ----------------------------------------------------------- */

  $('.counter').counterUp({
    delay: 10,
    time: 1000
  });



  /* ----------------------------------------------------------- */
  /*  Owl Carousel
  /* ----------------------------------------------------------- */


  //Testimonial

  $('#testimonial-carousel').owlCarousel({

    navigation: false, // Show next and prev buttons
    slideSpeed: 600,
    pagination: true,
    singleItem: true

  });

  // Custom Navigation Events
  var owl = $('#testimonial-carousel');


  // Custom Navigation Events
  $('.next').click(function () {
    owl.trigger('owl.next');
  });
  $('.prev').click(function () {
    owl.trigger('owl.prev');
  });
  $('.play').click(function () {
    owl.trigger('owl.play', 1000); //owl.play event accept autoPlay speed as second parameter
  });
  $('.stop').click(function () {
    owl.trigger('owl.stop');
  });


  //Clients

  $('#client-carousel').owlCarousel({

    navigation: false, // Show next and prev buttons
    slideSpeed: 400,
    pagination: false,
    items: 5,
    rewindNav: true,
    itemsDesktop: [1199, 3],
    itemsDesktopSmall: [979, 3],
    stopOnHover: true,
    autoPlay: true

  });

  //App gallery
  $('#app-gallery-carousel').owlCarousel({

    navigation: false, // Show next and prev buttons
    slideSpeed: 400,
    pagination: true,
    items: 4,
    rewindNav: true,
    itemsDesktop: [1199, 3],
    itemsDesktopSmall: [979, 3],
    stopOnHover: true
  });



  /* ----------------------------------------------------------- */
  /*  Flex slider
  /* ----------------------------------------------------------- */

  //Second item slider
  $(window).load(function () {
    $('.flexSlideshow').flexslider({
      animation: 'fade',
      controlNav: false,
      directionNav: true,
      slideshowSpeed: 8000
    });
  });


  //Portfolio item slider
  $(window).load(function () {
    $('.flexportfolio').flexslider({
      animation: 'fade',
      controlNav: false,
      directionNav: true,
      slideshowSpeed: 8000
    });
  });


  /* ----------------------------------------------------------- */
  /*  Animation
  /* ----------------------------------------------------------- */
  //Wow
  new WOW().init();


  /* ----------------------------------------------------------- */
  /*  Prettyphoto
  /* ----------------------------------------------------------- */

  $('a[data-rel^=\'prettyPhoto\']').prettyPhoto();


  /* ----------------------------------------------------------- */
  /* Video background
  /* ----------------------------------------------------------- */

  var resizeVideoBackground = function () {

    $('.video-background').each(function (i, el) {
      var $el = $(el),
        $section = $el.parent(),
        min_w = 300,
        video_w = 16,
        video_h = 9,
        section_w = $section.outerWidth(),
        section_h = $section.outerHeight(),
        scale_w = section_w / video_w,
        scale_h = section_h / video_h,
        scale = scale_w > scale_h ? scale_w : scale_h,
        new_video_w, new_video_h, offet_top, offet_left;


      if (scale * video_w < min_w) {
        scale = min_w / video_w;
      }

      new_video_w = scale * video_w;
      new_video_h = scale * video_h;
      offet_left = (new_video_w - section_w) / 2 * -1;
      offet_top = (new_video_h - section_h) / 2 * -1;

      $el.css('width', new_video_w);
      $el.css('height', new_video_h);
      $el.css('marginTop', offet_top);
      $el.css('marginLeft', offet_left);
    });

  };

  $(window).on('resize', function () {
    resizeVideoBackground();
  });

  resizeVideoBackground();

  /* ----------------------------------------------------------- */
  /*  Back to top
  /* ----------------------------------------------------------- */

  $(window).scroll(function () {
    if ($(this).scrollTop() > 50) {
      $('#back-to-top').fadeIn();
    } else {
      $('#back-to-top').fadeOut();
    }
  });
  // scroll body to 0px on click
  $('#back-to-top').click(function () {
    $('#back-to-top').tooltip('hide');
    $('body,html').animate({
      scrollTop: 0
    }, 800);
    return false;
  });

  $('#back-to-top').tooltip('hide');

  /* ----------------------------------------------------------- */
  /*  Agregar agencia
  /* ----------------------------------------------------------- */
  $("#guardarAgencia").on({
    "click": function(){
      var nombreAgencia = $('#nombreAgencia').val();
      var dirAgencia = $('#direccionAgencia').val();
      var telAgencia = $('#telefonoAgencia').val();
      var mailAgencia = $('#mailAgencia').val();
      var periodoPago = $('#periodoPago').val();
      var tarifa1 = $('#tarifa1').val();
      var tarifa2 = $('#tarifa2').val();
      var tarifa3 = $('#tarifa3').val();
      var tarifa4 = $('#tarifa4').val();
      $.ajax({
        type: 'POST',
        url: 'setAgencias.php',
        dataType: 'json',
        data: {
          nombreAgencia: nombreAgencia, 
          dirAgencia: dirAgencia, 
          telAgencia: telAgencia, 
          mailAgencia: mailAgencia,
          periodoPago: periodoPago, 
          tarifa1: tarifa1, 
          tarifa2: tarifa2, 
          tarifa3: tarifa3, 
          tarifa4: tarifa4,
          flag: 'add'
        }
      })
      .done(function(resultado){
        if(resultado.error == false){
          alertify.set('notifier','position', 'bottom-center');
          alertify.success('Agencia cargada con éxito');
          setTimeout(
            function(){
              location.reload(true);
            }, 1000);
        }
      })
    }
  })

  
  
  

  $('#cerrarSesion').click(function(){
    $.ajax({
      type: 'POST',
      url: 'login.php',
      dataType: 'json',
      data: {
        flag: 'logout'
      }
    })
    .done(function(resultado){
      if(resultado.error == false){
        alertify.set('notifier','position', 'bottom-center');
        alertify.success(resultado.mensaje);
        setTimeout(
          function(){
             window.location('index.php');
          }, 2000);
      }else{
        alertify.set('notifier','position', 'bottom-center');
        alertify.error('Acceso Denegado');
      }
    })
  })


});


/* ----------------------------------------------------------- */
/*  Login
/* ----------------------------------------------------------- */
function login(){
  var password = $('#passwordLogin').val();
  //alert(password);
  $.ajax({
    type: 'POST',
    url: 'login.php',
    dataType: 'json',
    data: {
      password: password,
      flag: 'login'
    }
  })
  .done(function(resultado){
    if(resultado.error == false){
      alertify.set('notifier','position', 'bottom-center');
      alertify.success(resultado.mensaje);
      setTimeout(
        function(){
           location.reload(true);
        }, 2000);
    }else{
      alertify.set('notifier','position', 'bottom-center');
      alertify.error('Acceso Denegado');
    }
  })
}

/* ----------------------------------------------------------- */
/*  Cargar info de agencias
/* ----------------------------------------------------------- */
function cargarAgencias(palabraEnEs, palabraEsEn, hojaEnEs, hojaEsEn, periodo, idAgencia){
  //alert(idAgencia);
  $.ajax({
    type: 'POST',
    url: 'getContactos.php',
    dataType: 'html',
    data: {
      idAgencia: idAgencia,
      flagContacto: 'get'
    }
  })
  .done(function(resultado){
    //alert(resultado);
    $('#periodoPago').html("&nbsp;&nbsp;&nbsp;&nbsp;"+periodo+" días");
    $('#tarifas').html("&nbsp;&nbsp;&nbsp;&nbsp;<strong>Tarifa por palabra EN-ES: </strong>$"+palabraEnEs+"<br>"
                      +"&nbsp;&nbsp;&nbsp;&nbsp;<strong>Tarifa por palabra ES-EN: </strong>$"+palabraEsEn+"<br><br>"
                      +"&nbsp;&nbsp;&nbsp;&nbsp;<strong>Tarifa por hoja EN-ES: </strong>$"+hojaEnEs+"<br>"
                      +"&nbsp;&nbsp;&nbsp;&nbsp;<strong>Tarifa por hoja ES-EN: </strong>$"+hojaEsEn);
    //document.getElementById("testimonial-carousel").html = resultado;
    $('#testimonial-carousel').html(resultado);
    $('#buttonContacto').html("<button id='btnAddContacto' class='btn btn-secondary solid' onclick=mostrarModalContacto("+idAgencia+")>Cargar Contacto</button>");
  })
    
} 




/* ----------------------------------------------------------- */
/*  Editar agencias
/* ----------------------------------------------------------- */
function editarAgencia(idAgencia){
  $.ajax({
    type: 'POST',
    url: 'getAgencias.php',
    dataType: 'json',
    data: {
      idAgencia: idAgencia
    }
  })
  .done(function(resultado){
    $('#modalEditAgencia').modal('show');
    $('#editIdAgencia').val(idAgencia);
    $('#editNombreAgencia').val(resultado.nombreAgencia);
    $('#editDireccionAgencia').val(resultado.direccionAgencia);
    $('#editTelefonoAgencia').val(resultado.telefonoAgencia);
    $('#editMailAgencia').val(resultado.mailAgencia);
    $('#editPeriodoPagoAgencia').val(resultado.periodoPagoAgencia);
    $('#editarTarifa1').val(resultado.palabraEnEsAgencia);
    $('#editarTarifa2').val(resultado.palabraEsEnAgencia);
    $('#editarTarifa3').val(resultado.horaEnEsAgencia);
    $('#editarTarifa4').val(resultado.horaEsEnAgencia);
  })  
}


/* ----------------------------------------------------------- */
/*  Update agencia
/* ----------------------------------------------------------- */
$("#updateAgencia").on({
  "click": function(){
    var idAgencia = $('#editIdAgencia').val();
    var nombreAgencia = $('#editNombreAgencia').val();
    var dirAgencia = $('#editDireccionAgencia').val();
    var telAgencia = $('#editTelefonoAgencia').val();
    var mailAgencia = $('#editMailAgencia').val();
    var periodoPago = $('#editPeriodoPagoAgencia').val();
    var tarifa1 = $('#editarTarifa1').val();
    var tarifa2 = $('#editarTarifa2').val();
    var tarifa3 = $('#editarTarifa3').val();
    var tarifa4 = $('#editarTarifa4').val();

    $.ajax({
      type: 'POST',
      url: 'setAgencias.php',
      dataType: 'json',
      data: {
        idAgencia: idAgencia,
        nombreAgencia: nombreAgencia, 
        dirAgencia: dirAgencia, 
        telAgencia: telAgencia, 
        mailAgencia: mailAgencia,
        periodoPago: periodoPago, 
        tarifa1: tarifa1, 
        tarifa2: tarifa2, 
        tarifa3: tarifa3, 
        tarifa4: tarifa4,
        flag: 'edit'
      }
    })
    .done(function(resultado){
      if(resultado.error == false){
        alertify.set('notifier','position', 'bottom-center');
        alertify.success('Agencia modificada con éxito');
        setTimeout(
          function(){
              location.reload(true);
          }, 2000);
      }else{
        alertify.set('notifier','position', 'bottom-center');
        alertify.error('Se produjo un error');
      }
    })
  }
})


/* ----------------------------------------------------------- */
/*  Mostrar Modal Contactos
/* ----------------------------------------------------------- */
function mostrarModalContacto(idAgencia){
  $('#modalAddContact').modal('show');
  $('#addContactoIdAgencia').val(idAgencia);
}


/* ----------------------------------------------------------- */
/*  Mostrar Modal Editar Contactos
/* ----------------------------------------------------------- */
function mostrarModalEditContacto(idContacto, idAgencia){
  //alert(idContacto+" "+idAgencia);
  $.ajax({
    type: 'POST',
    url: 'getContactos.php',
    dataType: 'json',
    data: {
      idContacto: idContacto,
      idAgencia: idAgencia,
      flagContacto: 'getContacto'
    }
  })
  .done(function(resultado){
    if(resultado.error == false){
      $('#modalEditContact').modal('show');
      $('#editIdContacto').val(idContacto);
      $('#editNombreContacto').val(resultado.nombreContacto);
      $('#editPuestoContacto').val(resultado.puestoContacto);
      $('#editSkypeContacto').val(resultado.skypeContacto);
      $('#editTelefonoContacto').val(resultado.telefonoContacto);
    }
  })
  
}



/* ----------------------------------------------------------- */
/*  Agregar Contacto
/* ----------------------------------------------------------- */
function cargarContacto(flag){
  
  if(flag == undefined){
    var idAgencia = $('#addContactoIdAgencia').val();
    var nombreContacto = $('#addNombreContacto').val();
    var puestoContacto = $('#addPuestoContacto').val();
    var skypeContacto = $('#addSkypeContacto').val();
    var telefonoContacto = $('#addTelefonoContacto').val();  
    var flagContacto = 'add';
  }else  if (flag == 'edit') {
    var idContacto = $('#editIdContacto').val();
    var idAgencia = null;
    var nombreContacto = $('#editNombreContacto').val();
    var puestoContacto = $('#editPuestoContacto').val();
    var skypeContacto = $('#editSkypeContacto').val();
    var telefonoContacto = $('#editTelefonoContacto').val();  
    var flagContacto = 'edit';
  }
  

  $.ajax({
    type: 'POST',
    url: 'getContactos.php',
    dataType: 'json',
    data: {
      idContacto: idContacto,
      idAgencia: idAgencia,
      nombreContacto: nombreContacto,
      puestoContacto: puestoContacto,
      skypeContacto: skypeContacto,
      telefonoContacto: telefonoContacto,
      flagContacto: flagContacto
    }
  })
  .done(function(resultado){
    if(resultado.error == false){
      alertify.set('notifier','position', 'bottom-center');
        alertify.success('Contacto modificado con éxito');
        setTimeout(
          function(){
              location.reload(true);
          }, 2000);
      }else{
        alertify.set('notifier','position', 'bottom-center');
        alertify.error('Se produjo un error '+ErrorEvent);
      }
  })
}



/* ----------------------------------------------------------- */
/*  Eliminar Contacto
/* ----------------------------------------------------------- */
function eliminarContacto(idContacto){
  //alert(idContacto);
  alertify.confirm("Eliminar Contacto", 
                     "¿Segura que queres eliminar este contacto?",
                     function(){
                         $.ajax({
                             type: 'POST',
                             url: 'getContactos.php',
                             dataType: 'json',
                             data: {
                               idContacto: idContacto,
                               flagContacto: 'del'
                              }
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