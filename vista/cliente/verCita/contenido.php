<?php
?>
<?php

?>
<div class="contenedorTitulo">
    <h1 class="titulo fredoka">Citas agendadas <i class="fas fa-calendar-check"></i> </h1>
</div>

<section class="lading_page-agendar_Cita">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body table-responsive">
                        <table class="table  ">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        N°</th>
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Tipo cita</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Hora</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Accion</th>
                                </tr>
                            </thead>
                            <tbody class="datos pompiere">
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Consulta medica</td>
                                    <td>22/01/2021</td>
                                    <td>8:45 :am </td>
                                    <td>No agendada</td>
                                    <td>
                                        <button type="button" id="btnCancelar" class="
                                        btnMorado " type="button">
                                            Cancelar
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Mark</td>
                                    <td>Consulta medica</td>
                                    <td>22/01/2021</td>
                                    <td>8:45 :am </td>
                                    <td>Confirmada</td>
                                    <td>
                                        <button type="button" id="btnCancelar" class="
                                        btnMorado " type="button">
                                            Cancelar
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- modal motivo para cancelar -->

                    <div class="modal fade" tabindex="-1" id="modalMotivo">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">

                                <div class="col-md-12 m-auto col-12 ">

                                    <form role="form" class="form-width">


                                        <h4 class="form-header text-left ">Motivo cancelacion cita </h4>

                                        <div class="mb-3 text-left">
                                            <h5 class="text-modal_datos">Seleccione </h5>
                                            <!-- <hr class="modal-body_hr"> -->
                                        </div>
                                        <div class="row">
                                            <!--first name block -->
                                            <div class="mb-3 col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        Mi perro ya se curo
                                                    </label>

                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        Mi perro murio
                                                    </label>
                                                    <!-- <hr class="modal-body_hr"> -->
                                                </div>
                                            </div>
                                            <!--last name block -->
                                            <div class="mb-3 col-md-6">

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        No tengo transporte
                                                    </label>
                                                    <!-- <hr class="modal-body_hr"> -->
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                    <label class="form-check-label">
                                                        Otros
                                                    </label>
                                                    <!-- <hr class="modal-body_hr"> -->
                                                </div>
                                            </div>
                                        </div>


                                        <div class="mb-3 text-left">
                                            <h5 class="text-modal_datos">Motivo</h5>
                                            <textarea class="form-control txtMotivo"
                                                placeholder="Ingresa tu propio motivo"></textarea>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn 
                                            btnMorado pompiere">
                                                Aceptar
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
</section>

<!-- script de ver citas -->
<script src="../../../js/verCitas/verCita.js"> </script>