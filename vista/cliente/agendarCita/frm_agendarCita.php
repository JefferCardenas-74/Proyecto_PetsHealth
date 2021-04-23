<?php

?>

<div class="contenedorTitulo">
    <h1 class="titulo fredoka">Agenda tu cita <i class="fas fa-calendar-week"></i></h1>
</div>

<section class="lading_page-agendar_Cita">



    <div class="container">


        <div class="row">
            <div class="col-lg-12">
                <!-- <h2>Cita</h2> -->

                <div class="card">
                    <!-- <div class="card-header text-center">
                        <h4 class="lead">
                            Agenda tu cita <i class="fas fa-calendar-week"></i>
                        </h4>
                    </div> -->
                    <div class="card-body">
                        <form action="" id="frm_agendarCitas" name="frm_agendarCitas">
                        <!-- campo oculto -->

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
                                            <input type="text" class="form-control" id="txt_nombreUsuario"
                                                aria-describedby="emailHelp" disabled value= "<?php echo $_SESSION["nombreUsuario"] ?>" />
                                        </div>


                                    </div>
                                    <!--last name block -->
                                    <div class="mb-3 col-md-6">
                                        <h5 class="text-inf">Selecciona el cliente </h5>
                                        <select name="cb_cliente" id="cb_cliente" class="form-control" style="width:100%">
                                        <option value="0">Selecciona tu mascota</option>
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
                                            <input data-datepicker="" class="form-control" id="txt_fecha" type="text"
                                                placeholder="dia de cita" required />
                                        </div>

                                    </div>
                                    <div class="mb-3 col-md-3">
                                        <div class="form-group">
                                            <div class="input-group date"  data-target-input="nearest">                                                <!-- <input type="time" id="txt_hora" class="form-control " require /> -->
                                                <select name="cb_hora" id="cb_hora" class="form-control" style="width:100%">
                                        <option value="0">Selecciona Hora</option>
                                        </select>
                                            </div>
                                        </div>

                                    </div>
                       
                                    <!--last name block -->
                                    <div class="mb-3 col-md-3">
                                        <div class="input-group">
                                            <input type="button" value="Escoger Tipo Servicio" id="btnEscojerServicio"
                                                class="boton btnMorado pompiere" require />


                                        </div>

                                    </div>
                                    <div class="mb-3 col-md-3">
                                        <div class="form-group">
                                            <div class="input-group " id="" data-target-input="nearest">
                                                <input type="button" value="Limpiar"
                                                    class="btnNaranja pompiere" require />
                                            </div>
                                        </div>

                                    </div>
                                </div>


                            </div>

                            <!-- modal para ver los tipos de serivicios -->

                            <div class="modal fade" tabindex="-1" id="modalSelServicios" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered ">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h2 class="modal-title"> Seleccione Nuestros servicios</h2>
                                            <!-- <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button> -->
                                        </div>
                                        <div class="modal-body">
                                        <form action="" id="modalTipoServicios">
                                        
                                            <!-- div donde se mostrar los checks 
                                            dinamicos -->
                                            <div class="form-check">

                                            </div>


                                        
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button"  id="btnTipoServicios" class="boton  btnMorado pompiere">
                                                Aceptar
                                            </button>
                                            <button type="button"
                                                class="btnNaranja pompiere closed text-gray ms-auto"
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
                        <div class="modal-dialog modal-dialog-centered ">
                            <div class="modal-content ">

                                <div class="col-md-12 m-auto col-12 ">


                                    <form role="form" class="form-width">


                                        <h4 class="form-header text-left ">Datos registrados </h4>


                                        <div class="mb-3 text-left">
                                            <h5 class="text-modal_datos">Informacion cita</h5>
                                        </div>

                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <input type="text" id="txt_usuario" class="form-control" value="">
                                            </div>

                                            <div class="mb-3 col-md-6">

                                                <input type="text" id="txt_cliente" class="form-control" value="">
                                            </div>
                                        </div>


                                        <div class="mb-3 text-left">
                                            <h5 class="text-modal_datos">Servicio</h5>

                                        </div>

                                        <div class="row">

                                            <div class="mb-3 col-md-6">
                                                <input type="text" id="txt_tipoServicio" class="form-control" value="">
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
                                                <input type="text"  id="fecha" class="form-control" value="">
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <input type="text" id="hora" class="form-control" value="">

                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="button" class="btnNaranja pompiere col-md-4"
                                                data-bs-dismiss="modal">Cerrar</button>
                                        </div>

                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card-footer text-center">
                        <button type="button" id="btnEnviarCita" class="boton btnMorado fredoka btn-lg" type="button">
                            Enviar cita
                        </button>
                        <button type="button" id="btnVerDatos" class="btnNaranja fredoka btn-lg" type="button">
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