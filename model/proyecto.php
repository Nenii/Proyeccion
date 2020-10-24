<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

require_once  'database.php';
class Proyecto
{
	private $pdo;
    public $id_proyecto;
	public $nom_proyecto;
	public $id_facultad;
	public $ubicacion;
	public $id_beneficiarios;
	public $monto;
	public $inicio_proy;
	public $final_proy;
	public $periodo;
	public $cod_proyecto;
	public $estado;
	public $id_categoria;

	//Estados de un proyecto
	//1 ==Activo
	//2 ==Finalizado
	//3 ==Eliminado
	//4 ==Pendiente de eliminar
	//5 ==Pendiente de finalizar
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
	// Funcion de listar todos los proyectos con cateforia de perfil con estado 1 de activos
	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM vista_proy WHERE estado = 1 and nom_categoria = 'Perfil de proyecto'
			and year(inicio) >= year(now()) order by personas_beneficiarias desc");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	// Funcion de listar todos los proyectos del año actual sin importar el estado
	public function ListarAll()
	{
		try 
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM vista_proy WHERE nom_categoria = 'Perfil de proyecto'
			and year(inicio) >= year(now()) ");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	// Funcion de listar todos los proyectos asignados a un usuario en especifico
	public function ListarProyectosCorrespondientesAUsuario()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM vista_proy a
										LEFT JOIN responsable_proyecto b ON a.id_proyecto = b.id_proyecto
										LEFT JOIN usuarios c ON c.id_usuario = b.id_responsable
										WHERE c.id_usuario = '".$_SESSION['id_usuario']."'  and a.estado = 1 AND nom_categoria = 'Perfil de proyecto'
										and YEAR(a.Inicio) >= year(NOW()) order BY a.Fin desc");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	// Funcion de listar todos los proyectos con cateforia de perfil con estado 1
	public function ListarFacultades()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM facultad WHERE estado = 1 ");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	//Lista actividades para ser asignadas a un proyecto
public function ListarActividadesPorAsignar()
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

	//Listar proyectos con estado 2 que indica que fueron finalizados
	public function ListarFinalizados()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM vista_proy WHERE estado = 2 and nom_categoria = 'Perfil de proyecto'");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	//Funcion que lista las actividades asignadas al proyecto
	public function ListarActividades($id_proyecto)
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("
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
					GROUP BY A.fecha_fin 
				 	ORDER BY A.fecha_fin ASC	");
			$stm->execute(array($id_proyecto));
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Funcion que lista las actividades asignadas al proyecto
	public function ListarAnexos($id_proyecto)
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("
				SELECT
					nom_proyecto,
					nom_anexo,
					a.ubicacion,
					fecha,
					periodo,
					nom_responsable
					 FROM anexos a
					LEFT JOIN responsable_actividad b ON b.id_responsable_actividad = a.id_res_act
					LEFT JOIN responsable_proyecto c ON c.id_responsable_proyecto = b.id_responsable_proyecto
					LEFT JOIN proyecto d ON d.id_proyecto = c.id_proyecto
					LEFT JOIN usuarios e ON e.id_usuario = c.id_responsable
				WHERE  a.estado = 1 AND d.id_proyecto = ?
				");
			$stm->execute(array($id_proyecto));
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Funcion que lista los ejecutores para asignados los proyectos
	public function ListarEjecutores()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("
				SELECT * FROM proyecto a
				INNER JOIN responsable_proyecto b ON b.id_proyecto =  a.id_proyecto
				INNER JOIN usuarios c ON c.id_usuario = b.id_responsable
				WHERE  a.estado = 1");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
		public function ListarEjecutoresSinAsignar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM usuarios WHERE  estado = 1");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

//Funcion que lista los ejecutores que van a se asignados a un proyecto
	public function ListarResponsables()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM usuarios
					 WHERE  estado = 1");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	//Funcion para listar beneficiarios activos
		public function ListarBeneficiarios()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM beneficiarios  a  WHERE estado = 1");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Funcion para listar comentarios por proyecto
	public function ListarComentarios($id_proyecto)
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("
				SELECT * FROM comentarios a
				INNER JOIN responsable_proyecto b ON b.id_responsable_proyecto = a.id_responsable_proyecto
				LEFT JOIN proyecto c ON c.id_proyecto = b.id_proyecto
				LEFT JOIN usuarios d ON d.id_usuario = b.id_responsable
				WHERE a.estado = 1   and c.id_proyecto =?");
			$stm->execute(array($id_proyecto));

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Funcion para listar categorias de cada proyecto activos
		public function ListarCategoria()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM categoria  a  WHERE estado = 1");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	//Funcion para listar todos los proyecto activos sin importar categoria en estado 1
	public function Ver()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM proyecto WHERE estado = 1");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
		//Funcion que llama los proyecto por su ID
	public function Obtener($id_proyecto)
	{
		try
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM proyecto WHERE id_proyecto = ? ");


			$stm->execute(array($id_proyecto));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
		//Funcion que llama los proyecto por su ID
	public function Obtener3($id_proyecto)
	{
		try
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM proyecto WHERE id_proyecto = ? limit 1");


			$stm->execute(array($id_proyecto));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
	//Funcion que llamama a la vista_proy en base a su ID
	public function Obtener2($id_proyecto)
	{
		try
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM vista_proy WHERE id_proyecto = ? ");
			$stm->execute(array($id_proyecto));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
	//Funcion que llamama a la vista_proy en base a su ID
	public function ObtenerReporte($id_proyecto)
	{
		try
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM vista_proy WHERE id_proyecto = ? ");
			$stm->execute(array($id_proyecto));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

		//Funcion para modificar un proyecto
	public function Actualizar($data)
	{
		try
		{
			$sql = "UPDATE proyecto SET
						id_proyecto          = ?,
						nom_proyecto        = ?,
                        id_facultad        = ?,
						ubicacion            = ?,
						id_beneficiarios            = ?,
						monto            = ?,
						inicio_proy            = ?,
						final_proy            = ?,
						periodo            = ?,
						cod_proyecto            = ?,
						estado            = ?,
						id_categoria = ?
				    WHERE id_proyecto = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                    $data->id_proyecto,
                    $data->nom_proyecto,
                    $data->id_facultad,
                    $data->ubicacion,
                    $data->id_beneficiarios,
                    $data->monto,
                    $data->inicio_proy,
                    $data->final_proy,
                    $data->periodo,
                    $data->cod_proyecto,
                    $data->estado,
                    $data->id_categoria,
                    $data->id_proyecto
					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
	//Funcion que llamama a la vista_proy en base a su ID

	public function ObtenerGastos($id_proyecto)
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


		//Funcion para eliminar proyectos
	public function Eliminar($id_proyecto)
	{
		try
		{
			$stm = $this->pdo
			            ->prepare("UPDATE proyecto a SET a.estado = 3  WHERE  a.id_proyecto = ?");
			$stm->execute(array($id_proyecto));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
		//Funcion para dar por finalizado un proyecto
	//Estados de un proyecto
	//1 ==Activo
	//2 ==Finalizado
	//3 ==Eliminado
	//4 ==Pendiente de eliminar
	//5 ==Pendiente de finalizar
	public function Finalizar($id_proyecto)
	{
		try
		{
			$stm = $this->pdo
			            ->prepare("UPDATE proyecto a SET a.estado = 4   WHERE  a.id_proyecto = ?");
			$stm->execute(array($id_proyecto));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function AprobarFinalizar($id_proyecto)
	{
		try
		{
			$stm = $this->pdo
			            ->prepare("UPDATE proyecto a SET a.estado = 2   WHERE  a.id_proyecto = ?");
			$stm->execute(array($id_proyecto));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function NoAprobarFinalizar($id_proyecto)
	{
		try
		{
			$stm = $this->pdo
			            ->prepare("UPDATE proyecto a SET a.estado = 1   WHERE  a.id_proyecto = ?");
			$stm->execute(array($id_proyecto));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function ListarPendienteFinalizar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM vista_proy WHERE estado = 4 and nom_categoria = 'Perfil de proyecto'
			and year(inicio) >= year(now()) order by personas_beneficiarias desc");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
		//Funcion para dar por finalizado un proyecto
	public function FinalizarActividad($id_responsable_actividad)
	{
		try
		{
			$stm = $this->pdo
			            ->prepare("UPDATE responsable_actividad a SET a.TIPO = 'INACTIVO'  WHERE  a.id_responsable_actividad = ?");
			$stm->execute(array($id_responsable_actividad));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
		//Funcion para modificar un proyecto
   	//Funcion par guardar un nuevo proyecto
		public function Registrar(Proyecto $data)
	{
		try
		{
		$sql = "INSERT INTO proyecto(id_proyecto,nom_proyecto,id_facultad,ubicacion,id_beneficiarios,monto, inicio_proy,final_proy,periodo,cod_proyecto,estado,id_categoria)
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->id_proyecto,
                    $data->nom_proyecto,
                    $data->id_facultad,
                    $data->ubicacion,
                    $data->id_beneficiarios,
                    $data->monto,
                    $data->inicio_proy,
                    $data->final_proy,
                    $data->periodo,
                    $data->cod_proyecto,
                    $data->estado,
                    $data->id_categoria
                )
			);

			     if ($this->pdo->prepare($sql)) {
	        }
	        else {
	            $message = 'Lo sentimos, pero ha ocurrido un problema con la base de datos';
	        }
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
	//Funcion par guardar un nuevo proyecto

}
