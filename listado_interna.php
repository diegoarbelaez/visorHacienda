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
                                <h4 class="page-title">Visor de Ciudadanos</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-4">
                            <div class="card-box">Cédula</h4>
                                <p class="sub-header">
                                   Buscarlo por Cédula o Documento de Identidad
                                </p>
                                <form action="listado_cedula.php" method="POST">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputCity" class="col-form-label">Cédula</label>
                                            <input type="text" class="form-control" name="cedula" id="cedula" value="94287419">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <button id="boton_enviar" type="submit" class="btn btn-secondary">CONSULTAR</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card-box">Ficha Catastral</h4>
                                <p class="sub-header">
                                    La ficha catastral identifica la propiedad
                                </p>
                                <form action="buscar_ficha.php" method="POST">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputCity" class="col-form-label">Ficha Catastral</label>
                                            <input type="text" class="form-control" name="cedula" id="cedula" value="94287419">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <button id="boton_enviar" type="submit" class="btn btn-primary">CONSULTAR</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card-box">Propietario</h4>
                                <p class="sub-header">
                                    El nombre del ciudadano
                                </p>
                                <form action="buscar_nombre.php" method="POST">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputCity" class="col-form-label">Propietario</label>
                                            <input type="text" class="form-control" name="cedula" id="cedula" value="94287419">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <button id="boton_enviar" type="submit" class="btn btn-danger">CONSULTAR</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- end page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card-box table-responsive">
                                <h4 class="header-title"><b>Archivo General de Contribuyentes Morosos</b></h4>
                                <p class="sub-header">
                                    Este es el listado general de los propietarios de bienes que aún aparecen pendientes de pago en el reporte de cartera.
                                </p>
                                <table class="table table-striped table-bordered dt-responsive nowrap compacta" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>No. Identificación</th>
                                            <th>Propietario</th>
                                            <th>Dirección</th>
                                            <th>Ficha Catastral</th>
                                            <th>2018</th>
                                            <th>2019</th>
                                            <th>2020</th>
                                            <th>2021</th>
                                            <th>2022</th>
                                            <th>2023</th>
                                            <th>Valor Vigencia</th>
                                            <th>Fecha Vencimiento</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sentencia_consulta = 'SELECT `id`, `No Identificacion`, `Porpietario`,`Direccion`, `Ficha  Catastral`, `Total 2018`,`Total 2019`,`Total 2020`,`Total 2021`,`Total 2022`,`Total 2023`,`Valor a Pagar Vigencia`,`Fecha Vencimiento` FROM ' . $nombre_tabla;

                                        $sql = mysqli_query($con, $sentencia_consulta);
                                        if (mysqli_num_rows($sql) == 0) {
                                            echo '<tr><td colspan="8">No hay datos.</td></tr>';
                                        }
                                        $elementosxpagina = 500;
                                        $total_elementos = mysqli_num_rows($sql);
                                        $paginas = ceil($total_elementos / $elementosxpagina);
                                        if (!$_GET) {
                                        ?>
                                            <script type="text/javascript">
                                                window.location = "listado_interna.php?pagina=1";
                                            </script>
                                        <?php
                                        } else {
                                            $iniciar = ($_GET['pagina'] - 1) * $elementosxpagina;
                                            $sql = mysqli_query($con, 'SELECT `id`, `No Identificacion`, `Porpietario`,`Direccion`, `Ficha  Catastral`, `Total 2018`,`Total 2019`,`Total 2020`,`Total 2021`,`Total 2022`,`Total 2023`,`Valor a Pagar Vigencia`,`Fecha Vencimiento` FROM ' . $nombre_tabla . ' order by id ASC LIMIT ' . $iniciar . ',' . $elementosxpagina);
                                            while ($row = mysqli_fetch_assoc($sql)) {
                                                echo '
                                        <tr>
                                        <td> ' . $row['id'] . '</a></td>
                                        <td>' . $row['No Identificacion'] . '</td>
                                        <td>' . $row['Porpietario'] . '</td>
                                        <td>' . $row['Direccion'] . '</td>
                                        <td>' . $row['Ficha  Catastral'] . '</td>
                                        <td>' . number_format($row['Total 2018']) . '</td>
                                        <td>$' . number_format($row['Total 2019']) . '</td>
                                        <td>$' . number_format($row['Total 2020']) . '</td>
                                        <td>$' . number_format($row['Total 2021']) . '</td>
                                        <td>$' . number_format($row['Total 2022']) . '</td>
                                        <td>$' . number_format($row['Total 2023']) . '</td>
                                        <td>$' . number_format($row['Valor a Pagar Vigencia']) . '</td>
                                        <td>' . $row['Fecha Vencimiento'] . '</td>
                                        </tr>';
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <div class="card-footer clearfix">
                                    <ul class="pagination pagination-sm m-0 float-right">
                                        <li class="page-item <?php echo $_GET['pagina'] <= 1 ? 'disabled' : '' ?>">
                                            <a class="page-link" href="listado_interna.php?pagina=<?php echo $_GET['pagina'] - 1 ?>">
                                                Anterior
                                            </a>
                                        </li>
                                        <?php for ($i = 0; $i < $paginas; $i++) : ?>
                                            <li class="page-item <?php echo $_GET['pagina'] == $i + 1 ? 'active' : '' ?>"><a class="page-link" href="listado_interna.php?pagina=<?php echo $i + 1  ?>"><?php echo $i + 1  ?></a></li>
                                        <?php endfor ?>
                                        <li class="page-item <?php echo $_GET['pagina'] >= $paginas ? 'disabled' : '' ?>">
                                            <a class="page-link" href="listado_interna.php?pagina=<?php echo $_GET['pagina'] + 1 ?>">
                                                Siguiente
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div> <!-- end container-fluid -->

            </div> <!-- end content -->

        </div>


        <?php include('pie.php') ?>


    </div>