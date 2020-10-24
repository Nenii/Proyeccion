<?php
require_once 'model/facultades.php';
class FacultadesController{
 public $model;
 
    public function __CONSTRUCT(){
        $this->model = new Facultades();
    }
    
    public function Index(){
        require_once 'view/layout/header.php';
        require_once 'view/facultades/facultades.php';
        require_once 'view/layout/footer.php';       
    }
    
    public function Crud(){   
        require_once 'view/facultades/facultades.php';
    }

}


// <?php
// require_once 'model/facultades.php';
// class FacultadesController{
//     private $model;
    
//     public function __CONSTRUCT(){
//         $this->model = new Facultades();
//     }
//        public function Index(){
//         require_once 'view/layout/header.php';
//         require_once 'view/facultades/facultades.php';
//         require_once 'view/layout/footer.php'; 
//     }    
  
//     public function GuardarFacultad(){
//         $alm = new Facultades();
//         $alm->id_proy_facultad;
//         $alm->id_proyecto  = $_REQUEST['id_proyecto'];
//         $alm->id_facultad  = $_REQUEST['id_facultad'];
//         $alm->estado = 1;
//         var_dump($alm);
//         $alm->id_proy_facultad > 0 
//             ? $this->model->Actualizar($alm)
//             : $this->model->RegistrarFacultad($alm);
//             // ?  $this->model->RegistrarFacultad($alm);
//         //header('Location: Proyecto');
//     }
// }