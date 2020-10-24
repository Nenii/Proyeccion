<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Servicio social estudiantil</title>
  <link rel="stylesheet" type="text/css" href="asserts/sweetalert2/dist/sweetalert2.min.css">
<script type="text/javascript" src="asserts/sweetalert2/dist/sweetalert2.min.js" ></script>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link href="asserts/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <!-- Custom fonts for this template-->
  <link href="asserts/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="asserts/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="asserts/css/style.css" rel="stylesheet">

</head>
<!-- <body > -->
 <body onload="window.print();">
<div class="container-fluid">
    <div class="card  mb-4">
        <div class="card-header py-3">
            <div class="container-fluid"> 
              <!-- Logos e informacion -->
                  <div class="row">
                      <div class="col-xl-4 col-md-4 mb-4">
                          <img src="asserts/img/logofinal.png"> <br><br>
                      </div>
                      <div class="col-xl-4 col-md-4 mb-4">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">UGB Campos San Miguel</div><p class="text-xs">Av. Las Magnolias, calle Las Flores. Col. Escolán, San Miguel, El Salvador</p><p class="text-xs">PBX: 26456-500 </p>             
                      </div>
                      <div class="col-xl-4 col-md-4 mb-4">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">UGB Campos Usulutan</div><p class="text-xs">Km. 113 Carretera Litoral, desvío a Santa María, Usulutan, El Salvador</p>                  
                      </div>
                  </div>
              <!-- Generalidades -->
              <h2 class=" font-weight-bold text-primary text-uppercase mb-1">Generalidades</h2><hr>
              <div class="row">
                <!-- Cuadro 1 -->
                  <div class="col-xl-6 col-md-6 mb-12">
                    <div class="card border-left-primary  h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-ms font-weight-bold text-info text-uppercase mb-1">Información</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Nombre del proyecto: </div>
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><?php echo $alm->Nombre_proyecto; ?></div>
                            
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Presupuesto: </div>
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">$ <?php echo $alm->Presupuesto; ?></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Sede: </div>
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">San Miguel</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Inicio: </div>
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><?php echo $alm->Inicio; ?></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Fin: </div>
                              <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><?php echo $alm->Fin; ?></div>
                          </div>
                         
                        </div>
                      </div>
                    </div>
                  </div>
                <!-- Cuadro 2 -->
                  <div class="col-xl-6 col-md-6 mb-12">
                    <div class="card border-left-primary  h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                               <div class="text-ms font-weight-bold text-info text-uppercase mb-1"></div>
                              <div class="h5 mb-0 font-weight-bold text-gray-800">Facultad: </div>
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><?php echo $alm->nom_facultad; ?></div>
                              <div class="h5 mb-0 font-weight-bold text-gray-800">Beneficiarios: </div>
                              <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><?php echo $alm->personas_beneficiarias; ?> personas</div>
                              <!--<div class="h5 mb-0 font-weight-bold text-gray-800">Año: </div>
                              <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><?php echo $alm->periodo; ?></div>
                              <div class="h5 mb-0 font-weight-bold text-gray-800">Rol: </div>
                              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Coordinador de proyectos</div> -->
                  <h6 class="h5 mb-0 font-weight-bold text-gray-800">Progreso</h6>
                <div class="card-body">
                  <h4 class="small font-weight-bold">Avance<span class="float-right">20%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-primary" media="print" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Presupuesto <span class="float-right">40%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-primary" media="print" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  
                </div>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
           <br>
            <h2 class=" font-weight-bold text-primary text-uppercase mb-1">Actividades</h2><hr>
              <div class="row">
                <div class="col-xl-12 col-md-12 mb-12">
                    <div class="card border-left-primary  h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                              <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                          <tr>
                                              <th>Actividad</th>
                                              <th>Inicio:</th>
                                              <th>Fin:</th>
                                              <th>Descripción</th>
                                              <th>Progreso</th>

                                          </tr>
                                      </thead>
                                      <tbody>
                                            <?php foreach($this->model->ListarActividades($_REQUEST['id_proyecto']) as $r): ?>
                                                <tr>
                                                    <td><?php echo $r->nom_actividad; ?></td>
                                                    <td><?php echo $r->fecha_inicio; ?></td>
                                                    <td><?php echo $r->fecha_fin; ?></td>
                                                    <td><?php echo $r->descripcion; ?></td>
                                                    <td>%</td>
                                                </tr>
                                  
                                                    <?php endforeach; ?>
                                      </tbody>
                                    </table>
                                </div>
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
           <br>
            <h2 class=" font-weight-bold text-primary text-uppercase mb-1">Docentes ejecutores</h2><hr>
              <div class="row">
                <div class="col-xl-12 col-md-12 mb-12">
                    <div class="card border-left-primary  h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                              <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                          <tr>
                                              <th>Nombre:</th>
                                              <th>Telefono:</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                            <?php foreach($this->model->ListarEjecutorAsignados($_REQUEST['id_proyecto']) as $r): ?>
                                                <tr>
                                                    <td><?php echo $r->nom_responsable; ?></td>
                                                    <td><?php echo $r->tel_responsable; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                      </tbody>
                                    </table>
                                </div>
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
           <br>
            <h2 class=" font-weight-bold text-primary text-uppercase mb-1">Finanzas</h2> <hr>
              <div class="row">
                <div class="col-xl-12 col-md-12 mb-12">
                    <div class="card border-left-primary  h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                              <div class="card-body">
                                <div class="table-responsive">
                                   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                      <thead>
                                        <tr>
                                            <th>Responsable:</th>
                                            <th>Gasto</th>
                                            <th>Fecha</th>
                                            <th>Descripción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                          <?php foreach($this->model->ObtenerGastos($_REQUEST['id_proyecto']) as $r): ?>
                                              <tr>
                                                  <td><?php echo $r->nom_responsable; ?></td>
                                                  <td>$ <?php echo $r->GASTO; ?></td>
                                                  <td><?php echo $r->fecha_inicio; ?></td>
                                                  <td><?php echo $r->descripcion; ?></td>
                                              </tr>
                                          <?php endforeach; ?>
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                  
             

</div>
</body>
</html>

<!-- Bootstrap core JavaScript-->
<script src="asserts/vendor/jquery/jquery.min.js"></script>
<script src="asserts/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="asserts/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="asserts/js/sb-admin-2.min.js"></script>
<script src="asserts/vendor/datatables/jquery.dataTables.min.js"></script>
<!-- Bootstrap core JavaScript-->
<script src="asserts/vendor/jquery/jquery.min.js"></script>
<script src="asserts/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="asserts/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="asserts/js/rounded-counter/jquery.countdown.min.js"></script>
  <script src="asserts/js/rounded-counter/jquery.knob.js"></script>
  <script src="asserts/js/rounded-counter/jquery.appear.js"></script>
  <script src="asserts/js/rounded-counter/knob-active.js"></script>

<!-- Page level custom scripts -->
<script src="asserts/js/demo/datatables-demo.js"></script>
<!-- Bootstrap core JavaScript-->
<script src="asserts/vendor/jquery/jquery.min.js"></script>
<script src="asserts/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Page level plugins -->
<script src="asserts/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="asserts/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!-- sweetalert2 -->

<script src="sweetalert2.all.min.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<script src="asserts/js/Swal.js"></script>


</script>
</script>
</body>
</html>
<script>
function imprim1(Impresion){
var printContents = document.getElementById('Impresion').innerHTML;
      w = window.open();
      w.document.write(printContents);
      w.document.close(); // necessary for IE >= 10
      w.focus(); // necessary for IE >= 10
  w.print();
  w.close();
      return true;}
</script>