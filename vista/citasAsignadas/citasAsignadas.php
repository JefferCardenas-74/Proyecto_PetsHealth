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
                        <td><button class="boton" id="btn_atender">Atender</button></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Consulta General</td>
                        <td>Tony Start</td>
                        <td>10/05/2021 -- 10:00 am</td>                        
                        <td><button class="boton" id="btn_atender">Atender</button></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Salud Dental</td>
                        <td>Doctor Strange</td>
                        <td>10/05/2021 -- 10:00 am</td>
                        <td><button class="boton" id="btn_atender">Atender</button></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Pediatria</td>
                        <td>Natasha Romanoff</td>
                        <td>10/05/2021 -- 10:00 am</td>
                        <td><button class="boton" id="btn_atender">Atender</button></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!--Modal para atender las citas asignadas-->

        <div class="modal fade" id="atenderCita" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Atender Cita</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div> 
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="txt_nombre" class="col-form-label">Nombre del Dueño</label>
                            <input type="text" class="form-control" id="txt_nombre">
                        </div>

                        <div class="form-group">
                            <label for="cb_mascota" class="col-form-label">Mascota</label>
                            <select id="cb_mascota" class="form-control">
                                <option value="1">La iguana Feliz</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="txt_observacion" class="col-form-label">Observacion</label>
                            <textarea id="txt_observacion" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" id="btn_cerrar" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-success" id="btn_registrar" data-dismiss="modal">Registrar</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>