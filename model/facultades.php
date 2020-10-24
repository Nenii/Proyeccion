	<?php
require_once  'database.php';
class Facultades
{ 
	private $pdo;
	public $id_proy_facultad;
	public $id_proyecto;
	public $id_facultad;
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
	public function RegistrarFacultad(Facultades $data)
	{
		try 
		{
		$sql = "INSERT INTO proyecto_facultad(id_proy_facultad,id_proyecto,id_facultad,estado) 
		        VALUES (?, ?, ?, ?)";
		        var_dump($sql);

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->id_proy_facultad,
                    $data->id_proyecto, 
                    $data->id_facultad, 
                    $data->estado
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}


	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE proyecto_facultad SET 
						id_proy_facultad          = ?, 
						id_proyecto        = ?,
                        id_facultad        = ?,
				    WHERE id_proy_facultad = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->id_proy_facultad,
                        $data->id_proyecto,
                        $data->id_facultad,
                        $data->estado
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}

