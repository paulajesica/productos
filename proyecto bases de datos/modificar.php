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
            header('Location: modificar.php');
            break;

        case 'registrar':
			$alm->__SET('id',              $_REQUEST['id']);
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
                
                <form action="?action=<?php echo $alm->id > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" >
                    <input type="hidden" name="id" value="<?php echo $alm->__GET('id'); ?>" />
                    
                    <table >
                    	<tr>
                            <th >id</th>
                            <td><input type="text" name="id" value="<?php echo $alm->__GET('id'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >Nombre</th>
                            <td><input type="text" name="Nombre" value="<?php echo $alm->__GET('Nombre'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >Apellido</th>
                            <td><input type="text" name="Apellido" value="<?php echo $alm->__GET('Apellido'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >Sexo</th>
                            <td>
                                <select name="Sexo" >
                                    <option value="1" <?php echo $alm->__GET('Sexo') == 1 ? 'selected' : ''; ?>>Masculino</option>
                                    <option value="2" <?php echo $alm->__GET('Sexo') == 2 ? 'selected' : ''; ?>>Femenino</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th >FechaNacimiento</th>
                            <td><input type="text" name="FechaNacimiento" value="<?php echo $alm->__GET('FechaNacimiento'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >Telefono</th>
                            <td><input type="text" name="Telefono" value="<?php echo $alm->__GET('Telefono'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >Direccion</th>
                            <td><input type="text" name="Direccion" value="<?php echo $alm->__GET('Direccion'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >Correo</th>
                            <td><input type="text" name="Correo" value="<?php echo $alm->__GET('Correo'); ?>"  /></td>
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
                        	<th>id</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Sexo</th>
                            <th>FechaNacimiento</th>
                            <th>Telefono</th>
                            <th>Direccion</th>
                            <th>Correo</th>
                            <th></th>
                            <th></th>
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
                            <td>
                                <a href="?action=editar&id=<?php echo $r->id; ?>">Editar</a>
                            </td>
                            <td>
                                <a href="?action=eliminar&id=<?php echo $r->id; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <p>&nbsp;</p>     
              
            </div>
        </div>
        
        <form name="form1" method="post" action="index.html">
          <input type="submit" name="button" id="button" value="Pagina de Inicio">
        </form>
        <p>&nbsp;</p>

    </body>
</html>




