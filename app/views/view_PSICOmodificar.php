
<!-- PRINCIPIO-->
<div class="container" align="center">

    <h1>Modificar oferta laboral <i>(Psicólogo)</i></h1></br></br></br></br>
    <form class="form-horizontal" role="form" method="POST">
        <?php foreach ($rows as $row) {?>

            <div class="row">

                <div class="col-md-2">
                    <strong>Descripción de la oferta:</strong></br>
                    <?= $row['descripcion']?></br>
                    <strong>Nombre:</strong></br>
                    <?= $row['nombre']?></br>
                    <strong>Teléfono:</strong></br>
                    <?= $row['telefono']?></br>
                    <strong>Código Postal:</strong></br>
                    <?= $row['CP']?></br>
                    <strong>Correo Electrónico:</strong></br>
                    <?= $row['correo']?></br>
                    <strong>Dirección:</strong></br>
                    <?= $row['direccion']?></br>
                    <strong>Población:</strong></br>
                    <?= $row['poblacion']?></br>
                    <strong>Provincia:</strong></br>
                    <?= devuelveProvincia($row['provincia'])?></br>
                    <strong>Fecha tope de la oferta:</strong></br>
                    <?= $row['fechatope']?></br>
                    <strong>Psicólogo encargado:</strong></br>
                    <?= $row['psicologo']?></br>
                </div>
                <div class="col-md-10">
                    <div class="form-group">
                        <label for="candidatoseleccionado" class="col-lg-5 control-label"><strong>Candidato seleccionado</strong></label>
                        <div class="col-lg-3">
                            <input type="text" NAME="seleccionado" class="form-control" id="seleccionado"
                                   placeholder="Introduzca datos del candidato" value="<?=VP('seleccionado', $row['seleccionado'])?>">
                        </div>
                    </div></br></br></br>

                    <div class="form-group">
                        <label for="correo" class="col-lg-5 control-label"><strong>Estado de la oferta</strong></label>
                        <div class="col-lg-8" align="LEFT">
                            <?=CreaRadio('estado', array('P'=>"Pendiente", 'R'=>"Realizando", 'S'=>'Seleccionando', 'C'=>'Cancelada'), VP('estado', $row['estado'])) ?>
                        </div>
                    </div>
                        </br></br></br></br></br></br>
                    <div class="form-group">
                        <label for="datos candidato" class="col-lg-5 control-label"><strong>Otros datos sobre el candidato</strong></label>
                        <div class="col-lg-4">
                            <input type="textarea" NAME="otrosdatos" class="form-control" id="otrosdatos"
                                   placeholder="Datos de interés sobre el candidato" value="<?=VP('otrosdatos', $row['otrosdatos'])?>">
                        </div>
                    </div>
                        </br></br></br></br>
                    <div class="form-group">
                        <label for="aceptar" class="col-lg-5 control-label"></label>
                        <div class="col-lg-3">
                            <input type="submit" NAME="aceptar" class="btn btn-primary" id="aceptar" value="Aceptar"></br></br>
                            <a href="?controllers=ctr_login" class="btn btn-primary">Cancelar</a>
                        </div>

                </div>
            </div>
        <?php } ?>
    </form>
</div>
