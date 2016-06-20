
<?php

class AlumnoModel
{
    private $pdo;

    public function __CONSTRUCT()
    {
        try
        {
            $this->pdo = new PDO('mysql:host=localhost;dbname=cliente', 'root', '');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);                
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Listar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM cliente");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new cliente();

                $alm->__SET('id',    			$r->id);
                $alm->__SET('Nombre', 			$r->Nombre);
                $alm->__SET('Apellido', 		$r->Apellido);
                $alm->__SET('Sexo', 			$r->Sexo);
                $alm->__SET('FechaNacimiento', 	$r->FechaNacimiento);
				$alm->__SET('Telefono', 		$r->Telefono);
				$alm->__SET('Direccion', 		$r->Direccion);
				$alm->__SET('Correo', 			$r->Correo);
				
                $result[] = $alm;
            }

            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Obtener($id)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("SELECT * FROM cliente WHERE id = ?");
                    
            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $alm = new cliente();

            $alm->__SET('id',                  $r->id);
            $alm->__SET('Nombre',              $r->Nombre);
            $alm->__SET('Apellido',            $r->Apellido);
            $alm->__SET('Sexo',                $r->Sexo);
            $alm->__SET('FechaNacimiento',     $r->FechaNacimiento);
			$alm->__SET('Telefono',            $r->Telefono);
			$alm->__SET('Direccion',           $r->Direccion);
			$alm->__SET('Correo',              $r->Correo);

            return $alm;
        }
	   catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Eliminar($id)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("DELETE FROM cliente WHERE id = ?");                      

            $stm->execute(array($id));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Actualizar(cliente $data)
    {
        try 
        {
            $sql = "UPDATE cliente SET 
                        Nombre          = ?, 
                        Apellido        = ?,
                        Sexo            = ?, 
                        FechaNacimiento = ?,
						Telefono		= ?,
						Direccion		= ?,
						Correo			= ?
                    WHERE id = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    $data->__GET('Nombre'), 
                    $data->__GET('Apellido'), 
                    $data->__GET('Sexo'),
                    $data->__GET('FechaNacimiento'),
					$data->__GET('Telefono'),
					$data->__GET('Direccion'),
					$data->__GET('Correo'),
                    $data->__GET('id')
                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Registrar(cliente $data)
    {
        try 
        {
        $sql = "INSERT INTO cliente (id,Nombre,Apellido,Sexo,FechaNacimiento,Telefono,Direccion,Correo) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
                $data->__GET('id'), 
				$data->__GET('Nombre'), 
                $data->__GET('Apellido'), 
                $data->__GET('Sexo'),
                $data->__GET('FechaNacimiento'),
				$data->__GET('Telefono'),
				$data->__GET('Direccion'),
				$data->__GET('Correo')
                )
            );
			
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}

?>

