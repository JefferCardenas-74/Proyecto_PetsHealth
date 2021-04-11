<?php
require_once("../../../configuracion/encriptar.php");
// Convierto la variable p en arreglo  para poder separar la cadena
$md5Array=explode("|", $_GET['p']);
// desencripto el arreglo en la posicion 1 que es el id del usuario
$parametro=$desencriptar($md5Array[1]);

?>


<div class="contenedorTitulo">
    <h1 class="titulo fredoka">Cambia tu contraseña <i class="fas fa-key"></i></h1>
</div>


<section class="frmActualizarContraseña">

    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header ">
                        <h4 class="recomendacion">
                            *Recuerda que debe contener almenos 8 caracteres
                        </h4>
                    </div>

                    <div class="card-body">
                        <form action="">
                            <!-- campo oculto para obtner el id del usuario de la url-->
                            <input type="text" name="id_usuarioPassword" id="id_usuarioPassword"
                                value="<?php echo $parametro?>" />
                            <div class="col">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <h5 class="text-inf">Contraseña nueva </h5>

                                        <div class="input-group">
                                            <input type="text" class="form-control" id="txt_passwordNueva"
                                                name="txt_passwordNueva">
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <h5 class="text-inf">Confirmar Contraseña </h5>
                                        <input type="password" class="form-control" id="txt_passwordNueva2"
                                            name="txt_passwordNueva2">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="alert alert-danger pompiere" id="msgPassword" role="alert">
                        Contraseñas diferentes verificar por favor
                    </div>
                    <div class="card-footer text-center">
                        <button type="button" id="btn_actualizarPassword" class="boton btnMorado fredoka btn-lg"
                            type="button">
                            Guardar
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>