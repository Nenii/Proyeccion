<?php
require("asserts/class.phpmailer.php");
require("asserts/class.smtp.php");

require_once 'model/ejecutores.php';

class EjecutoresController{
    private $model;

    public function __CONSTRUCT(){
        $this->model = new Ejecutores();
    }

    public function Index(){
        require_once 'view/layout/header.php';
        require_once 'view/ejecutores/ejecutores.php';
        require_once 'view/layout/footer.php';     
    }

    public function Detalle(){ 
     $alm = new Ejecutores();
        if(isset($_REQUEST['id_proyecto'])){
            $alm = $this->model->Obtener($_REQUEST['id_proyecto']);
            $alm = $this->model->ObtenerProyecto($_REQUEST['id_proyecto']);
        }
        require_once 'view/layout/header.php';
        require_once 'view/ejecutores/ejecutores.php';
        require_once 'view/layout/footer.php';
    }
    
    public function Crud(){
        $this->model->Eliminar($_REQUEST['id_proyecto']);
                header('Location: proyecto');
		require_once 'view/ejecutores/ejecutores.php';
    }
    // Asignar ejecutor a un proyecto
    public function Guardar(){
        $alm = new Ejecutores();
        $alm->id_responsable_proyecto;
        $alm->id_proyecto = $_REQUEST['id_proyecto'];
        $alm->id_responsable = $_REQUEST['id_usuario'];
        $alm->estado = 1;
       // var_dump($alm);
        //header('Location: Proyecto');
        // $alm->id_responsable_proyecto > 0 
        //     ? $this->model->Actualizar($alm) :
        $this->model->Registrar($alm);

                echo '<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
                    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
                    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                    <script>
                    $(document).ready(function() {
              swal({
                title: "Registro exitoso",
                  text: "Ejecutor agregado con éxito",
                  type: "success"
                },
                function(){
                  window.location.href = "http://localhost/Proyeccion/home";
              });
              }); </script>' ;
    }
    public function AgregarEjecutor(){
        $alm = new Ejecutores();


    # definimos la carpeta destino
    $carpetaDestino="files/fotos/";
    # si hay algun ubicacion que subir

    if(isset($_FILES["ubicacion_foto"]["name"][0]))
    {
        //var_dump($_FILES["ubicacion_foto"]);
        # recorremos todos los arhivos que se han subido
        for($i=0; $i<count($_FILES["ubicacion_foto"]["name"]); $i++)
        { # si exsite la carpeta o se ha creado
                if(file_exists($carpetaDestino) || @mkdir($carpetaDestino))
                {
                    $origen=$_FILES["ubicacion_foto"]["tmp_name"][$i];
                    $destino=$carpetaDestino.$_FILES["ubicacion_foto"]["name"][$i];
                    # movemos el ubicacion_foto
                    if(@move_uploaded_file($origen, $destino))
                    {
                      echo "<br>".$_FILES["ubicacion_foto"]["name"][$i]." movido correctamente";

                        $alm->id_usuario;
                        $alm->user = $_REQUEST['user'];
                        $alm->password = $_REQUEST['password'];
                        $alm->nombre_usuario = $_REQUEST['nombre_usuario'];
                        $alm->telefono = $_REQUEST['telefono'];
                        $alm->sexo = $_REQUEST['sexo'];
                        $alm->dui = $_REQUEST['dui'];
                        $alm->ubicacion_foto = ($_FILES["ubicacion_foto"]["name"][$i]);
                        $alm->nivel = $_REQUEST['nivel'];
                        $alm->email = $_REQUEST['email'];
                        $alm->Sede_origen = $_REQUEST['Sede_origen'];
                        $alm->estado = 1;
                        //var_dump($alm);
                        //header('Location: Proyecto');
                        $this->model->AgregarEjecutor($alm);
                        echo '<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
                                  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
                                  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                                  <script>
                                  $(document).ready(function() {
                            swal({
                              title: "Registro exitoso",
                              text: "Ejecutor agregado con éxito",
                                type: "success"
                              },
                              function(){
                                window.location.href = "http://localhost/Proyeccion/Home";
                            });
                            }); </script>' ;
                    }else{
                        $message = 'No se ha podido crear la carpeta';
                      echo "<br>No se ha podido mover el ubicacion: ".$_FILES["ubicacion"]["name"][$i];
                    }
                }else{
                    $message = 'No se ha podido crear la carpeta';
                    echo "<br>No se ha podido crear la carpeta: up/".$user;
                }
            }
        }else{
            $message = 'NNo se ha subido ningún registro';
            echo "<br>No se ha subido ningún registro";
        }
}
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id_responsable_proyecto']);
        echo '<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
                  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
                  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                  <script>
                  $(document).ready(function() {
            swal({
              title: "Registro eliminado",
               text: "Ejecutor eliminado con éxito",
                type: "warning"
              },
              function(){
                window.location.href = "http://localhost/Proyeccion/ejecutores";
            });
            }); </script>' ;
    }
}