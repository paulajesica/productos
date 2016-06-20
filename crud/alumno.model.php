<?php

class AlumnoModel
{
    private $pdo;

    public function __CONSTRUCT()
    {
        try
        {
            $this->pdo = new PDO('mysql:host=localhost;dbname=Cliente', 'root', '');
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

            $stm = $this->pdo->prepare("SELECT * FROM facturas");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new facturas();

                $alm->__SET('CODIGO',                            $r->CODIGO);
                $alm->__SET('NOMBRECLIENTE',                 $r->NOMBRECLIENTE);
                $alm->__SET('TELEFONO',                      $r->TELEFONO);
                $alm->__SET('DIRECCION',                     $r->DIRECCION);
                $alm->__SET('MAQUINAACOMPRAR',              $r->MAQUINAACOMPRAR);
				$alm->__SET('FORMADEPAGO',                 $r->FORMADEPAGO);
                $alm->__SET('DIADELADEENTREGA',              $r->DIADELAENTREGA);
				$alm->__SET('NOMBREVENDEDOR',                $r->NOMBREVENDEDOR);

                $result[] = $alm;
            }

            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Obtener($CODIGO)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("SELECT * FROM facturas WHERE CODIGO = ?");
                      

            $stm->execute(array($CODIGO));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $alm = new facturas();

                $alm->__SET('CODIGO',                            $r->CODIGO);
                $alm->__SET('NOMBRECLIENTE',                 $r->NOMBRECLIENTE);
                $alm->__SET('TELEFONO',                      $r->TELEFONO);
                $alm->__SET('DIRECCION',                     $r->DIRECCION);
                $alm->__SET('MAQUINAACOMPRAR',              $r->MAQUINAACOMPRAR);
				$alm->__SET('FORMADEPAGO',                 $r->FORMADEPAGO);
                $alm->__SET('DIADELAENTREGA',                $r->DIADELAENTREGA);
				$alm->__SET('NOMBREVENDEDOR',                $r->NOMBREVENDEDOR);

            return $alm;
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Eliminar($CODIGO)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("DELETE FROM facturas WHERE CODIGO = ?");                      

            $stm->execute(array($CODIGO));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Actualizar(facturas $data)
    {
        try 
        {
            $sql = "UPDATE facturas SET 
			            NOMBRECLIENTE              = ?, 
                        TELEFONO                   = ?, 
                        DIRECCION                  = ?,
                        MAQUINAACOMPRAR           = ?, 
                        FORMADEPAGO              = ?,
						DIADELAENTREGA             = ?,
						NOMBREVENDEDOR             = ?
                    WHERE CODIGO = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
				    $data->__GET('NOMBRECLIENTE'),
                    $data->__GET('TELEFONO'), 
                    $data->__GET('DIRECCION'), 
                    $data->__GET('MAQUINAACOMPRAR'),
                    $data->__GET('FORMADEPAGO'),
					$data->__GET('DIADELAENTREGA'),
					$data->__GET('NOMBREVENDEDOR'),
                    $data->__GET('CODIGO')
                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Registrar(facturas $data)
    {
        try 
        {
        $sql = "INSERT INTO facturas (CODIGO,NOMBRECLIENTE,TELEFONO,DIRECCION,MAQUINAACOMPRAR,FORMADEPAGO,DIADELAENTREGA,NOMBREVENDEDOR) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
                    $data->__GET('CODIGO'), 
				    $data->__GET('NOMBRECLIENTE'),
                    $data->__GET('TELEFONO'), 
                    $data->__GET('DIRECCION'), 
                    $data->__GET('MAQUINAACOMPRAR'),
                    $data->__GET('FORMADEPAGO'),
					$data->__GET('DIADELAENTREGA'),
					$data->__GET('NOMBREVENDEDOR'),
                )
            );
			
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}

?>

