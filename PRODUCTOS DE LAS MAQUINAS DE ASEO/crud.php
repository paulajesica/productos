<?php

// Pagina Princilap index.html
// Explicar sentencia por Sentencia.

// Registro de productos

// Cedula
// NOMBREMAQUINA
// PRECIO


require_once 'alumno.entidad.php';
require_once 'alumno.model.php';

$alm = new maquinas();
$model = new AlumnoModel();



if(isset($_REQUEST['tipo']))
{

    //switch($_REQUEST['action'])
	switch($_REQUEST['tipo'])
	//switch($tipo)
    {
        case 'actualizar':
            $alm->__SET('id',              $_REQUEST['id']);
            $alm->__SET('NOMBREMAQUINA',          $_REQUEST['NOMBREMAQUINA']);
            $alm->__SET('PRECIO',        $_REQUEST['PRECIO']);
            
			

            $model->Actualizar($alm);
            //header('Location: index.html');
            header('Location: index.html');
            
			break;

        case 'registrar':
            // se añadio
			$alm->__SET('CODIGO',              $_REQUEST['CODIGO']);
			$alm->__SET('NOMBREMAQUINA',          $_REQUEST['NOMBREMAQUINA']);
            $alm->__SET('PRECIO',        $_REQUEST['PRECIO']);
            

            $model->Registrar($alm);
            echo "Guardo el Registro Exitosamente";

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