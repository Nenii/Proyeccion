<?php
require_once 'model/proyecto.php';

class HomeController{
  private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Proyecto();
    }
    public function Index(){
        require_once 'view/layout/header.php';
        require_once 'view/home/index.php';
        require_once 'view/layout/footer.php';
    }
    public function Crud(){
        require_once 'view/home/index.php';
    }
    public function Imprimir(){
        require_once 'view/home/Imprimir.php';
    }
    public function ImprimirPeriodoActual(){
        // $alm = new Proyecto();
        // if(isset($_REQUEST['id_proyecto'])){
        //     $alm = $this->model->ObtenerReporte($_REQUEST['id_proyecto']);
        // }
            require_once 'view/home/ImprimirYear.php';
    }
    public function Guardar(){
        header('Location: index.php');
    }
    public function Eliminar(){
        header('Location: index.php');
    }
     public function Terminados(){
        require_once 'view/home/terminados.php';
    }
}

