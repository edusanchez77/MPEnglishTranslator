<?php
    //Acceso Database Hosting
    /*define('DATABASE',
        array('DNS'         => 'mysql:dbname=prode93_MP; host=67.23.253.235',
              'USUARIO'     => 'prode93_edu',
              'PASSWORD'    => '36z@#~#@#HmL'
        )
    );*/

    //Acceso Database LocalHost
    define('DATABASE',
        array('DNS'         => 'mysql:dbname=mp;host=127.0.0.1',
              'USUARIO'     => 'root',
              'PASSWORD'    => ''
        )
    );

    //Tipos de Usuarios
    define('USERS',
        array('USUARIO'         => '0',
              'ADMINISTRADOR'   => '1'
        )
    );
  
    //Directorios Logs
    define('LOGS', 
        array('CONNECTION'      => 'logs/connection/',
              'LOGIN'           => 'logs/login/',
              'REGISTRO'        => 'logs/register/',
              'PASSWORDCHANGE'  => 'logs/passwordchange/'
        )
    );
    
    //Mensajes de Error
    define('ERRORES', 
        array('ERROR_CONNECTION'    => 'Estamos presentando problemas de conexión. 
                                     Por favor intenta de nuevo más tarde. 
                                     Disculpas por las molestias ocasionadas.',
              'ERROR_LOGIN'         => 'Email o Password incorrectos.' 
        )
    );

    //Direcciones de Emails
    define('MAILS',
        array('COMENTARIO'      => 'edu_sanchez77@hotmail.com',
              'SUGERENCIA'      => 'edu_sanchez77@hotmail.com',
              'ERROR'           => 'edu_sanchez77@hotmail.com',
              'PROBLEMAS'       => 'edu_sanchez77@hotmail.com'
        )
    );

    //Estado de las notificaciones
    define('NOTIFICACIONES',
        array('PENDIENTE'   => 'P',
              'ACEPTADA'    => 'A',
              'RECHAZADA'   => 'R'
        )
    );
?>