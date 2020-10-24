<?php
require_once 'model/MINED.php';
class MINEDController{
    private $model;

    public function __CONSTRUCT(){
        
        $this->model = new MINED();
    }
    
    public function Index(){
        require_once 'view/layout/header.php';
        require_once 'view/MINED/MINED.php';  
        require_once 'view/layout/footer.php';       
    }
    
    public function Crud(){
   
		require_once 'view/MINED/MINED.php';
    }
    
    public function Guardar(){
        
        header('Location: MINED');
    }
    
    public function Eliminar(){
        header('Location: MINED');
    }
}

?>