<?php
require_once 'model/memorias.php';

class MemoriasController{
    private $model;
    

    public function __CONSTRUCT(){
        $this->model = new Memorias();
    }
    
    public function Index(){
        require_once 'view/layout/header.php';
        require_once 'view/memorias/memorias.php';
        require_once 'view/layout/footer.php';
       
    }
    
    public function Crud(){
   
		require_once 'view/memorias/memorias.php';
    }
    
    public function Guardar(){
        
        header('Location: index.php');
    }
    
    public function Eliminar(){
        header('Location: index.php');
    }
}