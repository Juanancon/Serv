<div class="container" align="center">

    <?php if ($errores) :?>
        <div class="alert alert-danger" align="left">
            <?php foreach ($errores as $error) : ?>
                <li><?=$error;?></li>
            <?php endforeach;?>
        </div>
    <?php endif?>

    <h1>Modificar Usuario</h1></br>

    <div class="container">

        <form class="form-horizontal" role="form" method="POST">

            <?php foreach ($rows as $row) {?>

            <div class="form-group">
                <label for="descripcion" class="col-lg-5 control-label">Usuario</label>
                <div class="col-lg-3">
                    <input type="textarea" NAME="usuario" class="form-control" id="descripcion"
                           placeholder="Descripcion" value="<?=VP('usuario', $row['usuario'])?>">
                </div>
            </div></br>

            <div class="form-group">
                <label for="nombre" class="col-lg-5 control-label">Password</label>
                <div class="col-lg-3">
                    <input type="password" NAME="password" class="form-control" id="nombre"
                           placeholder="Introduzca nombre de contacto" value="<?=$row['password']?>">
                </div>
            </div></br>

            <div class="form-group">
                <label for="tipo" class="col-lg-5 control-label">Tipo</label>
                <div class="col-lg-2">
                    <?=creaSelect('tipo', array('A'=>"Administrador", 'P'=>"Psicólogo"), VP('tipo', $row['tipo']))?>
                </div>
            </div></br>

            </br></br></br>

            <div class="form-group">
                <label for="aceptar" class="col-lg-5 control-label"></label>
                <div class="col-lg-3">
                    <input type="submit" NAME="aceptar" class="btn btn-primary" id="aceptar" value="Aceptar"></br></br>
                    <a href="?controllers=ctr_listaUsuarios" class="btn btn-primary">Cancelar</a>
                </div>

                <?php } ?>
        </FORM>
    </div>


</div>

</form>