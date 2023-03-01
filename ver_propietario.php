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

        $id_buscar = $_GET["id"];
        $sentencia = "SELECT * from $nombre_tabla where id=$id_buscar";
        $resultado = mysqli_query($con, $sentencia);
        $fila = mysqli_fetch_assoc($resultado);


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
                                <h4 class="page-title">Detalles del Propietario</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                                <h4 class="header-title">Información del Contacto</h4>
                                <p class="sub-header">
                                    Aquí puedes actualizar los datos del propietario
                                </p>

                                <div class="row">
                                    <div class="col-12">
                                        <div>
                                            <form action="./backend/guardar_bd.php" method="POST" class="form-horizontal" role="form">
                                                <div class="form-group row">
                                                    <label class="col-2 col-form-label">Nombre</label>
                                                    <div class="col-10">
                                                        <input type="text" class="form-control" value="<?php echo $fila["Porpietario"] ?>">
                                                        <input type="hidden" name="accion" value="10">
                                                        <input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-2 col-form-label">Cedula</label>
                                                    <div class="col-10">
                                                        <input type="text" class="form-control" name="cedula" value="<?php echo $fila["No Identificacion"] ?>">

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-2">
                                                    </div>
                                                    <div class="col-4">
                                                        <button class="btn btn-success">ACTUALIZAR DATOS</button>
                                                        <a href="listado_interna.php" class="btn btn-danger">REGRESAR</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                                <!-- end row -->

                            </div> <!-- end card-box -->
                        </div><!-- end col -->
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                                <h4 class="header-title">Datos de Contacto</h4>
                                <p class="sub-header">
                                    Información encontrada en nuestras BD
                                </p>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="table-responsive">
                                            <?php
                                            $sentencia_busqueda = "select distinct(telefono) from telefonos where fk_cedula = '" . $fila["No Identificacion"] . "'";
                                            $resultado_busqueda = mysqli_query($con, $sentencia_busqueda);
                                            ?>
                                            <table class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Teléfonos Encontrados</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if (mysqli_num_rows($resultado_busqueda) == 0) {
                                                        echo '<tr><td colspan="8">No hay datos.</td></tr>';
                                                    } else {
                                                        while ($fila2 = mysqli_fetch_assoc($resultado_busqueda)) {
                                                            echo '
                                                                <tr>
                                                                    <td> ' . $fila2['telefono'] . '</a></td>
                                                                </tr>';
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="table-responsive">
                                            <?php
                                            $sentencia_busqueda = "select distinct(direccion) from direcciones where fk_cedula = '" . $fila["No Identificacion"] . "'";
                                            $resultado_busqueda = mysqli_query($con, $sentencia_busqueda);
                                            ?>
                                            <table class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Direcciones Encontradas</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if (mysqli_num_rows($resultado_busqueda) == 0) {
                                                        echo '<tr><td colspan="8">No hay datos.</td></tr>';
                                                    } else {
                                                        while ($fila2 = mysqli_fetch_assoc($resultado_busqueda)) {
                                                            echo '
                                                                <tr>
                                                                    <td> ' . $fila2['direccion'] . '</a></td>
                                                                </tr>';
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->

                            </div> <!-- end card-box -->
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->
                </div> <!-- end container-fluid -->

            </div> <!-- end content -->

        </div>


        <?php include('pie.php') ?>


    </div>