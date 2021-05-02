<?php
    session_start();
    include '../modelo/datos/datosCita.php';
    include '../modelo/datos/conexion.php';
    include '../modelo/entidad/Cita.php';
    include '../modelo/entidad/Servicio.php';
    include '../modelo/entidad/Mascota.php';

    // archivos especiales
    require_once("../configuracion/fechaHora.php");
    require_once("../modelo/datos/enviarCorreo.php");


    extract($_REQUEST);

    error_reporting(0);

    $dCita = new datosCita();
     
 

    switch($accion){

        case 'listarCitas':
            $resultado = $dCita->listarCitas();
            echo json_encode($resultado);
            break;
        
        case 'datosCita':
            $resultado = $dCita->mostrarDatosCita($dato);
            echo json_encode($resultado);
            break;

        case 'listarEmpleados':
            $resultado = $dCita->listarEmpleados();
            echo json_encode($resultado);
            break;

        case 'buscarCliente':
            $resultado = $dCita->buscarCliente($cedula);
            echo json_encode($resultado);
            break;

        case 'buscarMascotas':
            $resultado = $dCita->buscarMascota($cedula);
            echo json_encode($resultado);
            break;
        
        case 'listarTipoCita':
            $resultado = $dCita->listarTipoCita();
            echo json_encode($resultado);
            break;

        case 'listarHorasDisponibles':
            $resultado = $dCita->listarHorasDisponibles($fecha);
            echo json_encode($resultado);
            break;

        case 'agendarCita':
            $servicio=new Servicio($servicio,null,null);
            $mascota= new Mascota($cliente,null,null,null,null);

            $cita =new Cita(null,$mascota,$fecha,"Solicitada",$hora,$servicio);
            $resultado=$dCita->agendarCita($cita);

            if($resultado->estado){
                //Enviar correo cuando se inicia sesion
                $correo = new enviarCorreoPrueba();
                $objCorreo = new stdClass();
                $objCorreo->correoRemitente = "soporte.petsHealth@gmail.com"; //aqui pueden colocar el correo del administrador
                $objCorreo->nombreRemitente = "Administración Pets Health"; //igual el nombre del administrador
                $objCorreo->correoDestinatario =$_SESSION["correo"];
                $objCorreo->nombreDestinatario =$_SESSION["nombreUsuario"];
                $objCorreo->asunto = "Solicitud de cita en Pets Health";
                $objCorreo->mensaje = "Cordial saludo , <br> "
                ." nos permitimos informar que usted  <b>".$_SESSION["nombreUsuario"]
                ." </b> solicito una cita en Pets Health lo cual fue  exitosa por lo tanto sus datos fueron
                <br><b>Dueño mascota </b>". $_SESSION["nombreUsuario"]."
                <br><b>Fecha </b>".$fecha."
                <br><b>Hora </b> ".$horaFormateada."
                <br><b>Cliente </b> ".$nombreCliente."
                <br><b>Veterinario</b> POR ASIGNAR

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
            }

            echo json_encode($resultado);
            break;

            case 'listarCitaAgendadasPorMi':
                
                $resultado = $dCita->verCitasAgendadas($_SESSION['idPersona']);
                echo json_encode($resultado);
                break;


            case 'cancelarCitas':
                $resultado = $dCita->cancelarCita($idCita,$idMascota);
                echo json_encode($resultado);
                break;

    }

?>


