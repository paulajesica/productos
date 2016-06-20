<?php

// Pagina Princilap index.html
// Explicar sentencia por Sentencia.

// Registro de Usuarios

// Cedula
// Nombre
// Apellido
// FechaNAcimiento
// Telefono
// Direccion
// Correo

require_once 'alumno.entidad.php';
require_once 'alumno.model.php';

$alm = new cliente();
$model = new AlumnoModel();



if(isset($_REQUEST['tipo']))
{

    //switch($_REQUEST['action'])
	switch($_REQUEST['tipo'])
	//switch($tipo)
    {
        case 'actualizar':
            $alm->__SET('id',              $_REQUEST['id']);
            $alm->__SET('Nombre',          $_REQUEST['Nombre']);
            $alm->__SET('Apellido',        $_REQUEST['Apellido']);
            $alm->__SET('Sexo',            $_REQUEST['Sexo']);
            $alm->__SET('FechaNacimiento', $_REQUEST['FechaNacimiento']);
			$alm->__SET('Telefono',        $_REQUEST['Telefono']);
			$alm->__SET('Direccion',       $_REQUEST['Direccion']);
			$alm->__SET('Correo',          $_REQUEST['Correo']);
			

            $model->Actualizar($alm);
            //header('Location: index.html');
            header('Location: index.html');
            
			break;

        case 'registrar':
            // se añadio
			$alm->__SET('id',              $_REQUEST['id']);
			$alm->__SET('Nombre',          $_REQUEST['Nombre']);
            $alm->__SET('Apellido',        $_REQUEST['Apellido']);
            $alm->__SET('Sexo',            $_REQUEST['Sexo']);
            $alm->__SET('FechaNacimiento', $_REQUEST['FechaNacimiento']);
			$alm->__SET('Telefono',        $_REQUEST['Telefono']);
			$alm->__SET('Direccion',       $_REQUEST['Direccion']);
			$alm->__SET('Correo',          $_REQUEST['Correo']);

            $model->Registrar($alm);
            echo "Guardo el Registro Exitosamente";
			
	       //<a href="../maquinas.php" <form name="form1" method="post" action="">
			//header('Location: index.html');
            //header('Location: index.php');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['id']);
			echo "Elimino el Registro Exitosamente";

           // header('Location: index.php');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['id']);
            break;
    }
}

?>