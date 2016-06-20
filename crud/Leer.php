<?php
require_once 'alumno.entidad.php';
require_once 'alumno.model.php';

// Logica
$alm = new facturas();
$model = new AlumnoModel();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
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
            header('Location: index.html');
            break;

        case 'registrar':
		    $alm->__SET('CODIGO',                         $_REQUEST['CODIGO']);
            $alm->__SET('NOMBRECLIENTE',              $_REQUEST['NOMBRECLIENTE']);
            $alm->__SET('TELEFONO',                   $_REQUEST['TELEFONO']);
            $alm->__SET('DIRECCION',                  $_REQUEST['DIRECCION']);
            $alm->__SET('MAQUINAACOMPRAR',           $_REQUEST['MAQUINAACOMPRAR']);
            $alm->__SET('FORMADEPAGO',              $_REQUEST['FORMADEPAGO']);
			$alm->__SET('DIADELAENTREGA',             $_REQUEST['DIADELAENTREGA']);
			$alm->__SET('NOMBREVENDEDOR',             $_REQUEST['NOMBREVENDEDOR']);

            $model->Registrar($alm);
            header('Location: index.html');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['CODIGO']);
            header('Location: index.html');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['CODIGO']);
            break;
    }
}

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Anexsoft</title>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
    </head>
    <body >

    <div class="pure-g">
            <div class="pure-u-1-12">
            

                <table class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                            <th >CODIGO</th>
                            <th >NOMBRECLIENTE</th>
                            <th >TELEFONO</th>
                            <th >DIRECCION</th>
                            <th >MAQUINAACOMPRAR</th>
                            <th >FORMADEPAGO</th>
                            <th >DIADELAENTREGA</th>
                            <th >NOMBREVENDEDOR</th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('CODIGO'); ?></td>
                            <td><?php echo $r->__GET('NOMBRECLIENTE'); ?></td>
                            <td><?php echo $r->__GET('TELEFONO'); ?></td>
                            <td><?php echo $r->__GET('DIRECCION'); ?></td>
                            <td><?php echo $r->__GET('MAQUINAACOMPRAR'); ?></td>
                            <td><?php echo $r->__GET('FORMADEPAGO'); ?></td>
                            <td><?php echo $r->__GET('DIADELAENTREGA'); ?></td>
                            <td><?php echo $r->__GET('NOMBREVENDEDOR'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              
            </div>
        </div>
    <p>&nbsp;</p>
        <form name="form1" method="post" action="index.html">
          <input type="submit" name="button" CODIGO="button" value="Pagina De Inicio">
        </form>
        <p>&nbsp;</p>

    </body>
</html>



