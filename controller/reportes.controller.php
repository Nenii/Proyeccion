   <?php

class ReportesController{
     public function __CONSTRUCT(){

    }
    public function Index(){
        require_once 'view/layout/header.php';
        require_once 'view/reportes/reportes.php';
        require_once 'view/layout/footer.php';
    }
    public function Crud(){
		require_once 'view/reportes/reportes.php';
    }
    public function Guardar(){
        header('Location: reportes');
    }
    public function Eliminar(){
        header('Location: reportes');
    }
}