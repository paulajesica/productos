<?php

class maquinas
{
    private $CODIGO;
    private $NOMBREMAQUINA;
    private $PRECIO;
   

    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}

?>
