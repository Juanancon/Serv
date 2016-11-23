<div class="container" align="center">

    <h1>Ofertas disponibles</h1>
    <a href="?controllers=ctr_buscar>" class="btn btn-secondary" title="Busqueda avanzada" value="Busqueda"><i class="fa fa-search" aria-hidden="true"></i>    Busqueda Avanzada</a></br>

    <?php echo "Número de registros encontrados: " . $num_total_registros . "<br>";
    echo "Se muestran páginas de " . $TAMANO_PAGINA . " registros cada una<br>";
    echo "Mostrando la página " . $pagina . " de " . $total_paginas . "<p>"; ?>

    <div class="container">
        <form class="form-horizontal" role="form" method="POST">
            <table class="table table-striped table-bordered table-hover" id="resumen">
                <tr class="active">
                    <th>Descripcion</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Fecha Tope</th>
                    <th>Provincia</th>
                    <th>MODIFICAR</th>
                </tr>
                <?php
                //Aquí genero las tablas. Foreach
                foreach($ofertas as $row) : ?>
                    <tr>
                        <td><?=$row['descripcion']?></td>
                        <td><?=$row['nombre']?></td>
                        <td><?=$row['telefono']?></td>
                        <td><?=$row['fechatope']?></td>
                        <td><?=devuelveProvincia($row['provincia'])?></td>
                        <td>
                            <form method="get" action="">
                                <input type="hidden" name="Cod" value="'.$row['Cod'].'" /> <!-- ¿Podría ser $row[0] ? -->
                                <a href="?controllers=ctr_info&Cod=<?=$row["Cod"]?>" class="btn btn-primary btn-info" title="info"><i class="fa fa-info" aria-hidden="true"></i></a>
                                <a href="?controllers=ctr_PSICOmodificar&Cod=<?=$row["Cod"]?>" class="btn btn-primary btn-warning" title="modificar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            </form>
                        </td>
                    </tr>

                <?php endforeach; ?>
            </table>
        </form>

        <footer align="center">
            <P>
                <?php if ($pagina>1): ?>
                    <a href="?controllers=ctr_PSICOlista&pagina=<?=$pagina-1?>"><input class="btn btn-primary" type="button"  value ="Atras"></a>
                <?php endif; ?>

                <?php if ($pagina<$total_paginas) :?>
                    <a href="?controllers=ctr_PSICOlista&pagina=<?=$pagina+1?>"><input class="btn btn-primary" type="button"  value ="Siguiente"></a>
                <?php endif;?>
            </P>
        </footer>

    </div>
</div>

