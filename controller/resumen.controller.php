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
        $alm = new Resumen();
        $alm->id_resumen;
        $alm->nom_actividad = $_REQUEST['nom_actividad'];
        $alm->objetivo = $_REQUEST['objetivo'];
        $alm->descripcion = $_REQUEST['descripcion'];
        $alm->estado =1;
        $alm->id_actividades > 0
            ? $this->model1->Actualizar($alm)
            : $this->model1->Registrar($alm);
            var_dump($alm);

         echo '<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
                                      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
                                      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                                      <script>
                                      $(document).ready(function() {
                                swal({
                                  title: "Registro exitoso",
                                   text: "Documento guardado con éxito",
                                    type: "success"
                                  },
                                  function(){
                                    window.location.href = "http://localhost/Proyeccion/home";
                                });
                                }); </script>' ;
    }
    
    public function Eliminar(){
        header('Location: resumen');
    }
}