<?php
require_once 'model/beneficiarios.php';
class BeneficiarioController{
     private $model;
    
    public function __CONSTRUCT(){        
        $this->model = new Beneficiarios();
    }
    
    public function Index(){
        require_once 'view/layout/header.php';
        require_once 'view/beneficiario/beneficiario.php';
        require_once 'view/layout/footer.php';
       
    }
    public function Imprimir(){
        require_once 'view/beneficiario/imprimir.php';       
    }
    
    public function Crud(){
   
		require_once 'view/beneficiario/beneficiario.php';
    }
    
    public function Guardar(){
        $alm = new Beneficiarios();        
        $alm->id_beneficiarios;
        $alm->nom_comunidad_ben = $_REQUEST['nom_comunidad_ben'];
        $alm->n_personas_ben = $_REQUEST['n_personas_ben'];
        $alm->estado =1;
        $alm->id_beneficiarios > 0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);
          //  var_dump($alm);
            echo '<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
                  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
                  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                  <script>
                  $(document).ready(function() {
            swal({
              title: "Registro exitoso",
               text: "Beneficiario agregado con éxito",
                type: "success"
              },
              function(){
                window.location.href = "http://localhost/Proyeccion/Home?c=Proyecto&a=Crud";
            });
            }); </script>' ;
      
    }
    
    public function Eliminar(){
        header('Location: home');
    }
}