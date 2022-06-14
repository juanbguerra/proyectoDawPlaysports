<?php 
    $ctrl = $_SESSION['ctrler'];
    if($ctrl){
        $rutaCtrl = "controlador/";
        $rutaSwall = "";

    }else{
        $rutaCtrl = "";
        $rutaSwall = "../";
    }
    ?>
<header>
        <nav class="navbar navbar-expand-xl navbar-dark bg-dark">
            <div class="container-fluid containerHoverHeader ms-4 me-4">
    
                <a class="navbar-brand" href="<?= $rutaSwall?>index.php"><img class="fotoLogo" src="<?= $rutaSwall?>img/polideportivo2.jpg" alt="logoWeb" class=""></a>
                <a class="navbar-brand" href="<?= $rutaSwall?>index.php"><h1>PlaySports</h1></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav m-auto" id="ulHeader">
                        <?php                                
                        require_once("".$rutaSwall."swall/swall.php");
                            if(isset($_SESSION["usuario"])){
                                $nombre = $_SESSION["usuario"]->getUsuario();
                                ?>
                                <li class="nav-item ">
                                    <a class="nav-link active aHeaderHover me-4" aria-current="page" href="<?= $rutaCtrl?>altaAnuncio_controller.php"><i class="fas fa-chevron-circle-up"></i> Alta Anuncios</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link active aHeaderHover me-4" aria-current="page" href="<?= $rutaCtrl?>reservarPartido_controller.php"><i class="fas fa-search"></i> Reservar Partido</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link active dropdown-toggle aHeaderHover me-4" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-people-fill"></i>
                                        <?=$nombre?>
                                    </a>
                                    <!--Menu para editar el perfil del usuario entrar en el perfil y cerrar sesion-->
                                    <ul class="dropdown-menu"  aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="<?= $rutaCtrl?>gestionReservas_controller.php"><i class="bi bi-bag-fill"></i> Mis reservas</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <?php
                                        if($_SESSION["usuario"]->getTipoUsuario() != 1){
                                        ?>    
                                            <li><a class="dropdown-item" href="<?= $rutaCtrl?>editarPerfil_controller.php"><i class="fas fa-edit"></i> Editar Perfil</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                        <?php
                                        }
                                        ?>
                                        
                                        <li><a class="dropdown-item" href="<?= $rutaCtrl?>perfilUsuario_controller.php?idUsuario=<?=$_SESSION['usuario']->getIdUsuario()?>"><i class="fas fa-user"></i> Perfil</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="<?= $rutaCtrl?>cerrarSesion_controller.php"><i class="fas fa-power-off"></i></i> Cerrar Sesión</a></li>
                                    </ul>
                                </li>    
                                    <?php
                                    if($_SESSION["usuario"]->getTipoUsuario() == 1 || $_SESSION["usuario"]->getTipoUsuario() == 3){
                                        ?>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link active dropdown-toggle aHeaderHover" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-gear"></i> Administrar</a>
                                            <ul class="dropdown-menu"  aria-labelledby="navbarDropdown">

                                                <li><a class="dropdown-item" href="<?= $rutaCtrl?>administrarPistas_controller.php"><i class="bi bi-arrow-repeat"></i> Administrar Pistas</a></li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li><a class="dropdown-item" href="<?= $rutaCtrl?>altaCentroDeportivo_controller.php"><i class="bi bi-arrow-down-right-square-fill"></i> Registrar Centro Deportivo</a></li>              
                                                <?php
                                                if($_SESSION["usuario"]->getTipoUsuario() == 1){
                                                    ?>
                                                    <li><hr class="dropdown-divider"></li>
                                                    <li><a class="dropdown-item" href="<?= $rutaCtrl?>gestionAnuncios_controller.php"><i class="fas fa-edit"></i> Validar Anuncios</a></li>
                                                    <li><hr class="dropdown-divider"></li>
                                                    <li><a class="dropdown-item" href="<?= $rutaCtrl?>gestionUsuarios_controller.php"><i class="fas fa-user"></i> Gestionar Usuarios</a></li>
                                                <?php
                                                }
                                                ?>
                                            </ul>
                                        </li>  
                                        <?php
                                    }
                            }
                            else{
                                ?>
                                <li class="nav-item" >
                                    <a class="nav-link active aHeaderHover me-4" aria-current="page" href="#" data-bs-toggle="modal" data-bs-target="#modalLogin"><i class="bi bi-box-arrow-in-right"></i> Inicia sesión / Regístrate</a>
                                </li>
                                <?php
                            }
                        ?>
                    </ul>
                    <form class="d-flex col-lg-3 col-6" id="botonSearch" action="https://www.google.com/">
                        <input class="form-control me-2" style = "min-width:90px" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
</header>