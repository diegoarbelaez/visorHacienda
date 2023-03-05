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

        .contacto {
            background-color: #fff20238;
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

                    <?php include("criterios.php") ?>


                    <!-- end page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card-box table-responsive">
                                <h4 class="header-title"><b>Archivo General de Contribuyentes Morosos</b></h4>
                                <p class="sub-header">
                                    Este es el listado general de los propietarios de bienes que aún aparecen pendientes de pago en el reporte de cartera.
                                </p>
                                <!-- table-striped -->
                                <table class="table table-bordered dt-responsive nowrap compacta" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
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
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include("funciones.php"); ?>
                                        <?php



                                        $sentencia_consulta = 'SELECT `id`, `No Identificacion`, `Porpietario`,`Direccion`, `Ficha  Catastral`, `Total 2018`,`Total 2019`,`Total 2020`,`Total 2021`,`Total 2022`,`Total 2023`,`Valor a Pagar Vigencia`,`Fecha Vencimiento` FROM ' . $nombre_tabla . ' order by `Valor a Pagar Vigencia` desc';

                                        $sql = mysqli_query($con, $sentencia_consulta);
                                        if (mysqli_num_rows($sql) == 0) {
                                            echo '<tr><td colspan="8">No hay datos.</td></tr>';
                                        }
                                        $elementosxpagina = 300;
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
                                            $sql = mysqli_query($con, 'SELECT `id`, `No Identificacion`, `Porpietario`,`Direccion`, `Ficha  Catastral`, `Total 2018`,`Total 2019`,`Total 2020`,`Total 2021`,`Total 2022`,`Total 2023`,`Valor a Pagar Vigencia`,`Fecha Vencimiento` FROM ' . $nombre_tabla . ' order by `Valor a Pagar Vigencia` desc LIMIT ' . $iniciar . ',' . $elementosxpagina);
                                            while ($row = mysqli_fetch_assoc($sql)) {

                                               

                                                //Muestra el valor de cedula actualizado desde la BDUP (Base de Datos Unica de Propietarios)
                                                $cedula_predial = $row['No Identificacion'];

                                                if (strpos($cedula_predial, 'X') !== false) {
                                                    $sentencia_buscar = "select * from base_unica_propietarios where `No Identificacion` like '" . $row["No Identificacion"] . "'";
                                                    //echo $sentencia_buscar;
                                                    $resultado_buscar = mysqli_query($con, $sentencia_buscar);
                                                    $fila = mysqli_fetch_assoc($resultado_buscar);
                                                    if (strlen($fila["cedula_real"]) > 0) {
                                                        $row["No Identificacion"] = $row["No Identificacion"] . "(" . $fila["cedula_real"] . ")";
                                                    } else {
                                                        $row["No Identificacion"] = $row["No Identificacion"] . "(sin actualizar)";
                                                    }
                                                }

                                                $tipo_fila = '';
                                                if (hayTelefonos($cedula_predial)) {
                                                    $tipo_fila  = '<tr class="contacto">';
                                                } else {
                                                    $tipo_fila = '<tr>';
                                                }



                                                echo $tipo_fila;
                                                echo '
                                        <td> ' . $row['id'] . '</a></td>
                                        <td>' . $row['No Identificacion'] . '</td>
                                        <td><a href="ver_propietario.php?id=' . $row["id"] . '">' . $row['Porpietario'] . '</a></td>
                                        <td>' . $row['Direccion'] . '</td>
                                        <td>' . $row['Ficha  Catastral'] . '</td>
                                        <td>' . number_format($row['Total 2018']) . '</td>
                                        <td >$' . number_format($row['Total 2019']) . '</td>
                                        <td>$' . number_format($row['Total 2020']) . '</td>
                                        <td>$' . number_format($row['Total 2021']) . '</td>
                                        <td>$' . number_format($row['Total 2022']) . '</td>
                                        <td>$' . number_format($row['Total 2023']) . '</td>
                                        <td>$' . number_format($row['Valor a Pagar Vigencia']) . '</td>
                                        <td>' . $row['Fecha Vencimiento'] . '</td>
                                        <td><a href="registrar_llamada.php?id='.$row["id"].'"> <button class="btn btn-primary" style="margin:3px; padding:3px;"><i class="fe-phone-outgoing"></i></button></a><a href="ver_propietario.php?id='.$row["id"].'"> <button class="btn btn-secondary" style="margin:3px; padding:3px;"><i class="fe-edit"></i></button></a><a href="#?id='.$row["id"].'"> <button class="btn btn-warning" style="margin:3px; padding:3px;"><i class="fe-star"></i></button></a></td>
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