<?php
// Se definen las rutas del menu

// ADMINISTRADOR
$GLOBALS['verEmpleadosA']="../verEmpleados/";
$GLOBALS['regitrarEmpleadosA']="../registrarEmpleado/";
$GLOBALS['gestionProductosA']="../gestionProductos/";
$GLOBALS['actualizarDatosA']="../actualizarDatos/";
$GLOBALS['verReporteCitasA']="../verReporteGraficoCitas";
$GLOBALS['verReporteEmpleadosA']="../verReporteGraficoEmpleados/";

//EMPLEADO
$GLOBALS['verCitasAsignadasE']="../citasAsignadas/";
$GLOBALS['citasNoProgramadasE']="../citasAsignadas/?page=frm_citasNoProgramadas";
$GLOBALS['actualizarDatosE']="../actualizarDatos/";

// CLIENTE
$GLOBALS['agendarCitaC']="../agendarCita/";
$GLOBALS['verCitaC']="../verCita/";
$GLOBALS['Historial_MascotaC']="../Historial_Mascota/";
$GLOBALS['actualizarDatosC']="../actualizarDatos/";


$arreglo =[];
    $ruta = $_SERVER['REQUEST_URI'];
    $arregloUrl = explode('/', $ruta);
    if($arregloUrl[4]==""){
    //ADMINISTRADOR 
    $GLOBALS['verEmpleadosA']="verEmpleados/";
    $GLOBALS['regitrarEmpleadosA']="registrarEmpleado/";
    $GLOBALS['gestionProductosA']="gestionProductos/";
    $GLOBALS['actualizarDatosA']="actualizarDatos/";
    $GLOBALS['verReporteCitasA']="verReporteGraficoCitas";
    $GLOBALS['verReporteEmpleadosA']="verReporteGraficoEmpleados/";
    // EMPLEADO
    $GLOBALS['verCitasAsignadasE']="citasAsignadas/";
    $GLOBALS['citasNoProgramadasE']="citasAsignadas/?page=frm_citasNoProgramadas";
    $GLOBALS['actualizarDatosE']="actualizarDatos/";
    // CLIENTE
    $GLOBALS['agendarCitaC']="agendarCita/";
    $GLOBALS['verCitaC']="verCita/";
    $GLOBALS['Historial_MascotaC']="Historial_Mascota/";
    $GLOBALS['actualizarDatosC']="actualizarDatos/";

    }