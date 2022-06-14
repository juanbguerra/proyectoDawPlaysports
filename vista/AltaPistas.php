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
    <title>Alta Pistas</title>
</head>
<body>
       <?php
            $_SESSION['ctrler'] = false;
            require_once("header2.php");
        ?>
        <section class="seccionSeparaFooter sectionPerfilUsuario" > 
            <div class="container pt-4 pb-4">
                <h1 class="editarCuenta fw-bold">Resgistrar Pistas</h1>
                <p>Introduce los datos para registrar una nueva pista</p>
                <?php
                if (isset($_SESSION["errorAltaPista"])){
                ?>
                    <div class="alert alert-danger" role="alert">
                    <?=$_SESSION["errorAltaPista"]?>
                    </div>
                <?php
                }
                ?>
                <form class="row g-3 mt-4 needs-validation divFormulario" action="altaPistas_controller.php" method="post" novalidate>
                    <div class="row container d-flex justify-content-center">
                        <div class="form-group col-md-6">
                            <label for="deporte" class="form-label fw-bold text-white">Deporte</label>
                            <select class="form-control mb-3" id="deporte" name="deporte" required>
                                <option value="">--Seleccione un Deporte--</option>
                                <?php 
                                    foreach($listaDeportes as $deporte)
                                    {
                                        echo '<option value="'.$deporte["idDeporte"].'">'.$deporte["nombreDeporte"].'</option>';
                                    }
                                ?>
                            </select>
                            <div class="invalid-feedback">
                                    Debe seleccionar un Deporte.
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="clubDeportivo" class="form-label fw-bold text-white">Club Deportivo</label>
                            <select class="form-control mb-3" id="clubDeportivo" name="clubDeportivo" required>
                                <option value="">--Seleccione un Club Deportivo--</option>
                                <?php 
                                    foreach($listaClubDeportivo as $club)
                                    {
                                        echo '<option value="'.$club["idClubDeportivo"].'">'.$club["nombre"].'</option>';
                                    }
                                ?>
                            </select>
                            <div class="invalid-feedback">
                                    Debe seleccionar un Club Deportivo.
                            </div>
                        </div>
                        <div class="col-md-6">
                                <label for="nombrePista" class="form-label text-white fw-bold">Nombre Pista</label>
                                <div class="input-group has-validation">
                                    <input type="text" class="form-control" id="nombrePista" name="nombrePista" pattern="[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]{2,44}" maxlength="44" required>
                                    <div class="invalid-feedback">
                                        Introduce el nombre de la Pista.
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-6">
                                <label for="precioPista" class="form-label text-white fw-bold">Precio Pista</label>
                                <div class="input-group has-validation">
                                <input type="number" class="form-control" id="precioPista" name="precioPista" step="1" min="1" max ="500" required>
                                    <div class="invalid-feedback">
                                        Introduce el precio de la Pista de 1 a 100 Euros.
                                    </div>
                                </div>
                        </div>
                    </div>  
                    <div class="row container d-flex justify-content-center">   
                        <div class="col-md-12 d-flex justify-content-end mt-2">
                            <button class="btn btn-success fw-bold me-3 mt-2" type="submit">Subir Anuncio</button>
                            <a class="btn btn-danger fw-bold mt-2" href="administrarPistas_controller.php"> Volver</a>
                        </div>
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