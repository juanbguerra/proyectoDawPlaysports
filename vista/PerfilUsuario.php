<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Perfil Usuario</title>
</head>
<body>
       <?php
            $_SESSION['ctrler'] = false;
            require_once("header2.php");
        ?>
    <!--Formulario para puntuar al usuario y escribirle comentarios-->
    <section class="sectionRegistroUsuario"> 
        <div class="bg-light bg-opacity-50 pb-4 ">
                <div class="container pt-5">
                        <h1 class="editarCuenta pb-3 m-0">Perfil de <?php echo $buscarUsuario["usuario"];?> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></h1>
                        <div class="divFormulario">
                            <div class="row g-2 col-10 m-auto ">
                                <div class="col-lg-2 col-12 d-flex align-items-center text-white">
                                    <h5><?php echo $buscarUsuario["usuario"];?></h5>
                                </div>
                                <div class="col-lg-4 col-12 d-flex align-items-center text-white">
                                    <h5><?php echo $buscarUsuario["nombre"].' '.$buscarUsuario["apellidos"];?></h5>
                                </div>
                                <div class="col-lg-3 col-12 d-flex align-items-center text-white">
                                    <h5><?php echo $buscarUsuario["email"];?></h5>
                                </div>
                                <div class="col-lg-3 col-12 d-flex align-items-center text-white">
                                    <h5><?php echo $buscarUsuario["telefono"];?></h5>
                                </div>
                            </div>
                                <div class="container mt-5" >
                                    <div class="row d-flex justify-content-center"> 
                                        <div class="col-sm-10 p-0 text-white">
                                            <h2>Comentarios:</h2>
                                        </div>
                                    </div>
                                </div>
                            
                            <?php
                            if(sizeof($comentariosUsuario) == 0){
                                ?>
                            <article class="mt-4">
                                <div class="container mb-4">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-sm-10 p-0">
                                            <div class="panel panel-default"> 
                                                <div class="panel-body" id="respuestasComentarios">
                                                    <div class="d-flex">
                                                        <div class="flex-grow-1 ms-3">
                                                            <h4 class="media-heading">Este usuario no tiene comentarios</h4> 
                                                            <p>¿Quieres ser el primero?</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <?php
                            }else{
                                foreach($comentariosUsuario as $comentario){
                                    ?>                    
                                    <article class="mt-4">
                                        <div class="container mb-4">
                                            <div class="row d-flex justify-content-center">
                                                <div class="col-sm-10 p-0">
                                                    <div class="panel panel-default"> 
                                                        <div class="panel-body" id="respuestasComentarios">
                                                            <div class="d-flex">
                                                                <div class="flex-grow-1 ms-3">
                                                                    <h4 class="media-heading">Usuario: <?php echo $comentario["usuario"];?></h4> 
                                                                    <p>Comentario: <?php echo $comentario["Comentario"];?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                <?php
                                }
                            }
                            ?>
                        <!-- Codigo  de la parte de los comentarios-->
                            <article class="wrap" id="discussions">
                                <div class="container" >
                                    <div class="row d-flex justify-content-center"> 
                                        <div class="col-sm-10 p-0 text-white">
                                            <h4>Publicar comentarios:</h3>
                                                <form action="publicaComentario_controller.php" class="needs-validation" method="post" novalidate>
                                                    <input type='hidden' name='idUsuarioComenta' value='<?php echo $_SESSION['usuario']->getIdUsuario();?>'>
                                                    <input type='hidden' name='idUsuarioRecibe' value='<?php echo $buscarUsuario["idUsuario"];?>'>
                                                    <textarea class="form-control" rows="3" name="comentario" maxlength="490" placeholder="Escribe aquí tu comentario..." required></textarea> 
                                                    <div class="invalid-feedback">
                                                        Debe poner rellenar el campo de texto del comentario.
                                                    </div>
                                                    <p id="btn-form" class="d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-danger btn-lg mt-3">Publicar</button></p> 
                                                </form>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                </div>
        </div>    
    </section>

<!-- Bloque Footer  el cual se hace responsi dividido en columnas por clases-->
    <?php
        require_once("footer.php");
    ?>
    <script src="../js/scriptValidacionRegistro.js" type="text/javascript"></script>
</body>
</html>