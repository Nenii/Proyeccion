<?php 

require_once 'model/res_act.php';
class Res_actController{
public $model1;
    
    public function __CONSTRUCT(){ 

        $this->model1 = new Res_Act();
    }
    
    public function Index(){
    }
    

public function Guardar(){
        $alm = new Res_Act();
        
        $alm->id_responsable_actividad;
        $alm->id_actividad = $_REQUEST['id_actividad'];
        $alm->id_responsable_proyecto = $_REQUEST['id_responsable_proyecto'];
        $alm->fecha_inicio = $_REQUEST['fecha_inicio'];
        $alm->fecha_fin = $_REQUEST['fecha_fin'];
        $alm->TIPO =  $_REQUEST['TIPO'];
        $alm->descripcion = $_REQUEST['descripcion'];
        $alm->estado = $_REQUEST['estado'];
        var_dump($alm);
        $alm->id_actividad > 0 
            ? $this->model1->Actualizar($alm)
            : $this->model1->Registrar($alm);
            echo'<script type="text/javascript">
            alert("Tarea Guardada");
            window.location.href="actividades";
            </script>';

            //echo "<script>$('#myModal').modal('show');</script>";
        //header('Location: actividades');
    }
    public function Eliminar(){
        header('Location: home');
    }


}
 ?>