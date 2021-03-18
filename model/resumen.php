<?php
require_once 'database.php';
class Resumen
{
	private $pdo;
    public $id_resumen;
    public $nom_actividad;
    public $objetivo;
    public $descripcion;
	public $estado;

	public function __CONSTRUCT()
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
public function ListarResumen()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM vista_proy WHERE  nom_categoria = 'Resumen Ejecutivo' ");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
}