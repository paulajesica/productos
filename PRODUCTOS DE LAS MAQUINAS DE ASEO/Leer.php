<?php
require_once 'alumno.entidad.php';
require_once 'alumno.model.php';

// Logica
$alm = new maquinas();
$model = new AlumnoModel();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
        case 'actualizar':
            $alm->__SET('CODIGO',              $_REQUEST['CODIGO']);
            $alm->__SET('NOMBREMAQUINA',          $_REQUEST['NOMBREMAQUINA']);
            $alm->__SET('PRECIO',        $_REQUEST['PRECIO']);
            

            $model->Actualizar($alm);
            header('Location: index.html');
            break;

        case 'registrar':
			$alm->__SET('CODIGO',          	   $_REQUEST['CODIGO']);
            $alm->__SET('NOMBREMAQUINA',          $_REQUEST['NOMBREMAQUINA']);
            $alm->__SET('PRECIO',        $_REQUEST['PRECIO']);
            

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
    <body ><div class="pure-g">
        <div class="pure-u-1-12">
            

                <table class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                        	<th >CODIGO</th>
                            <th >NOMBREMAQUINA</th>
                            <th >PRECIO</th>
                           
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                        	<td><?php echo $r->__GET('CODIGO'); ?></td>
                            <td><?php echo $r->__GET('NOMBREMAQUINA'); ?></td>
                            <td><?php echo $r->__GET('PRECIO'); ?></td>
                           
                        </tr>
                    <?php endforeach; ?>
                </table>     
              
            </div>
        </div>
        <p align="right" >&nbsp;</p>        
        <a href="../crud/insertar.html" <form name="form1" method="post" action="">          <input type="submit" name="button" id="button" value="comprar">        </form></a>
        <a href="../PAGINAPRINCIPAL.php" target="PAGINAPRINCIPAL.php"><p>       <input type="submit" name="button" id="button" value="pagina de inicio">        </form>        </p></a>
</body>
</html>



