<div class="container" align="center">

    <?php if ($errores) :?>
        <div class="alert alert-danger" align="left">
            <?php foreach ($errores as $error) : ?>
                <li><?=$error;?></li>
            <?php endforeach;?>
        </div>
    <?php endif?>

    <h1>Modificar oferta laboral <i>(Administrador)</i></h1></br>

    <div class="container">

        <form class="form-horizontal" role="form" method="POST">

            <?php foreach ($rows as $row) {?>

            <div class="form-group">
                <label for="descripcion" class="col-lg-5 control-label">Descripción de la oferta</label>
                <div class="col-lg-3">
                    <input type="textarea" NAME="descripcion" class="form-control" id="descripcion"
                           placeholder="Descripcion" value="<?=VP('descripcion', $row['descripcion'])?>">
                </div>
            </div></br>

            <div class="form-group">
                <label for="nombre" class="col-lg-5 control-label">Nombre contacto</label>
                <div class="col-lg-3">
                    <input type="text" NAME="nombre" class="form-control" id="nombre"
                           placeholder="Introduzca nombre de contacto" value="<?=VP('nombre', $row['nombre'])?>">
                </div>
            </div></br>

            <div class="form-group">
                <label for="telefono" class="col-lg-5 control-label">Teléfono de contacto</label>
                <div class="col-lg-3">
                    <input type="text" NAME="telefono" class="form-control" id="telefono"
                           placeholder="Introduzca Telefono" value="<?=VP('telefono', $row['telefono'])?>">
                </div>
            </div></br></br>

            <div class="form-group">
                <label for="CP" class="col-lg-5 control-label">Código Postal</label>
                <div class="col-lg-3">
                    <input type="text" NAME="CP" class="form-control" id="CP"
                           placeholder="Introduzca Código Postal" value="<?=VP('CP', $row['CP'])?>">
                </div>
            </div></br>

            <div class="form-group">
                <label for="correo" class="col-lg-5 control-label">Correo electrónico</label>
                <div class="col-lg-3">
                    <input type="email" NAME="correo" class="form-control" id="correo"
                           placeholder="Introduzca Email" value="<?=VP('correo', $row['correo'])?>">
                </div>
            </div></br>

            <div class="form-group">
                <label for="correo" class="col-lg-5 control-label">Direccion</label>
                <div class="col-lg-3">
                    <input type="text" NAME="direccion" class="form-control" id="direccion"
                           placeholder="Introduzca Direccion" value="<?=VP('correo', $row['direccion'])?>">
                </div>
            </div></br>

            <div class="form-group">
                <label for="poblacion" class="col-lg-5 control-label">Población</label>
                <div class="col-lg-3">
                    <input type="poblacion" NAME="poblacion" class="form-control" id="poblacion"
                           placeholder="Introduzca poblacion" value="<?=VP('poblacion', $row['poblacion'])?>">
                </div>
            </div></br>

            <div class="form-group">
                <label for="provincias" class="col-lg-5 control-label">Provincia</label>
                <div class="col-lg-2">
                    <?=creaSelect('provincia', ListaProvincias() , VP('provincia', $row['provincia']))?>
                </div>
            </div></br>

            <div class="form-group">
                <label for="correo" class="col-lg-5 control-label">Estado de la oferta</label>
                <div class="col-lg-5" align="LEFT">
                    <?=CreaRadio('estado', array('P'=>"Pendiente", 'R'=>"Realizando", 'S'=>'Seleccionando', 'C'=>'Cancelada'), VP('estado', $row['estado'])) ?>
                </div>
            </div></br>

            <div class="form-group">
                <label for="fechatope" class="col-lg-5 control-label">Fecha tope</label>
                <div class="col-lg-4">
                    <input type="text" NAME="fechatope" class="form-control" id="fechatope"
                           placeholder="Pulse para introducir fecha" value="<?=VP('fechatope', $row['fechatope'])?>">

                </div>
            </div></br>

            <div class="form-group">
                <label for="psicologo" class="col-lg-5 control-label">Psicólogo encargado</label>
                <div class="col-lg-3">
                    <input type="text" NAME="psicologo" class="form-control" id="psicologo"
                           placeholder="Introduzca un nombre" value="<?=VP('psicologo', $row['psicologo'])?>">
                </div>
            </div></br>

            <div class="form-group">
                <label for="candidatoseleccionado" class="col-lg-5 control-label">Candidato seleccionado</label>
                <div class="col-lg-4">
                    <input type="text" NAME="seleccionado" class="form-control" id="seleccionado"
                           placeholder="Introduzca datos del candidato" value="<?=VP('seleccionado', $row['seleccionado'])?>">
                </div>
            </div></br>

            <div class="form-group">
                <label for="datos candidato" class="col-lg-5 control-label">Otros datos sobre el candidato</label>
                <div class="col-lg-4">
                    <input type="textarea" NAME="otrosdatos" class="form-control" id="otrosdatos"
                           placeholder="Datos de interés sobre el candidato" value="<?=VP('otrosdatos', $row['otrosdatos'])?>">
                </div>
            </div></br></br></br>

            <div class="form-group">
                <label for="aceptar" class="col-lg-5 control-label"></label>
                <div class="col-lg-3">
                    <input type="submit" NAME="aceptar" class="btn btn-primary" id="aceptar" value="Aceptar"></br></br>
                    <a href="?views=view_lista" class="btn btn-primary">Cancelar</a>
                </div>

                <?php } ?>
        </FORM>
    </div>


</div>

</form>
