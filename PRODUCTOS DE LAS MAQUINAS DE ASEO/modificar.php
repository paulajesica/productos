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
            header('Location: modificar.php');
            break;

        case 'registrar':
			$alm->__SET('CODIGO',              $_REQUEST['CODIGO']);
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
    <body >

        <div class="pure-g">
            <div class="pure-u-1-12">
                
                <form action="?action=<?php echo $alm->CODIGO > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" >
                    <input type="hidden" name="CODIGO" value="<?php echo $alm->__GET('CODIGO'); ?>" />
                    
                    <table >
                    	<tr>
                            <th >CODIGO</th>
                            <td><input type="text" name="CODIGO" value="<?php echo $alm->__GET('CODIGO'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >NOMBREMAQUINA</th>
                            <td><input type="text" name="NOMBREMAQUINA" value="<?php echo $alm->__GET('NOMBREMAQUINA'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >PRECIO</th>
                            <td><input type="text" name="PRECIO" value="<?php echo $alm->__GET('PRECIO'); ?>"  /></td>
                        </tr>
                        
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit" class="pure-button pure-button-primary">Guardar</button>
                            </td>
                        </tr>
                    </table>
                </form>

                <table class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                        	<th>CODIGO</th>
                            <th>NOMBREMAQUINA</th>
                            <th>PRECIO</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                        	<td><?php echo $r->__GET('CODIGO'); ?></td>
                            <td><?php echo $r->__GET('NOMBREMAQUINA'); ?></td>
                            <td><?php echo $r->__GET('PRECIO'); ?></td>
                            <td>
                                <a href="?action=editar&CODIGO=<?php echo $r->CODIGO; ?>">Editar</a>
                            </td>
                            <td>
                                <a href="?action=eliminar&CODIGO=<?php echo $r->CODIGO; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <p>&nbsp;</p>     
              
            </div>
        </div>
        
        <form name="form1" method="post" action="index.html">
          <input type="submit" name="button" CODIGO="button" value="Pagina de Inicio">
        </form>
        <p>&nbsp;</p>

    </body>
</html>




