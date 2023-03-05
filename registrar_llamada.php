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
                                <h4 class="page-title">Registrar Evento</h4>
                            </div>
                        </div>
                    </div>

                    <?php
                    $id_buscar = $_GET["id"];
                    $sentencia = "SELECT `id`, `No Identificacion`, `Porpietario` from $nombre_tabla where id=$id_buscar";
                    $resultado = mysqli_query($con, $sentencia);
                    $fila = mysqli_fetch_assoc($resultado);
                    $cedula = $fila["No Identificacion"];
                    ?>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card-box">Registra datos del Evento</h4>

                                <p class="sub-header">
                                    Aquí podrás escribir lo que sucedió durante el intento de contacto, si te contestaron o no y qué razón dejaste o información relevante sobre el proceso de cobro persuasivo
                                </p>
                                <h4>Propietario:<?php echo $fila["Porpietario"] ?></h4>
                                <h4>CC: <?php echo $fila["No Identificacion"] ?></h4>
                                <a href="ver_propietario.php?id=<?php echo $id_buscar; ?>" class="btn btn-success">ACTUALIZAR</a>
                                <form action="backend/guardar_bd.php" method="POST"> 
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputCity" class="col-form-label">Descripción</label>
                                            <textarea class="form-control" rows="5" name="descripcion" id="descripcion" placeholder="Detalles...."></textarea>
                                            <input type="hidden" name="accion" value="1">

                                            <input type="hidden" name="cedula" value="<?php echo $cedula ?>">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <select class="form-control" id="exampleFormControlSelect1" name="tipo_evento">
                                                <option value="Seleccionar">------- Seleccionar Evento -------</option>
                                                <?php
                                                $sentencia = "select * from tipo_evento";
                                                $resultado = mysqli_query($con, $sentencia);
                                                while ($datos = mysqli_fetch_assoc($resultado)) {
                                                ?>
                                                    <option value="<?php echo $datos["id_tipo_evento"]; ?>"><?php echo $datos["nombre_evento"] . " - " . $datos["descripcion_evento"] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <button id="boton_enviar" type="submit" class="btn btn-primary">GUARDAR EVENTO</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>

                    <?php
                    include("datos_propietario.php");
                    ?>

                    <?php
                    include("eventos.php");
                    ?>


                </div> <!-- end container-fluid -->

            </div> <!-- end content -->

        </div>


        <?php include('pie.php') ?>


    </div>