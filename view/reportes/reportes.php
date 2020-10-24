
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between ">
            <h1 class="h3 mb-0 text-gray-800">Reportería | </h1>
        </div>
    </div>
  <div class="container-fluid">
    <div class="card  mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Sugerencias</h6>
          <a href="?c=Proyecto&a=Crud" class="badge badge-primary"><i class="fas fa-plus fa-sm " ></i> Agregar proyecto</a>
          <a href="?c=Home&a=Imprimir" target="_blank" class="badge badge-primary" ><i class="fas fa-download fa-sm " ></i> Bitacora de usuarios <?php echo (new \DateTime())->format('Y'); ?></a>
          <a href="?c=Home&a=Imprimir" target="_blank" class="badge badge-primary" ><i class="fas fa-download fa-sm " ></i> Finanzas <?php echo (new \DateTime())->format('Y'); ?></a>
          <a href="?c=Home&a=ImprimirPeriodoActual" target="_blank" class="badge badge-primary" ><i class="fas fa-download fa-sm " ></i> Proyectos <?php echo (new \DateTime())->format('Y'); ?></a>
          <a href="?c=Home&a=ImprimirPeriodoActual" target="_blank" class="badge badge-primary" ><i class="fas fa-download fa-sm " ></i> Actividades <?php echo (new \DateTime())->format('Y'); ?></a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
              <thead>
                <tr>
                  <th style="width: 20%">Nombre del proyecto</th>
                  <th>Facutad</th>
                  <th>#Beneficiarios</th>
                  <th>Acciones</th>
                  <th>Avance (%)</th>
                </tr>
              </thead>
              <tbody>
                  <tr>
                    <td><a></a><br/><small>Inicio</small>
                    </td>
                    
                    <td></td>
                     <td>
                      <form><i class="fa fa-male"></i>
                        <i class="fa fa-male"></i>
                        <i class="fa fa-male"></i>
                        <i class="fa fa-male"></i>
                        <i class="fa fa-male"></i>
                        <br></form>
                     <small> Personas </small>
                    </td>
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
                      
                      <!-- Eliminar proyecto -->
                      <a   onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" data-toggle="tooltip" data-placement="bottom" title="Eliminar proyecto" class="badge badge-danger btn-circle btn-sm" href="?c=proyecto&a=Eliminar&id_proyecto=<?php echo $r->id_proyecto; ?>"><i class="fas fa-times"></i></a>
                      <!-- Actualizar proyecto ?> -->
                      <a  data-toggle="tooltip" data-placement="bottom" title="Actualizar proyecto" class="badge badge-ligth btn-circle btn-sm btn btn-outline-info" href="?c=proyecto&a=Edit&id_proyecto=<?php echo $r->id_proyecto; ?>"><i class="fas fa-sync-alt"></i></a>
                      <!-- Documentos adjuntos del proyecto -->
                      <a href="?c=anexos&a=Detalle&id_proyecto=<?php echo $r->id_proyecto; ?>" class="badge badge-ligth btn-circle btn-sm btn btn-outline-dark" data-toggle="tooltip" data-placement="bottom" title="Documentos del proyecto" href="anexos"><i class="fas fa-paperclip"></i></a>
                    </td>
                    <td >
                        
                    </td>
                  </tr>
              </tbody>
            </table>
          </div>
      </div>
    </div>
  </div>