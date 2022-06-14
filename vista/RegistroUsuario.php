<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Registro</title>
</head>
<body>
        <?php
            $_SESSION['ctrler'] = false;
            require_once("header2.php");
        ?>
    <!--Formulario para el registro con validacion-->
    <section class="sectionRegistroUsuario"> 
        <div class="container pt-4">
                <h1 class="editarCuenta fw-bold text-black">Registrate</h1>
                <p class="fw-bold">Introduce tus datos para registrarte en PlaySports</p>
                <?php
                if (isset($_SESSION["errorRegistro"])){
                ?>
                    <div class="alert alert-danger" role="alert">
                    <?=$_SESSION["errorRegistro"]?>
                    </div>
                <?php
                }
                ?>
         </div>
         <div class="container containerRegistro mb-5">
            <form class="row g-3 needs-validation d-flex justify-content-center mt-3" method="post" novalidate>
                <div class="col-md-6">
                    <label for="validationCustomNombre" class="form-label text-white fw-bold">Nombre*</label>
                    <input type="text" class="form-control" id="validationCustomNombre" name="validationCustomNombre" pattern="[^\s][a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]+[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{1,45}" maxlength="45" placeholder="Introduzca su nombre..." required>
                    <div class="invalid-feedback">
                        Nombre no válido, no se permiten números, ni caracteres que no sean letras ni dejar el campo vacío.
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="validationCustomApellidos" class="form-label text-white fw-bold">Apellidos*</label>
                    <input type="text" class="form-control" id="validationCustomApellidos" name="validationCustomApellidos" pattern="[^\s][a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]+[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{1,45}" maxlength="45" placeholder="Introduzca sus apellidos..." required>
                    <div class="invalid-feedback">
                        Apellidos no válidos, no se permiten números, caracteres que no sean letras ni dejar el campo vacío.
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="validationCustomUsuario" class="form-label  text-white fw-bold">Usuario*</label>
                    <input type="text" class="form-control" id="validationCustomUsuario" name="validationCustomUsuario" pattern="[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{2,45}" maxlength="45" placeholder="Introduzca su nombre de usuario..." required>
                    <div class="invalid-feedback">
                        Nombre de usuario no válido, puede contener letras y números no puede estar el campo vacío ni tener espacios.
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="validationCustomContrasena" class="form-label  text-white fw-bold">Contraseña*</label>
                    <input type="text" class="form-control" id="validationCustomContrasena" name="validationCustomContrasena" pattern="[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð*+_.]{1,20}" maxlength="20" placeholder="Introduzca su contraseña..." required>
                    <div class="invalid-feedback">
                        Contraseña no válida, no se permite dejar el campo vacío ni superar 20 caracteres puede contener letras y números.
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="validationCustomEmail" class="form-label text-white fw-bold">Email*</label>
                    <div class="input-group has-validation">
                    <span class="input-group-text bg-primary text-white" id="inputGroupPrepend">@</span>
                        <input type="email" class="form-control" id="validationCustomEmail" name="validationCustomEmail" pattern="[a-zA-Z0-9._]+@[a-z0-9.]+.[a-z]{2,4}$" maxlength="98" placeholder="Introduzca su email, ejemplo: juan92@gmail.com.." required>
                        <div class="invalid-feedback">
                            Introduce un email válido, no puede estar vacio.
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="validationCustomTelefono" class="form-label text-white fw-bold">Telefono*</label>
                    <div class="input-group has-validation">
                        <input type="text" class="form-control" id="validationCustomTelefono" name="validationCustomTelefono" pattern="[0-9]{9}" maxlength="9" placeholder="Introduzca su teléfono..." required>
                        <div class="invalid-feedback">
                            Teléfono no válido, introduce 9 números, no se permiten letras ni dejar el campo vacío.
                        </div>
                    </div>
                </div>
                <div class="col-md-12 d-flex justify-content-end">
                    <input class="btn btn-success mb-3 fw-bold" value="Registrarse" type="submit"></input>
                </div>
            </form>
        </div>
</section>
<!-- Bloque Footer  el cual se hace responsi dividido en columnas por clases-->
<?php
        require_once("footer.php");
    ?>
<script src="../js/scriptValidacionRegistro.js" type="text/javascript"></script>
</body>
</html>