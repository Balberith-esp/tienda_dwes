<?php
    require_once '../Conf/conexionDB.php';
    
//MySQLi:

function usuarioCorrectoMSQLI($usuario, $contraseña){
	
	$conexion=getConexionMySQLi();

	$consulta=$conexion->stmt_init();



	$consulta->prepare('select count(*) as num from usuarios where email=? and pass=?');
	//echo $consulta;
	$contrasenia =  md5($contraseña);
	$consulta->bind_param('ss', $usuario,$contrasenia);

	$consulta->execute();

	$consulta->bind_result($num);
	$consulta->fetch();

	$consulta->close();
	$conexion->close();


	return ($num==1); //Devuelve un booleano, si es = a 1 es true y sino false

}



//PDO:
function usuarioCorrectoPDO($usuario, $contrasenia){

	$conexion=getConexionPDO();


	$consulta=$conexion->prepare('select count(*) as num from usuarios where email=? and pass=?');

	$usu=$usuario;
	$psw=md5($contrasenia);

	
	$consulta->bindParam(1, $usu);
	$consulta->bindParam(2, $psw);

	//$consulta->execute();

	if($consulta->execute()){
	while ($fila=$consulta->fetch()){
			$dev=$fila['num'];
		}
	}



	unset($consulta);
	unset($conexion);


	if($dev==1){
		return true;
	} else {
		return false;
	}

}

function datosUsuario($usuario){

	$conexion=getConexionPDO();


	$consulta=$conexion->prepare('select * from usuarios where email=?');

	$usu=$usuario;
	
	$consulta->bindParam(1, $usu);

	if($consulta->execute()){
	while ($fila=$consulta->fetch()){
			$dev=$fila;
		}
	}



	unset($consulta);
	unset($conexion);

	if(isset($dev)){	
		return $dev;
	}

}
    
?>