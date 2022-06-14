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
    <title>Modificar Usuario Admin</title>
</head>
<body>
   
    <?php
        $_SESSION['ctrler'] = false;
        require_once("header2.php");
    ?>
    <section class="sectionModificarPerfil">
        <div class="bg-light bg-opacity-50 p-2 pb-5">
            <div class="container pt-4">
                    <h1 class="editarCuenta fw-bold">Editar Permisos</h1>

                    <form action="modificarUsuarioTipo_controller.php" method="post">
                        <?php
                        if($_SESSION["usuario"]->getTipoUsuario() == 1){
                            if($selecionarUsuario["idTipoUsuario"] == 1){
                                ?>
                                <input type="radio" id="admin" name="permisos" value="1" checked>
                                <label for="admin" class="fw-bold">Admin</label>
                                &nbsp 
                                <input type="radio" id="colaborador" name="permisos" value="3">
                                <label for="colaborador"  class="fw-bold">Colaborador</label>
                                &nbsp
                                <input type="radio" id="usuario" name="permisos" value="2">
                                <label for="usuario"  class="fw-bold">Usuario</label>
                                &nbsp
                                <button class="btn btn-success mt-1 fw-bold mb-0" type="submit">Cambiar</button>
                                <?php
                            }else if($selecionarUsuario["idTipoUsuario"] == 2){
                                ?>
                                <input type="radio" id="admin" name="permisos" value="1">
                                <label for="admin" class="fw-bold">Admin</label>
                                &nbsp 
                                <input type="radio" id="colaborador" name="permisos" value="3">
                                <label for="colaborador"  class="fw-bold">Colaborador</label>
                                &nbsp
                                <input type="radio" id="usuario" name="permisos" value="2" checked>
                                <label for="usuario"  class="fw-bold">Usuario</label>
                                &nbsp
                                <button class="btn btn-success mt-1 fw-bold mb-0" type="submit">Cambiar</button>
                                <?php
                            }else{
                                ?>
                                <input type="radio" id="admin" name="permisos" value="1">
                                <label for="admin" class="fw-bold">Admin</label>
                                &nbsp 
                                <input type="radio" id="colaborador" name="permisos" value="3" checked>
                                <label for="colaborador"  class="fw-bold">Colaborador</label>
                                &nbsp
                                <input type="radio" id="usuario" name="permisos" value="2">
                                <label for="usuario"  class="fw-bold">Usuario</label>
                                &nbsp
                                <button class="btn btn-success mt-1 fw-bold mb-0" type="submit">Cambiar</button>
                                <?php
                            }
                        }
                        ?>
                    </form>    
                <div class="row mt-3 divFormulario">
                    <div class="col-md-12">
                        <form class="row g-3 needs-validation d-flex justify-content-center" method="post" action="modificarUsuarioAdministrador_controller.php" novalidate>
                            <div class="col-md-6 col-6">
                                <label for="validationCustomNombre" class="form-label fw-bold text-white">Nombre</label>
                                <input type="text" class="form-control" id="validationCustomNombre"  name="nombre" pattern="[^\s][a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]+[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{1,45}" maxlength="45" required value="<?php echo $selecionarUsuario["nombre"];?>">
                                <div class="invalid-feedback">
                                    Nombre no válido, no se permiten números, ni caracteres que no sean letras ni dejar el campo vacío.
                                </div>
                            </div>
                            <div class="col-md-6 col-6">
                                <label for="validationCustomNombre" class="form-label fw-bold text-white">Apellidos</label>
                                <input type="text" class="form-control" id="validationCustomNombre" name="apellidos" pattern="[^\s][a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]+[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{1,45}" maxlength="45" required value="<?php echo $selecionarUsuario["apellidos"];?>">
                                <div class="invalid-feedback">
                                    Apellidos no válidos, no se permiten números, caracteres que no sean letras ni dejar el campo vacío.
                                </div>
                            </div>
                    
                            <div class="col-md-6 col-6">
                                <label for="validationCustomNombre" class="form-label fw-bold text-white">Usuario</label>
                                <input type="text" class="form-control" id="validationCustomNombre" name="usuario" pattern="[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{2,45}" maxlength="45" placeholder="Introduzca su contraseña..." required value="<?php echo $selecionarUsuario["usuario"];?>" disabled>
                                <div class="invalid-feedback">
                                    Nombre de usuario no válido, puede contener letras y números no puede estar el campo vacío ni tener espacios.
                                </div>
                            </div>
                            <div class="col-md-6 col-6">
                                <label for="validationCustomNombre" class="form-label fw-bold text-white">Contraseña</label>
                                <input type="password" class="form-control" name="pwd" id="validationCustomNombre" pattern="[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð*+_.]{1,20}" maxlength="20" placeholder="Introduzca la contraseña..." required value="">
                                <div class="invalid-feedback">
                                Contraseña no válida, no se permite dejar el campo vacío ni superar 20 caracteres puede contener letras y números.
                                </div>
                            </div>
                            <div class="col-md-6 col-6 mb-2">
                                <label for="validationCustomTelefono" class="form-label text-white fw-bold">Teléfono</label>
                                <div class="input-group has-validation">
                                    <input type="text" class="form-control" id="validationCustomTelefono" name="telefono" pattern="[0-9]{9}" maxlength="9" required value="<?php echo $selecionarUsuario["telefono"];?>">
                                    <div class="invalid-feedback">
                                        Teléfono no válido, introduce 9 números, no se permiten letras ni dejar el campo vacío.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-6">
                                <label for="validationCustomEmail" class="form-label fw-bold text-white">Email</label>
                                <div class="input-group has-validation">
                                    <input type="email" class="form-control" id="validationCustomEmail" name="email" pattern="[a-zA-Z0-9._]+@[a-z0-9.]+.[a-z]{2,4}$" maxlength="98" required value="<?php echo $selecionarUsuario["email"];?>">
                                    <div class="invalid-feedback">
                                        Introduce un email válido, no puede estar vacio.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex justify-content-end">
                                <button class="btn btn-success mb-2 fw-bold" type="submit">Modificar</button>
                                <a class="btn btn-danger mb-2 fw-bold ms-3" href="gestionUsuarios_controller.php"> Volver</a>
                            </div>

                        </form>
                    </div>
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