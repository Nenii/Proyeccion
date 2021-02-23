
 <?php
require_once 'model/usuario.php';
class UsuarioController{
    private $model;

    public function __CONSTRUCT(){
         $this->model = new Usuarios();
    }

    public function Index(){
        require_once 'view/usuario/usuario.php';

    }

    public function Crud(){ 
         $alm = new Usuarios();
        require_once 'view/usuario/register-add.php';
    }
    public function GestionUsuarios(){ 
         $alm = new Usuarios();
        require_once 'view/layout/header.php';
        require_once 'view/usuario/gestionusuarios.php';
        require_once 'view/layout/footer.php';
    }
    public function Perfil(){
        $alm = new Usuarios();
        if(isset($_REQUEST['user'])){
            $alm = $this->model->Perfil($_REQUEST['user']);
            

        }
        require_once 'view/layout/header.php';
        require_once 'view/usuario/perfil.php';
        require_once 'view/layout/footer.php';

        require_once 'view/actividades/model.php';
    }
    public function Registrar(){
        $url =$_REQUEST['id_usuario'];
        $alm = new Usuarios();
        $alm->id_usuario;
        $alm->user = $_REQUEST['user'];
        $alm->password = $_REQUEST['password'];
        $alm->nombre_usuario = $_REQUEST['nombre_usuario'];
        $alm->email = $_REQUEST['email'];
        $alm->estado =1;
        $alm->Sede_origen = $_REQUEST['Sede_origen'];

        $this->model->Guardar($alm);
        var_dump($alm);
        header('Location: usuario');
    }

    public function Guardar(){
         header('Location: index.php');
    }

    public function ActualizarFoto(){
         $alm = new Usuarios();

    # definimos la carpeta destino
    $carpetaDestino="files/fotos/";
    # si hay algun ubicacion_foto que subir
    if(isset($_FILES["ubicacion_foto"]["name"][0]))
    {
        # recorremos todos los arhivos que se han subido
        for($i=0;$i<count($_FILES["ubicacion_foto"]["name"]);$i++)
        {
                # si exsite la carpeta o se ha creado
                if(file_exists($carpetaDestino) || @mkdir($carpetaDestino))
                {
                    $origen=$_FILES["ubicacion_foto"]["tmp_name"][$i];
                    $destino=$carpetaDestino.$_FILES["ubicacion_foto"]["name"][$i];
                    # movemos el ubicacion_foto
                    

                    if(@move_uploaded_file($origen, $destino))
                    {
                        //echo "<br>".$_FILES["ubicacion_foto"]["name"][$i]." movido correctamente";

                            $alm->id_usuario = $_REQUEST['id_usuario'];
                            $alm->ubicacion_foto=($_FILES["ubicacion_foto"]["name"][$i]);
                           
                             $this->model->ActualizarFoto($alm);
                            echo '<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
                                      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
                                      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                                      <script>
                                      $(document).ready(function() {
                                swal({
                                  title: "Registro exitoso",
                                   text: "Documento guardado con éxito",
                                    type: "success"
                                  },
                                  function(){
                                    window.location.href = "http://localhost/Proyeccion/home";
                                });
                                }); </script>' ;
                 }else{
                      echo "<br>No se ha podido mover el ubicacion_foto: ".$_FILES["ubicacion_foto"]["name"][$i];
                    }
                }else{
                    echo "<br>No se ha podido crear la carpeta: up/".$user;
                }
            }
        }else{
            echo "<br>No se ha subido ningún registro";
        }
    
    }
    public function login()
    {
        $alm = new Usuarios();

        $alm->user = $_REQUEST['user'];
        $alm->password = $_REQUEST['password'];


        //var_dump($alm); //EQUIVALENTE print_r

        //$alm->user > 0 ? $this->model->Comparar($alm) : $this->model->Registrar($alm);
      //NO ES SUGERIBLE HACER ESTO DE ARRIBA...PORQUE CREARA USUARIOS CADA VEZ QUE UN USUARIO NO EXISTA

       $comprobacion_usuario = $alm->Comparar($alm);
       if($comprobacion_usuario>0){
          header('Location: Home');
         
       }
       else
       {
         echo '<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script>jQuery(function(){swal("¡Credenciales incorrectas!", "Verifique las credenciales ingresadas o consulte con el administrador de la herramienta", "error");});</script>';
        }

    }

    public function Eliminar(){
        header('Location: index');
    }
}
