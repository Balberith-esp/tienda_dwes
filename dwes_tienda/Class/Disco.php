<?php

class Disco {

    protected $autor;
    protected $caratula;
    protected $detalle;
    protected $genero;
    protected $id;
    protected $precio;
    protected $titulo;
    protected $cantidad;



    // Construct

    public function __construct($id,$autor,$caratula, $detalle , $genero, $precio , $titulo, $cantidad){
        $this->id = $id;
        $this->autor = $autor;
        $this->caratula = $caratula;
        $this->detalle = $detalle;
        $this->genero = $genero;
        $this->precio = $precio;
        $this->titulo = $titulo;
        $this->cantidad = $cantidad;

    }
    
    // Getters and Setters
    public function getAutor() {
		return $this->autor;
	}

    public function setAutor($autor) {
		$this->autor = $autor;
    }
    public function getCaratula() {
		return $this->caratula;
	}

    public function setCaratula($caratula) {
		$this->caratula = $caratula;
    }
    public function getDetalle() {
		return $this->detalle;
	}

    public function setDetalle($detalle) {
		$this->detalle = $detalle;
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
    public function getPrecio() {
		return $this->precio;
	}

    public function setPrecio($precio) {
		$this->precio = $precio;
    }
    public function getTitulo() {
		return $this->titulo;
	}

    public function setTitulo($titulo) {
		$this->titulo = $titulo;
    }
    

}


?>