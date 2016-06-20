
<?php


require_once 'alumno.entidad.php';
require_once 'alumno.model.php';

$alm = new facturas();
$model = new AlumnoModel();



if(isset($_REQUEST['tipo']))
{

    //switch($_REQUEST['action'])
	switch($_REQUEST['tipo'])
	//switch($tipo)
    {
        case 'actualizar':
            $alm->__SET('CODIGO',                         $_REQUEST['CODIGO']);
            $alm->__SET('NOMBRECLIENTE',              $_REQUEST['NOMBRECLIENTE']);
            $alm->__SET('TELEFONO',                   $_REQUEST['TELEFONO']);
            $alm->__SET('DIRECCION',                  $_REQUEST['DIRECCION']);
            $alm->__SET('MAQUINAACOMPRAR',           $_REQUEST['MAQUINAACOMPRAR']);
            $alm->__SET('FORMADEPAGO',              $_REQUEST['FORMADEPAGO']);
			$alm->__SET('DIADELAENTREGA',             $_REQUEST['DIADELAENTREGA']);
			$alm->__SET('NOMBREVENDEDOR',             $_REQUEST['NOMBREVENDEDOR']);


            $model->Actualizar($alm);
            //header('Location: index.html');
            header('Location: index.html');
            
			break;

        case 'registrar':
            // se añadio
			$alm->__SET('CODIGO',                         $_REQUEST['CODIGO']);
			$alm->__SET('NOMBRECLIENTE',              $_REQUEST['NOMBRECLIENTE']);
            $alm->__SET('TELEFONO',                   $_REQUEST['TELEFONO']);
            $alm->__SET('DIRECCION',                  $_REQUEST['DIRECCION']);
            $alm->__SET('MAQUINAACOMPRAR',           $_REQUEST['MAQUINAACOMPRAR']);
            $alm->__SET('FORMADEPAGO',              $_REQUEST['FORMADEPAGO']);
			$alm->__SET('DIADELAENTREGA',             $_REQUEST['DIADELAENTREGA']);
			$alm->__SET('NOMBREVENDEDOR',             $_REQUEST['NOMBREVENDEDOR']);


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