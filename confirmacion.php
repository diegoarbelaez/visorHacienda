<?php include('encabezado.php');
include("backend/conexion.php");
?>

<body>
    <style>
        .tdCompacto {
            margin: 0px;
            padding: 0px;
        }

        .trCompacto {
            margin: 0px;
            padding: 0px;
        }

        td,
        th {
            margin: 1px !important;
            padding: 1px !important;
        }
    </style>

    <!-- Begin page -->
    <div id="wrapper">
        <?php
        include('menu_superior.php');
        include('menu_izquierda.php');
        //VARIABLES
        ?>

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
                                <h4 class="page-title">Confirmación</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card-box">Datos Actualizados</h4>
                                <p class="sub-header">
                                    Los datos fueron exitosamente actualizados
                                </p>
                                <div class="form-row">
                                    <a href="listado_interna.php" class="btn btn-success">REGRESAR AL INICIO</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end container-fluid -->
            </div> <!-- end content -->
        </div>
        <?php include('pie.php') ?>
    </div>