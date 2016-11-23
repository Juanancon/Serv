<div class="container" align="center">
    <form class="form-horizontal" role="form" method="POST">
        <h1>Información Usuarios</h1>
        <table class="table table-striped table-bordered table-hover" id="resumen">
            <tr class="active">

                <?php foreach ($rows as $row) {?>

    <th>Usuario</th>
    <th>Password</th>
    <th>Tipo</th>


    </tr>
    <tr>
        <td><?php echo $row['usuario']?></td>
        <td><?php echo $row['password']?></td>
        <td><?php if ($row['tipo'] == 'A') {echo 'Administrador';} else {echo 'Psicólogo';}?></td>
    </tr>

<?php } ?>

</table>

<form class="form-horizontal" role="form" method="POST">
    <h2>¿Desea borrar el usuario?</h2>
    <input type="submit" NAME="aceptar" class="btn btn-primary" id="aceptar" value="Aceptar"></br></br>
    <a href="?controllers=ctr_login" class="btn btn-primary">Cancelar</a>
</form>

</form>
</div>



