<?php

require_once 'model/proyecto.php';
$message = '';
class ProyectoController{
    private $model;

    public function __CONSTRUCT(){
        $this->model = new Proyecto();
    }
    public function Index(){
       require_once 'view/layout/header.php';
       require_once 'view/proyecto/proyecto.php';
       require_once 'view/layout/footer.php';
       
    }
    public function Imprimir(){
       require_once 'view/layout/header.php';
       require_once 'view/proyecto/ImprimirProyecto.php';
       require_once 'view/layout/footer.php';
    }
    public function ImprimirReporte(){
        $alm = new Proyecto();
        if(isset($_REQUEST['id_proyecto'])){
            $alm = $this->model->ObtenerReporte($_REQUEST['id_proyecto']);
        }
            require_once 'view/detalleproyecto/Imprimir.php';
    }

    public function Edit(){
     $alm = new Proyecto();
        if(isset($_REQUEST['id_proyecto'])){

            $alm = $this->model->Obtener2($_REQUEST['id_proyecto']);


        }
        require_once 'view/layout/header.php';
        require_once 'view/proyecto/proyecto-edit.php';
        require_once 'view/layout/footer.php';
    }
    public function Crud(){
     $alm = new Proyecto();
        if(isset($_REQUEST['id_proyecto'])){
            $alm = $this->model->Obtener($_REQUEST['id_proyecto']);
            $alm = $this->model->Obtener3($_REQUEST['id_proyecto']);
            //Lista las actividades realizadas en este proyecto
            $alm = $this->model->ListarActividades($_REQUEST['id_proyecto']);
            //Lista los comentarios realizados al proyecto
            $alm = $this->model->ListarComentarios($_REQUEST['id_proyecto']);
            //Lista los ejecutores asignados al proyecto
            $alm = $this->model->ListarEjecutorAsignados($_REQUEST['id_proyecto']);
            //Lista los ejecutores asignados al proyecto
            $alm = $this->model->ObtenerGastos($_REQUEST['id_proyecto']);

            $alm = $this->model->Obtener2($_REQUEST['id_proyecto']);


        }
        require_once 'view/layout/header.php';
		require_once 'view/proyecto/proyecto-add.php';
        require_once 'view/layout/footer.php';
    }
    public function Detalle(){
     $alm = new Proyecto();

        if(isset($_REQUEST['id_proyecto'])){
            $alm = $this->model->Obtener2($_REQUEST['id_proyecto']);
        }
       require_once 'view/layout/header.php';
       require_once 'view/detalleproyecto/detalleproyecto.php';
       require_once 'view/layout/footer.php';
    }

