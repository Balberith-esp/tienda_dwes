<?php

class Autores {

    protected $edad;
    protected $fotografia;
    protected $nacionalidad;
    protected $genero;
    protected $id;
    protected $nombre;
    protected $sexo;



    // Construct

    public function __construct($edad,$fotografia, $nacionalidad , $genero, $nombre , $sexo){

        $this->edad = $edad;
        $this->fotografia = $fotografia;
        $this->nacionalidad = $nacionalidad;
        $this->genero = $genero;
        $this->nombre = $nombre;
        $this->sexo = $sexo;

    }
    
    // Getters and Setters
    public function getedad() {
		return $this->edad;
	}

    public function setedad($edad) {
		$this->edad = $edad;
    }
    public function getfotografia() {
		return $this->fotografia;
	}

    public function setfotografia($fotografia) {
		$this->fotografia = $fotografia;
    }
    public function getnacionalidad() {
		return $this->nacionalidad;
	}

    public function setnacionalidad($nacionalidad) {
		$this->nacionalidad = $nacionalidad;
    }
    public function getGenero() {
		return $this->genero;
	}

    public function setGenero($genero) {
		$this->genero = $genero;
    }
    public function getId() {
		return $this->id;
	}

    public function setId($id) {
		$this->id = $id;
    }
    public function getnombre() {
		return $this->nombre;
	}

    public function setnombre($nombre) {
		$this->nombre = $nombre;
    }
    public function getsexo() {
		return $this->sexo;
	}

    public function setsexo($sexo) {
		$this->sexo = $sexo;
    }
    

}


?>