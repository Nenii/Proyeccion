<?php
require_once 'database.php';
class Usuarios
{
	private $pdo;

		public $id_usuario;
		public $user;
		public $password;
		public $nombre_usuario;
		public $ubicacion_foto;
		public $email;
		public $nivel;
		public $estado;
		public $Sede_origen;
		

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
public function Listar()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM usuarios ");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
		public function Registrar($data)
	{
		try
		{
			$sql = ("SELECT * FROM  usuarios WHERE
						user          = ?,
						password        = ?");

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->user,
                        $data->password
												

					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
public function Perfil($user)
	{
		try
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM  usuarios WHERE user = ?");
			$stm->execute(array($user));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}


		public function Guardar($data)
		{try
			{
			$sql = "INSERT INTO usuarios(id_usuario,user,password, nombre_usuario, email, estado)
			        VALUES (?, ?, ?, ?, ?, ?)";

			$this->pdo->prepare($sql)
			     ->execute(
					array(
		                $data->id_usuario,
		                $data->user,
		                $data->password,
										$data->nombre_usuario,
		                $data->email,
		                $data->estado
		            )
				);
			} catch (Exception $e)
			{
				die($e->getMessage());
			}
		}
	// Funcion de listar Responsables asignados a un proyecto


	public function Comparar($data)
	{
		try
		{

			$login_user=$data->user;
			$login_password=$data->password;
			$sql = "SELECT * FROM  usuarios WHERE  user = '$login_user' and  password  = '$login_password' LIMIT 1";
			$query = $this->pdo->query($sql);
			if($query->rowCount()>0)
			{
				$datos_usuario = $query->fetch();
				$_SESSION["activo"]="1";
				$_SESSION["id_usuario"]=$datos_usuario["id_usuario"];
				$_SESSION["user"]=$datos_usuario["user"];
				$_SESSION["nombre_usuario"] = $datos_usuario["nombre_usuario"];
				$_SESSION["ubicacion_foto"] = $datos_usuario["ubicacion_foto"];
				$_SESSION["email"]=$datos_usuario["email"];
				$_SESSION["nivel"]=$datos_usuario["nivel"]; //if($_SESSION["nivel"]=="1"){}

			}
			return $query->rowCount();
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
public function ActualizarFoto($data){
try
		{
			$sql = "UPDATE usuarios SET ubicacion_foto = ? WHERE id_usuario = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                    $data->ubicacion_foto
					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
}
}