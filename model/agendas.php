<?php
require_once 'database.php';
class Agenda
{
	private $pdo;
	public $nom_proyecto;
	public $ubicación;
	public $id_beneficiarios;
	public $monto;
	public $inicio_proy;
	public $final_proy;
	public $periodo;
	public $cod_proyecto;
	public $estado;
	public $id_categoria;

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
	public function ListarAgendas()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM vista_proy WHERE  nom_categoria = 'Agenda' ");
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
			->prepare("SELECT * FROM proyecto WHERE id_proyecto = ? and id_categoria = 2 ");
			$stm->execute(array($id_proyecto));
			return $stm->fetch(PDO::FETCH_OBJ);

		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}