<?php 


define("HOST", 'localhost');
define("USERNAME", 'root');
define("PASSWORD", '');
define("DATABASE", 'dwes_tienda');


function getConexionMYSQLI(){
	
	
	$dwes = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);

	return $dwes;

}

function getConexionPDO(){

	$dwes = new PDO('mysql:host='.HOST.';dbname='.DATABASE.'', USERNAME, PASSWORD);
	return $dwes;
}

 ?>