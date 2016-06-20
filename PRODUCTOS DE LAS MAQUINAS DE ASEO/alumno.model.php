
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

            $stm = $this->pdo->prepare("SELECT * FROM maquinas");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new maquinas();

                $alm->__SET('CODIGO',    			$r->CODIGO);
                $alm->__SET('NOMBREMAQUINA', 			$r->NOMBREMAQUINA);
                $alm->__SET('PRECIO', 		$r->PRECIO);
               
				
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
                      ->prepare("SELECT * FROM maquinas WHERE CODIGO = ?");
                    
            $stm->execute(array($CODIGO));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $alm = new maquinas();

            $alm->__SET('CODIGO',                  $r->CODIGO);
            $alm->__SET('NOMBREMAQUINA',              $r->NOMBREMAQUINA);
            $alm->__SET('PRECIO',            $r->PRECIO);
            

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
                      ->prepare("DELETE FROM maquinas WHERE CODIGO = ?");                      

            $stm->execute(array($CODIGO));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Actualizar(maquinas $data)
    {
        try 
        {
            $sql = "UPDATE maquinas SET 
                        NOMBREMAQUINA          = ?, 
                        PRECIO        = ?
     
                    WHERE CODIGO = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    $data->__GET('NOMBREMAQUINA'), 
                    $data->__GET('PRECIO'), 
                    $data->__GET('CODIGO')
                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Registrar(maquinas $data)
    {
        try 
        {
        $sql = "INSERT INTO maquinas (CODIGO,NOMBREMAQUINA,PRECIO) 
                VALUES (?, ?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
                $data->__GET('CODIGO'), 
				$data->__GET('NOMBREMAQUINA'), 
                $data->__GET('PRECIO')
              
                )
            );
			
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}

?>

