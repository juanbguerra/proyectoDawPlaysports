<?php
ob_start();
class Conectar{
    private $db;
    //Constructor de db
    public function __construct(){
        $this->db= $this->conexion();
    }
    //Funcion para realizar la conexion a nuestra bd
    public static function conexion(){
        try{
            $dsn='mysql:host=localhost;dbname=playsports';
            $conexion = new PDO($dsn,'root','');
            //$dsn='mysql:host=mysql.webcindario.com;dbname=playsports';
            //$conexion = new PDO($dsn,'playsports','administrador');
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexion->exec("SET CHARACTER set UTF8");
            return $conexion;
        }catch(PDOException $e){
            echo "<h3>Error: " . $e->getMessage() . "En la Linea: " . $e->getLine() . "</h3>";
        }       
    }

    /* 
    *   dbAnuncio
    */

    // Método en el que busco los anuncios según si estamos en una vista u otra mediante el parametro isPrincipal y el validado filtrando por la fecha que tiene que ser
    // mayor o igual que la fecha actual y que el numero de jugadores necesitados sea mayor que 0 y ordenamos el resultado por fecha ascendente.
    public function listar_anuncios($validado, $isPrincipal){
        $sqlTxt = "SELECT a.* FROM anuncio a WHERE a.fecha >= CURDATE() AND a.validado=".$validado." AND a.jugadoresNecesitados > 0 ORDER BY a.fecha ASC";
        //Si llamamos al método desde la pagina principal limitamos a 8 el resultado.
            if($isPrincipal){
                $sqlTxt = $sqlTxt." LIMIT 8";
            }
            $consulta=$this->db->query($sqlTxt);
            try{
                $selectAnuncio=$consulta->fetchAll();
                $arrayValores = array();
    // Buscamos en la consulta cada id de los anuncios y buscamos su equivalente en las tablas que necesitamos para transformar el id a su nombre de municipio, pista etc..
                foreach($selectAnuncio as $anuncio)
                {
                    $nombreUsuario="";
                    $nombreDeporte="";
                    $nombrePista="";
                    $nombreClub="";
                    $nombreMunicipio="";
                    $consultaUsuario=$this->db->query("SELECT usuario FROM usuario WHERE idUsuario  = " . $anuncio["fk_idUsuario"]);
                    $selectUsuario=$consultaUsuario->fetchAll();
    
                    foreach($selectUsuario as $usuario)
                    { 
                        $nombreUsuario = $usuario["usuario"];
                    }
    
                    $consultaDeporte=$this->db->query("SELECT nombreDeporte FROM deporte WHERE idDeporte  = " . $anuncio["fk_idDeporte"]);
                    $selectDeporte=$consultaDeporte->fetchAll();
                    foreach($selectDeporte as $deporte)
                    { 
                        $nombreDeporte=$deporte["nombreDeporte"];
                    }
    
                    $consultaPista=$this->db->query("SELECT nombrePista FROM clubdisponedeporte WHERE idClubDeporte  = " . $anuncio["idPista"]);
                    $selectPista=$consultaPista->fetchAll();
                    foreach($selectPista as $pista)
                    { 
                        $nombrePista= $pista["nombrePista"];
                    }
    
                    $consultaClub=$this->db->query("SELECT nombre FROM clubdeportivo WHERE idClubDeportivo  = " . $anuncio["idClub"]);
                    $selectClub=$consultaClub->fetchAll();
                    foreach($selectClub as $club)
                    { 
                        $nombreClub= $club["nombre"];
                    }
    
                    $consultaMunicipio=$this->db->query("SELECT nombre FROM municipio WHERE idMunicipio  = " . $anuncio["idMunicipio"]);
                    $selectMunicipio=$consultaMunicipio->fetchAll();
                    foreach($selectMunicipio as $municipio)
                    { 
                        $nombreMunicipio = $municipio["nombre"];
                    }
                    $anuncio = new Anuncio_model($anuncio["idAnuncio"], $nombreUsuario, $nombreDeporte,$anuncio["precioPorJugador"], $anuncio["descripcion"] , $anuncio["validado"], $anuncio["jugadoresNecesitados"], $anuncio["fecha"], $anuncio["numJugadoresTotales"], $nombrePista, $nombreClub, $nombreMunicipio , $anuncio["precioTotal"]);
    
                    array_push($arrayValores, $anuncio);
                }
                return $arrayValores;
            }catch(PDOException $e){
                return false;
            }
        }

        
// El método busca en la tabla anuncio filtrando que la fecha sea mayor o igual que la actual y el idAnuncio se encuentre en la subconsulta usuarioparticipaanuncio filtrada por usuario
    public function listar_MisReservas($idUsuario){
        //$arrayAnuncio = array();
        $sqlTxt = "SELECT a.* FROM anuncio a WHERE a.fecha >= CURDATE() AND a.idAnuncio IN (SELECT p.fk_idAnuncio FROM usuarioparticipaanuncio p WHERE p.fk_idUsuario = ".$idUsuario.") ORDER BY a.fecha ASC";
            $consulta=$this->db->query($sqlTxt);
            try{
                $selectAnuncio=$consulta->fetchAll();
                $arrayValores = array();
                  // Buscamos en la consulta cada id de los anuncios y buscamos su equivalente en las tablas que necesitamos para transformar el id a su nombre de municipio, pista etc..
                foreach($selectAnuncio as $anuncio)
                {
                    $nombreUsuario="";
                    $nombreDeporte="";
                    $nombrePista="";
                    $nombreClub="";
                    $nombreMunicipio="";
                    $consultaUsuario=$this->db->query("SELECT usuario FROM usuario WHERE idUsuario  = " . $anuncio["fk_idUsuario"]);
                    $selectUsuario=$consultaUsuario->fetchAll();
    
                    foreach($selectUsuario as $usuario)
                    { 
                        $nombreUsuario = $usuario["usuario"];
                    }
    
                    $consultaDeporte=$this->db->query("SELECT nombreDeporte FROM deporte WHERE idDeporte  = " . $anuncio["fk_idDeporte"]);
                    $selectDeporte=$consultaDeporte->fetchAll();
                    foreach($selectDeporte as $deporte)
                    { 
                        $nombreDeporte=$deporte["nombreDeporte"];
                    }
    
                    $consultaPista=$this->db->query("SELECT nombrePista FROM clubdisponedeporte WHERE idClubDeporte  = " . $anuncio["idPista"]);
                    $selectPista=$consultaPista->fetchAll();
                    foreach($selectPista as $pista)
                    { 
                        $nombrePista= $pista["nombrePista"];
                    }
    
                    $consultaClub=$this->db->query("SELECT nombre FROM clubdeportivo WHERE idClubDeportivo  = " . $anuncio["idClub"]);
                    $selectClub=$consultaClub->fetchAll();
                    foreach($selectClub as $club)
                    { 
                        $nombreClub= $club["nombre"];
                    }
    
                    $consultaMunicipio=$this->db->query("SELECT nombre FROM municipio WHERE idMunicipio  = " . $anuncio["idMunicipio"]);
                    $selectMunicipio=$consultaMunicipio->fetchAll();
                    foreach($selectMunicipio as $municipio)
                    { 
                        $nombreMunicipio = $municipio["nombre"];
                    }
                    $anuncio = new Anuncio_model($anuncio["idAnuncio"], $nombreUsuario, $nombreDeporte,$anuncio["precioPorJugador"], $anuncio["descripcion"] , $anuncio["validado"], $anuncio["jugadoresNecesitados"], $anuncio["fecha"], $anuncio["numJugadoresTotales"], $nombrePista, $nombreClub, $nombreMunicipio , $anuncio["precioTotal"]);
    
                    array_push($arrayValores, $anuncio);
                }
                return $arrayValores;
            }catch(PDOException $e){
                return false;
            }
            
        }

        
// Método para seleccionar el anuncio pasandole el id.
    public function listar_anunciosByIdAnuncio($idAnuncio){
        //$arrayAnuncio = array();
        $sqlTxt = "SELECT a.* FROM anuncio a WHERE a.idAnuncio=".$idAnuncio;     
        $pdoSql =$this-> db->prepare($sqlTxt);
        $pdoSql->bindParam(":idAnuncio", $idAnuncio);
            try{
                $pdoSql ->execute();
                $selectAnuncio = $pdoSql->fetchAll();
                foreach($selectAnuncio as $anuncio)
                {
                    $nombreUsuario="";
                    $nombreDeporte="";
                    $nombrePista="";
                    $nombreClub="";
                    $nombreMunicipio="";
                    $consultaUsuario=$this->db->query("SELECT usuario FROM usuario WHERE idUsuario  = " . $anuncio["fk_idUsuario"]);
                    $selectUsuario=$consultaUsuario->fetchAll();
       // Buscamos en la consulta cada id de los anuncios y buscamos su equivalente en las tablas que necesitamos para transformar el id a su nombre de municipio, pista etc..
                    foreach($selectUsuario as $usuario)
                    { 
                        $nombreUsuario = $usuario["usuario"];
                    }

                    $consultaDeporte=$this->db->query("SELECT nombreDeporte FROM deporte WHERE idDeporte  = " . $anuncio["fk_idDeporte"]);
                    $selectDeporte=$consultaDeporte->fetchAll();
                    foreach($selectDeporte as $deporte)
                    { 
                        $nombreDeporte=$deporte["nombreDeporte"];
                    }

                    $consultaPista=$this->db->query("SELECT nombrePista FROM clubdisponedeporte WHERE idClubDeporte  = " . $anuncio["idPista"]);
                    $selectPista=$consultaPista->fetchAll();
                    foreach($selectPista as $pista)
                    { 
                        $nombrePista= $pista["nombrePista"];
                    }

                    $consultaClub=$this->db->query("SELECT nombre FROM clubdeportivo WHERE idClubDeportivo  = " . $anuncio["idClub"]);
                    $selectClub=$consultaClub->fetchAll();
                    foreach($selectClub as $club)
                    { 
                        $nombreClub= $club["nombre"];
                    }

                    $consultaMunicipio=$this->db->query("SELECT nombre FROM municipio WHERE idMunicipio  = " . $anuncio["idMunicipio"]);
                    $selectMunicipio=$consultaMunicipio->fetchAll();
                    foreach($selectMunicipio as $municipio)
                    { 
                        $nombreMunicipio = $municipio["nombre"];
                    }
                    $anuncio = new Anuncio_model($anuncio["idAnuncio"], $nombreUsuario, $nombreDeporte,$anuncio["precioPorJugador"], $anuncio["descripcion"] , $anuncio["validado"], $anuncio["jugadoresNecesitados"], $anuncio["fecha"], $anuncio["numJugadoresTotales"], $nombrePista, $nombreClub, $nombreMunicipio , $anuncio["precioTotal"]);
    
                }
                return $anuncio;
            }catch(PDOException $e){
                return false;
            }
            
        }

