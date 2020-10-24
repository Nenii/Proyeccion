<?php
//iniciamos sesion
session_start();

if (empty($url[0])) {
    # code...
}

    // Todo esta lógica hara el papel de un FrontController
    $url = isset($_GET['url']) ? $_GET['url']: null;

      $comprueba = explode("=",@$_GET['url']);
      if(@$comprueba["1"]=="salir"){
          $_SESSION=NULL;
          unset($_SESSION);
          session_destroy();
          header("location:index.php");
          exit;
      }


    if(isset($_GET["c"])){
      if($_GET["c"]=="usuario"){
//        echo "Comprobar usuario";
        $controller = $_GET["c"];
        require_once "controller/$controller.controller.php";

        $controller = ucwords($controller) . 'Controller';
        $controller = new $controller;
        // Llama la accion
        $accion = $_GET["a"];
        call_user_func( array( $controller, $accion ) );
      }

    }



    //! Validar si exite una sesion
  //  if(empty($url[0])){
  if(!isset($_SESSION["id_usuario"])){ //SINO EXISTE LA VARIALE DE SESSION ID_USUARIO, envia AL LOGIN
    $controller = 'usuario';
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->Index();
        } elseif(!isset($_GET['c'])) {
    //echo $url;
    //var_dump($_GET);
    $controller = $url;
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->Index();
    
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['c']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';

    // Instanciamos el controlador
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;

    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}
?>
