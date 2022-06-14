<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Gestión Pistas</title>
</head>
<body>
       <!--Cabecera-->
       <?php
            $_SESSION['ctrler'] = false;
            require_once("header2.php");
            if(!isset($_SESSION["idClub"])){$_SESSION["idClub"] = 0;}
        ?>
    <section class="sectionGestionUsuarios pt-3">
        <div class="container tablaUsuarios">
            <h1 class="fw-bold text-center mb-3">Gestión de Pistas</h1>

            <form class="row g-3 mt-4 divFormulario needs-validation d-flex justify-content-center align-items-center" action="cargarPistas_controller.php" method="post" novalidate>
                    <div class="row container d-flex justify-content-center align-items-center">
                        <div class="form-group col-md-4 mt-3">
                            <select class="form-control mb-3" id="idclub" name="idclub" required>
                                <option value="" class="text-center">--Seleccione un Centro Deportivo--</option>
                                <?php 
                                    foreach($listarClubDeportivo as $club)
                                    {
                                        echo '<option class="text-center" value="'.$club["idClubDeportivo"].'">'.$club["nombre"].'</option>';
                                    }
                                ?>
                            </select>  
                            <div class="invalid-feedback mb-3">
                                    Seleccione un Centro Deportivo para ver sus Pistas.
                            </div>         
                        </div>
                        <div class="col-md-12 d-flex justify-content-center">
                            <input class="btn btn-info mb-1 fw-bold me-3 text-white" type="submit" value="Ver Pistas"></input>
            </form> 
                            <form action="altaPistas_controller.php" method="post">
                                <input type="hidden" value='<?php echo $_SESSION["idClub"];?>'></input>
                                <input class="btn btn-success mb-1 fw-bold me-3" type="submit" value="Añadir Pistas"></input> 
                            </form>
                        </div>
                    </div>
            <table class="table table-hover table-dark mt-4">
                <thead>
                <tr class=" text-center">
                    <th scope="col">Nombre Pista</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Deporte</th>
                    <th scope="col">Acciones</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        if(!isset($listarPistas)){
                        ?>
                            <tr class=" text-center">
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        <?php
                        }else{
                            foreach($listarPistas as $pista)
                            {
                            ?>
                                <tr class="table-primary align-middle text-center">
                                    <td class="fw-bold"><?php echo $pista["nombrePista"];?></td>
                                    <td><?php echo $pista["precio"];?></td>
                                    <td><?php echo $pista["idDeporte"];?></td>
                                    <td>
                                            <form action="pistaSeleccionada_controller.php" class="col-12 text-center" method="post">
                                                <input type='hidden' name='idClubDeporte' value='<?php echo $pista["idClubDeporte"];?>'>
                                                <input class="btn btn-outline-success mt-3" style="min-width:90px" type="submit" value="Modificar"></input>
                                            </form>
                                            <form action="eliminarPista_controller.php" class="col-12 text-center" method="post">
                                                <input type='hidden' name='idClubDeporte' value='<?php echo $pista["idClubDeporte"];?>'>
                                                <input class="btn btn-outline-danger mt-3" style="min-width:90px" type="submit" value="Eliminar"></input>
                                            </form>
                                    </td>
                                </tr>
                            <?php 
                            }
                        }
                    ?>
                </tbody>
            </table>
            <div class="col-md-12 d-flex justify-content-end mt-2 mb-2">
                    <a class="btn btn-danger mb-1 fw-bold" href="../index.php"> Volver</a>
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