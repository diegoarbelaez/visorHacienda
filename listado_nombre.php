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

                    <!-- CRITERIOS DE BUSQUEDA -->
                    <?php include("criterios.php") ?>

                    <!-- end page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card-box table-responsive">
                                <h4 class="header-title"><b>Archivo General de Contribuyentes Morosos</b></h4>
                                <p class="sub-header">
                                    Este es el listado general de los propietarios de bienes que aún aparecen pendientes de pago en el reporte de cartera.
                                </p>
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
                                        $propietario = $_POST["propietario"];
                                        $sentencia_consulta = 'SELECT `id`, `No Identificacion`, `Porpietario`,`Direccion`, `Ficha  Catastral`, `Total 2018`,`Total 2019`,`Total 2020`,`Total 2021`,`Total 2022`,`Total 2023`,`Valor a Pagar Vigencia`,`Fecha Vencimiento` FROM ' . $nombre_tabla . ' where `Porpietario` like "%' . $propietario . '%"';
                                        $sql = mysqli_query($con, $sentencia_consulta);
                                        if (mysqli_num_rows($sql) == 0) {
                                            echo '<tr><td colspan="8">No hay datos.</td></tr>';
                                        } else {
                                            while ($row = mysqli_fetch_assoc($sql)) {
                                                $cedula_predial = $row["No Identificacion"];
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
                                            <td>$' . number_format($row['Total 2019']) . '</td>
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
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div> <!-- end container-fluid -->

            </div> <!-- end content -->

        </div>


        <?php include('pie.php') ?>


    </div>