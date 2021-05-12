<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="contenedorAgregarServicio">

                <div class="botonAgregarServicio">
                    <button class="btnMorado fredoka" id='btn_modalAgregarServicio' name="btn_agregarServicio">Agregar Servicio</button>
                </div>

            </div>

            <div class='contenedorTablaServicios fredoka'>
                <table class="table tabla display nowrap" cellspacing='0' id='tbl_servicios' width='100%'>
                    <thead>
                        <th>Tipo</th>
                        <th>Descripcion</th>
                        <th>Precio</th>
                        <th>Accion</th>
                    </thead>
                    <tbody class="pompiere">
                        <tr class="fila" id='primeraFila'>
                            <td id="tipo">Croquetas</td>
                            <td id="descripcion">Comida</td>
                            <td id="precio">Pre</td>
                            <td id="botones"><button class="btnMorado" id='btn_actualizar'><i class="fas fa-edit"></i></button>
                                <button class="btnNaranja" id='btn_eliminar'><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- modal para agregar un servicio -->

<div class="modal fade" id='mdl_agregar'>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header barra">
                <p class="modal-title fredoka" style="color:#fff;">Agregar Servicio</p>
                <button class="close" data-dismiss='modal' aria-label="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class='modal-body'>
                <div class="contenedorFormularioServicio">
                    <form id='frm_servicio'>

                        <div>
                            <label for="txt_tipo" class="fredoka">Tipo</label>
                            <input class=" cajaTexto pompiere" type="text" name="txt_tipo" id='txt_tipo'>
                        </div>

                        <div>
                            <label for="txt_descripcion" class="fredoka">Descripción</label>
                            <textarea class="cajaArea pompiere" name="txt_descripcion" id='txt_descripcion'></textarea>
                        </div>

                        <div>
                            <label for="txt_precio" class="fredoka">Precio</label>
                            <input class="cajaTexto pompiere" min="0" type="number" name="txt_precio" id="txt_precio">
                        </div>
                    </form>
                </div>

            </div>
            <div class="modal-footer botonModal">

                <div>
                    <button class="btnMorado" id='btn_agregar' name='btn_agregar'>Agregar</button>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- modal para actualizar datos -->

<div class="modal fade" id='mdl_actualizar'>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header barra">
                <p class="modal-title fredoka" style="color:#fff;">Actualizar Servicio</p>
                <button class="close" data-dismiss='modal' aria-label="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class='modal-body'>
                <div class="contenedorFormularioProductoA">
                    <form id='frm_servicioA'>

                        <div>
                            <label for="txt_tipoA" class="fredoka">Tipo</label>
                            <input class=" cajaTexto pompiere" type="text" name="txt_tipoA" id='txt_tipoA'>
                        </div>

                        <div>
                            <label for="txt_descripcionA" class="fredoka">Descripción</label>
                            <textarea class="cajaArea pompiere" name="txt_descripcionA" id='txt_descripcionA'></textarea>
                        </div>

                        <div>
                            <label for="txt_precioA" class="fredoka">Precio</label>
                            <input class="cajaTexto pompiere" min="0" type="number" name="txt_precioA" id="txt_precioA">
                        </div>

                    </form>
                </div>

            </div>
            <div class="modal-footer botonModal">

                <div>
                    <button class="btnMorado fredoka" id='btn_actualizarM' name='btn_actualizarM'>Actualizar</button>
                </div>

            </div>
        </div>
    </div>
</div>