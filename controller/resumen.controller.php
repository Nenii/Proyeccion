   <?php
require_once 'model/resumen.php';

class ResumenController{
 public $model1;
 
     public function __CONSTRUCT(){
        $this->model1 = new Resumen();
    }
    
    public function Index(){
        require_once 'view/layout/header.php';
        require_once 'view/resumen/resumen.php';
        require_once 'view/layout/footer.php';
       
    }
    
    public function Crud(){
   
		require_once 'view/resumen/resumen.php';
    }
    
    public function Guardar(){
        
        header('Location: resumen');
    }
    
    public function Eliminar(){
        header('Location: resumen');
    }
}