<?php

?>
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
                        <input type="text" class="form-control" name="cedula" id="cedula" value="">
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
            <form action="listado_ficha.php" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity" class="col-form-label">Ficha Catastral</label>
                        <input type="text" class="form-control" name="ficha" id="cedula" value="">
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
            <form action="listado_nombre.php" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity" class="col-form-label">Propietario</label>
                        <input type="text" class="form-control" name="propietario" id="cedula" value="">
                    </div>
                </div>
                <div class="form-row">
                    <button id="boton_enviar" type="submit" class="btn btn-danger">CONSULTAR</button>
                </div>
            </form>
        </div>
    </div>
</div>