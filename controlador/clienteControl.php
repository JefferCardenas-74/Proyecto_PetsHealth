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

            //$persona = new Persona(null, "123", "f", "s", "123", "test@sa");

            $persona = new Persona(null, $cedula, strtoupper($nombre), strtoupper($apellidos), $telefono, $correo);

            $resultadoCliente = $dCliente->registrarPersonaCli($persona);

            echo json_encode($resultadoCliente);
            break;

        case 'AgregarMascota':
            /**se calcula la edad de la mascota */
            $edadMascota = $year - $año;

            $mascota = new Mascota(null, $idPersona, $tipoMascota, strtoupper($nombreMascota), $fechaNacimientoMascota, $edadMascota);
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
                $objCorreo->nombreDestinatario =strtoupper($nombre) . " " . strtoupper($apellido);
                $objCorreo->asunto = "Confirmación Registro de cliente en  Pets Health";
                $objCorreo->mensaje = "Cordial saludo  " .strtoupper($nombre). " " . strtoupper($apellido) . ".<br> se
                            informa que el usuario se creo con exito <br>
                            sus datos son :<br> 
                            Usuario inicio sesion  : <b>  " . $correo . " </b> <br>
                            contraseña : <b>  " . $cedula . " </b>
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

