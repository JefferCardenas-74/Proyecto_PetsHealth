<div class="row">
    <div class="col">
        <div class="contenedorTabla">
            <table class="tabla">
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
                    <tr>
                        <td>1</td>
                        <td>Belleza</td>
                        <td>Bruce Banner</td>
                        <td>10/05/2021 -- 8:00 am</td>
                        <td><button class="btnMorado btn_atender" >Atender</button></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Consulta General</td>
                        <td>Tony Start</td>
                        <td>10/05/2021 -- 10:00 am</td>                        
                        <td><button class="btnMorado btn_atender" >Atender</button></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Salud Dental</td>
                        <td>Doctor Strange</td>
                        <td>10/05/2021 -- 10:00 am</td>
                        <td><button class="btnMorado btn_atender" >Atender</button></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Pediatria</td>
                        <td>Natasha Romanoff</td>
                        <td>10/05/2021 -- 10:00 am</td>
                        <td><button class="btnMorado btn_atender" >Atender</button></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!--Modal para atender las citas asignadas-->

        <div class="modal fade" id="atenderCita" tabindex="-1" aria-hidden="true">
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
                                        <input type="text" class="cajaTexto" id="txt_Mascota" readonly="readonly" value="La iguana Feliz">
                                    </div>
                                    
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

                                    <div class="form-group encargado">
                                        <label for="txt_encargado" class="col-form-label fredoka">Nombre del encargado</label>
                                        <input type="text" class="cajaTexto" id="txt_encargado" value="">
                                    </div>

                                    <div class="domicilio">
                                        <label for="check_domicilio" class="col-form-label fredoka">Domicilio</label>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="chk_si" name="chk_radios" checked>
                                            <label class="form-check-label fredoka" for="chk_si">si</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="chk_no" name="chk_radios">
                                            <label class="form-check-label fredoka" for="chk_no">No</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="txt_tipoCita" class="col-form-label fredoka">Tipo de Cita</label>
                                        <input class="cajaTexto" id="txt_tipoCita" type="text" value="Consulta General" readonly="readonly">
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
                                        <input type="text" class="form-control cajaTexto" id="txt_buscadorProductos" name="txt_buscadorProductos" placeholder="Buscar">

                                        <div id="listaDatos">
                                            <div id="primerCampo" class="primerCampo">
                                                <a id="dato1" href="#"></a>
                                            </div>                                            
                                        </div>
                                    </div>

                                    <br>
                                    <br>

                                    <!--tabla de productos y servicios -->
                                    <div>
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
                                                <tr class="primeraFila" id="fila">
                                                    <td id="proNombre"></td>
                                                    <td id="proPrecio"></td>
                                                    <td id="cantidad">
                                                        <input type="number" id="txt_cantidad" name="txt_cantidad">
                                                    </td>
                                                    <td id="proUnidad"></td>
                                                    <td id="btn_eliminar">
                                                        <button class="btnNaranja">Eliminar</button>
                                                    </td>
                                                </tr>                                    
                                            </tbody>

                                            <tfoot class="pompiere">
                                                <tr class="text-align-center">
                                                    <td colspan="4" style="text-align: center;">
                                                        <label id="total"></label>    
                                                    </td>
                                                    <td class="bg-dark text-white">
                                                        <label>Total</label>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
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