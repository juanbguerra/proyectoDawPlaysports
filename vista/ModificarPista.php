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
    <title>Modificar Pista</title>
</head>
<body>
    <?php
        $_SESSION['ctrler'] = false;
        require_once("header2.php");
    ?>
    <section class="sectionModificarPerfil">
        <div class="bg-light bg-opacity-50 p-2 pb-5">
            <div class="container pt-4">
                <h1 class="editarCuenta fw-bold">Editar Pista</h1>
                <div class="row mt-3 divFormulario">
                    <div class="col-md-12">
                        <form class="row g-3 needs-validation d-flex justify-content-center" method="post" action="modificarPista_controller.php" novalidate>
                            <div class="col-md-6 col-6">
                                <label for="nombrePista" class="form-label fw-bold text-white">Nombre</label>
                                <input type="text" class="form-control" id="nombrePista"  name="nombrePista" pattern="[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]{2,45}" maxlength="45" required value="<?php echo $seleccionarPista["nombrePista"];?>">
                                <div class="invalid-feedback">
                                    Nombre no válido, no se permiten números, ni caracteres que no sean letras ni dejar el campo vacío.
                                </div>
                            </div>
                            <div class="col-md-6 col-6">
                                <label for="precioPista" class="form-label fw-bold text-white">Precio</label>
                                <input type="number" class="form-control" id="precioPista" name="precioPista" pattern="[0,9]{1,10}" step="1" min="1" max ="100" required value="<?php echo $seleccionarPista["precio"];?>">
                                <div class="invalid-feedback">
                                    Precio no válido, no se permiten letras, ni dejar el campo vacío máximo 100 minimo 1 euros.
                                </div>
                            </div>
                    
                            <div class="col-md-12 d-flex justify-content-end">
                                <button class="btn btn-success mb-2 fw-bold" type="submit">Modificar</button>
                                <a class="btn btn-danger mb-2 fw-bold ms-3" href="administrarPistas_controller.php"> Volver</a>
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