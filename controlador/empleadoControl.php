<?php

    /**modelo entidades */
    include '../modelo/entidad/Persona.php';
    include '../modelo/entidad/Empleado.php';
    include '../modelo/entidad/Rol.php';
    include '../modelo/entidad/Cargo.php';
    include '../modelo/entidad/Usuario.php';

    /**modelo datos */
    include '../modelo/datos/conexion.php';
    include '../modelo/datos/datosEmpleado.php';
    include '../modelo/datos/datosUsuario.php';
    /*archivos de configuracion */
    require_once("../configuracion/fechaHora.php");
    require_once("../modelo/datos/enviarCorreo.php");


    extract($_REQUEST);

    error_reporting(0);

    $dEmpleado = new datosEmpleado();
    $dUsuario = new datosUsuario();

    $listaRol = [];

    switch($accion){

        case 'registrarEmpleado':
            $email = $correo;

            $empleado = new Empleado(null,  $fechaHoraMysql, null, $identificacion, $nombre, $apellido, $telefono, $email);
           

            //se registra el empleado a la base de datos y se obtiene el id de la persona para relacionarlo con el usuario
            $idPersona = $dEmpleado->registrarEmpleado($empleado);
            /**administrador - empleado 
             * empleado
             * cliente
            */
            /**se valida que rol se selecciono para saber la gerarquia que tendra  */
            if($rol == 1){

                $rolM = new Rol($rol, null);
                $listaRol[0] = $rolM;

                $rol2 = new Rol(2, null);
                $listaRol[1] = $rol2;

            }else if($rol == 2){

                $rolM = new Rol($rol, null);
                $listaRol[0] = $rolM;

            }
            /**se obtiene el idPersona del atributo datos del objeto retorno */
            $id = $idPersona->datos;

            
            /**se encripta la contrasenia con md5 */
            $contra = md5($identificacion);

            $usuario = new Usuario(null, $id, $email, $contra, $listaRol);
            
                
            $resultado = $dUsuario->registrarUsuario($usuario);
            //si se pudo crear el empleado se envia correo
            if ($resultado->estado) {
            // Enviar correo al empleado
            $correo = new enviarCorreoPrueba();
            $objCorreo = new stdClass();
            $objCorreo->correoRemitente = "soporte.petsHealth@gmail.com"; //aqui pueden colocar el correo del administrador
            $objCorreo->nombreRemitente = "Administración Pets Health"; //igual el nombre del administrador
            $objCorreo->correoDestinatario = $email;
            $objCorreo->nombreDestinatario = $nombre . " " . $apellido;
            $objCorreo->asunto = "Confirmación Registro de empleado de usuario Pets Health";
            $objCorreo->mensaje = "Cordial saludo  " . $nombre . " " . $apellido . ".<br> se
                        informa que el usuario se creo con exito <br>
                        sus datos son :<br> 
                        Rol  : <b>  " . $nombreRol . " </b> <br>
                        Usuario inicio sesion  : <b>  " . $email . " </b> <br>
                        contraseña : <b>  " . $identificacion . " </b> <br><br><br><br>
                        Atentamente Administración Pets Health ";

            $resultadoCorreo = $correo->enviarCorreo($objCorreo);
            }
            echo json_encode($resultado);

            break;

        case 'listarCargo':

            $resultado = $dEmpleado->listarCargo();
            echo json_encode($resultado);
            break;

        case 'listarRol':
            $resultado = $dEmpleado->listarRol();
            echo json_encode($resultado);
            break;

        case "listarVeterinarios":
            $resultado=$dEmpleado->listarVeterinarios();

            echo json_encode($resultado);
            break;

    }
?>