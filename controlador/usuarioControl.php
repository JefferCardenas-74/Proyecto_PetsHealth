<?php
session_start();
extract($_REQUEST);
include "../modelo/datos/conexion.php";
include "../modelo/entidad/Usuario.php";
include "../modelo/datos/datosUsuario.php";
require_once("../modelo/datos/enviarCorreo.php");
require_once("../configuracion/encriptar.php");
require_once("../configuracion/fechaHora.php");



error_reporting(0);
$dUsuario = new DatosUsuario();

switch ($accion) {
    case "iniciarSesion":

        $user = new Usuario();
        $user->setLogin($txt_user);
        // // encriptar a md5 , La contraseña es 123
        $passwordMd5 = md5($txt_password);
        $user->setPassword($passwordMd5);
        $resultado = $dUsuario->iniciarSesion($user);
        // se crea las varibales de session donde se guardaran los datos
        $_SESSION["idPersona"] = $resultado->datos->idPersona;
        $_SESSION["nombreUsuario"] = $resultado->datos->perNombre . " " .
        $resultado->datos->perApellido;
        $_SESSION["correo"] = $resultado->datos->perCorreo;
        $_SESSION["rol"] = $resultado->datos->rolNombre;
        // obtieme la cantidad de roles
        $_SESSION["cantidadRol"] = $resultado->datos->cantidadRoles;
        //obtiene el estado del usuario true o false (0 , 1)
        $_SESSION["estado"] = $resultado->datos->usuEstado;
        $_SESSION["identificacion"] = $resultado->datos->perIdentificacion;
        echo json_encode($resultado);
        break;

        case  "obtenerUsuario":
            $resultado = $dUsuario->obtenerUsuario($usuario);//valor del input
        echo json_encode($resultado);
        break;


        /**
        *Envia correo con un link para poder 
        *cambiar la contraseña con un parametro 
        *que es p=idUsuario 
        */
    case "enviarCorreoRecuperacionContrasenia":
        $resultado = $dUsuario->obtenerUsuario($usuario);
        if ($resultado->datos) {
            //se encripta el id del usuario para que no se pueda ver en la url
            // con un separador siendo 0 el sal el 1 el id
            $sal = "pth*$%";//creacion de sal
            $idUsuarioEncriptado = $encriptar($resultado->datos->idUsuario);
            $passwordEncriptado = $sal . "|" . $idUsuarioEncriptado;
            // envia correo
            $correo = new enviarCorreoPrueba();
            $objCorreo = new stdClass();
            $objCorreo->correoRemitente = "soporte.petsHealth@gmail.com"; //aqui pueden colocar el correo del administrador
            $objCorreo->nombreRemitente = "Administración Pets Health"; //igual el nombre del administrador
            $objCorreo->correoDestinatario = $resultado->datos->perCorreo;
            $objCorreo->nombreDestinatario = $resultado->datos->perNombre;
            $objCorreo->asunto = "Confirmación de cambio de contraseña Help Desk";
            $objCorreo->mensaje = "Cordial saludo  " . $resultado->datos->perNombre . "
        " . $resultado->datos->perApellido . ".<br> Se
        informa  usted solicito  un cambio de contraseña por lo tanto   <br>
        Accede a este link para cambiar tu contraseña :
        <a href='http://localhost/repositorio_desarrollo/vista/principal/cambiarContrasenia/?p=" . $passwordEncriptado . "' target='blanck' >Cambiar contraseña</a>
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
                </table>";
            $resultadoCorreo = $correo->enviarCorreo($objCorreo);
            // enviamos el resultado del query y el resultado del correo
            $resultado->mensaje =$resultadoCorreo->mensaje;
        }
        echo json_encode($resultado);
        break;

        case "actualizarPassword":
            $passwordMd5 = md5($password); //se encripta a md5 la contraseña que llega
            $resultado = $dUsuario->actualizarPaswordUsuario($passwordMd5, $idUsuario);
            echo json_encode($resultado);
            break;

            
}   