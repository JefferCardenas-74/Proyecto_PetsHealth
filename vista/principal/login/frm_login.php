<?php
require_once("../../../configuracion/validaciones.php");
?>
<div class="row">
    <div class="col">
        <div class="contenedorFormularioLogin">

            <form id="frm_login" name="frm_login">

                <input type="hidden" name="accion" id="accion" value="iniciarSesion" />
                <span class="contenedorTituloLogin">
                    <label class="fredoka">Iniciar Sesion</label>
                </span>

                <div class="contenedorLogin">
                    <input class="login" type="text" id="txt_user" name="txt_user" placeholder="Usuario">
                    <span class="simbolo">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="contenedorLogin">
                    <input class="login" type="password" id="txt_password" name="txt_password" placeholder="Contraseña"
                        pattern=".{6,}" required>
                    <span class="simbolo">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="ContenedorBtnLogin">
                    <button type="button" id="btn_iniciarSesion" class="btnLogin fredoka">
                        Ingresar
                    </button>
                </div>

                <br>

                <div class="text-center pompiere">
                    <span class="txt1">
                        No Recuerda:
                    </span>
                    <a class="olvidoPassword" href="#">
                        Contraseña?
                    </a>
                </div>

                <div class="text-center pompiere">
                    <a class="crearCuenta" href="#">
                        Crear Cuenta
                    </a>
                </div>

            </form>

        </div>



    </div>
</div>

<!--Modal para la interfaz de olvido contraseña-->

<div class="modal fade" id="olvidoPasswordModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content modal-content-olvidoContraseña">

            <!-- <div class="salirModal">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> -->

            <div class="modal-header modal-header-olvidoContraseña">
                <label class="fredoka">Olvido Contraseña</label>
            </div>


            <!--formulario de olvido contraseña-->
            <div class="modal-body modal-body-olvidoContraseña">
                <div class="container-fluid">
                    <label class="texto fredoka">Ingresa correo registrado en el sistema
                    </label>
                    <div class="row">
                        <div class="col">
                            <div class="frm_olvidoPassword">
                                <form action="#" method="POST">
                                    <input class="login" type="text" name="txt_olvidoPassword" id="txt_olvidoPassword"
                                        placeholder="Correo">
                                    <span class="simbolo">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                    </span>
                                </form>
                            </div>
                        </div>

                    </div>
                    <!-- mensaje que aparece cuando el usuario ingrese mal el correo -->
                    <small id="msgUser" class='text-muted pompiere'></small>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btnNaranja pompiere" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btnMorado pompiere" id="btn_olvidoContrasenia" l>Enviar</button>
            </div>
        </div>
    </div>
</div>





<!--Modal para crear cuenta-->

<div class="modal fade" id="crearCuentaModal" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content modal-content-crearCuenta">

            <div class="salirModal">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-header modal-header-crearCuenta">
                <label class="fredoka">Crear Cuenta</label>
            </div>

            <!--formulario de crear cuenta-->
            <div class="modal-body modal-body-crearCuenta">
                <div class="container-fluid">
                    <div class="row frm_crearCuenta">
                        <div class="col">

                            <div class="form-group">
                                <label for="txt_nombre" class="col-form-label fredoka">Nombre</label>
                                <input class="cajaTexto" type="text" name="nombre" id="nombre" placeholder="Nombre">
                            </div>

                            <div class="form-group">
                                <label for="txt_apellidos" class="col-form-label fredoka">Apellidos</label>
                                <input class="cajaTexto" type="text" name="apellidos" id="apellidos"
                                    placeholder="Apellidos">
                            </div>

                            <div class="form-group">
                                <label for="txt_cedula" class="col-form-label fredoka">Cedula</label>
                                <input class="cajaTexto" type="number" name="cedula" id="cedula" placeholder="Cedula">
                            </div>

                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="txt_correo" class="col-form-label fredoka">Correo</label>
                                <input class="cajaTexto" type="text" name="email" id="email" placeholder="Email">
                            </div>

                            <div class="form-group">
                                <label for="txt_contraseña" class="col-form-label fredoka">Contraseña</label>
                                <input class="cajaTexto" type="password" name="password" placeholder="Contraseña"
                                    pattern=".{6,}" required>
                            </div>

                            <br>

                            <div class="botones">
                                <button type="button" class="btnNaranja pompiere" id="btn_cerrarCuenta"
                                    data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btnMorado pompiere" id="btn_registrar"
                                    data-dismiss="modal">Registrarse</button>
                            </div>


                        </div>

                    </div>
                </div>
            </div>


        </div>
    </div>
</div>