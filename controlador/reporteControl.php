<?php
    session_start();
    /**modelo entidades */
    include '../modelo/entidad/Persona.php';
    include '../modelo/entidad/Empleado.php';
    include '../modelo/entidad/Rol.php';
    include '../modelo/entidad/Usuario.php';

    /**modelo datos */
    include '../modelo/datos/conexion.php';
    include '../modelo/datos/datosEmpleado.php';
    include '../modelo/datos/datosCita.php';
    include '../modelo/datos/datosUsuario.php';
    /*archivos de configuracion */
    require_once("../configuracion/fechaHora.php");
    require_once("../modelo/datos/enviarCorreo.php");
    extract($_REQUEST);

    error_reporting(0);

    $dEmpleado = new datosEmpleado();
    $dCita=new datosCita();

    switch($accion){
    case "graficas":
        //arreglo para citas ppr mes
        $meses = array('Enero','Febrero','Marzo','Abril','Mayo', 'Junio',
        'Julio', 'Agosto','Septiembre','Octubre','Noviembre', 'Diciembre');
        $yDatos=array(); //Arreglo que guarda los valores númericos a graficar
        $xMeses=array(); //Valor que guarda el nombre de cada més en formato texto
        $i=0;
        $data[$i] = array('Meses','Cantidad');   

        // arreglo para empleados
        $dataEmpleados[$i]=array('Resultado','Cantidad');
        $yDatosEmpleados=array(); //Arreglo que guarda los valores númericos a graficar
        $xResultado=array(); //Valor que guarda el nombre de cada resultado en formato texto
        switch($tipoGrafica){
            
            case "reporteCitaPorMes":
                $resultado=$dCita->reporteCitaPorMes();
                while($dato = $resultado->datos->fetchObject()){
                    $i++;
                    $xMeses[$i] = (string)$meses[$dato->mes-1];
                    $yDatos[$i] = (int)$dato->cantidad;
                    $data[$i] = array($xMeses[$i],$yDatos[$i]);
                }
                echo json_encode($data);
                break;  
            case "reporteEmpleados":
                $resultado=$dEmpleado->reporteEmpleadosConCitas();
                while($dato = $resultado->datos->fetchObject()){
                    $i++;
                    $xResultado[$i] = (string)$dato->resultado;
                    $yDatosEmpleados[$i] = (int)$dato->cantidad;
                    $dataEmpleados[$i] = array($xResultado[$i],$yDatosEmpleados[$i]);
                }
                echo json_encode($dataEmpleados);
                break; 
        }
    break;
    }