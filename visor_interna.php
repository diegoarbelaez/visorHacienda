<?php

?>


<style>
    /* MIS ESTILOS */
    .textoNegrita1 {
        font-weight: 00 !important;
    }
</style>

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                        </div>
                        <h4 class="page-title">Visor de Ciudadanos</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row">
                <div class="col-xl-6">
                    <div class="card-box">Buscar Ciudadano</h4>
                        <p class="sub-header">
                            Puedes buscar por varios criterios
                        </p>
                        <form id="consulta_cedula">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputCity" class="col-form-label">Cédula</label>
                                    <input type="text" class="form-control" name="cedula" id="cedula" value="94287419">
                                </div>
                            </div>
                            <div class="form-row">
                                <button id="boton_enviar" type="submit" class="btn btn-primary">CONSULTAR</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div id="div_resultados" class="card-box">Resultados:</h4>
                        <!-- Aqui los resultados -->
                    </div>
                </div>

            </div>
            <!-- end row -->


            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <h4 class="header-title mb-3">Propiedades</h4>
                        <div id="resultados_propiedades">

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="card-box">
                        <h4 class="header-title mb-3">Teléfonos Registrados</h4>

                        <div id="resultados_telefonos">
                            <!-- resultados de teléfonos -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card-box">
                        <h4 class="header-title mb-3">Direcciones Registradas</h4>

                        <div id="resultados_direcciones">
                        </div>

                    </div>
                </div>
            </div>




        </div> <!-- end container-fluid -->

    </div> <!-- end content -->


    <?php include('pie.php') ?>


</div>