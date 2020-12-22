<?php 

    require_once 'BaseDatos.php';
    require_once 'Disco.php';

class Cesta {

    protected $carrito=array(); 

    public function nuevoArticulo($disco){
         $this->carrito[]=$disco;
    }
    public function getArticulos(){
        return $this->carrito;
    }

    public function getArticulo($n){
        return $this->carrito[$n];
    }

    public function getCoste(){
        // return 'suma de los costes de los items del carrito';
        $costeTotal=0;
        foreach ($this->carrito as $producto) {
           $costeTotal+=$producto->getPrecio();
        }
        return $costeTotal;
    }

    public function getEstaVacia(){
        // return true;
        // or return false;
        if (isset($carrito)) {
            return true;
        }
        else{
            return false;
        }
    }

    public function guardaCesta(){
         $_SESSION["cesta"]=$this;
    }

    public function cargaCesta(){
      if (!isset($_SESSION['cesta'])) {
          return new Cesta();
      }
      else{
        return $_SESSION["cesta"];
      }
        
    }

    public function mostrarCesta(){
        $cadena="";
        foreach ($this->carrito as $disco) {
            $cadena+=$disco->getTitulo()."</br>";
        }
            
            echo "<script>
                let ventana;
                ventana=window.open('','_blank','
                width=500 height=500');
                ventana.moveBy(250,250);
                ventana.document.write(".$cadena."

            </script>";   
        }

        public function vaciar(){
            $this->carrito=[];
        }
  
}



?>