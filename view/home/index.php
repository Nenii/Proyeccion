 <?  if($_SESSION["nivel"]=="0"){   ?>
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between ">
            <h1 class="h3 mb-0 text-gray-800">Proyectos en ejecución | <? var_dump ($_SESSION["Sede_origen"]);  ?></h1>
        </div>
    </div>
<?php if ($_SESSION["nivel"] == 1 or $_SESSION["nivel"] == 2) {?>
  <div class="container-fluid">
    <div class="card  mb-4">
      <div class="card-header py-3">
          <a href="?c=Proyecto&a=Crud" class="badge badge-primary"><i class="fas fa-plus fa-sm " ></i> Agregar proyecto</a>
          <a href="?c=Home&a=Imprimir" target="_blank" class="badge badge-primary" ><i class="fas fa-download fa-sm " ></i> Proyectos activos</a>
          <a href="?c=Home&a=ImprimirPeriodoActual" target="_blank" class="badge badge-primary" ><i class="fas fa-download fa-sm " ></i> Proyectos <?php echo (new \DateTime())->format('Y'); ?></a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
              <thead>
                <tr>
                  <th style="width: 20%">Nombre del proyecto</th>
                  <th>Facutad</th>
                  <th>Beneficiarios</th>
                  <th>Sede</th>
                  <th>Acciones</th>
                  <th>Avance (%)</th>
                </tr>
              </thead>
              <tbody>
                  <?php foreach($this->model->Listar() as $r): ?>
                        <tr>
                          <td><a><?php echo $r->Nombre_proyecto; ?></a><br/><small>Inicio <?php echo $r->Inicio; ?></small>
                          </td>
                          
                          <td><?php echo $r->nom_facultad;?></td>
                           <td>
                            <form><i class="fa fa-male"></i>
                              <i class="fa fa-male"></i>
                              <i class="fa fa-male"></i>
                              <i class="fa fa-male"></i>
                              <i class="fa fa-male"></i>
                              <br></form>
                           <small><?php echo $r->personas_beneficiarias;?> Personas </small>
                          </td>
                          <td><small><?php echo $r->sede;?></small></td>
                          <td>
                            <!-- Finalizar proyecto -->
                            <a id="demo" onclick="javascript:return confirm('¿Seguro de finalizar este proyecto?');" data-toggle="tooltip" data-placement="bottom" title="Finalizar proyecto" class="badge badge-primary btn-circle btn-sm" href="?c=proyecto&a=Finalizar&id_proyecto=<?php echo $r->id_proyecto; ?>"><i class="fas fa-hourglass-end"></i></a>
                             <!-- Finanzas de proyecto -->
                            <a href="?c=gasto&a=DetalleGastos&id_proyecto=<?php echo $r->id_proyecto; ?>" data-toggle="tooltip" data-placement="bottom" title="Finanzas de proyecto"class="badge badge-success btn-circle btn-sm btn-sm"><strong>$</strong></a>
                            <!-- Actividades del proyecto -->
                            <a href="?c=actividades&a=Detalle&id_proyecto=<?php echo $r->id_proyecto; ?>" data-toggle="tooltip" data-placement="bottom" title="Actividades del  proyecto"
                              class="badge badge-warning btn-circle btn-sm"><i class="far fa-star"></i></a>
                            <a href=""></a>
                           <!-- Detalle del proyecto -->
                            <a href="?c=proyecto&a=Detalle&id_proyecto=<?php echo $r->id_proyecto; ?>" data-toggle="tooltip" data-placement="bottom" title="Detalle del proyecto" class="badge badge-info btn-circle btn-sm"><i class="fa fa-folder"></i></a>
                            <?php if ($_SESSION["nivel"] == 1 or $_SESSION["nivel"] == 2) {?>
                            <!-- Eliminar proyecto -->
                            <a   onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" data-toggle="tooltip" data-placement="bottom" title="Eliminar proyecto" class="badge badge-danger btn-circle btn-sm" href="?c=proyecto&a=Eliminar&id_proyecto=<?php echo $r->id_proyecto; ?>"><i class="fas fa-times"></i></a>
                            <!-- Actualizar proyecto ?> -->
                            <a  data-toggle="tooltip" data-placement="bottom" title="Actualizar proyecto" class="badge badge-ligth btn-circle btn-sm btn btn-outline-info" href="?c=proyecto&a=Edit&id_proyecto=<?php echo $r->id_proyecto; ?>"><i class="fas fa-sync-alt"></i></a>
                          <?php } ?>
                            <!-- Documentos adjuntos del proyecto -->
                            <a href="?c=anexos&a=Detalle&id_proyecto=<?php echo $r->id_proyecto; ?>" class="badge badge-ligth btn-circle btn-sm btn btn-outline-dark" data-toggle="tooltip" data-placement="bottom" title="Documentos del proyecto" href="anexos"><i class="fas fa-paperclip"></i></a>
                          </td>
                          <td class="project_progress">
                              <div class="progress">
                                  <div class="progress-bar progress-bar-striped bg-info" style="width: <?php echo $r->Progreso/$r->DIas*100; ?>%"  role="progressbar" aria-valuenow="<?php echo $r->Progreso; ?>" values="<?php
                                   echo bcdiv($r->Progreso, $r->DIas, 1) ?>" aria-valuemin="0" aria-valuemax="100">
                                  </div>
                              </div>
                                <small><?php
                                if ($r->DIas != 0 and $r->DIas_ < 0 )
                                  {
                                    echo "100 % Completado";
                                  }
                                  else if ($r->Progreso <= 0) {
                                    echo "0 % Completado";
                                  }
                                  else if ($r->DIas != 0 and $r->DIas > 0)
                                  {
                                    echo bcdiv($r->Progreso/$r->DIas*100  , '1', 1) ?> % Completado
                             <?php     }
                             ?> </small>
                          </td>
                        </tr>
                  <?php endforeach; ?>
              </tbody>
            </table>
          </div>
      </div>
    </div>
  </div>
  <div class="container-fluid">
      <div class="card  mb-4">
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Pendientes de finalizar</h6>
          </div>
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                      <thead>
                        <tr>
                          <th style="width: 20%">Nombre del proyecto</th>
                          <th>Facutad</th>
                          <th>#Beneficiarios</th>
                          <th>Presupuesto</th>
                          <th>Año</th>
                          <th>Detalles</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php foreach($this->model->ListarPendienteFinalizar() as $r): ?>
                                <tr>
                                  <td><a><?php echo $r->Nombre_proyecto; ?></a><br/><small>Inicio <?php echo $r->Inicio; ?></small>
                                  </td>
                                  
                                  <td><?php echo $r->nom_facultad;?></td>
                                   <td>
                                   <small><?php echo $r->personas_beneficiarias;?> Personas </small>
                                  </td>
                                   <td>
                                   <small>$<?php echo $r->Presupuesto;?>  </small>
                                  </td>
                                   <td>
                                   <small><?php echo $r->periodo;?>  </small>
                                  </td>
                                
                                  <td>
                                     <!-- Finanzas de proyecto -->
                                    <a href="?c=gasto&a=DetalleGastos&id_proyecto=<?php echo $r->id_proyecto; ?>" data-toggle="tooltip" data-placement="bottom" title="Finanzas de proyecto"class="badge badge-success btn-circle btn-sm btn-sm"><strong>$</strong></a>
                                    <!-- Actividades del proyecto -->
                                    
                                    <a href=""></a>
                                   <!-- Detalle del proyecto -->
                                    <a href="?c=proyecto&a=Detalle&id_proyecto=<?php echo $r->id_proyecto; ?>" data-toggle="tooltip" data-placement="bottom" title="Detalle del proyecto" class="badge badge-info btn-circle btn-sm"><i class="fa fa-folder"></i></a>
                                    <!-- Eliminar proyecto -->
                                   
                                  </td>
                                   <td>
                                    <!-- Finalizar proyecto -->
                                    <a id="demo" onclick="javascript:return confirm('¿Seguro de finalizar este proyecto?');" data-toggle="tooltip" data-placement="bottom" title="Finalizar proyecto" class="badge badge-primary btn-circle btn-sm" href="?c=proyecto&a=AprobarFinalizar&id_proyecto=<?php echo $r->id_proyecto; ?>"><i class="fas fa-hourglass-end"></i></a>

                                    <!-- No finalizar -->
                                    <a id="demo"onclick="javascript:return confirm('¿Seguro desea no este proyecto?');"  data-toggle="tooltip" data-placement="bottom" title="NO Finalizar proyecto" class="badge badge-danger btn-circle btn-sm" href="?c=proyecto&a=NoAprobar&id_proyecto=<?php echo $r->id_proyecto; ?>"><i class="fas fa-times-circle"></i></a>
                                  </td>
                                </tr>
                          <?php endforeach; ?>
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
         <?php }
         else {?>
    <div class="container-fluid">
        <div class="card  mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detalle de proyectos</h6>
            
          </div>
    <div class="card-body">
      <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                  <thead>
                    <tr>
                      <th style="width: 20%">Nombre del proyecto</th>
                      <th>Facutad</th>
                      <th>#Beneficiarios</th>
                      <th>Presupuesto</th>
                      <th>Año</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php foreach($this->model->ListarProyectosCorrespondientesAUsuario() as $r): ?>
                            <tr>
                              <td><a><?php echo $r->Nombre_proyecto; ?></a><br/><small>Inicio <?php echo $r->Inicio; ?></small>
                              </td>
                              
                              <td><?php echo $r->nom_facultad;?></td>
                               <td>
                               <small><?php echo $r->personas_beneficiarias;?> Personas </small>
                              </td>
                               <td>
                               <small>$<?php echo $r->Presupuesto;?>  </small>
                              </td>
                               <td>
                               <small><?php echo $r->periodo;?>  </small>
                              </td>
                            
                              <td><a id="demo" onclick="javascript:return confirm('¿Seguro de finalizar este proyecto?');" data-toggle="tooltip" data-placement="bottom" title="Finalizar proyecto" class="badge badge-primary btn-circle btn-sm" href="?c=proyecto&a=Finalizar&id_proyecto=<?php echo $r->id_proyecto; ?>"><i class="fas fa-hourglass-end"></i></a>
                                 <!-- Finanzas de proyecto -->
                                <a href="?c=gasto&a=DetalleGastos&id_proyecto=<?php echo $r->id_proyecto; ?>" data-toggle="tooltip" data-placement="bottom" title="Finanzas de proyecto"class="badge badge-success btn-circle btn-sm btn-sm"><strong>$</strong></a>
                                <!-- Actividades del proyecto -->
                                
                                <a href=""></a>
                               <!-- Detalle del proyecto -->
                                <a href="?c=proyecto&a=Detalle&id_proyecto=<?php echo $r->id_proyecto; ?>" data-toggle="tooltip" data-placement="bottom" title="Detalle del proyecto" class="badge badge-info btn-circle btn-sm"><i class="fa fa-folder"></i></a>
                                <!-- Eliminar proyecto -->
                               
                            <a href="?c=actividades&a=Detalle&id_proyecto=<?php echo $r->id_proyecto; ?>" data-toggle="tooltip" data-placement="bottom" title="Actividades del  proyecto"
                              class="badge badge-warning btn-circle btn-sm"><i class="far fa-star"></i></a>
                            <a href=""></a>

                            <!-- Documentos adjuntos del proyecto -->
                            <a href="?c=anexos&a=Detalle&id_proyecto=<?php echo $r->id_proyecto; ?>" class="badge badge-ligth btn-circle btn-sm btn btn-outline-dark" data-toggle="tooltip" data-placement="bottom" title="Documentos del proyecto" href="anexos"><i class="fas fa-paperclip"></i></a>
                              </td>
                               
                            </tr>
                      <?php endforeach; ?>
                  </tbody>
                </table>
      </div>
    </div>
  </div>
</div>
         <?php } ?>
</div>
  <? }
   else { ?>
      <div style="font:bold 12pt arial;color:red;padding:30px"> 
      </div>
    <? }?>