<?php

?>

<div class="contenedorTitulo">
    <h1 class="titulo fredoka">Gestiona tus Mascotas!</h1>
</div>

<div class="container-fluid">

    <div class="contenedorBotonAgregar">
        <button type="button" class="fredoka btnMorado" id="btn_abrirModalAgregar">Agrega tus Mascotas</button>
    </div>

    <br>

    <div class="contenedorTablaMascotas">
        <table class="tabla" id="tbl_mascotas">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nombre</td>
                    <td>Tipo Mascota</td>
                    <td>Edad (Años)</td>
                    <td>Accion</td>
                </tr>
            </thead>
            <tbody class="pompiere">
                <tr class="fila" id="primeraFila">
                    <td id="txt_id">10</td>
                    <td id="txt_nombre">La iguana feliz</td>
                    <td id="txt_raza">Reptil</td>
                    <td id="txt_edad">4</td>
                    <td id="botones">
                        <button class="btnMorado fredoka" id="btn_actualizar"><i class="fas fa-edit"></i></button>
                        <button class="btnNaranja fredoka" id="btn_eliminar"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal para agregar mascota-->

<div class="modal fade" id="modalAgregarMascota" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header barra">
                <p class="modal-title fredoka text-white">Agrega tus Mascotas</p>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="contenedorFormularioAgregarMascota">
                    <form id="frm_agregarMascota" method="POST">

                        <div>
                            <label for="txt_nombreMascota" class="col-form-label fredoka">Nombre de la Mascota</label>
                            <input type="text" id="txt_nombreMascota" name="txt_nombreMascota" class="cajaTexto pompiere">
                        </div>

                        <div>
                            <label for="cb_tipoMascota" class="col-form-label fredoka">Tipo de Mascota</label>
                            <select name="cb_tipoMascota" id="cb_tipoMascota" class="cajaTexto pompiere">
                                <option value="0">Seleccione</option>
                            </select>
                        </div>


                        <div>
                            <label for="txt_fechaNacimiento" class="col-form-label fredoka">Fecha de Nacimiento</label>
                            <input type="date" id="txt_fechaNacimiento" name="txt_fechaNacimiento" class="cajaTexto pompiere">
                        </div>

                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btnNaranja fredoka" id="btn_cancelar" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btnMorado fredoka" id="btn_agregar">Agregar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para actualizar mascota -->

<div class="modal fade" id="modalActualizarMascota" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header barra">
                <h1 class="modal-title fredoka text-white">Actualiza los datos de tu mascota!</h1>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="contenedorFormularioActualizarMascota">
                    <form id="frm_actualizarMascota" method="POST">

                        <div>
                            <label for="txt_nombreMascota" class="col-form-label fredoka">Nombre de la Mascota</label>
                            <input type="text" id="txt_nombreMascotaA" name="txt_nombreMascotaA" class="cajaTexto pompiere">
                        </div>

                        <div>
                            <label for="cb_tipoMascota" class="col-form-label fredoka">Tipo de Mascota</label>
                            <select name="cb_tipoMascotaA" id="cb_tipoMascotaA" class="cajaTexto pompiere">
                                <option value="0">Seleccione</option>
                            </select>
                        </div>


                        <div>
                            <label for="txt_fechaNacimiento" class="col-form-label fredoka">Fecha de Nacimiento</label>
                            <input type="date" id="txt_fechaNacimientoA" name="txt_fechaNacimientoA" class="cajaTexto pompiere">
                        </div>

                    </form>
                </div>
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btnNaranja fredoka" id="btn_cancelarA" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btnMorado fredoka" id="btn_actualizarA">Actualizar</button>
            </div>
        </div>
    </div>
</div>