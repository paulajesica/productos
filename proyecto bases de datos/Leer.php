<?php
require_once 'alumno.entidad.php';
require_once 'alumno.model.php';

// Logica
$alm = new cliente();
$model = new AlumnoModel();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
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
            header('Location: index.html');
            break;

        case 'registrar':
			$alm->__SET('id',          	   $_REQUEST['id']);
            $alm->__SET('Nombre',          $_REQUEST['Nombre']);
            $alm->__SET('Apellido',        $_REQUEST['Apellido']);
            $alm->__SET('Sexo',            $_REQUEST['Sexo']);
            $alm->__SET('FechaNacimiento', $_REQUEST['FechaNacimiento']);
			$alm->__SET('Telefono',        $_REQUEST['Telefono']);
			$alm->__SET('Direccion',       $_REQUEST['Direccion']);
			$alm->__SET('Correo',          $_REQUEST['Correo']);

            $model->Registrar($alm);
            header('Location: index.html');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['id']);
            header('Location: index.html');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['id']);
            break;
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
        <title>Anexsoft</title>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">

<meta charset="utf-8">
    </head>
    <body >

        <div class="pure-g">
            <div class="pure-u-1-12">
            

                <table class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                        	<th >id</th>
                            <th >Nombre</th>
                            <th >Apellido</th>
                            <th >Sexo</th>
                            <th >FechaNacimiento</th>
                            <th >Telefono</th>
                            <th >Direccion</th>
                            <th >Correo</th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                        	<td><?php echo $r->__GET('id'); ?></td>
                            <td><?php echo $r->__GET('Nombre'); ?></td>
                            <td><?php echo $r->__GET('Apellido'); ?></td>
                            <td><?php echo $r->__GET('Sexo') == 1 ? 'M' : 'F'; ?></td>
                            <td><?php echo $r->__GET('FechaNacimiento'); ?></td>
                            <td><?php echo $r->__GET('Telefono'); ?></td>
                            <td><?php echo $r->__GET('Direccion'); ?></td>
                            <td><?php echo $r->__GET('Correo'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              
            </div>
        </div>
        <p>&nbsp;</p>
    <form name="form1" method="post" action="index.html">
          <input type="submit" name="button" id="button" value="Pagina De Inicio">
    </form>
</body>
</html>



