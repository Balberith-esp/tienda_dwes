<?php 

require_once 'Disco.php';
require_once 'Usuario.php';

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

    // Comprueba que el email no este en uso
    public function comprobarUsuarioExiste($email){
        
        $conexion = $this->getConnection();

        $st = $conexion->prepare("SELECT * FROM usuarios WHERE  email=:email"); 
       
        $st->bindParam("email", $email,PDO::PARAM_STR);
        $st->execute();
        $count=$st->rowCount();
        
        
        if($count < 1){
            return true;
        }else{
            return false;
        }
	}

    //Metodo registraUsuario, depende de la function anterior
    public function registroUsuario($nombre,$apellidos,$email,$telefono,$contrasena,$pais,$provincia,$localidad,$calle,$detalle,$cp,$tipo){
        if($this->comprobarUsuarioExiste($email)){
            $conexion = $this->getConnection();
			
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
			return true;
		}else{
			return false;
		}
    }

    // Metodo crea nuevo Disco
    public function nuevoDisco($titulo, $autor, $genero, $precio, $caratula,$detalle){
        
        $conexion = $this->getConnection();

        $consulta=$conexion->prepare('INSERT INTO discos (titulo, autor, genero, precio,caratula, detalle)
             VALUES 
            (:titulo,:autor,:genero,:precio,:caratula,:detalle)');
        
        $consulta->bindParam(':titulo',$titulo);
        $consulta->bindParam(':autor',$autor);
        $consulta->bindParam(':genero',$genero);
        $consulta->bindParam(':caratula',$caratula);
        $consulta->bindParam(':precio',$precio);
        $consulta->bindParam(':detalle',$detalle);

        if($consulta->execute()){
            return true;
        }else{
            return false;
        }
                
    }
    // Consulta todos los discos para pintarlos en inicio
    public function consultaDiscos(){
		
        $conexion = $this->getConnection();
		$consulta = 'select * from discos';
		$result = $conexion->prepare($consulta);
		$result->execute();

		$disco = $result->fetch();
		$discos = [];
		while ($disco != null) {
            $nuevoDisco = new Disco($disco['id'],$disco['autor'],$disco['caratula'],
                                    $disco['genero'],$disco['precio'],$disco['titulo'],$disco['detalle']);
		    array_push($discos, $nuevoDisco);

		    $disco = $result->fetch();
		    
		}
		
		return $discos;
    }
    // Devuelve un disco que buscamos por el id
    public function devuelveArticulo($id){
		
        $conexion = $this->getConnection();

		$consulta=$conexion->prepare("SELECT * FROM discos WHERE id=:id");
		
		$consulta->bindParam(':id',$id);

		$consulta->execute();

		if($disco = $consulta->fetch()){

            $discoBuscado = new Disco($disco['id'],$disco['autor'],$disco['caratula'],
            $disco['genero'],$disco['precio'],$disco['titulo'],$disco['detalle']);
			return $discoBuscado;	
		}	
    }

    // Comprueba el usuario y la contraseña en el login
    public function usuarioCorrectoPDO($usuario, $contrasenia){

        $conexion = $this->getConnection();


        $consulta=$conexion->prepare('select count(*) as num from usuarios where email=? and pass=?');

        $usu=$usuario;
        $psw=md5($contrasenia);

        
        $consulta->bindParam(1, $usu);
        $consulta->bindParam(2, $psw);

        if($consulta->execute()){
        while ($fila=$consulta->fetch()){
                $dev=$fila['num'];
            }
        }

        if($dev==1){
            return true;
        } else {
            return false;
        }

    }

    //Comprueba los datos del usuario por el email
    public function datosUsuario($usuario){

        $conexion = $this->getConnection();


        $consulta=$conexion->prepare('select * from usuarios where email=?');

        $usu=$usuario;
        
        $consulta->bindParam(1, $usu);

        if($consulta->execute()){
            while ($fila=$consulta->fetch()){   
                $dev=$fila;
                $nuevoUsuario = new Usuario($dev['nombre'], $dev['apellido'], $dev['email'], 
                                            $dev['telefono'], $dev['id'], $dev['pass'], $dev['pais'], $dev['provincia'],
                                            $dev['localidad'], $dev['calle'], $dev['detalle'], $dev['cp'],$dev['tipo']); 
                };
        }
        if(isset($dev)){	
            return $nuevoUsuario;
        }

    }

}

?>