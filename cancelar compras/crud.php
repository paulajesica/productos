<?php

// Pagina Princilap index.html
// Explicar sentencia por Sentencia.

// Registro de Usuarios

// CODIGO
// NOMBREMAQUINAMAQUINA
// NOMBREMAQUINACLIENTE
// FECHACANCELAR
// DIRECCION
// TELEFONO


require_once 'alumno.entidad.php';
require_once 'alumno.model.php';

$alm = new cancelar();
$model = new AlumnoModel();



if(isset($_REQUEST['tipo']))
{

    //switch($_REQUEST['action'])
	switch($_REQUEST['tipo'])
	//switch($tipo)
    {
        case 'actualizar':
            $alm->__SET('CODIGO',              $_REQUEST['CODIGO']);
            $alm->__SET('NOMBREMAQUINAMAQUINA',          $_REQUEST['NOMBREMAQUINA']);
            $alm->__SET('NOMBRECLIENTE',        $_REQUEST['NOMBRECLIENTE']);
            $alm->__SET('FECHACANCELAR',            $_REQUEST['FECHACANCELAR']);
            $alm->__SET('DIRECCION', $_REQUEST['DIRECCION']);
			$alm->__SET('TELEFONO',        $_REQUEST['TELEFONO']);
			

            $model->Actualizar($alm);
            //header('Location: index.html');
            header('Location: index.html');
            
			break;

        case 'registrar':
            // se añadio
			$alm->__SET('CODIGO',              $_REQUEST['CODIGO']);
			$alm->__SET('NOMBREMAQUINA',          $_REQUEST['NOMBREMAQUINA']);
            $alm->__SET('NOMBRECLIENTE',        $_REQUEST['NOMBRECLIENTE']);
            $alm->__SET('FECHACANCELAR',            $_REQUEST['FECHACANCELAR']);
            $alm->__SET('DIRECCION', $_REQUEST['DIRECCION']);
			$alm->__SET('TELEFONO',        $_REQUEST['TELEFONO']);
			
            $model->Registrar($alm);
            echo "Guardo el Registro Exitosamente";
			
	       //<a href="../maquinas.php" <form name="form1" method="post" action="">
			//header('Location: index.html');
            //header('Location: index.php');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['CODIGO']);
			echo "Elimino el Registro Exitosamente";

           // header('Location: index.php');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['CODIGO']);
            break;
    }
}

?>
