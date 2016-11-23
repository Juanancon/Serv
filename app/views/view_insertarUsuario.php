<div class="container" align="center">

    <?php if ($errores) :?>
        <div class="alert alert-danger" align="left">
            <?php foreach ($errores as $error) : ?>
                <li><?=$error;?></li>
            <?php endforeach;?>
        </div>
    <?php endif?>

    <h1>Insertar nuevo usuario</h1></br>

    <div class="container">

        <form class="form-horizontal" role="form" method="POST">

            <div class="form-group">
                <label for="descripcion" class="col-lg-5 control-label">Nombre Usuario*</label>
                <div class="col-lg-3">
                    <input type="textarea" NAME="usuario" class="form-control" id="descripcion"
                           placeholder="Descripcion" value="<?=VP('usuario', '')?>">
                </div>
            </div></br>

            <div class="form-group">
                <label for="descripcion" class="col-lg-5 control-label">Password*</label>
                <div class="col-lg-3">
                    <input type="password" NAME="password" class="form-control" id="descripcion"
                           placeholder="password" value="">
                </div>
            </div></br>


            <div class="form-group">
                <label for="tipo" class="col-lg-5 control-label">Tipo</label>
                <div class="col-lg-2" align="LEFT">
                    <?=creaSelect('tipo', array('P'=>"Psicólogo", 'A'=>"Administrador"), VP('tipo'))?>

                </div>
            </div></br></br></br>

            <div class="form-group">
                <label for="aceptar" class="col-lg-5 control-label"></label>
                <div class="col-lg-3">
                    <input type="submit" NAME="aceptar" class="btn btn-primary" id="aceptar" value="Aceptar"></br></br>
                    <a href="?controllers=ctr_listaUsuarios" class="btn btn-primary">Cancelar</a>
                </div>

        </FORM>
    </div>


</div>

</form>

