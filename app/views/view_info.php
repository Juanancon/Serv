<div class="container" align="center">
    <form class="form-horizontal" role="form" method="POST">
        <h1>Información Oferta</h1>
        <table class="table table-striped table-bordered table-hover" id="resumen">
            <tr class="active">

                <?php foreach ($rows as $row) {?>

                <th>Descripcion</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Direccion</th>
                <th>Población</th>
                <th>Código Postal</th>

            </tr>
            <tr>
                <td><?php echo $row['descripcion']?></td>
                <td><?php echo $row['nombre']?></td>
                <td><?php echo $row['telefono']?></td>
                <td><?php echo $row['correo']?></td>
                <td><?php echo $row['direccion']?></td>
                <td><?php echo $row['poblacion']?></td>
                <td><?php echo $row['CP']?></td>

            </tr>
            <!-- Segunda tabla -->

            <tr class="active">
                <th>Fecha creación</th>
                <th>Provincia</th>
                <th>Estado</th>
                <th>Fecha Comunicación</th>
                <th>Psicologo</th>
                <th>Seleccionado</th>
                <th>Otros datos</th>
            </tr>
            <tr>
                <td><?php echo $row['fechacreacion']?></td>
                <td><?php echo $row['provincia']?></td>
                <td><?php echo devuelveEstado($row['estado'])?></td>
                <td><?php echo $row['fechatope']?></td>
                <td><?php echo $row['psicologo']?></td>
                <td><?php echo $row['seleccionado']?></td>
                <td><?php echo $row['otrosdatos']?></td>
            </tr>

            <?php } ?>

        </table>

        <form class="form-horizontal" role="form" method="POST">
            <a href="?controllers=ctr_login" class="btn btn-primary">Volver</a>
        </form>

    </form>
</div>