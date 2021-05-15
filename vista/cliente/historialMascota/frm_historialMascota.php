<div class="contenedorTitulo">
    <h1 class="titulo fredoka">Historial Mascota</h1>
</div>
    <div class="row contenerdorTodo pompiere">
        <div class="col">
            <div class="contenedorBusqueda">
                <form name="frm_buscarDueño" id="frm_buscarDueño" method="post"></form>
                    <p><label style="font-weight:bold;" name="lbl_mascota" id="lbl_mascota">Eliga la Mascota</label></p>
                        <select style="width:70%" size="5" name="cb_mascota" id="cb_mascota">
                            <option value="0" >Seleccione</option>
                        </select>
                    <!--Campos ocultos -->
                    <input type="hidden" value="" id="idPersona" name="idPersona">
                    <input type="hidden" id="accion" name="accion" value="">  




            </div>
        </div>

        <div class="col">
            <div class="datos_mascota">   
                <div class="campos_datosMascota">
                    <div class="contenedorDatosPequeña">
                        <p><label name="lbl_nombreEncargado" id="lbl_nombreEncargado" style="font-weight:bold;">Nombre Dueño:</label></p>
                        <p><label name="lbl_nombre" id="lbl_nombre"> </label></p>
                    </div>
                    <div class="contenedorDatosPequeña">
                        <p><label name="lbl_cedulaEncargado" id="lbl_cedulaEncargado" style="font-weight:bold;">Cedula:</label></p>
                        <p><label name="lbl_cedula" id="lbl_cedula"> </label></p>
                    </div>  
                    <div class="contenedorDatosPequeña">
                        <p><label name="lbl_nombreMascota" id="lbl_nombreMascota" style="font-weight:bold;">Nombre Mascota:</label></p>
                        <p><label name="lbl_nombreM" id="lbl_nombreM"> </label></p>
                    </div>
                    <div class="contenedorDatosPequeña">
                        <p><label name="lbl_edad" id="lbl_edad" style="font-weight:bold;">Edad:</label></p>
                        <p><label name="lbl_edadM" id="lbl_edadM"> </label></p>

                    </div>
                </div>
                </form> 
            </div>       
        </div>

    </div>




<br>
<br>
<br>


<div class="datos_historialMascota">
    <table name="tbl_historialMascota" id="tbl_historialMascota" class="tabla">
        <thead>
            <tr>
                <th>Fecha y Hora</th>
                <th>Descripción</th>
                <th>tipo de Cita</th>
                <th>Responsable</th>
            </tr>
        </thead>
        <tbody>
            <tr id="filaHistorialM" class="primeraFilaHisorialM">
                <td id="hFechayHora"></td>
                <td id="hDescripcion"></td>
                <td id="hTipoCita"></td>
                <td id="hResponsable"></td>
            </tr>
        
        </tbody>

    </table>

</div>
<!-- Modal actualizar descripcion-->
<div class="modal fade modalActualizar" id="modalActualizar" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Encabezado-->
            <div class="modal-header">
                <h4 class="modal-title">Actualizar Descripcion</h4>
                <button type="button" class=" close" data-dismiss="modal"> &times;</button>
            </div>
            <!-- Modal Contenido-->
            <div class="modal-body">
                <p><label name="lbl_responsable" id="lbl_responsable">Responsable:</label></p>
                <input type="text" id="lbl_responsableM" name="lbl_responsableM" disabled>                
                <!--<p><label id="lbl_responsableM" name="lbl_responsableM"> </label></p>-->
                <br>
                <p><label name="lbl_descripcion" id="lbl_descripcion">Descripcion:</label></p>
                <textarea id="txt_descripcion" name="txt_descripcion" cols="50" rows=""  class="form-control"></textarea>
            </div>
            <!-- Modal Pie Pagina -->
            <div class="modal-footer">
                <button type="button" class="btn_morado" data-dismiss="modal" id="btn_actualizarDescripcion">Actualizar</button>
                <button type="button" class="btn_naranja" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

