<div class="contenedorTitulo">
    <h1 class="titulo fredoka">Empleados registrados
        <i class="fas fa-user-md"></i>
    </h1>
</div>

<section class="lading_page-ver-empleados">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body table-responsive fredoka">
                        <table class="table" id="tblEmpleados">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        N°</th>
                                    <th scope="col">N° Identificación</th>
                                    <th scope="col">Nombres y Apellidos</th>
                                    <th scope="col">Fecha de Ingreso</th>
                                    <th scope="col">Citas Asignadas</th>
                                    <th scope="col">Cargo</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col" class="acciones">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="datos pompiere">
                                <tr id="fila" class="primeraFilaEmpleado">
                                    <th id="emContador" scope="row"> </th>
                                    <td id="emIdentificacion"></td>
                                    <td id="emNombresApellidos"></td>
                                    <td id="emFecha"></td>
                                    <td id="emCantidad"></td>
                                    <td id="emCargo"></td>
                                    <td id="emEstado"></td>
                                    <td>
                                        <button type="button" id="btnActualizar" class="
                                        btnMorado " type="button">
                                            <i class="fas fa-user-edit"></i>
                                        </button>
                                        <button type="button" id="btnInactivar" class="
                                        btnNaranja" type="button">
                                            <i id="icon_inactivar" class="fas fa-user-slash"></i>
                                            <i id="icon_activar" class="fas fa-user-check"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- modal para inactivar el empleado-->

                    <div class="modal fade" tabindex="-1" id="modalInactivar">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">

                                <div class="col-md-12 m-auto col-12 ">

                                    <form role="form" class="form-width">


                                        <h4 class="form-header text-left ">Inactivar empleado</h4>
                                        <div class="mb-3 text-left">
                                            <h5 class="text-modal">Seleccione estado</h5>
                                            <select name="cb_estado" class="form-control" id="cb_estado">
                                                <option value="2">Seleccione</option>
                                                <option value="1">Activo</option>
                                                <option value="0">Inactivo</option>
                                            </select>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" title="actualiza datos del empleado"
                                                id="btn_inactivarEmpleado" class="btn
                                            btnMorado pompiere">
                                                Aceptar
                                            </button>
                                            <button type="button" title="inactiva al empleado " class="btn btnNaranja pompiere
                                             closed text-gray ms-auto" data-bs-dismiss="modal">
                                                Cerrar
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- modal para actualizar datos del empleado -->
                    <div class="modal fade" tabindex="-1" id="modalActualizar">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">

                                <div class="col-md-12 m-auto col-12 ">

                                    <form role="form" class="form-width">
                                        <h4 class="form-header text-left ">Actualizar empleado</h4>
                                        <!-- <h5 class="text">Datos personales</h5> -->
                                        <div class="row">

                                            <div class="mb-3 col-md-6 ">
                                                <h5 class="text-modal">identificacion</h5>
                                                <input type="text" id="txt_nroEmpleado"
                                                    placeholder="N° de Identificacion " class="form-control" value="">
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <h5 class="text-modal">Nombre</h5>
                                                <input type="text" id="txt_nombreEmpleado" class="form-control"
                                                    placeholder="Nombre empleado" value="">
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <h5 class="text-modal">Apellidos</h5>
                                                <input type="text" id="txt_apellidoEmpleado"
                                                    placeholder="Apellidos empleado" class="form-control" value="">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <h5 class="text-modal">Telefono</h5>
                                                <input type="text" id="txt_telefonoEmpleado"
                                                    placeholder="Telefono empleado" class="form-control" value="">
                                            </div>

                                            <div class="mb-3 col-md-6 ">
                                                <h5 class="text-modal">Correo</h5>
                                                <input type="text" id="txt_correoEmpleado" placeholder="Correo empleado"
                                                    class="form-control" value="">
                                            </div>
                                            <div class="mb-3 col-md-6 ">
                                                <h5 class="text-modal">Rol</h5>
                                                <select class="form-control" name="cb_rolEmpleado" id="cb_rolEmpleado">
                                                    <option value="0">Selecciona </option>
                                                    <option value="1">Administrador</option>
                                                    <option value="2">Empleado </option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" id="btn_ActualizarEmpleado" class="btn
                                            btnMorado pompiere">
                                                Actualizar
                                            </button>
                                            <button type="button" class="btn btnNaranja pompiere
                                             closed text-gray ms-auto" data-bs-dismiss="modal">
                                                Cerrar
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>