<?php
require_once 'alumno.entidad.php';
require_once 'alumno.model.php';

// Logica
$alm = new cancelar();
$model = new AlumnoModel();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
        case 'actualizar':
            $alm->__SET('CODIGO',              $_REQUEST['CODIGO']);
            $alm->__SET('NOMBREMAQUINA',          $_REQUEST['NOMBREMAQUINA']);
            $alm->__SET('NOMBRECLIENTE',        $_REQUEST['NOMBRECLIENTE']);
            $alm->__SET('FECHACANCELAR',            $_REQUEST['FECHACANCELAR']);
            $alm->__SET('DIRECCION', $_REQUEST['DIRECCION']);
			$alm->__SET('TELEFONO',        $_REQUEST['TELEFONO']);
			
            $model->Actualizar($alm);
            header('Location: index.html');
            break;

        case 'registrar':
			$alm->__SET('CODIGO',          	   $_REQUEST['CODIGO']);
            $alm->__SET('NOMBREMAQUINA',          $_REQUEST['NOMBREMAQUINA']);
            $alm->__SET('NOMBRECLIENTE',        $_REQUEST['NOMBRECLIENTE']);
            $alm->__SET('FECHACANCELAR',            $_REQUEST['FECHACANCELAR']);
            $alm->__SET('DIRECCION', $_REQUEST['DIRECCION']);
			$alm->__SET('TELEFONO',        $_REQUEST['TELEFONO']);
			

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

<meta charset="utf-8">
    </head>
    <body >

        <div class="pure-g">
            <div class="pure-u-1-12">
            

                <table class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                        	<th >CODIGO</th>
                            <th >NOMBREMAQUINA</th>
                            <th >NOMBRECLIENTE</th>
                            <th >FECHACANCELAR</th>
                            <th >DIRECCION</th>
                            <th >TELEFONO</th>
                           
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                        	<td><?php echo $r->__GET('CODIGO'); ?></td>
                            <td><?php echo $r->__GET('NOMBREMAQUINA'); ?></td>
                            <td><?php echo $r->__GET('NOMBRECLIENTE'); ?></td>
                            <td><?php echo $r->__GET('FECHACANCELAR'); ?></td>
                            <td><?php echo $r->__GET('DIRECCION'); ?></td>
                            <td><?php echo $r->__GET('TELEFONO'); ?></td>
                            
                        </tr>
                    <?php endforeach; ?>
                </table>     
              
            </div>
        </div>
        <p>&nbsp;</p>
    <form name="form1" method="post" action="index.html">
          <input type="submit" name="button" CODIGO="button" value="Pagina De Inicio">
    </form>
</body>
</html>

