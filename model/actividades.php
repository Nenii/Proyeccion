	<?php
require_once 'database.php';
class Actividades
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
	public function ListarActividadesAsignadas()
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

	public function ListarActividadesTOP($id_proyecto)
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT *,
									TIMESTAMPDIFF(DAY,NOW(),fecha_fin) AS 'Dias_faltantes',
									TIMESTAMPDIFF(DAY,fecha_inicio,fecha_fin) AS 'Dias_totales',
									IF(TIMESTAMPDIFF(DAY,NOW(),fecha_fin)<0, 'VENCIDO','ACTIVO' ) AS 'ESTATUS'
									FROM vista_actividades
									WHERE estado = 1 AND id_proyecto =   ? ORDER BY fecha_fin ASC LIMIT 4;");
			$stm->execute(array($id_proyecto));

			return $stm->fetchAll(PDO::FETCH_OBJ);
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

			$stm = $this->pdo->prepare("SELECT  DISTINCT nom_actividad, id_actividades, estado FROM actividades WHERE estado = 1 ");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	// Funcion de listar Responsables asignados a un proyecto
	public function ListarRes()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM responsable_proyecto
					INNER JOIN usuarios ON usuarios.id_usuario = responsable_proyecto.id_responsable
					INNER JOIN responsable_actividad ON responsable_proyecto.id_responsable_proyecto =responsable_actividad.id_responsable_proyecto
					INNER JOIN actividades ON actividades.id_actividades = responsable_actividad.id_actividad

					WHERE responsable_proyecto.estado = 1 ");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function ListarResponsable()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM responsable_proyecto
					LEFT JOIN usuarios ON usuarios.id_usuario = responsable_proyecto.id_responsable
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
public function ListarEjecutor($id_proyecto)
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT DISTINCT
 					b.nombre_usuario ,a.id_responsable_proyecto FROM responsable_proyecto a
					INNER JOIN usuarios b ON b.id_usuario = a.id_responsable
					INNER JOIN responsable_actividad c ON a.id_responsable_proyecto =c.id_responsable_proyecto
					INNER JOIN	proyecto  f ON f.id_proyecto = a.id_proyecto
					 AND f.id_proyecto =? ");
			$stm->execute(array($id_proyecto));

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
			          ->prepare("SELECT *,
								if((timestampdiff(DAY,NOW(),A.fecha_fin) < 0),'VENCIDO','ACTIVO') AS Estatus,
								timestampdiff(DAY,A.fecha_inicio,now()) AS Progreso,
								E.monto AS GASTO,
								SUM(E.monto) AS 'Gastos_totales',
								timestampdiff(DAY,A.fecha_inicio,  A.fecha_fin) AS Dias_totales
								FROM responsable_actividad	A
								LEFT JOIN responsable_proyecto B ON B.id_responsable_proyecto = A.id_responsable_proyecto
								LEFT JOIN proyecto C ON C.id_proyecto = B.id_proyecto
								LEFT JOIN usuarios F ON F.id_usuario = B.id_responsable
								LEFT JOIN actividades D ON D.id_actividades = A.id_actividad
								LEFT JOIN gastos E ON E.id_res_act= A.id_responsable_actividad
					 			WHERE C.id_proyecto = ? and A.estado = 1 and C.estado = 1  AND A.TIPO = 1
					 			GROUP BY A.id_responsable_actividad");


			$stm->execute(array($id_proyecto));
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function ObtenerFinalizados($id_proyecto)
	{
		try
		{
			$stm = $this->pdo
			          ->prepare("
 	SELECT
	 *,
		if((timestampdiff(DAY,NOW(),A.fecha_fin) < 0),'VENCIDO','ACTIVO') AS Estatus,
		timestampdiff(DAY,A.fecha_inicio,now()) AS Progreso,
		E.monto AS GASTO,
		SUM(E.monto) AS 'Gastos_totales',

		timestampdiff(DAY,NOW(), A.fecha_inicio) AS Dias_faltantes,
		timestampdiff(DAY,A.fecha_inicio,  A.fecha_fin) AS Dias_totales
		FROM responsable_actividad	A
		LEFT JOIN responsable_proyecto B ON B.id_responsable_proyecto = A.id_responsable_proyecto
		LEFT JOIN proyecto C ON C.id_proyecto = B.id_proyecto
		LEFT JOIN usuarios F ON F.id_usuario = B.id_responsable
		LEFT JOIN actividades D ON D.id_actividades = A.id_actividad
		LEFT JOIN gastos E ON E.id_res_act= A.id_responsable_actividad
		WHERE C.id_proyecto = ? and A.estado = 1 and C.estado = 1
		GROUP BY A.fecha_fin  ORDER BY A.fecha_fin DESC");


			$stm->execute(array($id_proyecto));
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function Estados_Actividad($id_proyecto)
	{
		try
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM vista_actividades WHERE id_proyecto = ?");


			$stm->execute(array($id_proyecto));
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function Finalizar($id_actividades)
	{
		try
		{
			$stm = $this->pdo
			            ->prepare("UPDATE responsable_actividad a SET a.TIPO = 'COMPLETADO'  WHERE  a.id_responsable_actividad = ?");
			$stm->execute(array($id_actividades));
			//var_dump($stm);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id_actividades)
	{
		try
		{
			$stm = $this->pdo
			            ->prepare("UPDATE responsable_actividad a SET a.estado = 3  WHERE  a.id_responsable_actividad = ?");

			$stm->execute(array($id_actividades));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}


	public function EliminarResponsable($id_actividad, $id_responsable_proyecto )
	{
		try
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM responsable_actividad WHERE id_actividad = ? and id_responsable_proyecto =?");
			            $stm->execute(array($id_actividad, $id_responsable_proyecto));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try
		{
			$sql = "UPDATE actividades SET
						id_proyecto          = ?,
						nom_actividad        = ?,
                        id_actividades        = ?,
						objetivo            = ?,
						descripcion = ?,
						objetivo            = ?
				    WHERE id_proyecto = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->id_actividades,
                        $data->nom_actividad,
                        $data->objetivo,
                        $data->descripcion,
                        $data->estado
					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function AsignarAct(Actividades $data)
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
	public function Registrar(Actividades $data)
	{
		try
		{
		$sql = "INSERT INTO actividades (id_actividades,nom_actividad,objetivo,descripcion,estado)
		        VALUES (?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->id_actividades,
                    $data->nom_actividad,
                    $data->objetivo,
                    $data->descripcion,
                    $data->estado
                )
			);
			echo '<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
	 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
	 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	 <script>jQuery(function(){swal("¡Ingreso correcto", "Bárbaro, perrooo", "success");});</script>';



		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function RegistrarAct(Actividades $data)
	{
		try
		{
		$sql = "INSERT INTO responsable_actividad (id_responsable_actividad, id_actividad, id_responsable_proyecto, fecha_inicio, fecha_fin, TIPO, descripcion, estado)
		VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

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

	public function RegistrarResponsable(Actividades $data)
	{
		try
		{
		$sql = "INSERT INTO responsable_actividad (id_responsable_actividad,id_actividad,id_responsable_proyecto,fecha_inicio,fecha_fin, TIPO, descripcion, estado)
		        VALUES (?, ?, ?, ?, ?, ?, ?,?)";

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
