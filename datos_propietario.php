
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