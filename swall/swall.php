<?php
        if (isset($_SESSION["eliminado"])){
            echo "<script> swal({
                title: 'Eliminado',
                text: '".$_SESSION["eliminado"]."',
                icon: 'success',
                button: 'Aceptar',
                }); </script>";
        }
        unset($_SESSION['eliminado']);

        if (isset($_SESSION["usuarioNoEliminado"])){
            echo "<script> swal({
                title: 'No Eliminado',
                text: '".$_SESSION["usuarioNoEliminado"]."',
                icon: 'error',
                button: 'Aceptar',
                }); </script>";
        }
        unset($_SESSION['usuarioNoEliminado']);

        if (isset($_SESSION["insertadoAnuncio"])){
            echo "<script> swal({
                title: 'Insertado',
                text: '".$_SESSION["insertadoAnuncio"]."',
                icon: 'success',
                button: 'Aceptar',
                }); </script>";
        }
        unset($_SESSION['insertadoAnuncio']);

        if (isset($_SESSION["insertadoAnuncio"])){
            echo "<script> swal({
                title: 'Insertado',
                text: '".$_SESSION["insertadoAnuncio"]."',
                icon: 'success',
                button: 'Aceptar',
                }); </script>";
        }
        unset($_SESSION['insertadoAnuncio']);

        if (isset($_SESSION["usuarioTipoNoModificado"])){
            echo "<script> swal({
                title: 'No Modificado',
                text: '".$_SESSION["usuarioTipoNoModificado"]."',
                icon: 'error',
                button: 'Aceptar',
                }); </script>";
        }
        unset($_SESSION['usuarioTipoNoModificado']);

        if (isset($_SESSION["usuarioModificadoAdmin"])){
            echo "<script> swal({
                title: 'Usuario Modificado',
                text: '".$_SESSION["usuarioModificadoAdmin"]."',
                icon: 'success',
                button: 'Aceptar',
                }); </script>";
        }
        unset($_SESSION['usuarioModificadoAdmin']);

        if (isset($_SESSION["usuarioModificadoPerfil"])){
            echo "<script> swal({
                title: 'Perfil Modificado',
                text: '".$_SESSION["usuarioModificadoPerfil"]."',
                icon: 'success',
                button: 'Aceptar',
                }); </script>";
        }
        unset($_SESSION['usuarioModificadoPerfil']);

        if (isset($_SESSION["usuarioTipoModificado"])){
            echo "<script> swal({
                title: 'Usuario',
                text: '".$_SESSION["usuarioTipoModificado"]."',
                icon: 'success',
                button: 'Aceptar',
                }); </script>";
        }
        unset($_SESSION['usuarioTipoModificado']);

        if (isset($_SESSION["anuncioPublicado"])){
            echo "<script> swal({
                title: 'Anuncio Publicado',
                text: '".$_SESSION["anuncioPublicado"]."',
                icon: 'success',
                button: 'Aceptar',
                }); </script>";
        }
        unset($_SESSION['anuncioPublicado']);

        if (isset($_SESSION["noAnunciosParaPublicar"])){
            echo "<script> swal({
                title: 'Anuncio',
                text: '".$_SESSION["noAnunciosParaPublicar"]."',
                icon: 'success',
                button: 'Aceptar',
                }); </script>";
        }
        unset($_SESSION['noAnunciosParaPublicar']);

        if (isset($_SESSION["centroDeportivoRegistrado"])){
            echo "<script> swal({
                title: 'Centro Deportivo',
                text: '".$_SESSION["centroDeportivoRegistrado"]."',
                icon: 'success',
                button: 'Aceptar',
                }); </script>";
        }
        unset($_SESSION['centroDeportivoRegistrado']);

        if (isset($_SESSION["centroDeportivoNoRegistrado"])){
            echo "<script> swal({
                title: 'Centro Deportivo',
                text: '".$_SESSION["centroDeportivoNoRegistrado"]."',
                icon: 'error',
                button: 'Aceptar',
                }); </script>";
        }
        unset($_SESSION['centroDeportivoNoRegistrado']);

        if (isset($_SESSION["errorCentroDeportivoNombreRegistrado"])){
            echo "<script> swal({
                title: 'Centro Deportivo',
                text: '".$_SESSION["errorCentroDeportivoNombreRegistrado"]."',
                icon: 'error',
                button: 'Aceptar',
                }); </script>";
        }
        unset($_SESSION['errorCentroDeportivoNombreRegistrado']);


        if (isset($_SESSION["eliminadoPista"])){
            echo "<script> swal({
                title: 'Eliminado',
                text: '".$_SESSION["eliminadoPista"]."',
                icon: 'success',
                button: 'Aceptar',
                }); </script>";
        }
        unset($_SESSION['eliminadoPista']);

        if (isset($_SESSION["pistaModificado"])){
            echo "<script> swal({
                title: 'Pista Modificada',
                text: '".$_SESSION["pistaModificado"]."',
                icon: 'success',
                button: 'Aceptar',
                }); </script>";
        }
        unset($_SESSION['pistaModificado']);

        if (isset($_SESSION["insertadoPista"])){
            echo "<script> swal({
                title: 'Insertada Pista',
                text: '".$_SESSION["insertadoPista"]."',
                icon: 'success',
                button: 'Aceptar',
                }); </script>";
        }
        unset($_SESSION['insertadoPista']);

        if (isset($_SESSION["usuarioRegistradoAnuncioTrue"])){
            echo "<script> swal({
                title: 'Reserva no Realizada',
                text: '".$_SESSION["usuarioRegistradoAnuncioTrue"]."',
                icon: 'error',
                button: 'Aceptar',
                }); </script>";
        }
        unset($_SESSION['usuarioRegistradoAnuncioTrue']);

        if (isset($_SESSION["usuarioRegistradoAnuncioFalse"])){
            echo "<script> swal({
                title: 'Reserva Realizada',
                text: '".$_SESSION["usuarioRegistradoAnuncioFalse"]."',
                icon: 'success',
                button: 'Aceptar',
                }); </script>";
        }
        unset($_SESSION['usuarioRegistradoAnuncioFalse']);

        if (isset($_SESSION["reservaEliminada"])){
            echo "<script> swal({
                title: 'Reserva',
                text: '".$_SESSION["reservaEliminada"]."',
                icon: 'success',
                button: 'Aceptar',
                }); </script>";
        }
        unset($_SESSION['reservaEliminada']);

        if (isset($_SESSION["noHayReservas"])){
            echo "<script> swal({
                title: 'Reserva',
                text: '".$_SESSION["noHayReservas"]."',
                icon: 'success',
                button: 'Aceptar',
                }); </script>";
        }
        unset($_SESSION['noHayReservas']);
        
        if (isset($_SESSION["errorAltaAnuncioPistaFecha"])){
            echo "<script> swal({
                title: 'Anuncio no Registrado',
                text: '".$_SESSION["errorAltaAnuncioPistaFecha"]."',
                icon: 'error',
                button: 'Aceptar',
                }); </script>";
        }
        unset($_SESSION['errorAltaAnuncioPistaFecha']);

        if (isset($_SESSION["noComentarioAsiMismo"])){
            echo "<script> swal({
                title: 'Comentario no Publicado',
                text: '".$_SESSION["noComentarioAsiMismo"]."',
                icon: 'error',
                button: 'Aceptar',
                }); </script>";
        }
        unset($_SESSION['noComentarioAsiMismo']);

        if (isset($_SESSION["errorLogin"])){
        echo "<script> swal({
        title: 'Error',
        text: '".$_SESSION["errorLogin"]."',
        icon: 'error',
        button: 'Aceptar',
        }); </script>";
        }
        unset($_SESSION['errorLogin']);
        
        if (isset($_SESSION["registroCorrecto"])){
        echo "<script> swal({
            title: 'Exito',
            text: '".$_SESSION["registroCorrecto"]."',
            icon: 'success',
            button: 'Aceptar',
            }); </script>";
        }
        unset($_SESSION['registroCorrecto']);

        if (isset($_SESSION["registrateUsuario"])){
            echo "<script> swal({
                title: 'Registrate',
                text: '".$_SESSION["registrateUsuario"]."',
                icon: 'error',
                button: 'Aceptar',
                }); </script>";
            }
            unset($_SESSION['registrateUsuario']);
        ?>
        