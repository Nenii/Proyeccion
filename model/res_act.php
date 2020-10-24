<?php
require_once 'database.php';
class Res_Act
{
	private $pdo;
	public $id_responsable_actividad;
    public $id_actividad;
    public $id_responsable_proyecto; 
    public $fecha_inicio;
    public $fecha_fin;
    public $TIPO;
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

	// Funcion de listar Responsables asignados a un proyecto
	
	public function ListarResponsable()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM responsable_proyecto 
					LEFT JOIN responsable ON responsable.id_responsable = responsable_proyecto.id_responsable  
					LEFT JOIN responsable_actividad ON responsable_proyecto.id_responsable_proyecto =responsable_actividad.id_responsable_proyecto 
					
					WHERE responsable_proyecto.estado = 1 ");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}



	public function Eliminar($id_responsable_actividad)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM responsable_actividad WHERE id_responsable_actividad = ?");			          

			$stm->execute(array($id_responsable_actividad));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}


	public function Registrar(Res_Act $data)
	{
		try 
		{
		$sql = "INSERT INTO responsable_actividad (id_responsable_actividad, id_actividad, id_responsable_proyecto, fecha_inicio, fecha_fin, TIPO, descripcion, estado) 
		VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
		var_dump($sql);
		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->id_responsable_actividad,
                    $data->id_actividad, 
                    $data->id_responsable_proyecto, 
                    $data->fecha_inicio,
                    $data->fecha_fin,
                    $data->TIPO,
                    $data->descripcion,
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
			$sql = "UPDATE responsable_actividad SET 
						id_responsable_actividad          = ?, 
						id_actividad        = ?,
                        id_responsable_proyecto        = ?,
						fecha_inicio            = ?, 
						fecha_fin = ?,
						TIPO            = ?,
						descripcion            = ?,
						estado            = ?,
				    WHERE id_responsable_actividad = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                    $data->id_responsable_actividad,
                    $data->id_actividad, 
                    $data->id_responsable_proyecto, 
                    $data->fecha_inicio,
                    $data->fecha_fin,
                    $data->TIPO,
                    $data->descripcion,
                    $data->estado
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}