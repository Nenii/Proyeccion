<?php
require_once 'model/boletin.php';

class BoletinController{ 
  private $model;   

    public function __CONSTRUCT(){
        $this->model = new Boletin();
    }
    
    public function Index(){
        require_once 'view/layout/header.php';
        require_once 'view/boletin/boletin.php';
        require_once 'view/layout/footer.php';       
    }
    
    public function Crud(){
   		require_once 'view/ boletin/boletin.php';
    }
    
    public function Guardar(){
        
        header('Location: boletin.php');
    }
    
    public function Eliminar(){
        header('Location: boletin.php');
    }
}