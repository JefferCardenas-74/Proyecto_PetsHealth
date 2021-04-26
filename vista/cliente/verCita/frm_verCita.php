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
                        <table class="table" id="tblCitasAgendadasXmi">
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
                                <tr id="fila" class="primeraFilaCita" >
                                    <th id="ciContador" scope="row"> </th>
                                    <td id="ciCliente"></td>
                                    <td id="ciServicio"></td>
                                    <td id="ciFecha"></td>
                                    <td id="ciHora"></td>
                                    <td id="ciEstado"></td>
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
                                            <h5 class="text-modal_datos">Motivo</h5>
                                            
                                            <textarea class="form-control txtMotivo"
                                                placeholder="Opcional"></textarea>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" id="btn_cancelarCita" class="btn 
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

