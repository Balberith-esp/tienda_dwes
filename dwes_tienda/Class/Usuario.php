<?php 

	
	class Usuario {
			
		protected $nombre;
	    protected $apellido;
	    protected $email;
	    protected $telefono;
	    protected $id;
	    protected $pass;
	    protected $pais;
	    protected $provincia;
	    protected $localidad;
	    protected $calle;
	    protected $detalle;
	    protected $cp;
	    protected $tipo;



	public function __construct($nombre, $apellido, $email, $telefono, $id, $pass, $pais, $provincia, $localidad, $calle, $detalle, $cp, $tipo)
	{
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->email = $email;
		$this->telefono = $telefono;
		$this->id = $id;
		$this->pass = $pass;
		$this->pais = $pais;
		$this->provincia = $provincia;
		$this->localidad = $localidad;
		$this->calle = $calle;
		$this->detalle = $detalle;
		$this->cp = $cp;
		$this->tipo = $tipo;
	}
        
    
    public function isActivo(){
        return true;
    }
 

    public function isAdmin(){
        if($this->tipo == 0){
            return true;
        }else{
            return false;
        }
    }
	
    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     *
     * @return self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * @param mixed $apellido
     *
     * @return self
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param mixed $telefono
     *
     * @return self
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

    }

    /**
     * @return mixed
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * @param mixed $pass
     *
     * @return self
     */
    public function setPass($pass)
    {
        $this->pass = $pass;

    }

    /**
     * @return mixed
     */
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * @param mixed $pais
     *
     * @return self
     */
    public function setPais($pais)
    {
        $this->pais = $pais;

    }

    /**
     * @return mixed
     */
    public function getProvincia()
    {
        return $this->provincia;
    }

    /**
     * @param mixed $provincia
     *
     * @return self
     */
    public function setProvincia($provincia)
    {
        $this->provincia = $provincia;

    }

    /**
     * @return mixed
     */
    public function getLocalidad()
    {
        return $this->localidad;
    }

    /**
     * @param mixed $localidad
     *
     * @return self
     */
    public function setLocalidad($localidad)
    {
        $this->localidad = $localidad;

    }

    /**
     * @return mixed
     */
    public function getCalle()
    {
        return $this->calle;
    }

    /**
     * @param mixed $calle
     *
     * @return self
     */
    public function setCalle($calle)
    {
        $this->calle = $calle;

    }

    /**
     * @return mixed
     */
    public function getDetalle()
    {
        return $this->detalle;
    }

    /**
     * @param mixed $detalle
     *
     * @return self
     */
    public function setDetalle($detalle)
    {
        $this->detalle = $detalle;

    }

    /**
     * @return mixed
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * @param mixed $cp
     *
     * @return self
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     *
     * @return self
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

    }
}


	


 ?>