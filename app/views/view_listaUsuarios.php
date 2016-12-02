<div class="container" align="center">

    <h1>Usuarios existentes</h1>
    <a href="?controllers=ctr_insertarUsuario>" class="btn btn-primary" title="Insertar" value="Insertar nuevo usuario">
        <i class="fa fa-user-circle" aria-hidden="true"></i>    Insertar Nuevo Usuario</a></br></br>

    <?php echo "Número de registros encontrados: " . $num_total_registros . "<br>";
    echo "Se muestran páginas de " . $TAMANO_PAGINA . " registros cada una<br>";
    echo "Mostrando la página " . $pagina . " de " . $total_paginas . "<p>"; ?>

    <div class="container">
        <form class="form-horizontal" role="form" method="POST">
            <table class="table table-striped table-bordered table-hover" id="resumen">
                <tr class="active">
                    <th>Usuario</th>
                    <th>Tipo</th>
                    <th>Opciones</th>

                </tr>
                <?php
                //Aquí genero las tablas. Foreach
                foreach($usuarios as $row) :
                    $tipo = ($row["tipo"] == "A") ? "Administrador" : "Psicólogo";?>
                    <tr>
                        <td><?=$row['usuario']?></td>
                        <td><?=$tipo?></td>
                    <?php if($row['usuario']=='admin'): ?>
                        <td>
                            <form method="get" action="">
                            </form>
                        </td>
                    <?php else:  ?>
                        <td>
                            <form method="get" action="">
                                <input type="hidden" name="Cod" value="'.$row['Cod'].'" /> <!-- ¿Podría ser $row[0] ? -->
                                <a href="?controllers=ctr_modificarUsuario&Cod=<?=$row["Cod"]?>" class="btn btn-primary btn-warning"
                                   title="modificar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                <a href="?controllers=ctr_borrarUsuario&Cod=<?=$row["Cod"]?>" class="btn btn-primary btn-danger"
                                   title="borrar"><i class="fa fa-eraser" aria-hidden="true">
                            </form>
                        </td>
                    </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </table>
        </form>

        <footer align="center">
            <P>
                <?php if ($pagina>1): ?>
                    <a href="?controllers=ctr_listaUsuarios&pagina=1"><input class="btn btn-info btn-md" type="button"  value ="Primera Pagina"></a>
                    <a href="?controllers=ctr_listaUsuarios&pagina=<?=$pagina-1?>"><input class="btn btn-primary btn-sm" type="button"  value ="Atras"></a>
                <?php endif; ?>

                <?php if ($pagina<$total_paginas) :?>
                    <a href="?controllers=ctr_listaUsuarios&pagina=<?=$pagina+1?>"><input class="btn btn-primary btn-sm" type="button"  value ="Siguiente"></a>
                    <a href="?controllers=ctr_listaUsuarios&pagina=<?=$total_paginas?>"><input class="btn btn-info btn-md" type="button"  value ="Ultima Pagina"></a>
                <?php endif;?>
            </P>



        </footer>
            <a class="btn btn-primary" href="?controllers=ctr_lista&pagina=<?=$pagina+1?>">VOLVER</a>

    </div>
</div>

