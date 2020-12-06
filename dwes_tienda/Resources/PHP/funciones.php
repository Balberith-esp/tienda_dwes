<?php 


	require_once '../Conf/conexionDB.php';


	function registroUsuario($nombre,$apellidos,$email,$telefono,$contrasena,$pais,$provincia,$localidad,$calle,$detalle,$cp,$tipo){
		if(comprobarUsuarioExiste($email)){
			$conexion=getConexionPDO();
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

		function nuevoDisco($titulo, $autor, $genero, $precio, $caratula){
			$conexion=getConexionPDO();

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
	function consultaDiscos(){
		$bd = getConexionPDO();
		$consulta = 'select * from discos';
		$result = $bd->prepare($consulta);
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

	function comprobarUsuarioExiste($email){
		$conexion = getConexionMYSQLI();
		$resultado=$conexion->query("SELECT EXISTS (SELECT email FROM usuarios WHERE email='$email');");
		$row=mysqli_fetch_row($resultado);

		if ($row[0]=="1") {                 
			return false;
		}else{
			return true;
		}   
	}
	function devuelveArticulo($id){
		$conexion=getConexionPDO();

		$consulta=$conexion->prepare("SELECT * FROM discos WHERE id=:id");
		
		$consulta->bindParam(':id',$id);

		$consulta->execute();

		if($disco = $consulta->fetch()){
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



 ?>