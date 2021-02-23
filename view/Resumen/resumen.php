<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="admin-dashone-data-table-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sparkline8-list shadow-reset">
                            <div class="sparkline8-hd">
                                <div class="main-sparkline8-hd">
                                    <h1>Resumen ejecutivo | Completados</h1><br>
                                    <a href="?c=Proyecto&a=Crud" class="badge badge-primary"><i class="fas fa-plus fa-sm " ></i> Nuevo resumen ejecutivo</a>
                                
                                </div>
                            </div>
                            <div class="sparkline8-graph col-lg-12">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                          <thead>
                                            <tr>
                                                <th data-field="state" data-checkbox="true"></th>
                                                <th data-field="id" >Nombre Proyecto</th>
                                                <th data-field="name" data-editable="true">Comunidad</th>
                                                <th >Facultad</th>
                                                <th >Año</th>
                                                <th data-field="action">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php foreach($this->model1->ListarResumen() as $r): ?>
                                            <tr>
                                                <td><?php echo $r->id_proyecto; ?></td>
                                                <td><?php echo $r->Nombre_proyecto; ?></td>
                                                <td><?php echo $r->nom_comunidad_ben; ?></td>
                                                <td><?php echo $r->nom_facultad; ?></td>
                                                <td><?php echo $r->periodo; ?></td>
                                                <td>
                                                  <a href="?c=proyecto&a=Detalle&id_proyecto=<?php echo $r->id_proyecto; ?>" class="btn btn-primary btn-circle btn-sm">
                                                    <i class="fa fa-folder"></i> 
                                                  </a>
                                                  <a href="?c=proyecto&a=Edit&id_proyecto=<?php echo $r->id_proyecto; ?>" class="btn btn-success btn-circle btn-sm"><i class="fas fa-tools"></i>
                                                  </a>
                                                  <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=proyecto&a=Eliminar&id_proyecto=<?php echo $r->id_proyecto; ?>" class="btn btn-danger  btn-sm btn-circle"><i class="fas fa-times"></i>
                                                  </a>  

                                                </td>
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
<!-- Data table area End-->