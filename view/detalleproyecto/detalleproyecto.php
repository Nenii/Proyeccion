    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                      <img class="profile-user-img img-fluid img-circle" src="files/fotos/LOGO_UGB.jpg" alt="User profile picture">
                    </div>
                      <h6 class="profile-username text-center"><?php 
                  
                      echo $alm->Nombre_proyecto ?></h6>
                      <p class="text-muted text-center"><?php echo $alm->nom_facultad ?></p>
                        <ul class="list-group list-group-unbordered mb-3">
                          <li class="list-group-item">
                            <b>Estatus: </b>  <span class="badge badge-primary"><?php
                               if ( $alm->estado == 1) {
                                  echo "Activo";
                                } elseif ($alm->estado == 2) {
                                  echo "Finzalizado";
                                }elseif ($alm->estado == 4) {
                                  echo "Pendiente";
                                } elseif ($alm->Fin < hoy()) {
                                  echo "Vencido";
                                } ?> </span>
                          </li>
                          <li class="list-group-item">
                            <b>Inicio</b> <a class="float-right"><?php echo $alm->Inicio ?></a>
                          </li>
                          <li class="list-group-item">
                            <b>Fin</b> <a class="float-right"><?php echo $alm->Fin ?></a>
                          </li>
                          <li class="list-group-item">
                            <b>Presupuesto</b> <a class="float-right">$<?php echo $alm->Presupuesto ?></a>
                          </li>
                          <li class="list-group-item">
                            <b>Año</b> <a class="float-right"><?php echo $alm->periodo ?></a>
                          </li>
                        </ul>
                      <a href="?c=proyecto&a=ImprimirReporte&id_proyecto=<?php echo $alm->id_proyecto; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Reporte de proyecto" class="btn btn-primary btn-block"><i class="fa fa-print"></i><b> Imprimir</b></a>
                </div>
            </div>
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Detalles</h3>
                </div>
                <div class="card-body">
                  <strong><i class="fas fa-book mr-1"></i> Beneficiarios</strong>
                    <p class="text-muted">
                     <?php echo $alm->nom_comunidad_ben ?>
                    </p>
                    <hr>
                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                    <p class="text-muted"><?php echo $alm->sede ?></p>
                    <hr>
                    <strong><i class="far fa-file-alt mr-1"></i> Documento</strong>
                    <p class="text-muted"><?php echo $alm->archivo ?></p>
                </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Actividades</a></li>
                  <li class="nav-item"><a class="nav-link" href="#actividades" data-toggle="tab">Ejecutores</a></li>
                  <li class="nav-item"><a class="nav-link" href="#gastos" data-toggle="tab">Gastos</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                  <div class="tab-content">
                      <div class="active tab-pane" id="activity">
                        <div class="table-responsive">
                              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                  <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Responsable</th>
                                        <th>Actividad</th>
                                        <th>Fecha inicio</th>
                                        <th>Progreso</th>
                                        <th>Estatus</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                      <?php foreach($this->model->ListarActividades($_REQUEST['id_proyecto']) as $r): ?>
                                          <tr> 
                                              <td>#</td>
                                              <td><?php echo $r->nombre_usuario; ?></td>
                                              <td><?php echo $r->nom_actividad; ?></td>
                                              <td><?php echo $r->fecha_inicio; ?></td>
                                              <td>
                                                <div class="progress" style="height: 8px;">
                                                    <div class="progress-bar" role="progressbar" style="width:  <?php echo $r->Progreso/$r->Dias_totales*100; ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                    </div>
                                                </div>
                                              </td>

                                              <td><?php 
                                              if ($r->TIPO == 'COMPLETADO') { ?> 
                                                        <?php
                                                    ?> <span class="badge badge-primary">Completado</span> <?php }  
                                                if ($r->Estatus == 'VENCIDO' AND  $r->TIPO == 'ACTIVO') {?>
                                                    <span class="badge badge-danger">Vencido</span>
                                             <?php } else{ ?>
                                                    
                                                <?php }
                                                     if ($r->Progreso >= $r->Dias_totales  )
                                                        {
                                                            ?> <small><?php echo "100%";?> </small><?php
                                                        }
                                                        else if ($r->Progreso <= 0) {
                                                         ?> <span class="badge badge-warning"><?php echo $r->Estatus; ?></span><br><?php
                                                          echo "0% ";
                                                        }
                                                        else if ($r->Dias_totales != 0 and $r->Dias_totales >= 0)
                                                        {
                                                          echo bcdiv($r->Progreso/$r->Dias_totales*100  , '1', 1) ?>%    <span class="badge badge-success"><?php echo $r->Estatus; ?></span>
                                                     <?php }?> </td>
                                              <?php endforeach; ?>
                                          </tr>
                                  </tbody>
                             </table>
                        </div>     
                      </div>
                      <div class="tab-pane" id="actividades">
                          <a class="card-link" data-toggle="collapse" href="#collapseDocentes">
                            Docentes ejecutores 
                          </a>
                          <div id="collapseDocentes" class="collapse show" data-parent="#accordion">
                              <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                              <tr>
                                                  <th>#</th>
                                                  <th>Nombre</th>
                                                  <th>Telefono</th>
                                                  <th>Sede</th>

                                              </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($this->model->ListarEjecutorAsignados($_REQUEST['id_proyecto']) as $r): ?>
                                                    <tr> 
                                                            
                                                        <td>#</td>
                                                        <td><?php echo $r->nombre_usuario; ?></td>
                                                        <td><?php echo $r->email; ?></td>
                                                        <td><?php echo $r->Sede_origen; ?></td>
                                                        <?php endforeach; ?>
                                                    </tr>
                                            </tbody>
                                        </table>
                                    </div>
                              </div>
                          </div>                     
                      </div>
                    <!-- /.tab-pane -->
                      <div class="tab-pane" id="gastos">
                          <a>
                            Gastos
                          </a>
                          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Responsable</th>
                                    <th>Gasto</th>
                                    <th>Fecha inicio</th>
                                    <th>Descripción</th>

                                </tr>
                              </thead>
                              <tbody>
                                  <?php foreach($this->model->ObtenerGastos($_REQUEST['id_proyecto']) as $r): ?>
                                      <tr> 
                                              
                                          <td>#</td>
                                          <td><?php echo $r->nom_responsable; ?></td>
                                          <td><?php
                                          if ( $r->GASTO == "") {
                                             echo "$0";
                                           } echo $r->GASTO; ?></td>
                                          <td><?php echo $r->fecha_inicio; ?></td>
                                          <td><?php echo $r->descripcion; ?></td>
                                        
                                          <?php endforeach; ?>
                                      </tr>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>

            </div><br>
          <div class="card">
              <div class="card-body">
                <div class="tab-content">
                    <div class="post">
                        <?php foreach($this->model->ListarComentarios($_REQUEST['id_proyecto']) as $r): ?>
                          <div class="user-block">
                              <span class="username">
                                <a href="#"><?php echo $r->nombre;?></a><br>
                                <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                              </span>
                              <span class="description">Compartido - <?php echo $r->fecha; ?> today</span>
                          </div>
                          <p>
                            <?php echo $r->comentario; ?>.
                          </p><hr>
                        <?php endforeach; ?>
                          <form class="form-horizontal">
                            <div class="input-group input-group-sm mb-0">
                              <input class="form-control form-control-sm" placeholder="Agregar comentario...">
                              <div class="input-group-append">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Enviar</button>
                              </div>
                            </div><br>  
                          </form>
                    </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
    </section>
    <!-- /.content -->


  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
   $(document).ready(function() {
   const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })

      Toast.fire({
        icon: 'success',
        title: '<?php echo $alm->Nombre_proyecto  ?>',

      },
        function(){
          window.location.href = "/Home";
      });
      }); </script>

      <!-- 

