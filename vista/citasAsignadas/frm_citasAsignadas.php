<div class="row">
    <div class="col">
        <div class="contenedorTabla">
            <table class="tabla" id="tbl_citas">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Tipo de Cita</th>
                        <th>Solicitante</th>
                        <th>Fecha</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody class="pompiere">
                    <tr class="fila" id="primeraFila">
                        <td id="idCita">1</td>
                        <td id="tipoCita">Belleza</td>
                        <td id="solicitante">Bruce Banner</td>
                        <td id="fechaHora">10/05/2021 -- 8:00 am</td>
                        <td><button class="btnMorado" id="btn_atender">Atender</button></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!--Modal para atender las citas asignadas-->

        <div class="modal fade" id="atenderCita" tabindex="-1" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fredoka">Atender Cita</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!--formulario de atender cita-->
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row frm_atenderCita">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="txt_nombre" class="col-form-label fredoka">Mascota</label>
                                        <input type="text" class="cajaTexto pompiere" id="txt_Mascota" readonly="readonly" value="La iguana Feliz">
                                    </div>
                                    <!--tipo de encargado-->
                                    <label for="chk_tipoEncargado" class="col-form-label fredoka">Tipo de Encargado</label>

                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="chk_dueño" name="chk_tipoEncargado" checked>
                                        <label for="chk_dueño" class="form-check-label fredoka">Dueño</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="chk_empleado" name="chk_tipoEncargado">
                                        <label for="chk_empleado" class="form-check-label fredoka">Empleado</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="chk_otro" name="chk_tipoEncargado">
                                        <label for="chk_otro" class="form-check-label fredoka">Otro</label>
                                    </div>

                                    <div class="form-group dueño">
                                        <label for="txt_dueño" class="col-form-label fredoka">Nombre del dueño</label>
                                        <input type="text" class="cajaTexto pompiere" id="txt_dueño" readonly>
                                    </div>

                                    <div class="form-group empleado">
                                        <label for="cb_empleado" class="col-form-label fredoka">Nombre del empleado</label>
                                        <select name="cb_empleado" id="cb_empleado" class="cajaTexto">
                                        </select>
                                    </div>

                                    <div class="form-group encargado">
                                        <label for="txt_encargado" class="col-form-labe fredoka">Nombre del encargado</label>
                                        <input type="text" id="txt_empleado" class="cajaTexto pompiere">
                                    </div>

                                    <div class="domicilio">
                                        <label for="check_domicilio" class="col-form-label fredoka">Domicilio</label>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="chk_si" name="chk_radios" checked>
                                            <label class="form-check-label fredoka" for="chk_si">si</label>
                                        </div>
                                    </div>
                                </div>

                                <!----------------------------------------------------->

                                <div class="col">
                                    <div class="form-group">
                                        <label for="txt_tipoCita" class="col-form-label fredoka">Tipo de Cita</label>
                                        <input class="cajaTexto" id="txt_tipoCita" type="text" value="Consulta General" readonly="readonly">
                                    </div>

                                    <div class="form-group">
                                        <label for="txt_observacion" class="col-form-label fredoka">Observacion</label>
                                        <textarea id="txt_observacion" class="cajaTexto pompiere" style="height: 200px;"></textarea>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <br>

                            <!--buscador de productos-->
                            <div class="row">
                                <div class="col">
                                    <div class="from-group">
                                        <label for="txt_buscadorProductos" class="col-from-label fredoka">Buscador de Productos</label>
                                        <input type="text" class="form-control cajaTexto" id="txt_buscadorProductos" name="txt_buscadorProductos" placeholder="Buscar">

                                        <div id="listaDatos">
                                            <div id="primerCampo" class="primerCampo">
                                                <input type="hidden" value="" id="idProducto">
                                                <a id="dato1" href="#" class="dato1"></a>
                                            </div>
                                        </div>
                                    </div>

                                    <br>
                                    <br>
                                    <!--contenedor de factura-->

                                    <section class="contenedorFactura">
                                        <div class="container">
                                            <div class="row fredoka">
                                                <div class="col-4">
                                                    <div class="factura-header">
                                                        <h6>producto</h6>
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="factura-header">
                                                        <h6>precio</h6>
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="factura-header">
                                                        <h6>cantidad</h6>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="factura-header">
                                                        <h6>Unidad</h6>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="factura-items-container">
                                            </div>

                                            <div class="row fredoka">
                                                <div class="col-4">
                                                    <div class="item precioTotal">
                                                        <h6>Total</h6>
                                                        <p class="txt_total">$</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <!----------------------------------------------------------->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btnNaranja pompiere" id="btn_cerrar" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btnMorado pompiere" id="btn_registrar" data-dismiss="modal">Registrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>