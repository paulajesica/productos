<?php

class facturas
{
    private $CODIGO;
    private $NOMBRECLIENTE;
    private $TELEFONO;
    private $DIRECCION;
    private $MAQUINAACOMPRAR;
    private $FORMADEPAGO;
	private $DIADELAENTREGA;
	private $NOMBREVENDEDOR;

    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}

?>
