<?php
require_once 'model/anexos.php';
class AnexosController{
public $model1;
    
    public function __CONSTRUCT(){ 
        $this->model1 = new Anexos();
    }
    
    public function Index(){
        require_once 'view/layout/header.php';
        require_once 'view/anexos/index.php';
        require_once 'view/layout/footer.php';       
    }
    public function Detalle(){
     $alm = new Anexos();
        
        if(isset($_REQUEST['id_proyecto'])){
            $alm = $this->model1->ListarEjecutorAsignados($_REQUEST['id_proyecto']);
            $alm = $this->model1->Obtener($_REQUEST['id_proyecto']);
        }
        require_once 'view/layout/header.php';
        require_once 'view/anexos/anexos.php';
        require_once 'view/layout/footer.php';
    }
// Vista previa del documento anexo
    public function DetalleAnexo(){
     $alm = new Anexos();
        
        if(isset($_REQUEST['id_anexo'])){
            $alm = $this->model1->Obtener($_REQUEST['id_anexo']);
        }
        require_once 'view/layout/header.php';
        require_once 'view/anexos/detalle-anexo.php';
        require_once 'view/layout/footer.php';
    }

    public function Guardar(){
    $alm = new Anexos();

    # definimos la carpeta destino
    $carpetaDestino="files/anexos/";

    # si hay algun ubicacion que subir
    if(isset($_FILES["ubicacion"]["name"][0]))
    {
        # recorremos todos los arhivos que se han subido
        for($i=0;$i<count($_FILES["ubicacion"]["name"]);$i++)
        {
                # si exsite la carpeta o se ha creado
                if(file_exists($carpetaDestino) || @mkdir($carpetaDestino))
                {
                    $origen=$_FILES["ubicacion"]["tmp_name"][$i];
                    $destino=$carpetaDestino.$_FILES["ubicacion"]["name"][$i];
                    # movemos el ubicacion
                    

                    if(@move_uploaded_file($origen, $destino))
                    {
                        //echo "<br>".$_FILES["ubicacion"]["name"][$i]." movido correctamente";

                            $alm->id_anexo;
                            $alm->nom_anexo = $_REQUEST['nom_anexo'];
                            $alm->ubicacion=($_FILES["ubicacion"]["name"][$i]);
                            $alm->fecha;
                            $alm->descripcion = $_REQUEST['descripcion'];
                            $alm->estado =1;
                             $alm->id_res_proy = $_REQUEST['id_res_proy'];
                             //var_dump($alm);
                             $this->model1->Registrar($alm);
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
                 }else{
                      echo "<br>No se ha podido mover el ubicacion: ".$_FILES["ubicacion"]["name"][$i];
                    }
                }else{
                    echo "<br>No se ha podido crear la carpeta: up/".$user;
                }
            }
        }else{
            echo "<br>No se ha subido ningún registro";
        }
    

    }
   
    public function Eliminar(){
         $this->model1->Eliminar($_REQUEST['id_anexo']);
       echo '<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script>
            $(document).ready(function() {
      swal({
        title: "Registro exitoso",
         text: "Documento eliminado con éxito",
          type: "error"
        },
        function(){
          window.location.href = "http://localhost/Proyeccion/home";
      });
      }); </script>' ;

    }


}