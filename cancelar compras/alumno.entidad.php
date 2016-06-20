<?php

class cancelar
  {
  private $CODIGO;
  private $NOMBREMAQUINA;
  private $NOMBRECLIENTE;
  private $FECHACANCELAR;
  private $DIRECCION;

  public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
  }
?>
