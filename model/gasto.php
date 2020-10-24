<?php
require_once 'database.php';
class Gasto
{
	private $pdo;
    public $id_gasto;
    public $fecha;
    public $monto;
    public $id_res_act;
	public $tipo;
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

			$stm = $this->pdo->prepare("SELECT SUM(GASTO) AS GASTOS, 
										nom_responsable, 
										nom_actividad,
										nom_proyecto,
										 fecha, 
										 cod_proyecto,
										 monto AS presupuesto ,
										 estado,
										 periodo,
										 
										 SUM(GASTO) AS gastos,
										(monto - SUM(GASTO)) AS diferencia 
										FROM vista_actividades WHERE estado =1  AND periodo= year(NOW()) GROUP BY nom_proyecto ORDER BY nom_actividad ASC ");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	// Funcion de listar que contiene el query 
	public function ListarTotalGastos()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT *,
										SUM(GASTO) AS TOTAL,
										(SUM(GASTO)/monto)*100 AS 'Porcentaje'
										FROM vista_actividades GROUP BY periodo   ORDER BY periodo DESC ");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	// Funcion de listar que contiene el query 
	public function GastoTOP5()
	{
		try
		{ 
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM vista_Alcances_Gastos LIMIT 4	");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

		// Funcion de listar que contiene el query 
	public function ListarGastos()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM vista_actividades WHERE estado = 1 ");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	// public function Obtener($id_proyecto)

	public function Obtener($id_proyecto)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT 
									*
								 FROM vista_actividades
								WHERE id_proyecto = ? and estado = 1");
			          

			//$stm->execute(array($id_proyecto));
			$stm->execute(array($id_proyecto));
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

public function ObtenerGastos($id_proyecto)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT SUM(GASTO) AS GASTOS, 
										nom_responsable, 
										nom_actividad,
										nom_proyecto,
										 fecha, 
										 cod_proyecto,
										 monto AS presupuesto ,
										 estado,
										 id_gasto,										 
										 SUM(GASTO) AS gastos,
										(monto - SUM(GASTO)) AS diferencia 
										FROM vista_actividades WHERE estado =1 and id_proyecto = ?  GROUP BY nom_proyecto ORDER BY nom_actividad ASC");			 
			$stm->execute(array($id_proyecto));
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function Eliminar($id_proyecto)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM actividades WHERE id_proyecto = ?");			          

			$stm->execute(array($id_proyecto));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
//Funcion para actualizar estadi del gasto
	public function ActualizarEstado($id_proyecto)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("UPDATE responsable_actividad SET estado WHERE id_proyecto = ?");			          

			$stm->execute(array($data->$id_proyecto,
                        		$data->estado));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function Registrar(Gasto $data)
		{
			try 
			{
			$sql = "INSERT INTO gastos (id_gasto,fecha,monto,id_res_act,tipo,descripcion,estado) 
			        VALUES (?, ?, ?, ?, ?, ?, ?)";

			$this->pdo->prepare($sql)
			     ->execute(
					array(
	                    $data->id_gasto,
	                    $data->fecha, 
	                    $data->monto, 
	                    $data->id_res_act, 
	                    $data->tipo, 
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
						id_responsable        = ?,
                        fecha_inicio        = ?,
						inicio_proy            = ?, 
						TIPO            = ?, 
						descripcion            = ?, 
						estado = ?
				    WHERE id_responsable_actividad = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->id_responsable_actividad, 
                        $data->id_responsable,
                        $data->inicio_proy,
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