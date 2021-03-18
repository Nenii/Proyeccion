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
                        <a href="" target="_blank" data-toggle="modal" data-target="#AgregarResumen" title="Resumen ejecutivo" class="btn btn-primary btn-block"><i class="fa fa-print"></i><b> Resumen ejecutivo</b></a>
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

    

    

