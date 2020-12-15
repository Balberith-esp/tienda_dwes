<?php 

class cesta {

    protected [] $carrito; 


    public function nuevoArticulo($codigo){

    }
    public function getArticulos(){
        return $this->carrito;
    }
    public function getCoste(){
        // return 'suma de los costes de los items del carrito';
    }

    public function getEstaVacia(){
        // return true;
        // or return false;
    }

}



?>