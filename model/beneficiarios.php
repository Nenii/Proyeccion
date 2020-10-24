<?php
require_once 'database.php';
class Beneficiarios
{
	private $pdo;
    public $id_beneficiarios;
    public $nom_comunidad_ben;
    public $n_personas_ben;
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
	// Funcion de listar que contiene el query 
	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM beneficiarios WHERE estado = 1 ");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($id_beneficiarios)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM beneficiarios WHERE id_beneficiarios = ? and estado = 1");
			          

			$stm->execute(array($id_beneficiarios));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Beneficiarios $data)
	{
		try 
		{
		$sql = "INSERT INTO beneficiarios (id_beneficiarios, nom_comunidad_ben, n_personas_ben, estado) 
		        VALUES (?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->id_beneficiarios,
                    $data->nom_comunidad_ben, 
                    $data->n_personas_ben, 
                    $data->estado
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

}