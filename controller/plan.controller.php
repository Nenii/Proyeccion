<?php
require_once 'model/plan.php';

class PlanController{
  private $model;
    

    public function __CONSTRUCT(){
        $this->model = new Plan();
    }
    public function Index(){
        require_once 'view/layout/header.php';
        require_once 'view/plan/plan.php';
        require_once 'view/layout/footer.php';
       
    }
    
    public function Crud(){
   
		require_once 'view/plan/plan.php';
    }
    
    public function Guardar(){
        
        header('Location: plan.php');
    }
    
    public function Eliminar(){
        header('Location: plan.php');
    }
}