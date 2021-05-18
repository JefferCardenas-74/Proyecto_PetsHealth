<?php
session_start();
include '../modelo/datos/conexion.php';
include '../modelo/datos/datosCita.php';
include '../modelo/datos/datosDetalle.php';
include '../modelo/datos/datosFactura.php';
include '../modelo/datos/datosEmpleado.php';

include '../modelo/entidad/Persona.php';
include '../modelo/entidad/Empleado.php';
include '../modelo/entidad/Servicio.php';
include '../modelo/entidad/Mascota.php';
include '../modelo/entidad/Cita.php';
include '../modelo/entidad/CitaEmpleado.php';
include '../modelo/entidad/Detalle.php';
include '../modelo/entidad/Factura.php';

// archivos especiales
require_once "../configuracion/fechaHora.php";
require_once "../modelo/datos/enviarCorreo.php";

extract($_REQUEST);

error_reporting(0);

$dCita = new datosCita();
$dDetalle = new datosDetalle();
$dFactura = new datosFactura();

switch ($accion) {

    case 'listarCitas':

        $resultado = $dCita->listarCitasAsignadas($idEmpleado);
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

    case 'listarMascotaCliente':
        $resultado = $dCita->buscarMascota($_SESSION['identificacion']);
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
        $servicio = new Servicio($servicio, null, null);
        $mascota = new Mascota($cliente, null, null, null, null);

        $cita = new Cita(null, $mascota, $fecha, "Solicitada", $hora, $servicio);
        $resultado = $dCita->agendarCita($cita);

        if ($resultado->estado) {
            //Enviar correo cuando se agenda cita
            $correo = new enviarCorreoPrueba();
            $objCorreo = new stdClass();
            $objCorreo->correoRemitente = "soporte.petsHealth@gmail.com"; //aqui pueden colocar el correo del administrador
            $objCorreo->nombreRemitente = "Administración Pets Health"; //igual el nombre del administrador
            $objCorreo->correoDestinatario = strtoupper($_SESSION["correo"]);
            $objCorreo->nombreDestinatario = strtoupper($_SESSION["nombreUsuario"]);
            $objCorreo->asunto = "Solicitud de cita en Pets Health";
            $objCorreo->mensaje=
            "<p> Cordial saludo , <br> "
            . " nos permitimos informar que usted  <b>" . strtoupper($_SESSION["nombreUsuario"])
            . " </b> solicito una cita en Pets Health lo cual fue  exitosa por lo tanto sus datos fueron
                <br><b>Dueño de la mascota: </b>" . strtoupper($_SESSION["nombreUsuario"]) . "
                <br><b>Fecha:</b>" . $fecha . "
                <br><b>Hora:</b> " . $horaFormateada . "
                <br><b>Cliente:</b> " . $nombreCliente . "
                <br><b>Servicio:</b> " . $nombreServicio . "
                <br><b>Veterinario: </b> POR ASIGNAR </p>
                <br><span class='recomendacion'>Por favor estar media hora antes de la hora establecida </span>";
             
            $resultadoCorreo = $correo->enviarCorreo($objCorreo);
        }

        echo json_encode($resultado);
        break;

    case 'listarCitaAgendadasPorMi':

        $resultado = $dCita->verCitasAgendadas($_SESSION['idPersona']);
        echo json_encode($resultado);
        break;

    case 'cancelarCitas':
        $resultado = $dCita->cancelarCita($idCita, $idMascota);
        echo json_encode($resultado);
        break;

    case 'obtenerEmpleado':

        $resultado = $dCita->obtenerEmpleado($idPersona);
        echo json_encode($resultado);
        break;

    case 'atenderCita':

        $detalle = new Detalle(null, $observacion, $idCita);

        /**agregamos el detalle y obtenemos el id de ese detalle */
        $resultadoDetalle = $dDetalle->agregarDetalle($detalle);

        /**se suma el valor de los productos + el valor del servicio */
        $totalFinal = $total + $precioServicio;

        /**se procede a agregar la factura */
        $factura = new Factura(null, $idEmpleado, $fechaHoraMysql, $totalFinal, $productos);

        $resultadoFactura = $dFactura->agregarFactura($factura);

        /**se actualiza el estado de la cita */
        $resultado = $dCita->actualizarEstado($idCita);
        //Se actualiza el estado de la mascota
        $resultado = $dCita->actualizarEstadoMascota($idMascota);

        /**se organizan los productos en una tabla */
        $tamano = count($nombreProductos);
        for ($j = 0; $j < $tamano; $j++) {

            $item .= '<li><strong>' . $nombreProductos[$j] . '</strong></li>';
        }
        ;

        $listaProductos = '<ul>' . $item . '</ul>';

        if ($resultado->estado) {
            //Enviar correo cuando se agenda cita
            $correo = new enviarCorreoPrueba();
            $objCorreo = new stdClass();
            $objCorreo->correoRemitente = "soporte.petsHealth@gmail.com"; //aqui pueden colocar el correo del administrador
            $objCorreo->nombreRemitente = "Administración Pets Health"; //igual el nombre del administrador
            $objCorreo->correoDestinatario = $correoPersona;
            $objCorreo->nombreDestinatario = $nombreCliente;
            $objCorreo->asunto = "Informe de la cita atendida.";
            $objCorreo->mensaje = "Cordial saludo , <br> "
            . " nos permitimos informar que su cita con identificacion <b>" . $idCita
            . " </b> fue atendida con exito.
                <br><b>Veterinario: </b>" . strtoupper($_SESSION['nombreUsuario']) . "
                <br><b>Fecha y Hora: </b>" . $fechaHora . "
                <br><b>Nombre de la mascota: </b> " . strtoupper($nombreMascota) . "
                <br><b>Observacion: </b> " . $observacion . "
                <br><b>Productos: </b> " . $listaProductos . "
                <br><b>Total de la consulta : </b> $ " . number_format($totalFinal, 2) . " pesos 
               ";

            $resultadoCorreo = $correo->enviarCorreo($objCorreo);
        }

        echo json_encode($resultado);
        break;

    case "listarCitasAsignar":
        //print_r("entro");
        $resultado = $dCita->listarCitasAsignadasVete();
        //print_r($resultado);
        echo json_encode($resultado);
        break;

    case "AsignarVeterinario":
        $citaEmpleado = new CitaEmpleado(null, $idCita, $idVeterinario);
        $resultado = $dCita->asignarVeterinario($citaEmpleado);
        //print_r($resultado);
        echo json_encode($resultado);
        break;

    case 'atenderCitaNoProgramada':

        $servicio = new Servicio($tipoCita, null, null);
        $mascota = new Mascota($idMascota, null, null, null, null, null);

        $cita = new Cita(null, $mascota, $fechaHoraMysql, 'Atendida', 1, $servicio);
        /**se agrega la cita a la base de datos*/
        $idCita = $dCita->agendarCitaNoProgramada($cita, $idEmpleado);

        /**se agrega el detalle a la base de datos */
        $detalle = new Detalle(null, $observacion, $idCita->datos);
        $resultadoDetalle = $dDetalle->agregarDetalle($detalle);

        /**se obtiene el valor del servicio */
        $valorServicio = $dCita->obtenerValorServicio($tipoCita);
        json_encode($valorServicio);

        $total = $precioProductos + $valorServicio->datos[0]['serPrecio'];

        /**se agrega la factura a la base de datos */
        $factura = new Factura(null, $idEmpleado, $fechaHoraMysql, $total, $productos);
        $resultado = $dFactura->agregarFactura($factura);

        $tamano = count($nombreProductos);
        for ($j = 0; $j < $tamano; $j++) {

            $item .= '<li><strong>' . $nombreProductos[$j] . '</strong></li>';
        }
        ;

        $listaProductos = '<ul>' . $item . '</ul>';

        if ($resultado->estado) {
            //Enviar correo cuando se agenda cita
            $correo = new enviarCorreoPrueba();
            $objCorreo = new stdClass();
            $objCorreo->correoRemitente = "soporte.petsHealth@gmail.com"; //aqui pueden colocar el correo del administrador
            $objCorreo->nombreRemitente = "Administración Pets Health"; //igual el nombre del administrador
            $objCorreo->correoDestinatario = $correoPersona;
            $objCorreo->nombreDestinatario = $nombreCliente;
            $objCorreo->asunto = "Informe de la cita atendida.";
            $objCorreo->mensaje = "<p> Cordial saludo , <br> "
            . "Nos permitimos informarle que su cita fue atendida con exito.
                <br><b>Veterinario: </b>" . strtoupper($_SESSION['nombreUsuario']) . "
                <br><b>Fecha y Hora: </b>" . $fechaHora . "
                <br><b>Nombre de la mascota: </b> " . strtoupper($nombreMascota) . "
                <br><b>Observacion: </b> " . $observacion . "
                <br><b>Productos: </b> " . $listaProductos . "
                <br><b>Total de la consulta: </b> $ " . number_format($total, 2) . " pesos </p>
                ";

            $resultadoCorreo = $correo->enviarCorreo($objCorreo);
        }

        echo json_encode($resultado);
        break;
}

