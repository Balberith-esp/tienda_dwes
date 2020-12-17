<?php 

require_once 'Disco.php';

// require_once 'Usuario.php';

class BaseDatos {

    private static $instance = null;
    private $conn;
    
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $name = 'dwes_tienda';


    // Configuracion para generar una sola instacian siempre
    // que se llama a un metodo 
    // No tocar --No tocar --No tocar --No tocar --No tocar --No tocar  
    private function __construct()
    {
      $this->conn = new PDO("mysql:host={$this->host};
      dbname={$this->name}", $this->user,$this->pass,
      array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    }
    
    public static function getInstance()
    {
      if(!self::$instance)
      {
        self::$instance = new BaseDatos();
      }
     
      return self::$instance;
    }
    
    public function getConnection()
    {
      return $this->conn;
    }
    // Fin de --No tocar --No tocar --No tocar --No tocar --No tocar --No tocar --No tocar --No tocar --No tocar --
    //Comienzo metodos para interactuar con la base de datos

        //Metodo registraUsuario 
    public function registroUsuario($nombre,$apellidos,$email,$telefono,$contrasena,$pais,$provincia,$localidad,$calle,$detalle,$cp,$tipo){
        if(comprobarUsuarioExiste($email)){
            $instance = BaseDatos::getInstance();
            $conexion = $instance->getConnection();
			
			$consulta=$conexion->prepare('INSERT INTO usuarios (nombre, apellido, email, telefono, pass, pais, provincia, localidad, calle, detalle, cp, tipo)
				VALUES 
				(:nombre,:apellidos,:email,:telefono,:contrasena,:pais,:provincia,:localidad,:calle,:detalle,:cp, :tipo)');
			$contrasena =md5($contrasena);
			$consulta->bindParam(':nombre',$nombre);
			$consulta->bindParam(':apellidos',$apellidos);
			$consulta->bindParam(':email',$email);
			$consulta->bindParam(':telefono',$telefono);
			$consulta->bindParam(':contrasena',$contrasena);
			$consulta->bindParam(':pais',$pais);
			$consulta->bindParam(':provincia',$provincia);
			$consulta->bindParam(':localidad',$localidad);
			$consulta->bindParam(':calle',$calle);
			$consulta->bindParam(':detalle',$detalle);
			$consulta->bindParam(':cp',$cp);
			$consulta->bindParam(':tipo',$tipo);

			$consulta->execute();
			unset($conexion);
			return true;
		}else{
			return false;
		}
    }

    // Metodo crea nuevo Disco
    public function nuevoDisco($titulo, $autor, $genero, $precio, $caratula){
        
        $instance = BaseDatos::getInstance();
        $conexion = $instance->getConnection();

        $consulta=$conexion->prepare('INSERT INTO discos (titulo, autor, genero, precio,caratula)
             VALUES 
            (:titulo,:autor,:genero,:precio,:caratula)');
        
        $consulta->bindParam(':titulo',$titulo);
        $consulta->bindParam(':autor',$autor);
        $consulta->bindParam(':genero',$genero);
        $consulta->bindParam(':precio',$precio);
        $consulta->bindParam(':caratula',$caratula);

        $consulta->execute();
        
        unset($conexion);
                
    }
    // Consulta todos los discos para pintarlos en inicio
    public function consultaDiscos(){
		$instance = BaseDatos::getInstance();
        $conexion = $instance->getConnection();
		$consulta = 'select * from discos';
		$result = $conexion->prepare($consulta);
		$result->execute();

		$disco = $result->fetch();
		$discos = [];
		while ($disco != null) {

		    array_push($discos, $disco);

		    $disco = $result->fetch();
		    
		}
		unset($db);
		return $discos;
    }
    // Devuelve un disco que buscamos por el id
    public function devuelveArticulo($id){
		$instance = BaseDatos::getInstance();
        $conexion = $instance->getConnection();

		$consulta=$conexion->prepare("SELECT * FROM discos WHERE id=:id");
		
		$consulta->bindParam(':id',$id);

		$consulta->execute();

		if($disco = $consulta->fetch()){

            $disco = new Disco($disco['id'],);
			return [
					   'id'=>$disco['id'],
					   'titulo'=>$disco['titulo'],
					   'autor'=>$disco['autor'],
					   'genero'=>$disco['genero'],
					   'precio'=>$disco['precio'],
					   'caratula'=>$disco['caratula'],	   
					   'cantidad'=>1,	   
					 
				   ];	
		}	
    }

    // function comprobarUsuarioExiste($email){
    //     $instance = BaseDatos::getInstance();
    //     $conexion = $instance->getConnection();

	// 	$resultado=$conexion->query("SELECT EXISTS (SELECT email FROM usuarios WHERE email='$email');");
	// 	$row=mysqli_fetch_row($resultado);

	// 	if ($row[0]=="1") {                 
	// 		return false;
	// 	}else{
	// 		return true;
	// 	}   
	// }



}

?>