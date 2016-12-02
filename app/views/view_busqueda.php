<div class="container" align="center">
        <h1>Búsqueda de ofertas</h1><br>
        <form class="form-horizontal" role="form" method="GET" action="">

            <INPUT TYPE="HIDDEN" NAME="controllers" value="ctr_buscar">
            <div class="input-group">
                <span class="input-group-addon" id="busqueda1">
                     <select NAME="busqueda1">
                          <option value="=">Igual</option>
                          <option value="LIKE">Contiene</option>
                          <option value=">">Mayor</option>
                          <option value="<">Menor</option>
                    </select>
                </span>
                <input type="text" id="CP" NAME="CP" class="form-control" placeholder="Introduzca Codigo Postal" aria-describedby="basic-addon1" value="<?=VG('CP', '')?>">
            </div>
            <br>

            <div class="input-group">
                <span class="input-group-addon" id="busqueda2">
                     <select NAME="busqueda2">
                          <option value="=">Igual</option>
                          <option value="LIKE">Contiene</option>
                          <option value=">">Mayor</option>
                          <option value="<">Menor</option>
                    </select>
                </span>
                <input type="text" id="telefono" NAME="telefono" class="form-control" placeholder="Introduzca telefono" aria-describedby="basic-addon1" value="<?=VG('telefono', '')?>">
            </div>
            <br>

            <div class="input-group">
                <span class="input-group-addon" id="busqueda3" NAME="busqueda3">
                     <select NAME="busqueda3">
                          <option value="=">Igual</option>
                          <option value="LIKE">Contiene</option>
                          <option value=">">Mayor</option>
                          <option value="<">Menor</option>
                    </select>
                </span>
                <input type="text" id="psicologo" NAME="psicologo" class="form-control" placeholder="Introduzca psicologo" aria-describedby="basic-addon1" value="<?=VG('psicologo', '')?>">
            </div>
            <br>
            <input type="submit" NAME="Buscar" class="btn btn-primary" id="Buscar" value="Buscar"></br></br>
        </form>

   <?php if(isset($ofertas) && $total_paginas>0): ?>
    <?php echo "Número de registros encontrados: " . $num_total_registros . "<br>";
    echo "Se muestran páginas de " . $TAMANO_PAGINA . " registros cada una<br>";
    echo "Mostrando la página " . $pagina . " de " . $total_paginas . "<p>"; ?>
   <?php  endif; ?>
</div>

<?php if(isset($ofertas) && $total_paginas>0): ?>
<div class="container">
    <form class="form-horizontal" role="form" method="GET">
        <table class="table table-striped table-bordered table-hover" id="resumen">
            <tr class="active">
                <th>Descripcion</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Código Postal</th>
                <th>Fecha Comunicación</th>
                <th>Provincia</th>
                <th>MODIFICAR</th>
            </tr>
            <?php  endif; ?>

            <?php
            if(isset($num_total_registros) && $num_total_registros == 0): ?>
            <h1 align="center">¡No se han encontrado registros.!</h1>
            <?php endif; ?>
            <?php
            if(isset($ofertas) && $total_paginas>0):
                foreach($ofertas as $row) : ?>
                <tr>
                    <td><?=$row['descripcion']?></td>
                    <td><?=$row['nombre']?></td>
                    <td><?=$row['telefono']?></td>
                    <td><?=$row['CP']?></td>
                    <td><?=$row['fechatope']?></td>
                    <td><?=devuelveProvincia($row['provincia'])?></td>
                    <td>
                        <?php if($_SESSION['tipo'] == 'A'){ ?>
                        <form method="get" action="">
                            <input type="hidden" name="Cod" value="'.$row['Cod'].'" /> <!-- ¿Podría ser $row[0] ? -->
                            <a href="?controllers=ctr_info&Cod=<?=$row["Cod"]?>" class="btn btn-primary btn-info" title="info"><i class="fa fa-info" aria-hidden="true"></i></a>
                            <a href="?controllers=ctr_modificar&Cod=<?=$row["Cod"]?>" class="btn btn-primary btn-warning" title="modificar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a href="?controllers=ctr_borrar&Cod=<?=$row["Cod"]?>" class="btn btn-primary btn-danger" title="borrar"><i class="fa fa-eraser" aria-hidden="true">
                        </form>

                        <?php } else{ ?>
                            <input type="hidden" name="Cod" value="'.$row['Cod'].'" /> <!-- ¿Podría ser $row[0] ? -->
                            <a href="?controllers=ctr_info&Cod=<?=$row["Cod"]?>" class="btn btn-primary btn-info" title="info"><i class="fa fa-info" aria-hidden="true"></i></a>
                            <a href="?controllers=ctr_PSICOmodificar&Cod=<?=$row["Cod"]?>" class="btn btn-primary btn-warning" title="modificar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <?php } ?>

                    </td>
                </tr>

                <?php endforeach; ?>
            <?php  endif; ?>
        </table>
    </form>
</div><br><br>

<?php if(isset($ofertas) && $total_paginas>0): ?>
    <div class="container" align="center">
        <footer>
            <P>
                <?php if ($pagina>1): ?>
                    <a href="?controllers=ctr_buscar&pagina=1&CP=<?=$_GET['CP']?>&telefono=<?=$_GET['telefono']?>&psicologo=<?=$_GET['psicologo']?>&busqueda1=<?=$_GET['busqueda1']?>&busqueda2=<?=$_GET['busqueda2']?>&busqueda3=<?=$_GET['busqueda3']?>>"><input class="btn btn-info btn-md" type="button"  value ="Primera Pagina"></a>
                    <a href="?controllers=ctr_buscar&pagina=<?=$pagina-1?>&CP=<?=$_GET['CP']?>&telefono=<?=$_GET['telefono']?>&psicologo=<?=$_GET['psicologo']?>&busqueda1=<?=$_GET['busqueda1']?>&busqueda2=<?=$_GET['busqueda2']?>&busqueda3=<?=$_GET['busqueda3']?>"><input class="btn btn-primary btn-sm" type="button"  value ="Atras"></a>
                <?php endif; ?>

                <?php if ($pagina<$total_paginas) :?>
                    <a href="?controllers=ctr_buscar&pagina=<?=$pagina+1?>&CP=<?=$_GET['CP']?>&telefono=<?=$_GET['telefono']?>&psicologo=<?=$_GET['psicologo']?>&busqueda1=<?=$_GET['busqueda1']?>&busqueda2=<?=$_GET['busqueda2']?>&busqueda3=<?=$_GET['busqueda3']?>"><input class="btn btn-primary btn-sm" type="button"  value ="Siguiente"></a>
                    <a href="?controllers=ctr_buscar&pagina=<?=$total_paginas?>&CP=<?=$_GET['CP']?>&telefono=<?=$_GET['telefono']?>&psicologo=<?=$_GET['psicologo']?>&busqueda1=<?=$_GET['busqueda1']?>&busqueda2=<?=$_GET['busqueda2']?>&busqueda3=<?=$_GET['busqueda3']?>"><input class="btn btn-info btn-md" type="button"  value ="Ultima Pagina"></a>
                <?php endif;?>

            </P>
        </footer>
    </div>
<?php  endif; ?>

<div class="container" align="center">
    <a href="?controllers=ctr_login" class="btn btn-primary">Volver</a>
</div>