    public function Guardar(){
        $alm = new Proyecto();

    # definimos la carpeta destino
    $carpetaDestino="files/";
    # si hay algun ubicacion que subir

    if(isset($_FILES["ubicacion"]["name"][0]))
    {
        //var_dump($_FILES["ubicacion"]);
        # recorremos todos los arhivos que se han subido
        for($i=0; $i<count($_FILES["ubicacion"]["name"]); $i++)
        { # si exsite la carpeta o se ha creado
                if(file_exists($carpetaDestino) || @mkdir($carpetaDestino))
                {
                    $origen=$_FILES["ubicacion"]["tmp_name"][$i];
                    $destino=$carpetaDestino.$_FILES["ubicacion"]["name"][$i];
                    # movemos el ubicacion
                    if(@move_uploaded_file($origen, $destino))
                    {
                        echo "<br>".$_FILES["ubicacion"]["name"][$i]." movido correctamente";
                            
                            $alm->id_proyecto;
                            $alm->nom_proyecto = $_REQUEST['nom_proyecto'];
                            $alm->ubicacion=($_FILES["ubicacion"]["name"][$i]);
                            $alm->id_beneficiarios = $_REQUEST['id_beneficiarios'];
                            $alm->monto = $_REQUEST['monto'];
                            $alm->inicio_proy = $_REQUEST['inicio_proy'];
                            $alm->final_proy = $_REQUEST['final_proy'];
                            $alm->periodo = $_REQUEST['periodo'];
                            $alm->cod_proyecto = $_REQUEST['cod_proyecto'];
                            $alm->estado = 1;
                                                      
                            $alm->id_categoria = $_REQUEST['id_categoria'];
                            $alm->id_facultad = $_REQUEST['id_facultad'];
                            //var_dump($alm);

                            
                            $this->model->Registrar($alm);
 
                            echo '<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
                                      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
                                      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                                      <script>
                                      $(document).ready(function() {
                                swal({
                                  title: "Registro exitoso",
                                   text: "Proyecto guardado con éxito",
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

    public function Actualizar(){
        $alm = new Proyecto();
    # definimos la carpeta destino
    $carpetaDestino="files/";
    # si hay algun ubicacion que subir

    if(isset($_FILES["ubicacion"]["name"][0]))
    {
        //var_dump($_FILES["ubicacion"]);
        # recorremos todos los arhivos que se han subido
        for($i=0; $i<count($_FILES["ubicacion"]["name"]); $i++)
        { # si exsite la carpeta o se ha creado
                if(file_exists($carpetaDestino) || @mkdir($carpetaDestino))
                {
                    $origen=$_FILES["ubicacion"]["tmp_name"][$i];
                    $destino=$carpetaDestino.$_FILES["ubicacion"]["name"][$i];
                    # movemos el ubicacion
                    if(@move_uploaded_file($origen, $destino))
                    {
                        echo "<br>".$_FILES["ubicacion"]["name"][$i]." movido correctamente";

                            $alm->id_proyecto = $_REQUEST['id_proyecto'];;
                            $alm->nom_proyecto = $_REQUEST['nom_proyecto'];
                            $alm->id_facultad = $_REQUEST['id_facultad'];
                            $alm->ubicacion=($_FILES["ubicacion"]["name"][$i]);
                            $alm->id_beneficiarios = $_REQUEST['id_beneficiarios'];
                            $alm->monto = $_REQUEST['monto'];
                            $alm->inicio_proy = $_REQUEST['inicio_proy'];
                            $alm->final_proy = $_REQUEST['final_proy'];
                            $alm->periodo = $_REQUEST['periodo'];
                            $alm->cod_proyecto = $_REQUEST['cod_proyecto'];
                            if ($alm->estado == '') {
                                $alm->estado = 1 ;
                            }else{
                                $alm->estado = $_REQUEST['estado'];
                            };
                            $alm->id_categoria = $_REQUEST['id_categoria'];
                            var_dump($alm);
                            //$this->model->Registrar($alm);

                            $this->model->Actualizar($alm);

                        echo '<script language="javascript">alert("Documento cargado con exito");</script>'; ;
                       header('Location: home');
                 }else{
                      echo "<br>No se ha podido mover el ubicacion: ".$_FILES["ubicacion"]["name"][$i];
                    }
                }else{
                    echo "<br>No se ha podido crear la carpeta: up/".$user;
                }
            }
        }else{
            echo "<br>No se ha subido ningún registro";
        }
    }

    public function GuardarFacultad(){
        $alm = new Proyecto();
        $alm->id_proy_facultad  ;
        $alm->id_proyecto  = $_REQUEST['id_proyecto '];
        $alm->id_facultad  = $_REQUEST['id_facultad '];
        $alm->estado = $_REQUEST['estado'];
        var_dump($alm);
        $alm->id_proyecto > 0
            ? $this->model->ActualizarFacultad($alm)
            : $this->model->RegistrarFacultad($alm);
         header('Location: Proyecto');      
    }
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id_proyecto']);
        echo '<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
                                      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
                                      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                                      <script>
                                      $(document).ready(function() {
                                swal({
                                  title: "Registro exitoso",
                                   text: "Proyecto eliminado con éxito",
                                    type: "error"
                                  },
                                  function(){
                                    window.location.href = "http://localhost/Proyeccion/Home";
                                });
                                }); </script>' ;
    }
    public function Finalizar(){
        $this->model->Finalizar($_REQUEST['id_proyecto']);
        echo '<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
                                      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
                                      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                                      <script>
                                      $(document).ready(function() {
                                swal({
                                  title: "Proyecto enviado a revisión",
                                   text: "Enviado para aprobar finalización",
                                    type: "info"
                                  },
                                  function(){
                                    window.location.href = "http://localhost/Proyeccion/Home";
                                });
                                }); </script>' ;
    }

    public function FinalizarActividad(){
        $this->model->FinalizarActividad($_REQUEST['id_responsable_actividad']);
        header('Location: home');
    }
    public function AprobarFinalizar(){
            $alm = $this->model->AprobarFinalizar($_REQUEST['id_proyecto']);
        echo '<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
                                      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
                                      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                                      <script>
                                      $(document).ready(function() {
                                swal({
                                  title: "Proyecto finalizado",
                                   text: "Finalización de proyecto exitosa",
                                    type: "success"
                                  },
                                  function(){
                                    window.location.href = "http://localhost/Proyeccion/Home";
                                });
                                }); </script>' ;
    }
    public function NoAprobar(){
            $alm = $this->model->NoAprobarFinalizar($_REQUEST['id_proyecto']);
                   echo '<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
                                      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
                                      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                                      <script>
                                      $(document).ready(function() {
                                swal({
                                  title: "Proyecto no aprobado",
                                   text: "Enviado nuevamente al ejecutor",
                                    type: "info"
                                  },
                                  function(){
                                    window.location.href = "http://localhost/Proyeccion/Home";
                                });
                                }); </script>' ;
    }
}
