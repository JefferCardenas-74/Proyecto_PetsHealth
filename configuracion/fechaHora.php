<?php

//Objeto fecha
$dateTime= new DateTime();  
$dateTime->setTimezone(new DateTimeZone('America/Bogota'));


$fecha= $dateTime->format("d-m-Y");  
$hora = $dateTime->format("h:i:s a");  
$year = $dateTime->format('Y');
$fechaHora = $dateTime->format("d-m-Y h:i:s a");

$fechaHoraMysql=$dateTime->format("Y-m-d h:i:s a");
