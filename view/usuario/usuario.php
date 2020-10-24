<!DOCTYPE html>
<html lang="es">
<head>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Servicio Social Estudiantil | UGB</title>
  <link href="asserts/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="icon" type="image/png" href="asserts/img/Logo_UGB.png" />
  <link href="asserts/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

  <div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                  <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"><img style="width: 105%" src="asserts/img/ugb.jpg">
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                  <h1 class=" text-gray-900">Bienvenid@s !</h1><span>Proyeccion Social UGB</span>
                                </div>
                                <form class="user"  method="post" action="?c=usuario&a=login">
                                    <div class="form-group">
                                      <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="user" aria-describedby="User" placeholder="Escriba su usuario" required>
                                    </div>
                                    <div class="form-group">
                                      <input type="password" class="form-control form-control-user" required id="exampleInputPassword" name="password" placeholder="Escriba su contraseña">
                                    </div>
                                    <div class="form-group">
                                      <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" id="customCheck">
                                        <label class="custom-control-label" for="customCheck">Recuérdame</label>
                                      </div>
                                    </div>
                                    <input type="submit"class="btn btn-primary btn-user btn-block" name="login" value="Iniciar sesión">


                                    <hr>
                                    <p class="m-0 font-weight-bold text-primary"><i class="fas fa-recycle"></i> Recuerda siempre poner la basura en su lugar. </p>
                                </form>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>

  <!-- JavaScript-->
  <script src="asserts/asserts/vendor/jquery/jquery.min.js"></script>
  <script src="asserts/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="asserts/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="asserts/js/sb-admin-2.min.js"></script>
  <script src="js/sweetalert.min.js"></script>

</body>

</html>
