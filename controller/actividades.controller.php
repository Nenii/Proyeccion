<?php
require_once 'model/actividades.php';
class ActividadesController{
public $model1;

    public function __CONSTRUCT(){
        $this->model1 = new Actividades();
    }
    public function Index(){
        require_once 'view/layout/header.php';
        require_once 'view/actividades/actividades.php';
        require_once 'view/layout/footer.php';
    }
    public function Crud(){
    $alm = new Actividades();
        if(isset($_REQUEST['id_proyecto'])){
            $alm = $this->model1->Obtener($_REQUEST['id_proyecto']);
            $alm = $this->model1->ListarActividadesTOP($_REQUEST['id_proyecto']);
        }
		require_once 'view/actividades/actividades.php';
    }
    public function Detalle(){
     $alm = new Actividades();

        if(isset($_REQUEST['id_proyecto'])){
            $alm = $this->model1->ListarEjecutor($_REQUEST['id_proyecto']);
            $alm = $this->model1->ListarEjecutorAsignados($_REQUEST['id_proyecto']);//Lista los ejecutores asignados al proyecto ObtenerFinalizados
            $alm = $this->model1->Obtener($_REQUEST['id_proyecto']);
            $alm = $this->model1->ObtenerFinalizados($_REQUEST['id_proyecto']);
            $alm = $this->model1->Estados_Actividad($_REQUEST['id_proyecto']);
        }
        require_once 'view/layout/header.php';
        require_once 'view/actividades/actividades.php';
        require_once 'view/actividades/model.php';
        require_once 'view/layout/footer.php';

    }
    public function Guardar(){
        $url =$_REQUEST['id_proyecto'];
        $alm = new Actividades();
        $alm->id_actividades;
        $alm->nom_actividad = $_REQUEST['nom_actividad'];
        $alm->objetivo = $_REQUEST['objetivo'];
        $alm->descripcion = $_REQUEST['descripcion'];
        $alm->estado =1;
        $alm->id_actividades > 0
            ? $this->model1->Actualizar($alm)
            : $this->model1->Registrar($alm);
            var_dump($alm);

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
    }

    public function Gantt(){

        require_once 'view/layout/header.php';
        require_once 'view/actividades/gantt.php';
        require_once 'view/layout/footer.php';
    }
        //
public function Asignar(){
        $alm = new Actividades();
        $alm->id_responsable_actividad;
        $alm->id_actividad = $_REQUEST['id_actividad'];
        $alm->id_responsable_proyecto = $_REQUEST['id_responsable_proyecto'];
        $alm->fecha_inicio = $_REQUEST['fecha_inicio'];
        $alm->fecha_fin = $_REQUEST['fecha_fin'];
        $alm->TIPO =  $_REQUEST['TIPO'];
        $alm->descripcion = $_REQUEST['descripcion'];
        $alm->estado =1;
        //var_dump($alm);
        $this->model1->RegistrarAct($alm);
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
    

        // header('Location: Location: ?c=actividades&a=Detalle&id_proyecto');
    }

public function Finalizar(){
    $url =$_REQUEST['id_responsable_actividad'];
    //var_dump($url);
    $this->model1->Finalizar($_REQUEST['id_responsable_actividad']);
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
            window.location.href = "http://localhost/Proyeccion/home";
        });
        }); </script>' ;
    }

    public function Eliminar(){
        $this->model1->Eliminar($_REQUEST['id_responsable_actividad']);
        header('Location: Location: ?c=actividades&a=Detalle&id_proyecto');
    }
     public function EliminarResponsable(){
        $this->model1->EliminarResponsable($_REQUEST['id_actividad'], $_REQUEST['id_responsable_proyecto ']);
        header('Location: actividades');
    }
}