            // Método para actualizar las plazas de un anuncio sumando o restando segun el parametro altaParticipante los jugadores necesitados.
    public function actualizarPlazasAnuncioById($idAnuncio, $altaParticipante){
        if($altaParticipante){
            $sql = "UPDATE anuncio SET jugadoresNecesitados=(jugadoresNecesitados-1) WHERE idAnuncio=:idAnuncio";
        } else {
            $sql = "UPDATE anuncio SET jugadoresNecesitados=(jugadoresNecesitados+1) WHERE idAnuncio=:idAnuncio";
        }
        $pdoSql =$this-> db->prepare($sql);
        $pdoSql->bindParam(":idAnuncio", $idAnuncio);
        try{
            $pdoSql ->execute();
            $respuesta = $pdoSql->fetch();
            return $respuesta;
        }catch(PDOException $e){
            return $respuesta=false;
        }
    }

    // Método para listar los anuncios filtrando por deporte y numero de plazas
    public function listar_anunciosByIdDeporte($idDeporte, $numPlazas){
        //$arrayAnuncio = array();
        if($numPlazas != null){
            $sqlTxt = "SELECT a.* FROM anuncio a WHERE a.fecha >= CURDATE() AND a.fk_idDeporte=".$idDeporte." AND a.jugadoresNecesitados > 0 AND a.jugadoresNecesitados =".$numPlazas." AND a.validado = 1 ORDER BY a.fecha ASC";
        } else {
            $sqlTxt = "SELECT a.* FROM anuncio a WHERE a.fecha >= CURDATE() AND a.fk_idDeporte=".$idDeporte." AND a.jugadoresNecesitados > 0 AND a.validado = 1 ORDER BY a.fecha ASC";
        }
        $consulta=$this->db->query($sqlTxt);
        // Buscamos en la consulta cada id de los anuncios y buscamos su equivalente en las tablas que necesitamos para transformar el id a su nombre de municipio, pista etc..
            try{
                $selectAnuncio=$consulta->fetchAll();
                $arrayValores = array();
                foreach($selectAnuncio as $anuncio)
                {
                    $nombreUsuario="";
                    $nombreDeporte="";
                    $nombrePista="";
                    $nombreClub="";
                    $nombreMunicipio="";
                    $consultaUsuario=$this->db->query("SELECT usuario FROM usuario WHERE idUsuario  = " . $anuncio["fk_idUsuario"]);
                    $selectUsuario=$consultaUsuario->fetchAll();
    
                    foreach($selectUsuario as $usuario)
                    { 
                        $nombreUsuario = $usuario["usuario"];
                    }
    
                    $consultaDeporte=$this->db->query("SELECT nombreDeporte FROM deporte WHERE idDeporte  = " . $anuncio["fk_idDeporte"]);
                    $selectDeporte=$consultaDeporte->fetchAll();
                    foreach($selectDeporte as $deporte)
                    { 
                        $nombreDeporte=$deporte["nombreDeporte"];
                    }
    
                    $consultaPista=$this->db->query("SELECT nombrePista FROM clubdisponedeporte WHERE idClubDeporte  = " . $anuncio["idPista"]);
                    $selectPista=$consultaPista->fetchAll();
                    foreach($selectPista as $pista)
                    { 
                        $nombrePista= $pista["nombrePista"];
                    }
    
                    $consultaClub=$this->db->query("SELECT nombre FROM clubdeportivo WHERE idClubDeportivo  = " . $anuncio["idClub"]);
                    $selectClub=$consultaClub->fetchAll();
                    foreach($selectClub as $club)
                    { 
                        $nombreClub= $club["nombre"];
                    }
    
                    $consultaMunicipio=$this->db->query("SELECT nombre FROM municipio WHERE idMunicipio  = " . $anuncio["idMunicipio"]);
                    $selectMunicipio=$consultaMunicipio->fetchAll();
                    foreach($selectMunicipio as $municipio)
                    { 
                        $nombreMunicipio = $municipio["nombre"];
                    }
                    $anuncio = new Anuncio_model($anuncio["idAnuncio"], $nombreUsuario, $nombreDeporte,$anuncio["precioPorJugador"], $anuncio["descripcion"] , $anuncio["validado"], $anuncio["jugadoresNecesitados"], $anuncio["fecha"], $anuncio["numJugadoresTotales"], $nombrePista, $nombreClub, $nombreMunicipio , $anuncio["precioTotal"]);
    
                    array_push($arrayValores, $anuncio);
                }
                return $arrayValores;
            }catch(PDOException $e){
                return false;
            }      
    }

