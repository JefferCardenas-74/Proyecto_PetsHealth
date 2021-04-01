<div class="container-fluid">
    <div class="row frm_atenderUrgencia">
        <div class="col">

            <div class="form-group">
                <label for="txt_nombre" class="col-form-label fredoka">Mascota</label>
                <input type="text" class="cajaTexto" id="txt_Mascota"
                    value="">
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
            <div class="form-group">
                <label for="txt_encargado" class="col-form-label fredoka">Nombre del encargado</label>
                <input type="text" class="cajaTexto" id="txt_encargado" value="Toretto">
            </div>

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
                <textarea id="txt_observacion" class="cajaTexto" style="height: 200px;"></textarea>
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
                <input type="text" class="cajaTexto" id="txt_buscadorProductos" placeholder="Buscar">

                <div id="listaDatos">
                    <div id="primerCampo" class="primerCampo">
                        <a id="dato1" href="#"></a>
                    </div>                                            
                </div>
            </div>

            <br>
            <br>

            <!--tabla de productos y servicios -->
            <div class="contenedorTabla">
                <table class="tabla">
                    <thead>
                        <tr>
                            <th scope="col">Productos</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Unida de Medida</th>
                            <th scope="col">Accion</th>
                        </tr>
                    </thead>

                    <tbody class="pompiere">
                        <tr>
                            <th scope="row">Nutran</th>
                            <td>10000</td>
                            <td>2</td>
                            <td>Und</td>
                            <td><button class="btnNaranja pompiere">Eliminar</button></td>
                        </tr>
                        <tr>
                            <th scope="row">Pericon</th>
                            <td>10000</td>
                            <td>4</td>
                            <td>Und</td>
                            <td><button class="btnNaranja pompiere">Eliminar</button></td>
                        </tr>
                        <tr>
                            <th scope="row">Domicilio</th>
                            <td>10000</td>
                            <td>1</td>
                            <td>Und</td>
                            <td><button class="btnNaranja pompiere">Eliminar</button></td>
                        </tr>
                        <tr>
                            <th scope="row">Consulta General</th>
                            <td>10000</td>
                            <td>1</td>
                            <td>Und</td>
                            <td><button class="btnNaranja pompiere">Eliminar</button></td>
                        </tr>
                    </tbody>

                    <tfoot class="pompiere">
                        <tr class="text-align-center">
                            <td colspan="4" style="text-align: center;">
                                <label>40000</label>
                            </td>
                            <td class="bg-dark text-white">
                                <label>Total</label>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="botonCitaNoPro">
                <button class="btnMorado" id="btn_atenderCitaNoPro">Atender Cita</button>
            </div>

        </div>
    </div>
</div>