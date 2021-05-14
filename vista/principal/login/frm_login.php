<?php
require_once("../../../configuracion/validaciones.php");
?>
<div class="row">
    <div class="col">
        <div class="contenedorFormularioLogin">

            <form id="frm_login" name="frm_login">

                <input type="hidden" name="accion" id="accion" value="iniciarSesion" />
                <span class="contenedorTituloLogin">
                    <label class="fredoka tituloFormulario">Iniciar Sesion</label>
                </span>

                <div class="contenedorLogin">
                    <input class="login" type="text" id="txt_user" name="txt_user" placeholder="Usuario">
                    <span class="simbolo">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="contenedorLogin">
                    <input class="login password passwordNueva2" type="password" id="txt_password" name="txt_password"
                        placeholder="Contraseña" pattern=".{6,}" required>
                    <span class="simbolo">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                    <img class="ojito" onclick="mostrarPassword();" src="../../../componente/img/passwordOjo.png" style="height:20px; width:20px;" alt="">


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
                    <a class="txtCrearCuenta" href="#" onclick="limpiarFormulario()">
                        Crear Cuenta
                    </a>
                </div>

            </form>

        </div>




        <!--Modal para la interfaz de olvido contraseña-->

        <div class="modal fade" id="olvidoPasswordModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content contentModalolvidoContraseña">


                    <!-- <div class="salirModal">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> -->

                    <div class="modal-header headerModalOlvidoPassword">
                        <label class="fredoka">Olvido Contraseña</label>
                    </div>


                    <!--formulario de olvido contraseña-->
                    <div class="modal-body bodyModalolvidoContraseña">
                        <div class="container-fluid">
                            <label class="texto fredoka textoOlvidoContraseña">Ingresa correo registrado en el sistema
                            </label>
                            <div class="row">
                                <div class="col">
                                    <div class="frm_olvidoPassword">
                                        <form action="#" method="POST">
                                            <input class="login" type="text" name="txt_olvidoPassword"
                                                id="txt_olvidoPassword" placeholder="Correo">
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
                    <div class="modal-footer footerModal">
                        <button type="button" class="btnNaranja pompiere" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btnMorado pompiere" id="btn_olvidoContrasenia">Enviar</button>
                    </div>
                </div>
            </div>
        </div>


        <!--Modal para crear cuenta-->

        <div class="modal fade" id="crearCuenta" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title fredoka">Crear Cuenta</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <!--formulario de crear cuenta-->
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row frm_crearCuenta">
                                <div class="col">
                                    <!--Titulo-->
                                    <div class="row">
                                        <div class="col">
                                            <div class="from-group">
                                                <label class="fredoka">CLIENTE</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!--formulario de crear cuenta cliente-->

                                    <div class="form-group">
                                        <label for="txt_cedula" class="col-form-label fredoka">Cedula</label>
                                        <input class="cajaTexto" min="0" type="number" name="txt_cedula" id="txt_cedula"
                                            placeholder="Cedula">
                                    </div>

                                    <div class="form-group">
                                        <label for="txt_nombre" class="col-form-label fredoka">Nombre</label>
                                        <input class="cajaTexto" type="text" name="txt_nombre" id="txt_nombre"
                                            placeholder="Nombre">
                                    </div>

                                    <div class="form-group">
                                        <label for="txt_apellidos" class="col-form-label fredoka">Apellidos</label>
                                        <input class="cajaTexto" type="text" name="txt_apellidos" id="txt_apellidos"
                                            placeholder="Apellidos">
                                    </div>

                                </div>

                                <div class="col segundaParte">

                                    <div class="form-group">
                                        <label for="txt_telefono" class="col-form-label fredoka">Telefono</label>
                                        <input class="cajaTexto" min="0" type="number" name="txt_telefono"
                                            id="txt_telefono" placeholder="Telefono">
                                    </div>

                                    <div class="form-group">
                                        <label for="txt_correo" class="col-form-label fredoka">Correo</label>
                                        <input class="cajaTexto" type="email" name="txt_correo" id="txt_correo"
                                            placeholder="Email">
                                    </div>

                                    <!--
                                <div class="form-group">
                                    <label for="txt_contraseña" class="col-form-label fredoka">Contraseña</label>
                                    <input class="cajaTexto" type="password" name="password" placeholder="Contraseña"
                                        pattern=".{6,}" required>
                                </div>-->

                                </div>
                            </div>

                            <br>
                            <br>


                            <div class="row frm_crearCuentaMascota">
                                <div class="col">
                                    <!--Titulo-->
                                    <div class="row">
                                        <div class="col">
                                            <div class="from-group">
                                                <label class="fredoka">MASCOTA</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!--formulario de crear cuenta mascota-->
                                    <div class="form-group">
                                        <label for="txt_nombreMascota" class="col-form-label fredoka">Nombre de la
                                            mascota</label>
                                        <input class="cajaTexto" type="text" name="txt_nombreMascota"
                                            id="txt_nombreMascota" placeholder="Nombre de la mascota" value="">
                                    </div>

                                    <div class="form-group">
                                        <label for="txt_edadMascota" class="col-form-label fredoka">Edad de la
                                            mascota</label>
                                        <input class="cajaTexto" min="0" type="number" name="txt_edadMascota"
                                            id="txt_edadMascota" placeholder="Edad de la mascota">
                                    </div>

                                    <div class="form-group">
                                        <label for="dt_fechaNacimientoMascota" class="col-form-label fredoka">Fecha de
                                            Nacimiento de la mascota</label>
                                        <br>
                                        <input class="cajaTexto" type="date" name="dt_fechaNacimientoMascota"
                                            id="dt_fechaNacimientoMascota">
                                    </div>

                                </div>

                                <div class="col segundaParteMascota">

                                    <div class="form-group">
                                        <label class="col-form-label fredoka">Tipo de la mascota</label>
                                        <select style="width:70%" class="cb_tipoMascota" name="cb_tipoMascota"
                                            id="cb_tipoMascota">
                                            <option value="0" class="limpiar">Seleccione</option>
                                        </select>
                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btnNaranja pompiere" id="btn_cerrarCuenta"
                            data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btnMorado pompiere" id="btn_registrar">Registrarse</button>
                    </div>
                </div>
            </div>
        </div>

        <input type="hidden" id="accion" name="accion" value="">





    </div>
</div>