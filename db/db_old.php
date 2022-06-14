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
    public function listar_anuncios($validado, $isPrincipal){
    $sqlTxt = "SELECT a.* FROM anuncio a WHERE a.fecha >= CURDATE() AND a.validado=".$validado." AND a.jugadoresNecesitados > 0 ORDER BY a.fecha ASC";
        if($isPrincipal){
            $sqlTxt = $sqlTxt." LIMIT 8";
        }
        $consulta=$this->db->query($sqlTxt);
        try{
            $selectAnuncio=$consulta->fetchAll();
            $arrayCampos=["nombreUsuario","nombreDeporte","idAnuncio","precioPorJugador","descripcion","validado","jugadoresNecesitados","numJugadoresTotales",
                "nombrePista","nombreClub","nombreMunicipio","precioTotal"];
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

    public function listar_MisReservas($idUsuario){
        //$arrayAnuncio = array();
        $sqlTxt = "SELECT a.* FROM anuncio a WHERE a.fecha >= CURDATE() AND a.idAnuncio IN (SELECT p.fk_idAnuncio FROM usuarioparticipaanuncio p WHERE p.fk_idUsuario = ".$idUsuario.") ORDER BY a.fecha ASC";
            $consulta=$this->db->query($sqlTxt);
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

    public function listar_anunciosByIdDeporte($idDeporte, $numPlazas){
        //$arrayAnuncio = array();
        if($numPlazas != null){
            $sqlTxt = "SELECT a.* FROM anuncio a WHERE a.fecha >= CURDATE() AND a.fk_idDeporte=".$idDeporte." AND a.jugadoresNecesitados > 0 AND a.jugadoresNecesitados =".$numPlazas." AND a.validado = 1 ORDER BY a.fecha ASC";
        } else {
            $sqlTxt = "SELECT a.* FROM anuncio a WHERE a.fecha >= CURDATE() AND a.fk_idDeporte=".$idDeporte." AND a.jugadoresNecesitados > 0 AND a.validado = 1 ORDER BY a.fecha ASC";
        }

        $consulta=$this->db->query($sqlTxt);

        
            
            try{
                $selectAnuncio=$consulta->fetchAll();
                $arrayCampos=["nombreUsuario","nombreDeporte","idAnuncio","precioPorJugador","descripcion","validado","jugadoresNecesitados","numJugadoresTotales",
                    "nombrePista","nombreClub","nombreMunicipio","precioTotal"];
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
public function insertarUsuarioParticipaAnuncio($idUsuario,$idAnuncio){


    $sql = "SELECT * FROM usuarioparticipaanuncio WHERE fk_idAnuncio = :idAnuncio AND fk_idUsuario = :idUsuario";
    $pdoSql =$this-> db->prepare($sql);
    $pdoSql->bindParam(":idAnuncio", $idAnuncio);
    $pdoSql->bindParam(":idUsuario", $idUsuario);
    $pdoSql ->execute();
    $inserta=$pdoSql->fetch();

    if($inserta <= 0){
//mensage de insertado usuario correctamente
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

    public function insertar_centroDeportivo(){
        $nombre = $_POST["nombreCD"];
        $direccion = $_POST["direccionCD"];
        $telefono = $_POST["telefonoCD"]; 
        $municipio = $_POST["municipioCD"];
        $codigoPostal = $_POST["codigoCD"];

        $nombreFiltrado = valorSeguro($nombre);
        $direccionFiltrado = valorSeguro($direccion);
        $telefonoFiltrado = valorSeguro($telefono);
        $municipioFiltrado = valorSeguro($municipio);
        $codigoPostalFiltrado = valorSeguro($codigoPostal);

        $sql = "SELECT * from clubdeportivo WHERE UPPER (nombre)=:nombre";
        $pdoSql = $this-> db->prepare($sql);
        $nombreFiltradoMayus = strtoupper($nombreFiltrado);
        $pdoSql->bindParam(":nombre",$nombreFiltradoMayus);
        $pdoSql ->execute();
        $fila= $pdoSql->fetch();
        
        
        $sql2 = "SELECT idMunicipio from municipio WHERE UPPER (nombre)=:municipio";
        $pdoSql2 = $this-> db->prepare($sql2);
        $municipioFiltradoMayus = strtoupper($municipioFiltrado);
        $pdoSql2->bindParam(":municipio",$municipioFiltradoMayus);
        $pdoSql2 ->execute();
        $fila2= $pdoSql2->fetch();
        
        if($fila > 0){
            return 2;
        }
        else{
            if($fila2 > 0){
                $idMunicipio = $fila2["idMunicipio"];
    
            }else{
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

        $sql = "SELECT * from usuario WHERE UPPER(usuario)=:usuarios";
        $pdoSql = $this-> db->prepare($sql);
        $pdoSql->bindParam(":usuarios", $usuarioFiltradoMayus);
        $pdoSql ->execute();
        $fila= $pdoSql->fetch();
        if($fila > 0){
            $_SESSION["errorRegistro"] = "El usuario ya está registrado";
        }
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

    public function modificarUsuariosTipo(){
        
        $idTipoUsuario = $_POST["permisos"];
        $usuarioSelecionado = $_SESSION["usuarioSelecionado"];

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
    }

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

    
    //Funcion para optener un producto en concreto mediante su codigo devolvemos la consulta en caso que lo encuentre o false si no.

    public function listarClubDeportivo(){
        $consulta=$this->db->query("SELECT * FROM clubdeportivo");
        try{
            return $consulta->fetchAll();
        }catch(PDOException $e){
            return false;
        }
    }
    public function listarUsuarios(){
        $consulta=$this->db->query("SELECT * FROM usuario u  WHERE u.idUsuario!=56");
        try{
            return $consulta->fetchAll();
        }catch(PDOException $e){
            return false;
        }
    }

        //Funcion para optener un producto en concreto mediante su codigo devolvemos la consulta en caso que lo encuentre o false si no.
        public function listarDeportes(){
            $consulta=$this->db->query("SELECT *  FROM deporte");
            try{
                return $consulta->fetchAll();
            }catch(PDOException $e){
                return false;
            }
        }
        public function listarDeportesById($idDeporte){
            $consulta=$this->db->query("SELECT * FROM deporte WHERE idDeporte = ".$idDeporte);
            try{
                return $consulta->fetchAll();
            }catch(PDOException $e){
                return false;
            }
        }

        //Funcion para optener un producto en concreto mediante su codigo devolvemos la consulta en caso que lo encuentre o false si no.
        public function listarPistaByDeporte($idDeporte){
            $consulta=$this->db->query("SELECT * FROM clubdisponedeporte WHERE idDeporte = ".$idDeporte);
            try{
                return $consulta->fetchAll();
            }catch(PDOException $e){
                return false;
            }
        }

        public function listarPistaById($idPista){
            $consulta=$this->db->query("SELECT * FROM clubdisponedeporte WHERE idClubDeporte = ".$idPista);
            try{
                return $consulta->fetchAll();
            }catch(PDOException $e){
                return false;
            }
        }

        public function listarPistaByIdClub($idClub){
            $consulta=$this->db->query("SELECT * FROM clubdisponedeporte WHERE idClubDeportivo = ".$idClub);
            try{
                return $consulta->fetchAll();
            }catch(PDOException $e){
                return false;
            }
        }

        //listarPistasProvisional
        public function buscarClubByIdPista($idPista){
            //$consulta=$this->db->query("SELECT * FROM clubdeportivo c WHERE c.idClubDeportivo = 1");
            $consulta=$this->db->query("SELECT * FROM clubdeportivo c WHERE c.idClubDeportivo IN (SELECT cd.idClubDeportivo FROM clubdisponedeporte cd WHERE cd.idClubDeporte = ".$idPista.")");
            try{
                return $consulta->fetchAll();
            }catch(PDOException $e){
                return false;
            }
        }
        public function buscarMunicipioByIdClubDeportivo($idClubDeportivo){
            $consulta=$this->db->query("SELECT * FROM municipio m WHERE m.idMunicipio IN (SELECT cd.idMunicipio FROM clubdeportivo cd WHERE cd.idClubDeportivo = ".$idClubDeportivo.")");
            try{
                return $consulta->fetchAll();
            }catch(PDOException $e){
                return false;
            }
        }


        public function insertar_anuncio($deporte,$pistas,$clubDeportivo,$municipio,$descripcion,$fecha,$jugadores,$precio,$plazas,$preciojugador,$idUsuario){

            $pistasFiltrado = valorSeguro($pistas);
            $fechaFiltrado = valorSeguro($fecha);
            $sql2= "SELECT * FROM anuncio a WHERE  fecha = :fecha AND idPista = :idPista";
            $pdoSql2 = $this-> db->prepare($sql2);
            $pdoSql2->bindParam(":fecha", $fechaFiltrado);
            $pdoSql2->bindParam(":idPista", $pistasFiltrado);
            $pdoSql2 ->execute();
            $fila= $pdoSql2->fetch();
            //echo $sql2;
            //echo "<br> fila -> ". var_dump($fila);
            if($fila > 0){
                $respuesta2 = false;
            }else{
                $respuesta2 = true;
            }  

            //echo "<br> respuesta -> ".$respuesta2;
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

        public function insertar_Pista($precioPista,$nombrePista,$idClubDeportivo,$idDeporte){

            $precioPistaFiltrado = valorSeguro($precioPista);
            $nombrePistaFiltrado = valorSeguro($nombrePista);
            $nombrePistaFiltradoMayus = strtoupper($nombrePistaFiltrado);


            $sql2 = "SELECT * from clubdisponedeporte WHERE UPPER(nombrePista=:nombrePista) AND idClubDeportivo=:idClub";
            $pdoSql2 = $this-> db->prepare($sql2);
            $pdoSql2->bindParam(":nombrePista", $nombrePistaFiltradoMayus);
            $pdoSql2->bindParam(":idClub", $idClubDeportivo);
            $pdoSql2 ->execute();
            $fila= $pdoSql2->fetch();
            if($fila > 0){
                $_SESSION["errorAltaPista"] = "El nombre de la pista ya esta registrada en este Centro Deportivo";
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
}
ob_end_flush();
?>