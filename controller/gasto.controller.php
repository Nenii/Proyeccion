<?php
require_once 'model/gasto.php';

class GastoController{
    private $model;
    
   public function __CONSTRUCT(){
        $this->model = new Gasto();
    }
    
    public function Index(){
        require_once 'view/layout/header.php';
        require_once 'view/gasto/gasto.php';
        require_once 'view/layout/footer.php';
    }
    public function Crud(){   
		require_once 'view/gasto/gasto.php';
    }
    
    public function Detalle(){
     $alm = new Gasto();
        
        if(isset($_REQUEST['id_proyecto'])){
            $alm = $this->model->Obtener($_REQUEST['id_proyecto']);
        }        
            // require_once 'view/layout/header.php';
        require_once 'view/gasto/detalle-gastos.php';
        require_once 'view/layout/footer.php';
    }

    public function DetalleGastos(){
     $alm1 = new Gasto();
        
       // if(isset($_REQUEST['id_proyecto'])){
            $alm1 = $this->model->ObtenerGastos($_REQUEST['id_proyecto']);
       // }
        
        require_once 'view/layout/header.php';
        require_once 'view/gasto/detalle-gastos.php';
        require_once 'view/layout/footer.php';
    }
    
    public function Guardar(){
        $alm1 = new Gasto();
        $alm1->id_gasto;
        $alm1->fecha = $_REQUEST['fecha'];
        $alm1->monto = $_REQUEST['monto'];
        $alm1->id_res_act = $_REQUEST['id_res_act'];
        $alm1->descripcion = $_REQUEST['descripcion'];
        $alm1->tipo = "ACTIVO";
        $alm1->estado =1;
        $alm1->id_gasto > 0 
            ? $this->model->Actualizar($alm1)
            : $this->model->Registrar($alm1);
            var_dump($alm1);
        header('Location: home');
    }
    public function Imprimir(){
        
        require_once 'view/gasto/imprimir.php';
    }
    
    public function Eliminar(){
        header('Location: index.php');
    }
}