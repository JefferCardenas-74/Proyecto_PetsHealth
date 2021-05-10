<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="contenedorAgregar">

                <div class="botonAgregar">
                    <button class="btnMorado fredoka" id='btn_modalAgregar' name="btn_agregar">Agregar Producto</button>
                </div>

            </div>

            <div class='contenedorTablaProductos fredoka'>
                <table class="table display nowrap " cellspacing='0' id='tbl_productos' width='100%'>
                    <thead>
                        <th>Nombre</th>
                        <th>precio</th>
                        <th>Unidad</th>
                        <th>Accion</th>
                    </thead>
                    <tbody class="pompiere">
                        <tr class="fila" id='primeraFila'>
                            <td id="nombre">nutran</td>
                            <td id="precio">10000</td>
                            <td id="unidad">Und</td>
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

<!-- modal para agregar un producto -->

<div class="modal fade" id='mdl_agregar'>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header barra">
                <p class="modal-title fredoka" style="color:#fff;">Agregar Producto</p>
                <button class="close" data-dismiss='modal' aria-label="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class='modal-body'>
                <div class="contenedorFormularioProducto">
                    <form id='frm_producto'>

                        <div>
                            <label for="txt_nombre" class="fredoka">Nombre</label>
                            <input class=" cajaTexto pompiere" type="text" name="txt_nombre" id='txt_nombre'>
                        </div>

                        <div>
                            <label for="txt_precio" class="fredoka">Precio</label>
                            <input class=" cajaTexto pompiere" type="text" name="txt_precio" id='txt_precio'>
                        </div>

                        <div>
                            <label for="cb_unidad" class="fredoka">Unidad de Medida</label>
                            <select name="cb_unidad" id="cb_unidad" class="cajaTexto">
                                <option value="0">Seleccione</option>
                                <option value="ml">ml</option>
                                <option value="gr">gr</option>
                                <option value="und">und</option>
                            </select>
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
                <p class="modal-title fredoka" style="color:#fff;">Actualizar Producto</p>
                <button class="close" data-dismiss='modal' aria-label="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class='modal-body'>
                <div class="contenedorFormularioProductoA">
                    <form id='frm_productoA'>

                        <div>
                            <label for="txt_nombreA" class="fredoka">Nombre</label>
                            <input class=" cajaTexto pompiere" type="text" name="txt_nombreA" id='txt_nombreA'>
                        </div>

                        <div>
                            <label for="txt_precioA" class="fredoka">Precio</label>
                            <input class=" cajaTexto pompiere" type="text" name="txt_precioA" id='txt_precioA'>
                        </div>

                        <div>
                            <label for="cb_unidadA" class="fredoka">Unidad de Medida</label>
                            <select name="cb_unidadA" id="cb_unidadA" class="cajaTexto">
                                <option value="0">Seleccione</option>
                                <option value="ml">ml</option>
                                <option value="gr">gr</option>
                                <option value="und">und</option>
                            </select>
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