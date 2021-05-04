<div class="datos_ListaCitasPorAsignarVete">
    <table border ="1" name="tbl_AsignarVete" id="tbl_AsignarVete">
        <thead>
            <tr>
                <th>N°</th>
                <th>Fecha y Hora</th>
                <th>tipo de Cita</th>
                <th>Solicitante</th>
            </tr>
        </thead>
        <tbody>
            <tr id="filaAsignarVete" class="primeraFilaAsignarVete">
                <td id="VidCita"></td>
                <td id="VFechayHora"></td>
                <td id="VTipoCita"></td>
                <td id="VSolicitante"></td>
                <th><button type="button" id="btn_mostrarModal" data-toggle="modal" data-target="#modalAsignar" class="btn_morado">Asignar</button></th>
            </tr>
        
        </tbody>

    </table>

</div>
<!-- Modal actualizar descripcion-->
<div class="modal" id="modalAsignar">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Encabezado-->
            <div class="modal-header">
                <h4 class="modal-title">Asignar Veterinario</h4>
                <button type="button" class=" close" data-dismiss="modal"> &times;</button>
            </div>
            <!-- Modal Contenido-->
            <div class="modal-body">
                    <tr>
                        <td> Seleccione Veterinario
                                <select name="cbVeterinarios" id="cbVeterinarios" class="form-control">
                                    <option value="0"> Seleccione</option>
                                </select>
                        </td>
                    </tr>
            </div>
            <!-- Modal Pie Pagina -->
            <div class="modal-footer">
                <button type="button" class="btn_morado" data-dismiss="modal" id="btn_asignarVete">Asignar</button>
                <button type="button" class="btn_naranja" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>