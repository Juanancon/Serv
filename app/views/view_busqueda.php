<div class="container" align="center">
    <form class="form-horizontal" role="form" method="POST">
        <h1>Búsqueda de ofertas</h1><br>
        <form class="form-horizontal" role="form" method="POST">

            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">
                    <?=creaSelect('busqueda1', array("Igual", "Contiene", "Mayor", "Menor"))?>
                </span>
                <input type="text" class="form-control" placeholder="Introduzca campo" aria-describedby="basic-addon1">
            </div>
            <br>

            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">
                    <?=creaSelect('busqueda1', array("Igual", "Contiene", "Mayor", "Menor"))?>
                </span>
                <input type="text" class="form-control" placeholder="Introduzca campo" aria-describedby="basic-addon1">
            </div>
            <br>

            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">
                    <?=creaSelect('busqueda1', array("Igual", "Contiene", "Mayor", "Menor"))?>
                </span>
                <input type="text" class="form-control" placeholder="Introduzca campo" aria-describedby="basic-addon1">
            </div>
            <br>
        </form>
        <a href="?controllers=ctr_login" class="btn btn-primary">Volver</a>
    </form>
</div>

<!-- Meter paginado y tablas para los resultados de la busqueda -->