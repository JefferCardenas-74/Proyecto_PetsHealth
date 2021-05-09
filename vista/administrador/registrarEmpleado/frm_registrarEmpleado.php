<div class="row">
    <div class="col">
        <div class="contenedorRegistrarEmpleado">
            <form name="frmEmpleado" id="frmEmpleado">
                <div class="row contenedorFormulario">
                    <div class="col">
                        <div>
                            <label for="txt_identificacion" class="fredoka">Identificacion</label>
                            <input class="cajaTexto" type="number" id="txt_identificacion" name="txt_identificacion">
                        </div>

                        <div>
                            <label for="txt_nombre" class="fredoka">Nombre</label>
                            <input class="cajaTexto" type="text" id="txt_nombre" name="txt_nombre">
                        </div>

                        <div>
                            <label for="txt_apellido" class="fredoka">Apellido</label>
                            <input class="cajaTexto" type="text" id="txt_apellido" name="txt_apellido">
                        </div>


                    </div>
                    <div class="col">
                        <div>
                            <label for="txt_telefono" class="fredoka">Telefono</label>
                            <input class="cajaTexto" type="number" id="txt_telefono" name="txt_telefono">
                        </div>

                        <div>
                            <label for="txt_correo" class="fredoka">Correo</label>
                            <input class="cajaTexto" type="text" id="txt_correo" name="txt_correo">
                        </div>

                        <div>
                            <label for="cb_rol" class="fredoka">Rol</label>
                            <select name="cb_rol" id="cb_rol" class="cajaTexto">
                                <option  value="0">Seleccione</option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>

            <div class="row">
                <div class="col">
                    <div id="contenedorBotonRegistrar">
                        <button class="btnMorado fredoka" id="btn_registrar">Registrar</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>