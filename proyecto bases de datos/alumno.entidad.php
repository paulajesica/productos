<?php

class cliente
{
    private $id;
    private $Nombre;
    private $Apellido;
    private $Sexo;
    private $FechaNacimiento;
	private $Telefono;
	private $Direccion;
	private $Correo;

    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}

?>
