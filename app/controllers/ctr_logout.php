<?php
if($_SESSION['tipo']=='A' || $_SESSION['tipo']=='P') {
    session_start();
    session_destroy();

    header('location: ?controllers=ctr_login');

}
else{

    header('location: ?controllers=ctr_login');

}