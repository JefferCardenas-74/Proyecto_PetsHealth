<?php
    session_start();
    extract($_REQUEST);

    /**modelo entidades */
    include '../modelo/entidad/Persona.php';
    include '../modelo/entidad/Empleado.php';
    include '../modelo/entidad/Rol.php';
    include '../modelo/entidad/Usuario.php';
    include '../modelo/entidad/Mascota.php';
    
  
    /**modelo datos */
    include '../modelo/datos/conexion.php';
    include '../modelo/datos/datosEmpleado.php';
    include '../modelo/datos/datosUsuario.php';
    include '../modelo/datos/datosCliente.php';
    include '../modelo/datos/datosMascota.php';
    
    /*archivos de configuracion */
    require_once("../configuracion/fechaHora.php");
    require_once("../modelo/datos/enviarCorreo.php");

    error_reporting(0);

    $dCliente = new datosCliente();
    $dUsuario = new datosUsuario();
    $dMascota = new datosMascota();
    $listaRol = [];

    switch($accion){

        case 'AgregarCliente':

            $persona = new Persona(null, $cedula, $nombre, $apellidos, $telefono, $correo);

            $idPersona = $dCliente->registrarPersonaCli($persona);

            echo json_encode($idPersona);
            break;

        case 'AgregarMascota':
            /**se calcula la edad de la mascota */
            $edadMascota = $year - $año;

            $mascota = new Mascota(null, $idPersona, $tipoMascota, $nombreMascota, $fechaNacimientoMascota, $edadMascota);
            $resultado = $dMascota->agregarMascota($mascota);

            echo json_encode($resultado);
            break;

        case 'AgregarUsuario':

            $contra = md5($cedula);

            $rol = new Rol(3, null);
            
            $listaRol[0] = $rol;
            
            $usuario = new Usuario(null, $idPersona, $correo, $contra, $listaRol);

            $resultado = $dUsuario->registrarUsuario($usuario);
            if($resultado->estado){
                // Envia correo cuando se crea un cliente
                $enviarCorreo = new enviarCorreoPrueba();
                $objCorreo = new stdClass();
                $objCorreo->correoRemitente = "soporte.petsHealth@gmail.com"; //aqui pueden colocar el correo del administrador
                $objCorreo->nombreRemitente = "Administración Pets Health"; //igual el nombre del administrador
                $objCorreo->correoDestinatario = $correo;
                $objCorreo->nombreDestinatario = $nombre . " " . $apellido;
                $objCorreo->asunto = "Confirmación Registro de cliente en  Pets Health";
                $objCorreo->mensaje = "Cordial saludo  " . $nombre . " " . $apellido . ".<br> se
                            informa que el usuario se creo con exito <br>
                            sus datos son :<br> 
                            Usuario inicio sesion  : <b>  " . $correo . " </b> <br>
                            contraseña : <b>  " . $cedula . " </b>
                            <table  width='50%' border='0' >
                            <tr>
                            <td width ='50%' align='center'>
                            <img src='https://i.imgur.com/yzjVfUS.png' alt='logoLargoEmpresa' width='250' >
                            </td>
                            <td width='50%'>
                            <br>
                            <b> Atentamente Administración Pets Health 	</b>
                            <br>
                            Gracias por confiar en nosotros
                            </td>
                            </tr>
                            </table>
                             ";
                $resultadoCorreo = $enviarCorreo->enviarCorreo($objCorreo);
            }

            echo json_encode($resultado);

            break;
        
        case 'listarMascotas':

            $resultado = $dCliente->listarMascotas($idPersona);
            echo json_encode($resultado);
            break;
        

    }
?>

