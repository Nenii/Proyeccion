<?php
require_once 'model/proyecto.php';

class DetalleProyectoController{
      private $model;

   public function __CONSTRUCT(){
         $this->model = new Proyecto();
    }
    
    public function Index(){
        require_once 'view/layout/header.php';
        require_once 'view/detalleproyecto/detalleproyecto.php';
        require_once 'view/layout/footer.php';
        require_once 'view/layout/modal.php';
    }
    
    public function Crud(){
   
        require_once 'view/detalleproyecto/detalleproyecto.php';
    }
    
    public function Guardar(){
        
        header('Location: index.php');
    }
    
    public function Eliminar(){
        header('Location: index.php');
    }
}