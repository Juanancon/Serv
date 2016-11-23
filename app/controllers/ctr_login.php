<?php
include (HELPERS_PATH.'filtrado.php');
include (HELPERS_PATH. 'helper.php');
include (MODELS_PATH . 'bda_ofertasmodelo.php');
include (MODELS_PATH . 'bda_select.php');
include (MODELS_PATH . 'login.php');


if(!$_POST){

    include VIEWS_PATH.'view_login.php';

    if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'A'){
        header('location: ?controllers=ctr_lista');
      }

      else
          if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'P'){
          header('location: ?controllers=ctr_PSICOlista');

      }
}

else if ($_POST){


    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    login($usuario, $password);

    if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'A'){

        header('location: ?controllers=ctr_lista');
    }

    else
        if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'P'){

            header('location: ?controllers=ctr_PSICOlista');

        }

    else{

        ?><div class="alert alert-danger" >
            El usuario no existe o los datos introducidos son incorrectos
        </div>

        <?php
        include VIEWS_PATH.'view_login.php';

    }


}