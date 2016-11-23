<nav class="navbar navbar-light" style="background-color: #e3f2fd; margin-bottom: 1%;">
    <a href="?controllers=ctr_login" class="navbar-brand"><i class="fa fa-handshake-o" aria-hidden="true"></i>
        JobYesterday</a>

    <form class="form-inline float-xl-right">
        <?php if(isset($_SESSION['usuario'])) : echo "<b>Usuario:  </b> " . $_SESSION['usuario']; ?>
        <?php endif; ?>
        <?php if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == "A"): echo "<b>Rol: </b>ADMIN   ";?>
        <?php endif; ?>
        <?php if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == "P"): echo "<b>Rol: </b>PSICOLOGO   "; ?>
        <?php endif; ?>
        <?php if(isset($_SESSION['hora'])) : echo "<b>Hora del Login: </b>" . $_SESSION['hora']; ?>
        <?php endif; ?>
        <?php if(isset($_SESSION['conectado']) && $_SESSION['conectado'] == true): ?>
           <a href='?controllers=ctr_logout'><i class="fa fa-sign-out" aria-hidden="true"></i>
           </a>
        <?php endif; ?>
    </form>
</nav>

