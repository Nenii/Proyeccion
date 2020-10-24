<?php

class ErroresController{

   public function __CONSTRUCT(){
    }
    
    public function Index(){
        require_once 'view/layout/header.php';
        require_once 'view/errores/index.php';
        require_once 'view/layout/footer.php';       
    }
}


?>