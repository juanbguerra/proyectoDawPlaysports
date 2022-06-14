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
    <title>Gestión Usuarios</title>
</head>
<body>
       <?php
            $_SESSION['ctrler'] = false;
            require_once("header2.php");
        ?>
    <section class="sectionGestionUsuarios pt-3">
        <div class="container tablaUsuarios">
            <h1 class="fw-bold text-center mb-3">Gestión de Usuarios</h1>
            <table class="table table-hover table-dark">
                <thead>
                <tr class=" text-center">
                    <th scope="col">Usuario</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Acciones</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($listarUsuarios as $usuarios)
                        {
                        ?>
                            <tr class="table-primary align-middle text-center">
                                <td class="fw-bold"><?php echo $usuarios["usuario"];?></td>
                                <td><?php echo $usuarios["nombre"];?></td>
                                <td>
                                    <!--<a  class="btn btn-outline-success col-4" href="ModificarUsuario2.html">Editar Usuario</a>-->
                                    <div class="modal fade" id="modalEliminar<?php echo $usuarios["idUsuario"];?>">
                                        <div class="modal-dialog modal-sm modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <h5 class="text-center pb-2">¿Desea eliminar el usuario <?php echo $usuarios["usuario"];?> ?</h5>
                                                    <div class="d-flex justify-content-center align-items-center">
                                                        <form action="eliminarUsuarios_controller.php" class="text-center" method="post">
                                                            <input type='hidden' name='idUsuario' value='<?php echo $usuarios["idUsuario"];?>'>
                                                            <button type="submit" style="min-width:60px" class="btn btn-outline-success mt-3 me-2">SI</button>
                                                        </form>
                                                            <!--<button type="submit" class="btn  btn-danger col-5 mt-3">NO</button>-->
                                                        <form action="gestionUsuarios_controller.php" class="text-center" method="post">
                                                            <button type="submit" style="min-width:60px" class="btn btn-outline-danger mt-3">NO</button>
                                                            <!--<button type="submit" class="btn  btn-danger col-5 mt-3">NO</button>-->
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <form action="usuarioSeleccionado_controller.php" class="col-12 text-center" method="post">
                                            <input type='hidden' name='idUsuario' value='<?php echo $usuarios["idUsuario"];?>'>
                                            <input class="btn btn-outline-success mt-3" type="submit" value="Modificar"></input>
                                        </form>
                                            <input class="btn btn-outline-danger mt-3" style="min-width:90px" type="submit" value="Eliminar" data-bs-target="#modalEliminar<?php echo $usuarios["idUsuario"];?>" data-bs-toggle="modal"></input>       
                                </td>
                            </tr>
                        <?php 
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
</body>
</html>