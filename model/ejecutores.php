<?php
require_once 'database.php';
class Ejecutores
{
	private $pdo;

    	// public $id_usuario;
     //    public $user ;
     //    public $password ;
     //    public $nombre_usuario ;
     //    public $telefono ;
     //    public $sexo;
     //    public $dui ;
     //    public $ubicacion_foto;
     //    public $nivel ;
     //    public $email ;
     //    public $Sede_origen;
     //    public $estado;
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

			$stm = $this->pdo->prepare("SELECT 
	a.user,
	a.nombre_usuario,
	a.telefono,
	a.ubicacion_foto,
	a.nivel,
	a.email,
	a.Sede_origen,
	c.nom_proyecto
	 FROM usuarios a
	LEFT JOIN responsable_proyecto b ON b.id_responsable = a.id_usuario
	LEFT JOIN proyecto c ON c.id_proyecto = b.id_proyecto where a.estado = 1 ");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	// Funcion de listar que contiene el query 
	public function ListarProyectos() 
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM proyecto WHERE estado = 1 ");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
		public function ListarEjecutores()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("
				SELECT * FROM proyecto a  				
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

			$stm = $this->pdo->prepare("SELECT * FROM usuarios WHERE  estado = 1 and nivel  = 0");
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
			          ->prepare("SELECT DISTINCT a.id_responsable_proyecto,
								a.id_proyecto,
								a.id_responsable,
								e.nom_responsable,
								d.nom_proyecto,
								d.periodo,
								CONCAT('PSO',d.cod_proyecto) AS Codigo,
								a.estado
								 FROM responsable_proyecto a
								LEFT JOIN usuarios e ON e.id_usuario = a.id_responsable
								LEFT JOIN proyecto d ON d.id_proyecto = a.id_responsable
								 WHERE a.id_proyecto = ?  AND a.estado = 1  ");
			          
			$stm->execute(array($id_proyecto));
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
 

	public function ObtenerProyecto()
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM proyecto 
								 WHERE estado = 1 and periodo >= year(now()) AND id_categoria = 6 ");
			          
			$stm->execute(array($id_proyecto));
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function AgregarEjecutor(Ejecutores $data)
	{
		try 
		{
		$sql = "INSERT INTO usuarios (id_usuario,user,password,nombre_usuario,telefono,sexo,dui,ubicacion_foto,nivel,email,Sede_origen,estado ) 
		        VALUES (?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?)";
		        var_dump($sql);
		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->id_usuario,
                    $data->user, 
                    $data->password,
                    $data->nombre_usuario, 
                    $data->telefono, 
                    $data->sexo,  
                    $data->dui,  
                    $data->ubicacion_foto,  
                    $data->nivel,  
                    $data->email,  
                    $data->Sede_origen,  
                    $data->estado 
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	// Asignar un docente ejecutor a un proy
	public function Registrar(Ejecutores $data)
	{
		try 
		{
		$sql = "INSERT INTO responsable_proyecto (id_responsable_proyecto,id_proyecto,id_responsable,estado) 
		        VALUES (?, ?, ?, ?)";
		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->id_responsable_proyecto,
                    $data->id_proyecto, 
                    $data->id_responsable, 
                    $data->estado
                )
			);
		        var_dump($sql);
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
		$sql = "INSERT INTO responsable_proyecto (id_responsable_proyecto,id_proyecto,id_responsable,estado) 
		        VALUES (?, ?, ?, ?)";
		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->id_responsable_proyecto,
                    $data->id_proyecto, 
                    $data->id_responsable, 
                    $data->estado
                )
			);
		        var_dump($sql);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}  
			//Funcion para eliminar proyectos
	public function Eliminar($id_responsable_proyecto)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE responsable_proyecto WHERE  id_responsable_proyecto = ?");			          

			$stm->execute(array($id_responsable_proyecto));
			//var_dump($stm);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}