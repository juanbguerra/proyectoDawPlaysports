<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Alta Centro Deportivo</title>
</head>
<body>
       <?php
            $_SESSION['ctrler'] = false;
            require_once("header2.php");
        ?>
        <section class="seccionSeparaFooter sectionPerfilUsuario" > 
            <div class="container pt-4 pb-4">
                    <h1 class="editarCuenta fw-bold">Resgistrar Centro Deportivo</h1>
                    <p>Introduce los datos para registrar un nuevo Centro Deportivo.</p>

                    <div class="container containerRegistro mb-5">
                        <form class="row g-3 needs-validation d-flex justify-content-center mt-3" method="post" action="altaCentroDeportivo_controller.php" novalidate>
                            <div class="col-md-6">
                                <label for="nombreCD" class="form-label text-white fw-bold">Nombre*</label>
                                <input type="text" class="form-control" id="nombreCD" name="nombreCD" pattern="[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]{2,48}" maxlength="48" placeholder="Introduzca el nombre..." required>
                                <div class="invalid-feedback">
                                    Introduce el nombre del Centro Deportivo, por favor.
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="direccionCD" class="form-label text-white fw-bold">Dirección*</label>
                                <input type="text" class="form-control" id="direccionCD" name="direccionCD" maxlength="199" placeholder="Introduzca la dirección..." required>
                                <div class="invalid-feedback">
                                    Introduce la dirección del Centro Deportivo, por favor.
                                </div>
                            </div>                   
                            <div class="col-md-6">
                                <label for="telefonoCD" class="form-label text-white fw-bold">Teléfono*</label>
                                <div class="input-group has-validation">
                                    <input type="text" class="form-control" id="telefonoCD" name="telefonoCD" pattern="[0-9]{9}" placeholder="Introduzca el teléfono..." maxlength="9" required>
                                    <div class="invalid-feedback">
                                        Introduce un teléfono válido.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="municipioCD" class="form-label text-white fw-bold">Municipio*</label>
                                <div class="input-group has-validation">
                                    <input type="text" class="form-control" id="municipioCD" name="municipioCD" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]{2,44}" placeholder="Introduzca el municipio..." maxlength="44" required>
                                    <div class="invalid-feedback">
                                        Introduce el Municipio del Centro Deportivo.
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-start flex-column">  
                                <div class="col-md-6">
                                    <label for="codigoCD" class="form-label text-white fw-bold">Código Postal*</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" id="codigoCD" name="codigoCD" pattern="[0-9]{5,5}" maxlength="5" placeholder="Introduzca el código postal..." minlength="5" required>
                                        <div class="invalid-feedback">
                                            Introduce el Código Postal del Municipio del Centro Deportivo, solo se permiten 5 números.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex mb-3 justify-content-end">
                                <input class="btn btn-success fw-bold me-3" value="Registrar" type="submit"></input>
                                <a class="btn btn-danger fw-bold" href="../index.php"> Volver</a>
                            </div>
                        </form>
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