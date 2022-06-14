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
    <title>Reservar Partido</title>
    <script src="../js/jquery-3.5.1.min.js"> </script>
    <script src="../js/scriptReservaPartidoFiltroAjax.js" type="text/javascript"></script>
</head>
<body>
       <?php
            $_SESSION['ctrler'] = false;
            require_once("header2.php");
        ?>
    <!--Formulario- donde podemos filtrar todos los anuncios por deportes-->
    <section id="sectionPrincipal" class="pb-4 pt-5"> 
        <div class="container">
            <form class="row g-3 d-flex justify-content-center ">
                <div class="row col-10 d-flex justify-content-center divFormularioDeportes">
                    <div class="form-group col-md-3">
                        <label for="deporte" class="form-label fw-bold text-white">Deporte</label>
                            <select class="form-control mb-3" style = "min-width:90px" id="deporte" name="deporte" required>
                                <option value="">--Seleccione un Deporte--</option>
                                <?php 
                            
                                    foreach($listaDeporte as $deporte)
                                    {
                                        echo '<option value="'.$deporte["idDeporte"].'">'.$deporte["nombreDeporte"].'</option>';
                                    }
                                ?>
                            </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="plazas" class="form-label fw-bold">Plazas</label>
                        <input class="form-control mb-3" style = "min-width:90px" type="number" min="0"  max="40"id="plazas">
                    </div>
                </div>  
                <div class="row row-cols-1 row-cols-lg-4 row-cols-md-2 g-3" id="listaFiltro">
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