<?php
require_once 'model/agendas.php';
class AgendaController{
 public $model1;
 
    public function __CONSTRUCT(){
        $this->model1 = new Agenda();
    }
    
    public function Index(){
        require_once 'view/layout/header.php';
        require_once 'view/agenda/agenda.php';
        require_once 'view/layout/footer.php';       
    }
    
    public function Crud(){   
		require_once 'view/ agenda/agenda.php';
    }
    
    public function Guardar(){        
        header('Location: agenda.php');
    }
    
    public function Eliminar(){
        header('Location: agenda.php');
    }
 
}