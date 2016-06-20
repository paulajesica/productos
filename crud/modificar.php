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
            header('Location: modificar.php');
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
                
                <form action="?action=<?php echo $alm->CODIGO > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" >
                    <input type="hidden" name="CODIGO" value="<?php echo $alm->__GET('CODIGO'); ?>" />
                    
                    <table >
                    <tr>
                            <th >CODIGO</th>
                            <td><input type="text" name="CODIGO" value="<?php echo $alm->__GET('CODIGO'); ?>"  /></td>
                      </tr>
                       <tr>
                            <th >NOMBRE CLIENTE</th>
                            <td><input type="text" name="NOMBRECLIENTE" value="<?php echo $alm->__GET('NOMBRECLIENTE'); ?>"  /></td>
                      </tr>
                        
                        <tr>
                            <th >TELEFONO</th>
                            <td><input type="text" name="TELEFONO" value="<?php echo $alm->__GET('TELEFONO'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >DIRECCION</th>
                            <td><input type="text" name="DIRECCION" value="<?php echo $alm->__GET('DIRECCION'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >MAQUINA A COMPRAR</th>
                            <td><input type="text" name="MAQUINAACOMPRAR" value="<?php echo $alm->__GET('MAQUINAACOMPRAR'); ?>"  /></td>
                        </tr>
                        
                        <tr>
                            <th >FORMA DE PAGO</th>
                            <td><input type="text" name="FORMADEPAGO" value="<?php echo $alm->__GET('FORMADEPAGO'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >DIA DE LA ENTREGA</th>
                            <td><input type="text" name="DIADELAENTREGA" value="<?php echo $alm->__GET('DIADELAENTREGA'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >NOMBRE VENDEDOR</th>
                            <td><input type="text" name="NOMBREVENDEDOR" value="<?php echo $alm->__GET('NOMBREVENDEDOR'); ?>"  /></td>
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
                         <th width="47" >CODIGO</th>
                        <th width="106" >NOMBRE CLIENTE</th>
                        <th width="118" >TELEFONO</th>
                        <th width="121" >DIRECCION</th>
                        <th width="127" >MAQUINA  A COMPRAR</th>
                        <th width="114" >FORMA DE PAGO</th>
                        <th width="109" >DIA DE LA ENTREGA</th>
                        <th width="123" >NOMBRE VENDEDOR</th> 
                            <th width="72"></th>
                            <th width="94"></th>
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
                            <td>
                                <a href="?action=editar&CODIGO=<?php echo $r->CODIGO; ?>">Editar</a>
                            </td>
                            <td>
                                <a href="?action=eliminar&CODIGO=<?php echo $r->CODIGO; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              
            </div>
        </div>
    <form name="form1" method="post" action="index.html">
      <input type="submit" name="button" id="button" value="Pagina De Inicio">
    </form>
    <p>&nbsp;</p>
    </body>
</html>



