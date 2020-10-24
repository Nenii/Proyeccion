<?php
require_once 'database.php';
class Anexos
{
	private $pdo;
	public $id_anexo;
	public $nom_anexo;
	public $arch_anexo;
	public $id_res_proy;
	public $fecha;
	public $descripcion;
	
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
	
		public function ListarEjecutorAsignados($id_proyecto)
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM responsable_proyecto a
										INNER	JOIN	proyecto b ON b.id_proyecto = a.id_proyecto
										INNER JOIN	usuarios c ON c.id_usuario = a.id_responsable
										WHERE a.id_proyecto = ? AND a.estado = 1 ");
			$stm->execute(array($id_proyecto));

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	// Funcion de listar que contiene el query 
	public function Listar($id_proyecto)
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM responsable_proyecto c

								LEFT JOIN usuarios d ON c.id_usuario = d.id_responsable 
								LEFT JOIN proyecto e ON e.id_proyecto = c.id_proyecto
								WHERE e.id_proyecto = ?  ");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	// Funcion de listar Anexos asignados a un proyecto
	
	public function Obtener($id_proyecto)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM vista_anexos WHERE id_proyecto = ?  ORDER BY fecha ASC ");
			          

			$stm->execute(array($id_proyecto));
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	
	public function Eliminar($id_anexo)
	{
		try
		{
			$stm = $this->pdo
			            ->prepare("UPDATE anexos a SET a.estado = 3  WHERE  a.id_anexo = ?");
			$stm->execute(array($id_anexo));
			//var_dump($stm);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE anexos SET 
						id_proyecto          = ?, 
						nom_anexo        = ?,
                        id_anexo        = ?,
						ubicacion            = ?, 
						fecha = ?,
						ubicacion            = ?
				    WHERE id_proyecto = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->id_anexo,
                        $data->nom_anexo,
                        $data->ubicacion,
                        $data->fecha,
                        $data->descripcion
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Anexos $data)
	{
		try 
		{
		$sql = "INSERT INTO anexos (id_anexo,nom_anexo,ubicacion,fecha,descripcion,estado,id_res_proy) 
		        VALUES (?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->id_anexo,
                    $data->nom_anexo, 
                    $data->ubicacion, 
                    $data->fecha,
                    $data->descripcion,
                    $data->estado,
                    $data->id_res_proy
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}