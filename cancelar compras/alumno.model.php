
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

            $stm = $this->pdo->prepare("SELECT * FROM cancelar");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new cancelar();

                $alm->__SET('CODIGO',    			$r->CODIGO);
                $alm->__SET('NOMBREMAQUINA', 			$r->NOMBREMAQUINA);
                $alm->__SET('NOMBRECLIENTE', 		$r->NOMBRECLIENTE);
                $alm->__SET('FECHACANCELAR', 			$r->FECHACANCELAR);
                $alm->__SET('DIRECCION', 	$r->DIRECCION);
				$alm->__SET('TELEFONO', 		$r->TELEFONO);
			
				
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
                      ->prepare("SELECT * FROM cancelar WHERE CODIGO = ?");
                    
            $stm->execute(array($CODIGO));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $alm = new cancelar();

            $alm->__SET('CODIGO',                  $r->CODIGO);
            $alm->__SET('NOMBREMAQUINA',              $r->NOMBREMAQUINA);
            $alm->__SET('NOMBRECLIENTE',            $r->NOMBRECLIENTE);
            $alm->__SET('FECHACANCELAR',                $r->FECHACANCELAR);
            $alm->__SET('DIRECCION',     $r->DIRECCION);
			$alm->__SET('TELEFONO',            $r->TELEFONO);
			

            return $alm;
        }
	   catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Eliminar($CODIGO)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("DELETE FROM cliente WHERE CODIGO = ?");                      

            $stm->execute(array($CODIGO));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Actualizar(cancelar $data)
    {
        try 
        {
            $sql = "UPDATE cancelar SET 
                        NOMBREMAQUINA          = ?, 
                        NOMBRECLIENTE        = ?,
                        FECHACANCELAR            = ?, 
                        DIRECCION = ?,
						TELEFONO		= ?
						WHERE CODIGO = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    $data->__GET('NOMBREMAQUINA'), 
                    $data->__GET('NOMBRECLIENTE'), 
                    $data->__GET('FECHACANCELAR'),
                    $data->__GET('DIRECCION'),
					$data->__GET('TELEFONO'),
					$data->__GET('CODIGO')
                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Registrar(cancelar $data)
    {
        try 
        {
        $sql = "INSERT INTO cancelar (CODIGO,NOMBREMAQUINA,NOMBRECLIENTE,FECHACANCELAR,DIRECCION,TELEFONO) 
                VALUES (?, ?, ?, ?, ?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
                $data->__GET('CODIGO'), 
				$data->__GET('NOMBREMAQUINA'), 
                $data->__GET('NOMBRECLIENTE'), 
                $data->__GET('FECHACANCELAR'),
                $data->__GET('DIRECCION'),
				$data->__GET('TELEFONO')
			
                )
            );
			
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}

?>


