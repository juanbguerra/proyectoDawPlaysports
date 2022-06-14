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
    <title>Alta Anuncio</title>
    <script src="../js/jquery-3.5.1.min.js"> </script>
    <script src="../js/scriptAltaAnunciosFiltradoAjax.js" type="text/javascript"></script>
</head>
<body>
       <?php
            $_SESSION['ctrler'] = false;
            require_once("header2.php");
            $FechaAñoMes = date("Y-m-d");
            $FechaTime = date("H:m");
            $FechaActualFiltrada = $FechaAñoMes."T".$FechaTime;
            /*$fechaHoy = date("Y-m-d".$t."H:m");
            echo($fechaHoy);
            $fechaActualFiltrada =  str_replace("UTC", "T", $fechaHoy);*/
            //echo ($FechaFiltrada); 
        ?>
        <!--Formulario anuncio para dar de alta un nuevo anuncio-->
        <section class="seccionSeparaFooter sectionPerfilUsuario" > 
            <div class="container pt-4 pb-4">
                <h1 class="editarCuenta fw-bold">Resgistrar Anuncio</h1>
                <p>Introduce los datos para subir un nuevo anuncio</p>
                <form class="row g-3 mt-4 divFormulario needs-validation" action="registrarAnuncio_controller.php" method="post" novalidate>
                    <div class="row container d-flex justify-content-center">
                        <div class="form-group col-md-4">
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
                                    Debe elegir un Deporte.
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="pistas" class="form-label fw-bold text-white">Pistas</label>
                            <select class="form-control mb-3" id="pistas" name="pistas" required>
                                <option value="">--Seleccione una Pista--</option>
                            </select>
                            <div class="invalid-feedback">
                                    Debe elegir una Pista.
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="clubDeportivo" class="form-label fw-bold text-white">Club Deportivo</label>
                            <select class="form-control mb-3" id="clubDeportivo" name="clubDeportivo" required>
                                <option value="">--Club Deportivo--</option>
                            </select>
                            <div class="invalid-feedback">
                                    Debe elegir un Centro Deportivo.
                            </div>
                        </div>
                    </div>  
                    <div class="row container d-flex justify-content-center mt-4 mb-4">
                        <div class="form-group col-md-4">
                            <label for="municipio" class="form-label fw-bold text-white">Municipio</label>
                            <select class="form-control mb-3" id="municipio" name="municipio" required>
                                <option value="">--Municipio--</option>
                            </select>
                            <div class="invalid-feedback">
                                    Debe elegir un Centro Deportivo.
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label  for="descripcion"  class="form-label fw-bold text-white">Descripción</label>
                            <textarea class="form-control" type="text" id="descripcion" name="descripcion" maxlength="490" required rows="2" placeholder="Pon una descripción de tu anuncio..."></textarea>
                            <div class="invalid-feedback">
                                    Debe poner una descripción en el Anuncio.
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label  for="fecha"  class="form-label fw-bold text-white">Fecha</label>
                            <input class="form-control" type="datetime-local" id="fecha" name="fecha" min="<?php echo $FechaActualFiltrada;?>" required>
                            <div class="invalid-feedback mt-3">
                                    La fecha debe ser actual.
                            </div>
                        </div>
                    </div>
                    <div class="row container d-flex justify-content-center">
                        <div class="form-group  col-sm-6 col-6">
                            <label for="jugadores"  class="form-label fw-bold text-white">Jugadores</label>
                            <select class="form-control mb-3" id="jugadores" name="jugadores" required>
                                <option value="">--Jugadores--</option>
                            </select>
                            <div class="invalid-feedback">
                                    Debe elegir un número de Jugadores.
                            </div>
                        </div>
                        <div class="form-group  col-sm-6 col-6">
                            <label for="precio" class="form-label fw-bold text-white">Precio Total</label>
                            <select class="form-control mb-3" id="precio" name="precio" required>
                                <option value="">--Precio Total--</option>
                            </select>
                            <div class="invalid-feedback">
                                    Debe elegir un precio.
                            </div>
                        </div>
                    </div>
                    <div class="row container d-flex justify-content-center">
                        <div class="form-group  col-sm-6 col-6">
                            <label for="plazas" class="form-label fw-bold text-white mt-4">Plazas</label>
                            <select class="form-control mb-3" id="plazas" name="plazas" required>
                                <option value="">--Numero de Plazas--</option>
                            </select>
                            <div class="invalid-feedback">
                                    Debe elegir un número de Plazas.
                            </div>
                        </div>
                        <div class="form-group  col-sm-6 col-6">
                            <label for="preciojugador" class="form-label fw-bold text-white mt-4">Precio por Jugador</label>
                            <select class="form-control mb-3" id="preciojugador" name="preciojugador" required>
                                <option value="">--Precio Por Jugador--</option>
                            </select>
                            <div class="invalid-feedback">
                                    Debe elegir un precio por Jugador.
                            </div>
                        </div>    
                    </div>
                    <div class="row container d-flex justify-content-center">   
                        <div class="col-md-12 d-flex justify-content-end mt-2">
                            <button class="btn btn-success fw-bold me-3" type="submit">Subir Anuncio</button>
                            <a class="btn btn-danger fw-bold" href="administrarPistas_controller.php"> Volver</a>
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