<!DOCTYPE html>
<html><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agenda</title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <script type="text/javascript" src="../assets/js/agenda.js"></script>
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<div class="container" align="center">

    <h1>Ofertas disponibles</h1>

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
                    <!-- $cod, $descripcion, $nombre, $telefono, $correo, $direccion, $poblacion, $CP, $provincia, $estado,
                    $fechatope, $psicologo, $seleccionado, $otrosdatos -->

                </tr>
                <?php
                //Aquí genero las tablas. Foreach
    foreach($ofertas as $row){
             echo
                '<tr>
                      <td>'.$row['descripcion'].'</td>          
                        <td>'.$row['nombre'].'</td>   
                          <td>'.$row['telefono'].'</td>   
                             <td>'.$row['fechatope'].'</td>   
                                <td>'.$row['provincia'].'</td>   
                                             <td>
                                                <form method="get" action="">
                                                        <input type="hidden" name="cod" value="'.$row[0].'" />
                                                        <a class="btn btn-primary btn-info"><i class="fa fa-info" aria-hidden="true"></i></a>
                                                        <a class="btn btn-primary btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                        <a class="btn btn-primary btn-danger"><i class="fa fa-eraser" aria-hidden="true">                                         
                                                 </form>                                                                                             
                                              </td>                               
                  </tr>';
                } ?>



            </table>
        </form>

        <?php



        ?>

</div>
</div>
</body>
</html>

