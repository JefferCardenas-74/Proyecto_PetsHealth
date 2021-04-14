<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;



require '../componente/librerias/phpMailer/Exception.php';
require '../componente/librerias/phpMailer/PHPMailer.php';
require '../componente/librerias/phpMailer/SMTP.php';

class enviarCorreoPrueba
{

    private $retorno;
    private $mail;
    // private $fp;
    /**
     * Constructor de la clase, crea el objeto de tipo phpmailer
     * y un objeto de tipo stdclass
     */
    public function __construct()
    {
        $this->retorno = new stdClass();
        $this->mail = new PHPMailer(true);
        // $this->fp=fopen("../Modelo/Datos/password.txt", "r");
    }

    /**
     * Envia correo electrónico, utilizando los atributos
     * del objeto recibido como parámetro
     */
    public function enviarCorreo(stdClass $objCorreo)
    {
        try {
            $this->mail->IsSMTP();
            //$this->mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $this->mail->SMTPAuth = true;
            $this->mail->Host = "smtp.gmail.com";
            $this->mail->Port = 587;
            $this->mail->Username = "soporte.petshealth@gmail.com"; //correo de gmail utilizado para el envío
            $this->mail->Password = fgets(fopen("../configuracion/contraseniaCorreo.txt", "r")); //abre el archivo y retorna la clave
            $this->mail->From = $objCorreo->correoRemitente;
            $this->mail->FromName = utf8_decode($objCorreo->nombreRemitente);
            $this->mail->Subject = utf8_decode($objCorreo->asunto);
            $this->mail->Body = utf8_decode($objCorreo->mensaje);
            $this->mail->AddAddress($objCorreo->correoDestinatario, utf8_decode($objCorreo->nombreDestinatario));
            $this->mail->IsHTML(true);
            $this->mail->Send();
            $this->retorno->estado = true;
            $this->retorno->mensaje = "Correo Enviado";
            $this->retorno->datos = null;
        } catch (Exception $e) {
            $this->retorno->estado = false;
            $this->retorno->mensaje = "No se pudo enviar correo al Destinatario " . $this->mail->ErrorInfo;
            $this->retorno->datos = null;
        }
        return $this->retorno;
    }


}