    // Método para publicar anuncio actualiza el campo validado para el anuncio y asi mostrarlo en la web.
    public function publicarAnuncio(){
        $idAnuncio = $_POST["idAnuncio"];
        $sql = "UPDATE anuncio SET validado=1 WHERE idAnuncio=:idAnuncio";
        $pdoSql =$this->db->prepare($sql);
        $pdoSql->bindParam(":idAnuncio", $idAnuncio);
        try{
            $respuesta=$pdoSql ->execute();
            return $respuesta;
        }catch(PDOException $e){
            return $respuesta=false;
        }
    }

    // Método par borrar un anuncio concreto.
    public function borrarAnuncio($idAnuncio){
        $sql = "DELETE from anuncio where idAnuncio=:idAnuncio";
        $pdoSql =$this-> db->prepare($sql);
    
        $pdoSql->bindParam(":idAnuncio", $idAnuncio);
        try{
            $respuesta=$pdoSql ->execute();
            return $respuesta;
        }catch(PDOException $e){
            return $respuesta=false;
        }
    }

    //Método para insertar anuncio
    public function insertar_anuncio($deporte,$pistas,$clubDeportivo,$municipio,$descripcion,$fecha,$jugadores,$precio,$plazas,$preciojugador,$idUsuario){
        $pistasFiltrado = valorSeguro($pistas);
        $fechaFiltrado = valorSeguro($fecha);
        // Comprobamos que no exista un anuncio en esa fecha para esa pista.
        $sql2= "SELECT * FROM anuncio a WHERE  fecha = :fecha AND idPista = :idPista";
        $pdoSql2 = $this-> db->prepare($sql2);
        $pdoSql2->bindParam(":fecha", $fechaFiltrado);
        $pdoSql2->bindParam(":idPista", $pistasFiltrado);
        $pdoSql2 ->execute();
        $fila= $pdoSql2->fetch();
        // Si existe no se inserta.
        if($fila > 0){
            $respuesta2 = false;
        }else{
            $respuesta2 = true;
        }
        // Si no existe se inserta.
        if($respuesta2){
            $deporteFiltrado = valorSeguro($deporte);
            $pistasFiltrado = valorSeguro($pistas);
            $clubDeportivoFiltrado = valorSeguro($clubDeportivo);
            $municipioFiltrado = valorSeguro($municipio);
            $descripcionFiltrado = valorSeguro($descripcion);
            $fechaFiltrado = valorSeguro($fecha);
            $jugadoresFiltrado = valorSeguro($jugadores);
            $precioFiltrado = valorSeguro($precio);
            $plazasFiltrado = valorSeguro($plazas);
            $preciojugadorFiltrado = valorSeguro($preciojugador);
            $sql= "INSERT INTO `anuncio` (`fk_idUsuario`, `fk_idDeporte`, `idAnuncio`, `precioPorJugador`, `descripcion`, `validado`, `jugadoresNecesitados`, `fecha`, 
            `numJugadoresTotales`, `idPista`, `idClub`, `idMunicipio`, `precioTotal`)
            VALUES (:idUsuario,:idDeporte, NULL,:precioPorJugador,:descripcion,'0',:jugadoresNecesitados,:fecha,:numJugadoresTotales,:idPista,:idClub,:idMunicipio,:precioTotal)";

            $pdoSql =$this->db->prepare($sql);
            
            $pdoSql->bindParam(":idUsuario", $idUsuario);
            $pdoSql->bindParam(":idDeporte", $deporteFiltrado);
            $pdoSql->bindParam(":precioPorJugador", $preciojugadorFiltrado);
            $pdoSql->bindParam(":descripcion", $descripcionFiltrado);
            //$pdoSql->bindParam(":validado", 0);
            $pdoSql->bindParam(":jugadoresNecesitados", $plazasFiltrado);
            $pdoSql->bindParam(":fecha", $fechaFiltrado);
            $pdoSql->bindParam(":numJugadoresTotales", $jugadores);
            $pdoSql->bindParam(":idPista", $pistasFiltrado);
            $pdoSql->bindParam(":idClub", $clubDeportivoFiltrado);
            $pdoSql->bindParam(":idMunicipio", $municipioFiltrado);
            $pdoSql->bindParam(":precioTotal", $precioFiltrado);
    
            try{
                $respuesta=$pdoSql ->execute();
                return $respuesta;
            }catch(PDOException $e){
                //$errorRegistro = "Error al insertar anuncio";
                return $respuesta=false;
            }
        }else{
            return $respuesta=false;
        } 
    }
    /* 
    *   dbCentroDeportivo
    */

    // Método para insertar un centro deportivo
    public function insertar_centroDeportivo(){
        //Obtenemos los distintos valores para los diferentes campos de la tabla.
        $nombre = $_POST["nombreCD"];
        $direccion = $_POST["direccionCD"];
        $telefono = $_POST["telefonoCD"]; 
        $municipio = $_POST["municipioCD"];
        $codigoPostal = $_POST["codigoCD"];
        // Filtramos los campos.
        $nombreFiltrado = valorSeguro($nombre);
        $direccionFiltrado = valorSeguro($direccion);
        $telefonoFiltrado = valorSeguro($telefono);
        $municipioFiltrado = valorSeguro($municipio);
        $codigoPostalFiltrado = valorSeguro($codigoPostal);
        //Comprobamos si existe un club con ese nombre previamiente.
        $sql = "SELECT * from clubdeportivo WHERE UPPER (nombre)=:nombre";
        $pdoSql = $this-> db->prepare($sql);
        $nombreFiltradoMayus = strtoupper($nombreFiltrado);
        $pdoSql->bindParam(":nombre",$nombreFiltradoMayus);
        $pdoSql ->execute();
        $fila= $pdoSql->fetch();
        
        //Comprobamos si existe un municipio con ese nombre previamiente.
        $sql2 = "SELECT idMunicipio from municipio WHERE UPPER (nombre)=:municipio";
        $pdoSql2 = $this-> db->prepare($sql2);
        $municipioFiltradoMayus = strtoupper($municipioFiltrado);
        $pdoSql2->bindParam(":municipio",$municipioFiltradoMayus);
        $pdoSql2 ->execute();
        $fila2= $pdoSql2->fetch();
        // Si existe un centro deportivo con ese nombre no lo insertamos
        if($fila > 0){
            return 2;
        }
        else{
            // Si no existe el centro deportivo comprobamos el municipio, si existe seleccionamos el idMunicipio
            if($fila2 > 0){
                $idMunicipio = $fila2["idMunicipio"];
    
            }else{
                // Si no existe el municipio insertamos el municipio
                $sql3 = "INSERT INTO municipio(nombre,codigoPostal) VALUES (:municipio,:codigoPostal)";
                $pdoSql3 = $this-> db->prepare($sql3);
                $pdoSql3->bindParam(":municipio", $municipioFiltrado);
                $pdoSql3->bindParam(":codigoPostal", $codigoPostalFiltrado);
                $pdoSql3 ->execute();
    
                $sql4 = "SELECT idMunicipio from municipio WHERE UPPER (nombre)=:municipio";
                $pdoSql4 = $this-> db->prepare($sql4);
                $pdoSql4->bindParam(":municipio", $municipioFiltradoMayus);
                $pdoSql4 ->execute();
                $fila4= $pdoSql4->fetch();
                if($fila4 > 0){
                    $idMunicipio = $fila4["idMunicipio"];
                } else {
                    return 1;
                }
            }
            // Insertamos el club
            $sql = "INSERT INTO clubdeportivo(nombre,direccion,telefono,idMunicipio) VALUES (:nombre,:direccion,:telefono,:idMunicipio)";
            $pdoSql =$this-> db->prepare($sql);
            
            $pdoSql->bindParam(":nombre", $nombreFiltrado);
            $pdoSql->bindParam(":direccion", $direccionFiltrado);
            $pdoSql->bindParam(":telefono", $telefonoFiltrado);
            $pdoSql->bindParam(":idMunicipio", $idMunicipio);       
            
            $respuesta=$pdoSql ->execute();
            return 0;
        }
    }

    // Método para listar los clubdeportivos
    public function listarClubDeportivo(){
        $consulta=$this->db->query("SELECT * FROM clubdeportivo");
        try{
            return $consulta->fetchAll();
        }catch(PDOException $e){
            return false;
        }
    }

    //Método para buscar el club al que pertenece la pista.
    public function buscarClubByIdPista($idPista){
        //$consulta=$this->db->query("SELECT * FROM clubdeportivo c WHERE c.idClubDeportivo = 1");
        $consulta=$this->db->query("SELECT * FROM clubdeportivo c WHERE c.idClubDeportivo IN (SELECT cd.idClubDeportivo FROM clubdisponedeporte cd WHERE cd.idClubDeporte = ".$idPista.")");
        try{
            return $consulta->fetchAll();
        }catch(PDOException $e){
            return false;
        }
    }
    /* 
    *   dbComentarios
    */

    // Método para listar los comentarios que tiene un usuario pasandole el parametro idUsuario.
    public function listar_comentariosByIdUsuario($idUsuario){
        $sql = "SELECT u.usuario, c.Comentario FROM usuariocomentausuario c, usuario u WHERE 
        u.idUsuario = c.usuarioComenta and c.usuarioRecibe = :idUsuario";
        $pdoSql =$this->db->prepare($sql);
        $pdoSql->bindParam(":idUsuario", $idUsuario);
        try{
            $pdoSql ->execute();
            $respuesta= $pdoSql->fetchAll();
            return $respuesta;
        }catch(PDOException $e){
            return $respuesta=false;
        }
    }
    
    // Método para insertar un comentario en la tabla usuariocomentausuario pasandole el id del usuario que comenta el id del usuario que recibe el comentario y el comentario en si.
    public function insertarComentario($idUsuarioComenta, $idUsuarioRecibe, $comentario){
        $sql= "INSERT INTO usuariocomentausuario (usuarioComenta, comentario, usuarioRecibe)
        VALUES (:usuarioComenta,:comentario,:usuarioRecibe)";

        $pdoSql =$this->db->prepare($sql);
        
        $pdoSql->bindParam(":usuarioComenta", $idUsuarioComenta);
        $pdoSql->bindParam(":comentario", $comentario);
        $pdoSql->bindParam(":usuarioRecibe", $idUsuarioRecibe);
        try{
            $respuesta=$pdoSql ->execute();
            return $respuesta;
        }catch(PDOException $e){
            return $respuesta=false;
        }
    }

    /* 
    *   dbDeporte
    */

    //Método para listar los deportes
    public function listarDeportes(){
        $consulta=$this->db->query("SELECT *  FROM deporte");
        try{
            return $consulta->fetchAll();
        }catch(PDOException $e){
            return false;
        }
    }
    // Método para listar los deportes pasandole el idDeporte.
    public function listarDeportesById($idDeporte){
        $consulta=$this->db->query("SELECT * FROM deporte WHERE idDeporte = ".$idDeporte);
        try{
            return $consulta->fetchAll();
        }catch(PDOException $e){
            return false;
        }
    }

    /* 
    *   dbMunicipio
    */

    // Buscar el municipio al que pertenece el club deportivo.
    public function buscarMunicipioByIdClubDeportivo($idClubDeportivo){
        $consulta=$this->db->query("SELECT * FROM municipio m WHERE m.idMunicipio IN (SELECT cd.idMunicipio FROM clubdeportivo cd WHERE cd.idClubDeportivo = ".$idClubDeportivo.")");
        try{
            return $consulta->fetchAll();
        }catch(PDOException $e){
            return false;
        }
    }

    /* 
    *   dbPistas
    */

    // Método para borrar una pista en concreto
    public function borrarPista(){
        $idPista = $_POST["idClubDeporte"]; 
        $sql = "delete from clubdisponedeporte where idClubDeporte = :idPista";
        $pdoSql =$this-> db->prepare($sql);
    
        $pdoSql->bindParam(":idPista", $idPista);
        try{
            $respuesta=$pdoSql ->execute();
            return $respuesta;
        }catch(PDOException $e){
            return $respuesta=false;
        }
    }

    // Método para seleccionar una pista pasandole su Id.
    public function selecionarPistaPorId($idPista){
        $sql = "SELECT *  FROM clubdisponedeporte WHERE idClubDeporte = :idPista";
        $pdoSql =$this-> db->prepare($sql);
    
        $pdoSql->bindParam(":idPista", $idPista);
        try{
            $pdoSql ->execute();
            $respuesta = $pdoSql->fetch();
            return $respuesta;
        }catch(PDOException $e){
            return $respuesta=false;
        }
    }

    // Método para modificar los datos de la pista pasandole la pista.
    public function modificarPista($pistaSelecionada){
        $nombrePista = $_POST["nombrePista"];
        $precioPista = $_POST["precioPista"];


        $nombrePistaFiltrado = valorSeguro($nombrePista);
        $precioPistaFiltrado = valorSeguro($precioPista);
        
        $sql = "UPDATE clubdisponedeporte SET precio=:precioPista, nombrePista=:nombreUsuario WHERE idClubDeporte=:idPista";
        $pdoSql =$this->db->prepare($sql);
        $pdoSql->bindParam(":idPista", $pistaSelecionada);
        $pdoSql->bindParam(":precioPista", $precioPistaFiltrado);
        $pdoSql->bindParam(":nombreUsuario", $nombrePistaFiltrado);
        /*$pdoSql->bindParam(":contrasenaUsuario", $passwordEncriptada);
        $pdoSql->bindParam(":emailUsuario", $emailFiltrado);
        $pdoSql->bindParam(":telefono", $telefonoFiltrado);*/
        try{
            $respuesta=$pdoSql ->execute();
            return $respuesta;
        }catch(PDOException $e){
            //$errorRegistro = "Error al registrarse";
            return $respuesta=false;
        }
    }

    // Método para listar las pistas pasandole el idDeporte.
    public function listarPistaByDeporte($idDeporte){
        $consulta=$this->db->query("SELECT * FROM clubdisponedeporte WHERE idDeporte = ".$idDeporte);
        try{
            return $consulta->fetchAll();
        }catch(PDOException $e){
            return false;
        }
    }

    // Método para listar las pistas pasandole el idPista.
    public function listarPistaById($idPista){
        $consulta=$this->db->query("SELECT * FROM clubdisponedeporte WHERE idClubDeporte = ".$idPista);
        try{
            return $consulta->fetchAll();
        }catch(PDOException $e){
            return false;
        }
    }

    // Método para listarPistas de un club en concreto.
    public function listarPistaByIdClub($idClub){
        $consulta=$this->db->query("SELECT * FROM clubdisponedeporte WHERE idClubDeportivo = ".$idClub);
        try{
            return $consulta->fetchAll();
        }catch(PDOException $e){
            return false;
        }
    }

    //Método para insertar una pista.
    public function insertar_Pista($precioPista,$nombrePista,$idClubDeportivo,$idDeporte){

        $precioPistaFiltrado = valorSeguro($precioPista);
        $nombrePistaFiltrado = valorSeguro($nombrePista);
        $nombrePistaFiltradoMayus = strtoupper($nombrePistaFiltrado);

        // Comprobamos que no exista una pista con ese nombre en el club deportivo.
        $sql2 = "SELECT * from clubdisponedeporte WHERE UPPER(nombrePista=:nombrePista) AND idClubDeportivo=:idClub";
        $pdoSql2 = $this-> db->prepare($sql2);
        $pdoSql2->bindParam(":nombrePista", $nombrePistaFiltradoMayus);
        $pdoSql2->bindParam(":idClub", $idClubDeportivo);
        $pdoSql2 ->execute();
        $fila= $pdoSql2->fetch();
        // Si existe mandamos mensaje de error.
        if($fila > 0){
            $_SESSION["errorAltaPista"] = "El nombre de la pista ya esta registrada en este Centro Deportivo";
        // Si no la insertamos.
        }else{
            unset($_SESSION["errorAltaPista"]);
            $sql= "INSERT INTO `clubdisponedeporte` (`precio`, `nombrePista`, `idClubDeportivo`, `idDeporte`)
            VALUES (:precioPista,:nombrePista,:idClubDeportivo,:idDeporte)";

            $pdoSql =$this->db->prepare($sql);
            
            $pdoSql->bindParam(":precioPista", $precioPistaFiltrado);
            $pdoSql->bindParam(":nombrePista", $nombrePistaFiltrado);
            $pdoSql->bindParam(":idClubDeportivo", $idClubDeportivo);
            $pdoSql->bindParam(":idDeporte", $idDeporte);
            try{
                $respuesta=$pdoSql ->execute();
                return $respuesta;
            }catch(PDOException $e){
                return $respuesta=false;
            }
        }   
    }

    /* 
    *   dbReservas
    */

    // Método para insertar los usuarios que participan en el anuncio pasandole el idUsuario que participa y el idAnuncio que es.
    public function insertarUsuarioParticipaAnuncio($idUsuario,$idAnuncio){
        $sql = "SELECT * FROM usuarioparticipaanuncio WHERE fk_idAnuncio = :idAnuncio AND fk_idUsuario = :idUsuario";
        $pdoSql =$this-> db->prepare($sql);
        $pdoSql->bindParam(":idAnuncio", $idAnuncio);
        $pdoSql->bindParam(":idUsuario", $idUsuario);
        $pdoSql ->execute();
        $inserta=$pdoSql->fetch();
    // Si el usuario no está inscrito en el anuncio, hacemos el insert, si no mandamos mensaje de error.
        if($inserta <= 0){
            $sql = "INSERT INTO usuarioparticipaanuncio(fk_idAnuncio,fk_idUsuario) VALUES (:idAnuncio,:idUsuario)";
            $pdoSql =$this-> db->prepare($sql);
            
            $pdoSql->bindParam(":idAnuncio", $idAnuncio);
            $pdoSql->bindParam(":idUsuario", $idUsuario);
            
            try{
                $respuesta=$pdoSql ->execute();
                $_SESSION["usuarioRegistradoAnuncioFalse"] = "El usuario se ha registrado con éxito";
                return $respuesta;
            }catch(PDOException $e){
                return $respuesta=false;
            }
        } else {
            $_SESSION["usuarioRegistradoAnuncioTrue"] = "El usuario ya está registrado en este anuncio";
        }  
    }

    //Método para borrar una reserva pasandole el idAnuncio y el usuario que ha reservado.
    public function borrarReserva($idAnuncio, $idUsuario){
        $sql = "DELETE from usuarioparticipaanuncio where fk_idAnuncio=:idAnuncio and fk_idUsuario=:idUsuario";
        $pdoSql =$this-> db->prepare($sql);
    
        $pdoSql->bindParam(":idAnuncio", $idAnuncio);
        $pdoSql->bindParam(":idUsuario", $idUsuario);
        try{
            $respuesta=$pdoSql ->execute();
            return $respuesta;
        }catch(PDOException $e){
            return $respuesta=false;
        }
    }

    /* 
    *   dbUsuario
    */

    // Método para mostrar los usuarios participantes en un anuncio pasandole el idAnuncio.
    public function listar_usuariosParticipantesByIdAnuncio($idAnuncio){
        $sql = "SELECT idUsuario, usuario FROM usuario WHERE idUsuario IN(SELECT fk_idUsuario FROM usuarioparticipaanuncio WHERE fk_idAnuncio = :idAnuncio)";
        $pdoSql =$this->db->prepare($sql);
        $pdoSql->bindParam(":idAnuncio", $idAnuncio);
        try{
            $pdoSql ->execute();
            $respuesta= $pdoSql->fetchAll();
            return $respuesta;
        }catch(PDOException $e){
            return $respuesta=false;
        }
    }

    //Funcion en la que comprobamos el login si existe o no recogiendo los parametros del formulario devolvemos la consulta o false si no lo encuentra
    public function comprobarLogin(){
        $usuario= $_POST["usuario"];
        $password=$_POST["password"];
        $usuarioFiltrado = valorSeguro($usuario);
        $passwordFiltrado = valorSeguro($password);
        $passwordFiltradoMd5= md5($passwordFiltrado);
        $sql = "SELECT * from usuario WHERE usuario=:usuarios and contrasena=:pwd";
        $pdoSql = $this-> db->prepare($sql);
        $pdoSql->bindParam(":usuarios", $usuarioFiltrado);
        $pdoSql->bindParam(":pwd", $passwordFiltradoMd5);
        
        try{
            $pdoSql ->execute();
            return $pdoSql->fetch();
        }catch(PDOException $e){
            return false;
        }
    }

        // Método para borrar un usuario en concreto.
    public function borrarUsuario(){
        $usuario = $_POST["idUsuario"]; 
        $sql = "delete from usuario where idUsuario = :idUsuario";
        $pdoSql =$this-> db->prepare($sql);
    
        $pdoSql->bindParam(":idUsuario", $usuario);
        try{
            $respuesta=$pdoSql ->execute();
            return $respuesta;
        }catch(PDOException $e){
            return $respuesta= false;
        }
    }

    // Método para seleccionar un usuario pasandole su Id.
    public function selecionarUsuarioPorId($usuario){
        $sql = "SELECT *  FROM usuario WHERE idUsuario = :idUsuario";
        $pdoSql =$this-> db->prepare($sql);
    
        $pdoSql->bindParam(":idUsuario", $usuario);
        try{
            $pdoSql ->execute();
            $respuesta = $pdoSql->fetch();
            return $respuesta;
        }catch(PDOException $e){
            return $respuesta=false;
        }
    }

    // Método para registrar usuarios.
    public function insertar_usuarios(){
        $nombre = $_POST["validationCustomNombre"];
        $apellidos = $_POST["validationCustomApellidos"];
        $usuario = $_POST["validationCustomUsuario"]; 
        $password = $_POST["validationCustomContrasena"];
        $email = $_POST["validationCustomEmail"];
        $telefono = $_POST["validationCustomTelefono"];
        $idTipoUsuario = 2;

        $nombreFiltrado = valorSeguro($nombre);
        $apellidosFiltrado = valorSeguro($apellidos);
        $usuarioFiltrado = valorSeguro($usuario);
        $usuarioFiltradoMayus = strtoupper($usuarioFiltrado);
        $passwordFiltrado = valorSeguro($password);
        $passwordEncriptada = md5($passwordFiltrado);
        $emailFiltrado = valorSeguro($email);
        $telefonoFiltrado = valorSeguro($telefono);
// Comprovamos que el usuario no exista previamente en nuestra base de datos.
        $sql = "SELECT * from usuario WHERE UPPER(usuario)=:usuarios";
        $pdoSql = $this-> db->prepare($sql);
        $pdoSql->bindParam(":usuarios", $usuarioFiltradoMayus);
        $pdoSql ->execute();
        $fila= $pdoSql->fetch();
        // Si existe mandamos mensaje error.
        if($fila > 0){
            $_SESSION["errorRegistro"] = "El usuario ya está registrado";
        }
        //Si no existe lo insertamos.
        else{
            unset($_SESSION["errorRegistro"]);
            $sql = "INSERT INTO usuario(nombre,apellidos,usuario,contrasena,email,telefono,idTipoUsuario) VALUES (:nombre,:apellidos,:usuario,:contrasena,:email,:telefono,:idTipoUsuario)";
            $pdoSql =$this-> db->prepare($sql);
            
            $pdoSql->bindParam(":nombre", $nombreFiltrado);
            $pdoSql->bindParam(":apellidos", $apellidosFiltrado);
            $pdoSql->bindParam(":usuario", $usuarioFiltrado);
            $pdoSql->bindParam(":contrasena", $passwordEncriptada);
            $pdoSql->bindParam(":email", $emailFiltrado);
            $pdoSql->bindParam(":telefono", $telefonoFiltrado);
            $pdoSql->bindParam(":idTipoUsuario", $idTipoUsuario);
            
            try{
                $respuesta=$pdoSql ->execute();
                return $respuesta;
            }catch(PDOException $e){
                return $respuesta=false;
            }
        }
    }

    // Método para modificar los datos del perfil del usuario pasandole el usuario como parametro.
    public function modificarUsuarios($usuarioSelecionado){
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $password = $_POST["pwd"];
        $email = $_POST["email"];
        $telefono = $_POST["telefono"];

        $nombreFiltrado = valorSeguro($nombre);
        $apellidosFiltrado = valorSeguro($apellidos);
        $passwordFiltrado = valorSeguro($password);
        $passwordEncriptada = md5($passwordFiltrado);
        $emailFiltrado = valorSeguro($email);
        $telefonoFiltrado = valorSeguro($telefono);
        
        $sql = "UPDATE usuario SET nombre=:nombreUsuario , apellidos=:apellidosUsuario , contrasena=:contrasenaUsuario, email=:emailUsuario , telefono=:telefono WHERE usuario=:usuarioNombre";
        $pdoSql =$this->db->prepare($sql);
        $pdoSql->bindParam(":usuarioNombre", $usuarioSelecionado);
        $pdoSql->bindParam(":nombreUsuario", $nombreFiltrado);
        $pdoSql->bindParam(":apellidosUsuario", $apellidosFiltrado);
        $pdoSql->bindParam(":contrasenaUsuario", $passwordEncriptada);
        $pdoSql->bindParam(":emailUsuario", $emailFiltrado);
        $pdoSql->bindParam(":telefono", $telefonoFiltrado);
        try{
            $respuesta=$pdoSql ->execute();
            return $respuesta;
        }catch(PDOException $e){
            //$errorRegistro = "Error al registrarse";
            return $respuesta=false;
        }
    }

    // Método para listar los usuarios
    public function listarUsuarios(){
        $consulta=$this->db->query("SELECT * FROM usuario u  WHERE u.idUsuario!=56");
        try{
            return $consulta->fetchAll();
        }catch(PDOException $e){
            return false;
        }
    }

    //Método para modificar el tipo de usuario.
    public function modificarUsuariosTipo(){
        $idTipoUsuario = $_POST["permisos"];
        $usuarioSelecionado = $_SESSION["usuarioSelecionado"];
        if($_SESSION["usuario"]->getUsuario() != $_SESSION["usuarioSelecionado"]){
            $sql = "UPDATE usuario SET idTipoUsuario=:idTipoUsuario WHERE usuario=:usuarioNombre";
            $pdoSql =$this->db->prepare($sql);
            $pdoSql->bindParam(":usuarioNombre", $usuarioSelecionado);
            $pdoSql->bindParam(":idTipoUsuario", $idTipoUsuario);
            try{
                $respuesta=$pdoSql ->execute();
                return $respuesta;
            }catch(PDOException $e){
                return $respuesta=false;
            }
        }else{
            return $respuesta = false;
        }
    }
}
ob_end_flush();
?>