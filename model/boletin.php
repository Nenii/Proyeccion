<?php
require_once 'database.php';
class Boletin
{
	private $pdo;

	function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	// Funcion de listar que contiene el query 
	public function ListarBoletin()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM vista_proy WHERE estado = 1 AND  nom_categoria = 'Boletin'");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($id_proyecto)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM proyecto WHERE id_proyecto = ? and id_categoria = 9 ");
			          

			$stm->execute(array($id_proyecto));
			return $stm->fetch(PDO::FETCH_OBJ);

		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}