<?if($_SESSION["nivel"]=="0"){?>
<div id="Impresion">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link href="asserts/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <link href="asserts/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
   

  <link href="asserts/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="asserts/css/style.css" rel="stylesheet">
    <div class="container-fluid ">
        <div class="row">
          
        <div class="card col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detalle de proyectos</h6>
                <a href="?c=proyecto&a=ImprimirReporte&id_proyecto=<?php echo $alm->id_proyecto; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Reporte de proyecto"class="badge badge-primary btn-circle"><i class="fa fa-print"></i></a>
            </div>
            <div class="card-body">
                <div class="row"> 
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="project-details-title">
                            <h2><span class="profile-details-name-nn">Proyecto: </span> <?php echo $alm->Nombre_proyecto != null ? $alm->Nombre_proyecto : 'Nuevo Registro'; ?></h2>
                        </div>
                        <ul id="adminpro-demo2" class="comment-action-st collapse">
                                <li><a href="javascript:window.print()" target="_blank">Imprimir</a>
                                </li>
                            <li><a href="?c=proyecto&a=ImprimirReporte" target="_blank">Reporte PDF</a>
                            </li>
                        </ul>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="project-details-mg">
                                <div class="row">
                                    <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                                        <div class="project-details-st">
                                            <span><strong>Facutad :</strong></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-4 col-sm-4  col-xs-12">
                                        <div class="project-details-dt">
                                            <span><?php echo $alm->nom_facultad ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="project-details-mg">
                                <div class="row">
                                    <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                                        <div class="project-details-st">
                                            <span><strong>Inicio:</strong></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-8 col-sm-8 col-xs-12">
                                        <div class="project-details-dt">
                                            <span><?php echo $alm->Inicio; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="project-details-mg">
                                <div class="row">
                                    <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                                        <div class="project-details-st">
                                            <span><strong>Fin:</strong></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                                        <div class="project-details-dt">
                                            <span><?php echo $alm->Fin; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="project-details-mg">
                                <div class="row">
                                    <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                                        <div class="project-details-st">
                                            <span><strong>Codigo:</strong></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-8 col-sm-8 col-xs-12">
                                        <div class="project-details-dt">
                                            <span><?php echo $alm->Codigo; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="project-details-mg">
                                <div class="row">
                                    <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                                        <div class="project-details-st">
                                            <span><strong>Ejecutores:</strong></span>
                                        </div>
                                    </div><div class="col-lg-6 col-md-8 col-sm-8 col-xs-12">
                                        <div class="project-details-dt">
                                            <span>6</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                                    
                                    </div>
                                </div>
                            </div>

                            <div class="project-details-mg">
                                <div class="row">
                                    <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                                        <div class="project-details-st">
                                            <span><strong>Año :</strong></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-4 col-sm-4  col-xs-12">
                                        <div class="project-details-dt">
                                            <span><?php echo $alm->periodo; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="project-details-mg">
                                    <div class="row">
                                    <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                                        <div class="project-details-st">
                                            <span><strong>Estado :</strong></span>
                                        </div>
                                    </div>
                                   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="btn-group project-list-ad">
                                            <select class=" btn btn-white btn-xs" id="sel1">
                                                <option>Aprobado</option>
                                                <option>Activo</option>
                                                <option>Finalizado</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                  
                            </div>

                            <div class="project-details-mg">
                                <div class="row">
                                    <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                                        <div class="project-details-st">
                                            <span><strong>Presupuesto :</strong></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-8 col-sm-8 col-xs-12">
                                        <div class="project-details-dt">
                                            <span><?php echo $alm->Presupuesto; ?> </span>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="project-details-mg"> 
                                <div class="row">
                                    <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                                        <div class="project-details-st">
                                            <span><strong>Beneficiarios :</strong></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-8 col-sm-8 col-xs-12">
                                        <div class="project-details-dt">
                                            <span><?php echo $alm->personas_beneficiarias; ?> personas</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="project-details-mg">
                                <div class="row">
                                    <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                                        <div class="project-details-st">
                                            <span><strong>Comunidad :</strong></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-8 col-sm-8 col-xs-12">
                                        <div class="project-details-dt">
                                            <a href="#"><?php echo $alm->nom_comunidad_ben; ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="project-details-mg">
                                <div class="row">
                                    <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                                        <div class="project-details-st">
                                            <span><strong>Documento :</strong></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-8 col-sm-8 col-xs-12">
                                        <div class="project-details-dt">
                                            <a href="files/<?php echo $alm->ubicacion; ?>"><?php echo $alm->ubicacion; ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="project-pregress-details">
                                <span><strong>Completado:</strong></span>
                            </div>
                        </div>
                        <div class="col-lg-10 col-xs-12">
                            <div class="skill-content-3 project-details-progress">
                                <div class="skill">
                                    <div class="progress">
                                        <div class="progress-bar wow fadeInLeft" data-progress="<?php echo $r->Progreso/$r->DIas*100?>%" style="width: <?php echo $alm->Progreso/$alm->DIas*100?>%;" data-wow-duration="1.5s" data-wow-delay="1.2s"> <span><?php echo bcdiv($alm->Progreso/$alm->DIas*100, '1', 1) ?> %</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <center>
                                       
                                    <a class=" btn" class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#AgregarActividad"><button class="btn btn-sm"><i class="fa fa-plus"></i> Actividad</button></a>
                                    <a class=" btn" class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#AgregarBeneficiarios"><button class="btn btn-sm"><i class="fa fa-plus"></i> Beneficiarios</button></a>
                                    <a class=" btn" class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#AgregarEjecutor"><button class="btn btn-sm"><i class="fa fa-plus"></i> Ejecutor</button></a>
                                    
                                    <a class=" btn" class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#AgregarAnexos"><button class="btn btn-sm"><i class="fa fa-plus"></i> Anexos</button></a>
                            </center>
                        </div>
                    </div>
                

                    <h2>Elementos del proyecto</h2> <hr>
         
                    <div id="accordion">
                     <div class="card">
                      <div class="card-header">
                        <a class="collapsed card-link" data-toggle="collapse" href="#collapseActividades">
                        Actividades
                      </a>
                      </div>
                      <div id="collapseActividades" class="collapse show" data-parent="#accordion">
                        <div class="card-body">
                          <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                  <thead>
                                    <tr>
                                        <th>Responsable:</th>
                                        <th>Actividad</th>
                                        <th>Fecha inicio</th>
                                        <th>Descripción</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($this->model->ListarActividades($_REQUEST['id_proyecto']) as $r): ?>
                                        <tr> 
                                                
                                            <td><?php echo $r->nom_responsable; ?></td>
                                            <td><?php echo $r->nom_actividad; ?></td>
                                            <td><?php echo $r->fecha_inicio; ?></td>
                                            <td><?php echo $r->descripcion; ?></td>

                                            <?php endforeach; ?>
                                        </tr>
                                </tbody>
                             </table>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                          <div class="card-header">
                            <a class="card-link" data-toggle="collapse" href="#collapseDocentes">
                              Docentes ejecutores 
                            </a>
                          </div>
                          <div id="collapseDocentes" class="collapse show" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                              <thead>
                                                <tr>
                                                    <th>Nombre:</th>
                                                    <th>Telefono</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($this->model->ListarEjecutorAsignados($_REQUEST['id_proyecto']) as $r): ?>
                                                    <tr> 
                                                            
                                                        <td><?php echo $r->nom_responsable; ?></td>
                                                        <td><?php echo $r->tel_responsable; ?></td>
                                                      
                                                        <?php endforeach; ?>
                                                    </tr>
                                            </tbody>
                                         </table>
                                        </div>
                                  </div>
                            </div>
                    </div>   
                    <div class="card">
                      <div class="card-header">
                        <a class="collapsed card-link" data-toggle="collapse" href="#collapseGastos">
                          Gastos
                        </a>
                      </div>
                      <div id="collapseGastos" class="collapse show" data-parent="#accordion">
                        <div class="card-body">
                           <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                  <thead>
                                    <tr>
                                        <th>Responsable:</th>
                                        <th>Gasto</th>
                                        <th>Fecha inicio</th>
                                        <th>Descripción</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($this->model->ObtenerGastos($_REQUEST['id_proyecto']) as $r): ?>
                                        <tr> 
                                                
                                            <td><?php echo $r->nom_responsable; ?></td>
                                            <td><?php echo $r->GASTO; ?></td>
                                            <td><?php echo $r->fecha_inicio; ?></td>
                                            <td><?php echo $r->descripcion; ?></td>

                                            <?php endforeach; ?>
                                        </tr>
                                </tbody>
                             </table>
                            </div>        </div>
                      </div>
                    </div>
                </div>
            </div>
    </div>    </div>


<div id="AgregarActividad"  aria-labelledby="myLargeModalLabel"  class="modal modal-adminpro-general default-popup-PrimaryModal " role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <h2>Asignar actividad!</h2><hr>
                    <form action="?c=actividades&a=Asignar" method="POST">
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label class="login2">Actividad *</label>
                                </div>
                                <div class="col-lg-12">
                                    <select class="custom-select form-control" required  name="id_actividad">
                                          <option selected>Seleccione la actividad</option>
                                        <?php foreach($this->model->ListarActividadesPorAsignar() as $r): ?>
                                        <option name="id_actividad" value="<?php echo $r->id_actividades; ?>"><?php echo $r->nom_actividad; ?></option>
                                    <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label class="login2">Ejecutor *</label>
                                </div>
                                <div class="col-lg-12">
                                    <select class="custom-select form-control" required name="id_responsable_proyecto">
                                          <option selected>Seleccione la ejecutor</option>
                                        <?php foreach($this->model->ListarEjecutorAsignados($_REQUEST['id_proyecto']) as $r): ?>
                                        <option value="<?php echo $r->id_responsable_proyecto ; ?>"><?php echo $r->nom_responsable ; ?></option>
                                    <?php endforeach; ?>
                                    </select>                                
                                </div>
                            </div>
                        </div>
                        <div class="form-group-inner">
                                <div class="row">
                                     <div class="col-lg-12">
                                        <label class="login2">Fecha Inicio *</label>
                                    </div>
                                    <div class="form-group col-lg-12" id="data_3">
                                            <input type="date" class="form-control" required name="fecha_inicio" placeholder="10/11/2013">                                       
                                    </div>
                                </div>
                        </div>
                        <div class="form-group-inner">
                            <div class="row">
                                 <div class="col-lg-12">
                                    <label class="login2">Fecha fin *</label>
                                </div>
                                <div class="form-group col-lg-12" id="data_3">
                                        <input type="date" class="form-control" required name="fecha_fin" placeholder="10/11/2013">
                                </div>
                            </div>
                        </div>
                        <div class="form-group-inner">
                            <div class="row">
                                 <div class="col-lg-12">
                                    <label class="login2">Descripcion *</label>
                                </div>
                                <div class="form-group col-lg-12" id="data_3">
                                        <input type="text" class="form-control" required name="descripcion">
                                </div>
                            </div>
                        </div>
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label class="login2">Estado *</label>
                                </div>
                                <div class="col-lg-12">
                                    <select class="custom-select form-control"  required name="TIPO">
                                          <option    selected>Seleccione estado</option>
                                        <option  value="1">Activo</option>
                                        <option  value="2">Completado</option>
                                        <option   value="3">Finalizado</option>
                                    </select>                                
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="Guardar"><i class="far fa-check-circle"></i> Enviar</button>
                            <a data-dismiss="modal"class="btn btn-danger" href="#"> <i class="far fa-times-circle"></i> Cancelar</a>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>
 </div>
<div id="AgregarBeneficiarios" class="modal modal-adminpro-general default-popup-PrimaryModal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
                <div class="modal-body">
                    <center><i class="fa fa-check modal-check-pro"></i></center>
                    <h2>Asignar Beneficiarios!</h2>
                    <form action="?c=Beneficiario&a=Guardar" method="post" id="AddBeneficiario">                 
                              <label class="control-label col-md-12 col-sm-12 col-xs-12" for="first-name">Nombre de la comunidad Beneficiaria<span class="required">*</span>
                              </label>
                              <input type="text" required="required" name="nom_comunidad_ben" class="form-control col-md-12 col-xs-12">
                              <label class="control-label col-md-12 col-sm-12 col-xs-12" for="last-name">Numero de personas<span class="required">*</span>
                             </label>
                              <input type="text"  name="n_personas_ben" required="required" class="form-control col-md-12 col-xs-12">
                             <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" name="Guardar"><i class="far fa-check-circle"></i> Enviar</button>
                                <a data-dismiss="modal"class="btn btn-danger" href="#"> <i class="far fa-times-circle"></i> Cancelar</a>
                        </div>      
                    </form>
                </div> 
            </div>
        </div>
    </div>
<div id="AgregarEjecutor" class="modal modal-adminpro-general default-popup-PrimaryModal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
                <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="basic-login-inner modal-basic-inner">
                                    <h3>Asignar docentes</h3>
                                    <p>Seleccione el docente que desea asignar</p>
                                    <form action="?c=Ejecutores&a=Guardar" method="post">
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <label class="login2">Proyecto *</label>
                                                </div>
                                                <div class="col-lg-12"> 
                                                        <input type="text" name="id_proyecto" class="form-control" value="<?php echo $alm->id_proyecto;?>" placeholder="<?php echo $alm->Nombre_proyecto;?>"/>
                                                        <span><h6># de ID del proyecto</h6></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <label class="login2">Responsable *</label>
                                                </div>
                                                <div class="col-lg-12">

                                                    <select data-placeholder="Agregar ejecutor..."class="form-control"  name="id_responsable" >
                                                      <option value="">Seleción...</option>
                                                    <?php foreach ($this->model->ListarEjecutoresSinAsignar() as $r): ?>
                                                     <option value="<?php echo $r->id_responsable;?>"><?php echo $r->nom_responsable;?></option> 
                                                    <?php endforeach ?>
                                                  </select><br><br>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" name="Guardar"><i class="far fa-check-circle"></i> Enviar</button>
                                             <a data-dismiss="modal"class="btn btn-danger" href="#"> <i class="far fa-times-circle"></i> Cancelar</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
<div id="AgregarFacultad" class="modal modal-adminpro-general default-popup-PrimaryModal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
                <div class="modal-body">
                    <i class="fa fa-check modal-check-pro"></i>
                    <h2>Asignar facultad!</h2>
                          <div class="">
                              <div class="sparkline10-graph">
                                  <div class="input-knob-dial-wrap">
                                      <div class="row">
                                          <div class="col-lg-12">
                                            <form method="post" action="?c=Facultades&a=GuardarFacultad">
                                                ?c=Ejecutores&a=Guardar
                                              <div class="chosen-select-single">
                                                  <label> Seleciones las facultades a cargo del proyecto</label>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <input type="text" name="id_proyecto" class="form-control" value="<?php echo $alm->id_proyecto; ?> " placeholder="<?php echo $alm->Nombre_proyecto; ?>" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                  <select data-placeholder="Facultades..." name="id_facultad" class="chosen-select" multiple="" tabindex="-1">
                                                      <option value="">Seleción...</option>
                                                    <?php foreach($this->model->ListarFacultades() as $r): ?>
                                                      <option value="<?php echo $r->id_facultad; ?>"><?php echo $r->nom_facultad; ?></option>
                                                      <?php endforeach ?>
                                                  </select><br><br>
                                              </div>
                                              <button type="submit" class="btn btn-info">Agregar</button>
                                            </form>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                </div> 
            </div>
        </div>
    </div>
    <div id="AgregarBeneficiarios" class="modal modal-adminpro-general default-popup-PrimaryModal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
                <div class="modal-body">
                    <h2>Agregar comunidad beneficiaria!</h2>
                    <form action="?c=Beneficiario&a=Guardar" method="post" id="AddBeneficiario">

                              <label class="control-label col-md-122 col-sm-12 col-xs-12" for="first-name">Nombre de la comunidad Beneficiaria <span class="required">*</span>
                              </label>
                              <input type="text" required="required" name="nom_comunidad_ben" class="form-control col-md-12 col-xs-12">
                              <label class="control-label col-md-122 col-sm-12 col-xs-12" for="last-name">Numero de personas <span class="required">*</span>
                             </label> 
                              <input type="text"  name="n_personas_ben" required="required" class="form-control col-md-12 col-xs-12"><br>
                              <input type="submit" name="Guardar" class="btn btn-primary" value="Guardar">
                    </form>
                </div>
            </div>
        </div>
</div>
<div id="AgregarAnexos" class="modal modal-adminpro-general default-popup-PrimaryModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-close-area modal-close-df">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
            </div>
            <div class="modal-body">
            <span class="headerTitle">Agregar documento anexo</span>
              <div class="">
                  <div class="sparkline10-graph">
                      <div class="input-knob-dial-wrap">
                          <div class="row">
                              <div class="col-lg-12">
                                 <form class="form-horizontal form-label-left" method="post" action="?c=Anexos&a=Guardar" enctype="multipart/form-data" name="frmAnexos">
                                    <div class="form-group">
                                        <label>Nombre de documento:</label>
                                        <input type="text" class="form-control" name="nom_anexo" required ="true">
                                    </div>
                                    <div class="form-group">
                                        <label>Ubicación de documento:</label>
                                        <input type="file" class="form-control-file" required ="true"  name="arch_anexo[]" id="exampleFormControlFile1" >
                                    </div>
                                    <div class="form-group">
                                        <label>Fecha</label>
                                        <input type="date" class="form-control" name="fecha" placeholder="10/11/2013" required ="true">                                     
                                    </div>
                                    <div class="form-group">
                                        <label>Descripcion de documento:</label>
                                        <input type="text" class="form-control" name="descripcion" required ="true" v-model="newActividades.descripcion">
                                    </div>
                                    <div class="form-group">
                                        <label>Responsable del documento</label>
                                            <select class="custom-select form-control" name="id_res_act" required ="true" v-model="newActividades.id_res_act">
                                                <option  selected >Seleccione la ejecutor</option>
                                                    <?php foreach($this->model->ListarEjecutorAsignados($_REQUEST['id_proyecto']) as $r): ?>
                                                        <option value="<?php echo $r->id_responsable_proyecto; ?>"><?php echo $r->nom_responsable ; ?></option>
                                                    <?php endforeach; ?>
                                            </select>  
                                    </div><hr>
                                    
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="Guardar"><i class="far fa-check-circle"></i> Enviar</button>
                                        <a data-dismiss="modal"class="btn btn-danger" href="#"> <i class="far fa-times-circle"></i> Cancelar</a>
                                    </div>
                                </form>
                             </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>
  <? } 
   else { ?>
      <div style="font:bold 12pt arial;color:red;padding:30px">
      </div>
    <? }?>
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
</script> -->