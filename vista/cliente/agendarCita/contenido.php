<?php

?>

<section class="lading_page-agendar_Cita">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Cita</h2>

                <div class="card">
                    <div class="card-header text-center">
                        <h4 class="lead">
                            Agenda tu cita <i class="fas fa-calendar-week"></i>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <div class="col">
                                <div class="row">

                                    <!--first name block -->
                                    <div class="mb-3 col-md-6">
                                        <h5 class="text-inf">Informacion del dueño </h5>

                                        <div class="input-group">

                                            <span class="input-group-text"><span class="">
                                                    <img src="../../../componente/img/user/avatar.svg" width="32px"
                                                        class="img-circle elevation-2" alt="User Image" />
                                                </span></span>
                                            <input type="text" class="form-control" id="usuario"
                                                aria-describedby="emailHelp" disabled value="Oscar astudillo" />
                                        </div>


                                    </div>
                                    <!--last name block -->
                                    <div class="mb-3 col-md-6">
                                        <h5 class="text-inf">Selecciona el cliente </h5>
                                        <select name="" id="selCliente" class="form-control" style="width:100%">
                                            <option value="100">Firulais (Perro)</option>
                                            <option value="">Firulais (Gato)</option>
                                            <option value="">Firulais (ave)</option>
                                            <option value="">Firulais</option>
                                            <option value="">Firulais</option>
                                        </select>
                                        <!-- <input type="text" class="form-control" placeholder="Last Name"> -->
                                    </div>

                                    <div class="text-left">
                                        <h5 class="text-inf">Escoja fecha, hora y el tipo de cita para tu mascota</h5>
                                    </div>

                                    <div class="mb-3 col-md-3">
                                        <div class="input-group">
                                            <span class="input-group-text"><span
                                                    class="far fa-calendar-alt"></span></span>
                                            <input data-datepicker="" class="form-control" id="" type="text"
                                                value="data-date" placeholder="dd/mm/yyyy" required />
                                        </div>

                                    </div>
                                    <div class="mb-3 col-md-3">
                                        <div class="form-group">
                                            <div class="input-group date" id="hora" data-target-input="nearest">
                                                <input type="time" class="form-control datetimepicker-input" require />
                                            </div>
                                        </div>

                                    </div>
                                    <div class="mb-3 col-md-3">
                                        <div class="form-group">
                                            <div class="input-group " id="hora" data-target-input="nearest">
                                                <input type="button" value="Ver horas disponibles"
                                                    class="form-control  btn  btn-verHoras" require />
                                            </div>
                                        </div>

                                    </div>
                                    <!--last name block -->
                                    <div class="mb-3 col-md-3">
                                        <div class="input-group">
                                            <input type="button" value="Escoger" id="btnVerMas"
                                                class="form-control btn btn-escoger" require />


                                        </div>

                                    </div>
                                </div>


                            </div>

                            <!-- modal para ver los tipos de serivicios -->

                            <div class="modal fade" tabindex="-1" id="modalVerMas">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h2 class="modal-title"> Seleccione Nuestros servicios</h2>
                                            <!-- <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button> -->
                                        </div>
                                        <div class="modal-body">
                                            <!-- <hr> -->
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="defaultCheck1">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    Medicina preventina
                                                    <small class="text-muted"> Lorem ipsum dolor sit amet consectetur
                                                        adipisicing elit. Maiores laboriosam consequatur suscipit dicta
                                                        consectetur libero quas </small>
                                                </label>
                                                <!-- <hr class="modal-body_hr"> -->
                                            </div>


                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="">
                                                <label class="form-check-label">
                                                    Hospitalización
                                                    <small class="text-muted"> Lorem ipsum dolor sit amet consectetur
                                                        adipisicing elit. Maiores laboriosam consequatur suscipit dicta
                                                        consectetur libero quas a</small>
                                                </label>
                                                <!-- <hr class="modal-body_hr"> -->
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="">
                                                <label class="form-check-label">
                                                    Cirugía
                                                    <small class="text-muted"> Lorem ipsum dolor sit amet consectetur
                                                        adipisicing elit. Maiores laboriosam consequatur suscipit dicta
                                                        consectetur libero quas a</small>
                                                </label>
                                                <!-- <hr class="modal-body_hr"> -->
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="">
                                                <label class="form-check-label">
                                                    Consulta
                                                    <small class="text-muted"> Lorem ipsum dolor sit amet consectetur
                                                        adipisicing elit. Maiores laboriosam consequatur suscipit dicta
                                                        consectetur libero quas a</small>
                                                </label>
                                                <!-- <hr class="modal-body_hr"> -->
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="">
                                                <label class="form-check-label">
                                                    Estetica
                                                    <small class="text-muted"> Lorem ipsum dolor sit amet consectetur
                                                        adipisicing elit. Maiores laboriosam consequatur suscipit dicta
                                                        consectetur libero quas a nobis sint nulla optio,</small>
                                                </label>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-tipoCita success">
                                                Aceptar
                                            </button>
                                            <button type="button" class="btn btn-tipoCita  closed text-gray ms-auto"
                                                data-bs-dismiss="modal">
                                                Cerrar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>


                    <!-- modal ver datos -->

                    <div class="modal fade" tabindex="-1" id="modalverDatos">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="col-md-12 m-auto col-12 ">


                                    <form role="form" class="form-width">


                                        <h4 class="form-header text-left ">Datos registrados </h4>


                                        <div class="mb-3 text-left">
                                            <h5 class="text-modal_datos">Informacion cita</h5>
                                        </div>

                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <input type="text" class="form-control" value="Oscar astudillo">
                                            </div>

                                            <div class="mb-3 col-md-6">

                                                <input type="text" class="form-control" value="Firulais">
                                            </div>
                                        </div>


                                        <div class="mb-3 text-left">
                                            <h5 class="text-modal_datos">Servicio</h5>

                                        </div>

                                        <div class="row">

                                            <div class="mb-3 col-md-6">
                                                <input type="text" class="form-control" value="Consulta">
                                            </div>

                                            <div class="mb-3 col-md-6">

                                                <input type="text" class="form-control" value="Baño">
                                            </div>
                                        </div>


                                        <div class="row ml-0 mb-3">

                                        </div>


                                        <div class="mb-3 text-left">
                                            <h5 class="text-modal_datos">Fecha y hora</h5>
                                            <!-- <hr> -->
                                        </div>

                                        <div class="row">

                                            <div class="mb-3 col-md-6">
                                                <input type="tel" class="form-control" value="2021/05/15">
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <input type="email" class="form-control" value="8:45 PM">

                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="button" class="btn btn-closed col-md-4"
                                                data-bs-dismiss="modal">Cerrar</button>
                                        </div>

                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card-footer text-center">
                        <button type="button" class="btn btn-enviaCita btn-lg" type="button">
                            Enviar cita
                        </button>
                        <button type="button" id="btnVerDatos" class="btn btn-datos btn-lg" type="button">
                            ver datos
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- script de agendar cita -->
<script src="../../../js/agendarCita/agendaCita.js"> </script>