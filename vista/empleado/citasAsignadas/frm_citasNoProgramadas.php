<div class="container-fluid">
    <div class="row frm_atenderUrgencia">
        <div class="col">

            <label for="txt_cedula" class="col-form-label fredoka">Ingrese una cedula para buscar</label>
            <div class="form-group buscar_cedula">
                <input type="number" class="cajaTexto pompiere" id="txt_cedula" placeholder="Ingrese una cedula">
                <div id="btn_buscar">
                    <i class="fas fa-search" id="icono-buscar"></i>
                </div>
            </div>

            <div class="form-group">
                <label for="txt_encargado" class="col-form-label fredoka">Nombre del encargado</label>
                <input type="text" class="cajaTexto pompiere" id="txt_encargado" readonly>
            </div>

            <div class="form-group">
                <label for="cb_mascota" class="col-form-label fredoka">Mascota</label>
                <select id="cb_mascota" class="form-control fredoka">

                </select>
            </div>

            <!--radio button tipo de encargado-->
            <label for="chk_tipoEncargado" class="col-form-label fredoka">Tipo de Encargado</label>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="chk_dueño" name="chk_tipoEncargado" checked>
                <label for="chk_dueño" class="form-check-label fredoka">Dueño</label>
            </div>

            <div class="form-check">
                <input type="radio" class="form-check-input" id="chk_otro" name="chk_tipoEncargado">
                <label for="chk_otro" class="form-check-label fredoka">Otro</label>
            </div>

            <!------------------------------->

            <label for="check_domicilio" class="col-form-label fredoka">Domicilio</label>

            <div class="form-check">
                <input class="form-check-input" type="radio" id="chk_si" name="chk_radios">
                <label class="form-check-label fredoka" for="chk_si">si</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="chk_no" name="chk_radios" checked>
                <label class="form-check-label fredoka" for="chk_no">No</label>
            </div>
        </div>

        <div class="col">
            <div class="form-group">
                <label for="cb_tipoCita" class="col-form-label fredoka">Tipo de Cita</label>
                <select id="cb_tipoCita" class="form-control fredoka">
                    <option value="1">Belleza</option>
                    <option value="2">consulta General</option>
                    <option value="3">Salud Dental</option>
                    <option value="4">Pediatria</option>
                </select>
            </div>

            <div class="form-group">
                <label for="txt_observacion" class="col-form-label fredoka">Observacion</label>
                <textarea id="txt_observacion" class="cajaTexto pompiere" style="height: 200px;"></textarea>
            </div>
        </div>
    </div>

    <!--modal para registrar cliente-->

    <div class="modal fade" id="registrarCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header barra">
                    <h5 class="modal-title" style="color:#fff;"">Opps!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pompiere">
                    <p>Parece que este cliente no esta registrado :(</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btnMorado">Registrar Cliente</button>
                </div>
            </div>
        </div>
    </div>
      <!------------------------------------------------------------------------------>
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
                        <a id="dato1" class="dato1"></a>
                    </div>
                </div>
            </div>

            <br>
            <br>
            <!--contenedor de factura-->

            <section class="contenedorFactura">
                <div class="container factura">
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

    <div class="botonCitaNoPro">
        <button class="btnMorado" id="btn_atenderCitaNoPro">Atender Cita</button>
    </div>

</div>
</div>
</div>